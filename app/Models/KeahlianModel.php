<?php

namespace App\Models;

use CodeIgniter\Model;

class KeahlianModel extends Model
{
    protected $table = 'keahlian';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'biodata_id', 'kategori', 'nama_skill', 'level', 'persentase'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';

    public function getKeahlianByBiodata($biodataId)
    {
        return $this->where('biodata_id', $biodataId)
                    ->orderBy('kategori', 'ASC')
                    ->findAll();
    }

    public function getKeahlianByKategori($biodataId)
    {
        return $this->select('kategori, GROUP_CONCAT(nama_skill) as skills')
                    ->where('biodata_id', $biodataId)
                    ->groupBy('kategori')
                    ->findAll();
    }
}