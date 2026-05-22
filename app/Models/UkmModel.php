<?php

namespace App\Models;

use CodeIgniter\Model;

class UkmModel extends Model
{
    protected $table = 'ukm';
    protected $primaryKey = 'id_ukm';

    protected $allowedFields = [
        'nama_ukm'
    ];
    }