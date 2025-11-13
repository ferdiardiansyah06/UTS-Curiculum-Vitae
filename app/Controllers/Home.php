<?php

namespace App\Controllers;

use App\Models\BiodataModel;
use App\Models\PendidikanModel;
use App\Models\PengalamanModel;
use App\Models\KeahlianModel;
use App\Models\PortofolioModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
    protected $biodataModel;
    protected $pendidikanModel;
    protected $pengalamanModel;
    protected $keahlianModel;
    protected $portofolioModel;

    public function __construct()
    {
        $this->biodataModel = new BiodataModel();
        $this->pendidikanModel = new PendidikanModel();
        $this->pengalamanModel = new PengalamanModel();
        $this->keahlianModel = new KeahlianModel();
        $this->portofolioModel = new PortofolioModel();
    }

    public function index(): string
    {
        // Get biodata (ID 1 sebagai default user)
        $biodata = $this->biodataModel->find(1);
        
        if (!$biodata) {
            throw new PageNotFoundException('Data biodata tidak ditemukan di database. Silakan import SQL schema terlebih dahulu.');
        }

        // Get all related data
        $data = [
            'biodata' => $biodata,
            'pendidikan' => $this->pendidikanModel->getPendidikanByBiodata(1),
            'pengalaman' => $this->pengalamanModel->getPengalamanByBiodata(1),
            'keahlian' => $this->keahlianModel->getKeahlianGrouped(1),
            'portofolio' => $this->portofolioModel->getPortofolioByBiodata(1),
            'profile' => $this->biodataModel->getProfile(1) // Ambil profile dengan ID 1
        ];

        return view('cv_view', $data);
    }
}