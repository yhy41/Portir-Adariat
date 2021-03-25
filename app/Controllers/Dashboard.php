<?php
namespace App\Controllers;
use App\Models\PostModel;
use App\Models\AdminModel;

class Dashboard extends BaseController
{
    protected $postModel;
    protected $adminModel;
    protected $validation;

    public function __construct() {
        $this->postModel = new PostModel();
        $this->adminModel = new adminModel();
        $this->validation = \Config\Services::validation();
	}

	public function index() {
        if ($this->session->logged_in) {
            $data = [
                'title' => 'Dashboard',
                'post' => $this->postModel->orderBy('created_at', 'desc')->findAll(6, 0)
            ];
            return view('Admin/DashboardView', $data);
        }
        else
            return redirect()->to(route_to('index'));
    }

    public function edit_profile() {
        if ($this->session->logged_in) {
            $user = $this->adminModel->where('username', $this->session->username)->first();
            return json_encode($user);
        }
        return redirect()->to(route_to('index'));
    }

    public function update_profile() {
        $validate = [
            'nama' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama harus diisi.',
                    'min_length' => 'Nama minimal 3 karakter.'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[user.username,username,' . $this->session->username . ']',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'is_unique' => 'Username sudah dipakai.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password minimal 5 karakter.'
                ]
            ]
        ];

        if (! $this->validate($validate))
            return json_encode([
                'status' => 'error',
                'msg' => $this->validation->getErrors()
            ]);
        else {
            $user = $this->adminModel->where('username', $this->session->username)->first();

            $nama = $this->request->getVar('nama');
            $username = $this->request->getVar('username');
            $this->adminModel->save([
                'id' => $user['id'],
                'nama' => $nama,
                'username' => $username,
                'password' => $this->request->getVar('password')
            ]);

            $this->session->set([
                'nama' => $nama,
                'username' => $username
            ]);
            
            return json_encode([
                'status' => 'success',
            ]);
        }
    }
    
    public function create() {
        if ($this->session->logged_in) {
            $data = [
                'title' => 'Tambah Kegiatan Baru',
                'validation' => $this->validation,
                'notif' => $this->session->getFlashData('notif')
            ];
            return view('Admin/CreateView', $data);
        }
        return redirect()->to(route_to('index'));
    }

    public function store() {
        $validate = [
            'judul' => [
                'rule' => 'required',
                'errors' => [
                    'required' => 'Nama kegiatan harus diisi.'
                ]
            ],
            'lokasi' => [
                'rule' => 'required',
                'errors' => [
                    'required' => 'Lokasi harus diisi.'
                ]
            ],
            'tanggal' => [
                'rule' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus diisi.'
                ]
            ],
            'deskripsi' => [
                'rule' => 'required',
                'errors' => [
                    'required' => 'Deskripsi harus diisi.'
                ]
            ],
            'galleries' => [
                'rules' => 'uploaded[galleries]|max_size[galleries,51200]|mime_in[galleries,image/jpg,image/jpeg,image/png]|is_image[galleries]',
                'errors' => [
                    'uploaded' => 'Minimal pilih 1 foto.',
                    'max_size' => 'Ukuran flie terlalu besar',
                    'mime_in' => 'File bukan gambar',
                    'is_image' => 'File bukan gambar',
                ]
            ]
        ];

        if (! $this->validate($validate)) {
            $this->session->setFlashData('notif', ['status' => 'danger', 'msg' => 'Gagal menambahkan kegiatan.']);
            return redirect()->to(route_to('create'))->withInput();
        }
        else {
            $files = $this->request->getFiles();
            if (count($files['galleries']) > 10) {
                $this->validation->setError('galleries', 'Maksimal 10 foto.');
                
                $this->session->setFlashData('notif', ['status' => 'danger', 'msg' => 'Gagal menambahkan kegiatan.']);
                return redirect()->to(route_to('create'))->withInput();
            }

            $slug = url_title($this->request->getVar('judul'), '-', true);

            $photos = [];
            foreach ($files['galleries'] as $img) {
                $filename = $slug . '-' . $img->getRandomName();
                $img->move('uploads/imgs', $filename);
                array_push($photos, $filename);
            }
            
            // GENERATE UNIQUE CODE
            helper('text');
            do {
                $ucode = random_string('alnum', 7);
                $eksis = $this->postModel->where('u_code', $ucode)->first()['u_code'] == $ucode;
            } while ($eksis);

            $this->postModel->save([
                'u_code' => $ucode,
                'judul' => $this->request->getVar('judul'),
                'slug' => $slug,
                'lokasi' => $this->request->getVar('lokasi'),
                'tanggal' => $this->request->getVar('tanggal'),
                'deskripsi' => $this->request->getVar('deskripsi'),
                'foto' => json_encode($photos)
            ]);
            $this->session->setFlashData('notif', ['status' => 'success', 'msg' => 'Berhasil menambahkan kegiatan.']);
            return redirect()->to(route_to('posts'));
        }
    }

    public function posts() {
        if ($this->session->logged_in) {
            $data = [
                'title' => 'Daftar Kegiatan',
                'post' => $this->postModel->getPost(),
                'notif' => $this->session->getFlashData('notif')
            ];
    
            return view('Admin/PostsView', $data);
        }
        return redirect()->to(route_to('index'));
    }

    public function detail($slug) {
        if ($this->session->logged_in) {
            $post = $this->postModel->getPost($slug);
            if ($post) {
                $data = [
                    'title' => 'Detail Kegiatan - ' . $post['judul'],
                    'post' => $post
                ];
                
                return view('Admin/DetailView', $data);
            }
            $this->session->setFlashData('notif', ['status' => 'danger', 'msg' => 'Terjadi kesalahan.']);
            return redirect()->to(route_to('posts'));
        }
        return redirect()->to(route_to('index'));
    }

    public function destroy($segment) {
        // SPLIT UP SLUG & UNIQUE CODE
        $slug = explode('-', $segment);
        $code = array_pop($slug);
        
        // DELETE PHOTOS OF POST
        $files = $this->postModel->getPost($segment)['foto'];
        $photos = json_decode($files);
        foreach ($photos as $foto) {
            // DELETE EACH PHOTO FROM STORAGE
            unlink('uploads/imgs/' . $foto);
        }

        // DELETE ROW
        $post =  $this->postModel->where(['u_code' => $code, 'slug' => implode('-', $slug)]);
        if ($post->delete()) {
            $this->session->setFlashData('notif', ['status' => 'success', 'msg' => 'Berhasil menghapus kegiatan.']);
            return redirect()->to(route_to('posts'));
        }

        $this->session->setFlashData('notif', ['status' => 'danger', 'msg' => 'Terjadi kesalahan.']);
        return redirect()->to(route_to('posts'));
    }

    public function edit($segnemt) {
        if ($this->session->logged_in) {
            $data = [
                'title' => 'Edit Detail Kegiatan',
                'validation' => $this->validation,
                'notif' => $this->session->getFlashData('notif'),
                'post' => $this->postModel->getPost($segnemt)
            ];
            return view('Admin/EditView', $data);
        }
        return redirect()->to(route_to('index'));
    }

    public function update($segment) {
        $validate = [
            'judul' => [
                'rule' => 'required',
                'errors' => [
                    'required' => 'Judul harus diisi.'
                ]
            ],
            'lokasi' => [
                'rule' => 'required',
                'errors' => [
                    'required' => 'Lokasi harus diisi.'
                ]
            ],
            'tanggal' => [
                'rule' => 'required',
                'errors' => [
                    'required' => 'Tanggal harus diisi.'
                ]
            ],
            'deskripsi' => [
                'rule' => 'required',
                'errors' => [
                    'required' => 'Deskripsi harus diisi.'
                ]
            ]
        ];
        
        $post = $this->postModel->getPost($segment);
        if (! $this->validate($validate)) {
            $this->session->setFlashData('notif', ['status' => 'danger', 'msg' => 'Gagal mengubah detail kegiatan.']);
            return redirect()->to(route_to('edit', $post['slug'] . '-' . $post['u_code']))->withInput();
        }
        else {
            $slug = url_title($this->request->getVar('judul'), '-', true);

            $this->postModel->save([
                'id' => $post['id'],
                'judul' => $this->request->getVar('judul'),
                'slug' => $slug,
                'lokasi' => $this->request->getVar('lokasi'),
                'tanggal' => $this->request->getVar('tanggal'),
                'deskripsi' => $this->request->getVar('deskripsi'),
            ]);
            $this->session->setFlashData('notif', ['status' => 'success', 'msg' => 'Berhasil mengubah detail kegiatan.']);
            return redirect()->to(route_to('posts'));
        }
    }

    public function edit_galeri($segment) {
        if ($this->session->logged_in) {
            $post = $this->postModel->getPost($segment);
            if ($post) {
                $data = [
                    'title' => 'Edit Foto Kegiatan',
                    'photos' => json_decode($post['foto']),
                    'post' => ['uri' => $post['slug'] . '-' . $post['u_code'], 'judul' => $post['judul']],
                    'notif' => $this->session->getFlashData('notif'),
                    'validation' => $this->validation
                ];
    
                return view('Admin/EditGalleryView', $data);
            }
            $this->session->setFlashData('notif', ['status' => 'danger', 'msg' => 'Terjadi kesalahan.']);
            return redirect()->to(route_to('posts'));
        }

        return redirect()->to(route_to('index'));
    }

    public function delete_photo($filename) {
        $uri = $this->request->getVar('uri');
        $post = $this->postModel->getPost($uri);
        $photos = json_decode($post['foto']);
        if (($key = array_search($filename, $photos)) !== false) {
            unset($photos[$key]);
            $photos = array_values($photos);
            $this->postModel->save([
                'id' => $post['id'],
                'foto' => json_encode($photos)
            ]);
            unlink('uploads/imgs/' . $filename);

            $this->session->setFlashData('notif', ['status' => 'success', 'msg' => 'Berhasil menghapus foto.']);
            return redirect()->to(route_to('edit-gallery', $uri));
        }
        
        $this->session->setFlashData('notif', ['status' => 'danger', 'msg' => 'Gagal menghapus foto.']);
        return redirect()->to(route_to('edit-gallery', $uri));
    }

    public function update_gallery($segment) {
        $post = $this->postModel->getPost($segment);
        $photos = json_decode($post['foto']);
        $avail = 10 - count($photos);
        
        $validate = [
            'galleries' => [
                'rules' => 'uploaded[galleries]|max_size[galleries,51200]|mime_in[galleries,image/jpg,image/jpeg,image/png]|is_image[galleries]',
                'errors' => [
                    'uploaded' => 'Minimal pilih 1 foto.',
                    'max_size' => 'Ukuran flie terlalu besar',
                    'mime_in' => 'File bukan gambar',
                    'is_image' => 'File bukan gambar',
                ]
            ]
        ];

        if (! $this->validate($validate)) {
            $this->session->setFlashData('notif', ['status' => 'danger', 'msg' => 'Gagal menambahkan foto.']);
            return redirect()->to(route_to('edit-gallery', $segment))->withInput();
        } else {
            $files = $this->request->getFiles()['galleries'];
            
            if (count($files) > $avail) {
                $this->validation->setError('galleries', 'Maksimal ' . $avail . ' foto.');

                $this->session->setFlashData('notif', ['status' => 'danger', 'msg' => 'Gagal menambahkan foto.']);
                return redirect()->to(route_to('edit-gallery', $segment))->withInput();
            } else {
                foreach ($files as $img) {
                    $filename = $segment . '-' . $img->getRandomName();
                    $img->move('uploads/imgs', $filename);
                    array_push($photos, $filename);
                }
                $this->postModel->save([
                    'id' => $post['id'],
                    'foto' => json_encode($photos)
                ]);
                    
                $this->session->setFlashData('notif', ['status' => 'success', 'msg' => 'Berhasil menambahkan foto.']);
                return redirect()->to(route_to('edit-gallery', $segment));
            }
        }
    }

}
