<?php 
namespace App\Controllers;
use App\Models\PostModel;

class Home extends BaseController
{
	protected $postModel;

	public function __construct() {
        $this->postModel = new PostModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Homepage',
			'post' => $this->postModel->orderBy('created_at', 'desc')->findAll(5,0)
		];

		return view('Public/HomepageView', $data);
	}

	public function detail($slug) {
        $post = $this->postModel->getPost($slug);
        if ($post) {
            $data = [
                'title' => 'Detail Kegiatan - ' . $post['judul'],
                'post' => $post
            ];
            
            return view('Public/DetailActivityView', $data);
        }

        echo 'data tidak ada';
    }

    public function list_kegiatan(){
        $posts = $this->postModel->getPost();
        if ($posts) {
        	$data = [
                'title' => 'List Kegiatan',
                'posts' => $posts
            ];
        	return view('Public/ListKegiatanView', $data);
        }

        echo 'data tidak ada';
    }

    public function about(){
    	$data = [
                'title' => 'Tentang Kami'
        ];
    	return view('Public/AboutView',$data);
    }

    public function donasi(){
    	$data = [
                'title' => 'Donasi'
        ];
    	return view('Public/DonasiView',$data);
    }

    public function bergabung(){
    	$data = [
                'title' => 'Bergabung'
        ];
    	return view('Public/BergabungView',$data);
    }

	//--------------------------------------------------------------------

}
