<?php

namespace App\Controllers;

use App\Models\BiodataModel;
use App\Models\PengalamanModel;

class Pengalaman extends BaseController
{
    protected $biodataModel;
    protected $pengalamanModel;

    public function __construct()
    {
        $this->biodataModel = new BiodataModel();
        $this->pengalamanModel = new PengalamanModel();
    }

    public function index()
    {
        $biodata = $this->biodataModel->getBiodata();
        
        $data = [
            'title' => 'Pengalaman',
            'biodata' => $biodata,
            'pengalaman' => $this->pengalamanModel->getPengalamanByBiodata($biodata['id'])
        ];

        return view('pengalaman', $data);
    }
}