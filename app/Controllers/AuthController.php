<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;
class AuthController extends BaseController
{
    public function register()
    {
        helper(['form']);

        if($this->request->getMethod() === 'POST') {
            $rules = [
                'name' => 'required|min_length[3]|max_length[50]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'role' => 'required|in_list[customer,staff]',
                'password' => 'required|min_length[6]',
                'pass_confirm' => 'matches[password]'
            ];

            if(!$this->validate($rules)) {
                return view('auth/register', [
                    'errors' => $this->validator->getErrors()
                ]);
            }

            $model = new UserModel();
            if ($model->where('email', $this->request->getPost('email'))->first()) {
                return view('auth/register', [
                    'errors' => ['email' => 'This email is already registered.']
                ]);
            }

            $model->save([
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'role' => $this->request->getPost('role'),
                'password' => $this->request->getPost('password'),
            ]);

            return redirect()->to('login')->with('success', 'Registration successful! Please login.');
        }

        return view('auth/register');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginPost()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->verifyUser($email, $password);

        if ($user) {
            $session->set([
                'user_id'  => $user['id'],
                'name'     => $user['name'],
                'email'    => $user['email'],
                'role'     => $user['role'],
                'logged_in'=> true
            ]);

            return redirect()->to($user['role'] === 'staff' ? '/staff/dashboard' : '/customer/dashboard');
        } else {
            $session->setFlashdata('error', 'Invalid email or password.');
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
