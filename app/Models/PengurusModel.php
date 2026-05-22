<?php
namespace App\Models;
use CodeIgniter\Model;

class PengurusModel extends Model {
    protected $table = 'pengurus';
    protected $primaryKey = 'id_pengurus';
    protected $allowedFields = ['nama_pengurus', 'jabatan', 'id_ukm'];
}