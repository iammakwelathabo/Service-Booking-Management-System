<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $allowedFields = ['staff_id', 'name', 'description', 'price', 'duration', 'created_at'];
    protected $useTimestamps = true;
}
