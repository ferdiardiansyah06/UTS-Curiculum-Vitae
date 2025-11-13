<?php

namespace App\Models;

use CodeIgniter\Model;

class KeahlianModel extends Model
{
    protected $table            = 'keahlian';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'biodata_id',
        'kategori',
        'nama_skill',
        'tingkat_kemahiran',
        'urutan'
    ];

    public function getKeahlianByBiodata($biodataId)
    {
        return $this->where('biodata_id', $biodataId)
                    ->orderBy('kategori', 'ASC')
                    ->orderBy('urutan', 'ASC')
                    ->findAll();
    }

    public function getKeahlianGrouped($biodataId)
    {
        $keahlian = $this->getKeahlianByBiodata($biodataId);
        $grouped = [];
        
        foreach ($keahlian as $skill) {
            $kategori = $skill['kategori'] ?? 'Other';
            if (!isset($grouped[$kategori])) {
                $grouped[$kategori] = [];
            }
            $grouped[$kategori][] = $skill;
        }
        
        return $grouped;
    }
}