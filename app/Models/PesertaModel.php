<?php

namespace App\Models;

use CodeIgniter\Model;

class PesertaModel extends Model
{
    protected $table            = 'peserta';
    protected $primaryKey       = 'id_peserta';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['nama_peserta', 'nim', 'tgl_lahir', 'prodi', 'no_telpon'];
}