<?php

namespace App\Controllers\Pembina;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {

        $data['views'] = 'pembina/index';
        
        return view('pembina/layout_view', $data);
    }

}