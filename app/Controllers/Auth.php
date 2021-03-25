<?php
namespace App\Controllers;
use App\Models\AdminModel;

class Auth extends BaseController
{
    protected $adminModel;
    protected $validation;

    public function __construct() {
        $this->adminModel = new AdminModel();
        $this->validation = \Config\Services::validation();
	}

    public function index() {
        if ($this->session->logged_in)
            return redirect()->to(route_to('dashboard'));
        else {
            $data = [
                'title' => 'Login',
                'validation' => $this->validation
            ];
            return view('Admin/LoginView', $data);
        }
    }

    public function login() {
        $validate = [
            'username' => [
                'rule' => 'required',
                'errors' => [
                    'required' => 'Username harus diisi.'
                ]
            ],
            'password' => [
                'rule' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi.'
                ]
            ]
        ];

        if (! $this->validate($validate))
            return redirect()->to(route_to('index'))->withInput()->with('validation', $this->validation);
        else {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $user = $this->adminModel->where(['username' => $username, 'password' => $password])->first();
            
            if ($user) {
                $data = [
                    'username' => $user['username'],
                    'nama' => $user['nama'],
                    'logged_in' => true
                ];
                $this->session->set($data);
                return redirect()->to(route_to('dashboard'));
            } else {
                $data = $this->session->setFlashData('fail', 'Username atau Password Salah.');
                return redirect()->to(route_to('index'));
            }    
        }
    }

    public function logout() {
        if ($this->session->logged_in) {
            $this->session->destroy();
            return redirect()->to(route_to('index'));
        }
    }
}
