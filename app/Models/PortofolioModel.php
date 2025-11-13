<?php

namespace App\Models;

use CodeIgniter\Model;

class PortofolioModel extends Model
{
    protected $table            = 'portofolio';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'biodata_id',
        'judul',
        'deskripsi',
        'teknologi',
        'gambar',
        'link_demo',
        'link_github',
        'tahun',
        'urutan'
    ];

    public function getPortofolioByBiodata($biodataId)
    {
        return $this->where('biodata_id', $biodataId)
                    ->orderBy('urutan', 'ASC')
                    ->orderBy('tahun', 'DESC')
                    ->findAll();
    }
}