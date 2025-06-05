<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'users';
    protected $allowedFields = ['username', 'password', 'role', 'nama', 'nik_ktp', 'longitude', 'latitude'];
    protected $returnType = 'object';

    public function checkLogin($username, $password) {
        $user = $this->where('username', $username)->first();
        return $user && password_verify($password, $user->password) ? $user : false;
    }
}
