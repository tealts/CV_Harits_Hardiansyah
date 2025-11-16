<?php

namespace App\Controllers;

use App\Models\BiodataModel;
use App\Models\PendidikanModel;

class Pendidikan extends BaseController
{
    protected $biodataModel;
    protected $pendidikanModel;

    public function __construct()
    {
        $this->biodataModel = new BiodataModel();
        $this->pendidikanModel = new PendidikanModel();
    }

    public function index()
    {
        $biodata = $this->biodataModel->getBiodata();
        
        $data = [
            'title' => 'Riwayat Pendidikan',
            'biodata' => $biodata,
            'pendidikan' => $this->pendidikanModel->getPendidikanByBiodata($biodata['id'])
        ];

        return view('pendidikan', $data);
    }
}