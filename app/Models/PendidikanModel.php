<?php

namespace App\Models;

use CodeIgniter\Model;

class PendidikanModel extends Model
{
    protected $table            = 'pendidikan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'biodata_id',
        'jenjang',
        'institusi',
        'jurusan',
        'tahun_mulai',
        'tahun_selesai',
        'ipk',
        'deskripsi',
        'urutan'
    ];

    public function getPendidikanByBiodata($biodataId)
    {
        return $this->where('biodata_id', $biodataId)
                    ->orderBy('urutan', 'ASC')
                    ->orderBy('tahun_mulai', 'DESC')
                    ->findAll();
    }
}