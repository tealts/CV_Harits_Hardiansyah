<?php

namespace App\Controllers;

use App\Models\BiodataModel;
use App\Models\KeahlianModel;

class Keahlian extends BaseController
{
    protected $biodataModel;
    protected $keahlianModel;

    public function __construct()
    {
        $this->biodataModel = new BiodataModel();
        $this->keahlianModel = new KeahlianModel();
    }

    public function index()
    {
        $biodata = $this->biodataModel->getBiodata();
        
        $data = [
            'title' => 'Keahlian',
            'biodata' => $biodata,
            'keahlian' => $this->keahlianModel->getKeahlianByBiodata($biodata['id'])
        ];

        return view('keahlian', $data);
    }
}