<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['role', 'id_peserta', 'id_pengajar', 'id_pengurus', 'username', 'password', 'status'];
}










////////Before

//<?php

//namespace App\Models;

//use CodeIgniter\Model;

//class UserModel extends Model
// {
//     protected $table            = 'user';
//     protected $primaryKey       = 'id_user';
//     protected $allowedFields = [
//     'username', 'password', 'role', 'id_peserta', 'id_pengajar', 'id_pengurus', 'status'
// ];
// }
