<?php namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        helper(['form']);
        $model = new UserModel();
    
        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
    
            $user = $model->where('username', $username)->first();
    
            if ($user && password_verify($password, $user->password)) {
                session()->set([
                    'id'        => $user->id,
                    'username'  => $user->username,
                    'role'      => $user->role,
                    'logged_in' => true,
                ]);
    
                if ($user->role === 'vendor' || $user->role === 'sekolah') {
                    return redirect()->to('/keuangan');
                }
    
                return redirect()->to('/'); // fallback
            }
    
            return redirect()->back()->with('error', 'Username atau Password Salah');
        }
    
        return view('auth/login');
    }
    
    public function register()
    {
        helper(['form']);
    
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'nama'             => 'required|min_length[3]',
                'nik_ktp'          => 'required|numeric|is_unique[users.nik_ktp]',
                'username'         => 'required|min_length[3]|is_unique[users.username]',
                'password'         => 'required|min_length[6]',
                'password_confirm' => 'required|matches[password]',
                'role'             => 'required',
                'latitude'         => 'required|decimal',
                'longitude'        => 'required|decimal',
            ];
    
            if (!$this->validate($rules)) {
                return view('auth/register', ['validation' => $this->validator]);
            }
    
            $model = new UserModel();
            $model->save([
                'nama'        => $this->request->getVar('nama'),
                'nik_ktp'     => $this->request->getVar('nik_ktp'),
                'username'    => $this->request->getVar('username'),
                'password'    => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role'        => $this->request->getVar('role'),
                'latitude'    => $this->request->getVar('latitude'),
                'longitude'   => $this->request->getVar('longitude'),
            ]);
    
            return redirect()->to('/register')->with('success', 'Registrasi berhasil! Silakan login.');
        }
    
        return view('auth/register');
    }
    

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
