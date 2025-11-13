<?php namespace App\Controllers;
use App\Models\PendidikanModel;
use App\Models\BiodataModel;


class Pendidikan extends BaseController
{
public function index()
{
$pendidikan = new PendidikanModel();
$biodata = new BiodataModel();
$data['biodata'] = $biodata->first();
$data['pendidikan'] = $pendidikan->where('biodata_id', $data['biodata']['id'])->orderBy('tahun_mulai','DESC')->findAll();
return view('pendidikan', $data);
}
}