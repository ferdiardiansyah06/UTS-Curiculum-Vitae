<?php namespace App\Controllers;
use App\Models\KeahlianModel;
use App\Models\BiodataModel;


class Keahlian extends BaseController
{
public function index()
{
$keahlian = new KeahlianModel();
$biodata = new BiodataModel();
$data['biodata'] = $biodata->first();
$data['keahlian'] = $keahlian->where('biodata_id', $data['biodata']['id'])->findAll();
return view('keahlian', $data);
}
}