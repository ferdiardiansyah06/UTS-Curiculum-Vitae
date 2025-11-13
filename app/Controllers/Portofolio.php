<?php namespace App\Controllers;
use App\Models\PortofolioModel;
use App\Models\BiodataModel;


class Portofolio extends BaseController
{
public function index()
{
$portofolio = new PortofolioModel();
$biodata = new BiodataModel();
$data['biodata'] = $biodata->first();
$data['portofolio'] = $portofolio->where('biodata_id', $data['biodata']['id'])->findAll();
return view('portofolio', $data);
}
}