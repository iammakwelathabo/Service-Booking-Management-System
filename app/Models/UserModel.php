<?php


namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name',
        'email',
        'password',
        'role',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    /**
     * Hash password before saving to database
     */
    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    /**
     * Verify user credentials (for login)
     */
    public function verifyUser(string $email, string $password)
    {
        $user = $this->where('email', $email)->first();

        if (!$user) return false;
        if (password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }
}
