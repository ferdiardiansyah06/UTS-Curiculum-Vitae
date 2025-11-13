<?php namespace App\Controllers;
use App\Models\PengalamanModel;
use App\Models\BiodataModel;


class Pengalaman extends BaseController
{
public function index()
{
$pengalaman = new PengalamanModel();
$biodata = new BiodataModel();
$data['biodata'] = $biodata->first();
$data['pengalaman'] = $pengalaman->where('biodata_id', $data['biodata']['id'])->orderBy('tahun_mulai','DESC')->findAll();
return view('pengalaman', $data);
}
}