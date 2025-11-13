<?php

namespace App\Models;

use CodeIgniter\Model;

class PengalamanModel extends Model
{
    protected $table            = 'pengalaman';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'biodata_id',
        'jenis_pengalaman',
        'judul',
        'perusahaan_organisasi',
        'lokasi',
        'tahun_mulai',
        'tahun_selesai',
        'sedang_berlangsung',
        'deskripsi',
        'urutan'
    ];

    public function getPengalamanByBiodata($biodataId)
    {
        return $this->where('biodata_id', $biodataId)
                    ->orderBy('urutan', 'ASC')
                    ->orderBy('tahun_mulai', 'DESC')
                    ->findAll();
    }
}