<?php

namespace App\Http\Controllers;


use PDF;
use App\Models\LaporanModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade;
use PDO;
use Svg\Surface\SurfacePDFLib;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
       $data = LaporanModel::all();
        return view('laporan.v_laporan',compact('data'));

    }


    public function cetak_pdf()
    {
        $data = LaporanModel::all();
        return view('laporan.laporan_pdf',compact('data'));
    }
}
