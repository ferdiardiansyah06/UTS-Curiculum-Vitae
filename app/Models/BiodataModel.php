<?php

namespace App\Models;

use CodeIgniter\Model;

class BiodataModel extends Model
{
    protected $table            = 'biodata';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_lengkap',
        'gelar',
        'foto_profil',
        'email',
        'telepon',
        'alamat',
        'tentang_saya',
        'linkedin',
        'github',
        'website'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getBiodataWithRelations()
    {
        return $this->first();
    }

    public function getProfile($id = null)
    {
        if ($id) return $this->find($id);
        return $this->first();
    }
}