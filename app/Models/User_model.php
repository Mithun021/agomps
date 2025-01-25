<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class User_model extends Model
    {
        protected $table         = 'users';
        protected $primaryKey = 'id';
        protected $allowedFields = [
            'username',
            'user_password',
            'email_address',
            'user_phone',
            'profile_image',
            'authority',
        ];

        protected $createdField  = 'created_at';
        
    }
?>