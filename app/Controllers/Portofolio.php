<?php

namespace App\Controllers;

use App\Models\BiodataModel;
use App\Models\PortofolioModel;

class Portofolio extends BaseController
{
    protected $biodataModel;
    protected $portofolioModel;

    public function __construct()
    {
        $this->biodataModel = new BiodataModel();
        $this->portofolioModel = new PortofolioModel();
    }

    public function index()
    {
        $biodata = $this->biodataModel->getBiodata();
        
        $data = [
            'title' => 'Portofolio',
            'biodata' => $biodata,
            'portofolio' => $this->portofolioModel->getPortofolioByBiodata($biodata['id'])
        ];

        return view('portofolio', $data);
    }
}