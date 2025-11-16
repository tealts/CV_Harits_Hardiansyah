<?php

namespace App\Models;

use CodeIgniter\Model;

class PortofolioModel extends Model
{
    protected $table = 'portofolio';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'biodata_id', 'judul', 'deskripsi', 'teknologi',
        'gambar', 'link_demo', 'link_github', 'tanggal_selesai'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';

    public function getPortofolioByBiodata($biodataId)
    {
        return $this->where('biodata_id', $biodataId)
                    ->orderBy('tanggal_selesai', 'DESC')
                    ->findAll();
    }
}