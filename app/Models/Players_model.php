<?php

namespace App\Models;

use CodeIgniter\Model;

class Players_model extends Model
{
    protected $table         = 'players';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'first_name',
        'middle_name',
        'last_name',
        'mobile_number',
        'whatsapp_number',
        'email_address',
        'age',
        'gender',
        'aadhar',
        'state',
        'city',
        'pincode',
        'full_address',
        'coach_name',
        'coach_number',
        'jersey_photo',
        'password',
        'status'
    ];
    protected $createdField  = 'created_at';

    public function add($data, $id = null)
    {
        if ($id != null) {
            $result = $this->update($id, $data);
            return $result ? true : 'Data not updated: Update failed.';
        } else {
            // Check if the player exists using mobile number or aadhar
            $existingPlayer = $this->where('mobile_number', $data['mobile_number'])
                ->orWhere('aadhar', $data['aadhar'])
                ->first();

            if ($existingPlayer) {
                return 'Already account created: Mobile number or Aadhar already exists.';
            } else {
                // Insert the new player into the database
                $result = $this->insert($data);
                return $result ? true : 'Data not inserted: Insertion failed.';
            }
        }
    }


    public function get($id = null)
    {
        if ($id != null) {
            $result = $this->where('id', $id)->first();
        } else {
            $result = $this->findAll();
        }
        return $result;
    }

    public function getActivePlayer()
    {
        return $this->where('status', 1)->findAll();
    }
}
