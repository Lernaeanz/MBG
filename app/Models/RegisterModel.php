<?php namespace App\Models;

use CodeIgniter\Model;

class RegisterModel extends Model
{
    protected $table = 'register';
    protected $primaryKey = 'id';

    protected $allowedFields = ['first_name', 'last_name', 'email', 'password_hash'];
    protected $useTimestamps = true;

    public function insertUser(array $data)
    {
        // Pastikan 'password' ada di $data sebelum hash
        if (isset($data['password'])) {
            $data['password_hash'] = password_hash($data['password'], PASSWORD_DEFAULT);
            unset($data['password']);
        }
        return $this->insert($data);
    }
}
