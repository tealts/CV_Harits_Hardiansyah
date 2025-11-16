<?php

namespace App\Controllers;

use App\Models\BiodataModel;
use App\Models\PendidikanModel;
use App\Models\PengalamanModel;
use App\Models\KeahlianModel;

class Home extends BaseController
{
    protected $biodataModel;
    protected $pendidikanModel;
    protected $pengalamanModel;
    protected $keahlianModel;

    public function __construct()
    {
        $this->biodataModel = new BiodataModel();
        $this->pendidikanModel = new PendidikanModel();
        $this->pengalamanModel = new PengalamanModel();
        $this->keahlianModel = new KeahlianModel();
    }

    public function index()
    {
        $biodata = $this->biodataModel->getBiodata();
        
        if (!$biodata) {
            return redirect()->to('/error');
        }

        $data = [
            'title' => 'Home - CV ' . $biodata['nama_lengkap'],
            'biodata' => $biodata,
            'pendidikan' => $this->pendidikanModel->getPendidikanByBiodata($biodata['id']),
            'pengalaman' => $this->pengalamanModel->getPengalamanByBiodata($biodata['id']),
            'keahlian' => $this->keahlianModel->getKeahlianByBiodata($biodata['id'])
        ];

        return view('home', $data);
    }
}