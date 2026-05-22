<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajarModel extends Model
{
    protected $table            = 'pengajar';
    protected $primaryKey       = 'id_pengajar';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['nama_pengajar', 'no_telpon', 'tgl_lahir'];
}