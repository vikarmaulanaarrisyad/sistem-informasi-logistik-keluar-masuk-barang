<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $data =BarangModel::all();
        return view('barang.v_stock',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'kodebarang' => 'required',
            'namabarang' => 'required',
            'stockbarang' => 'required'

        ]);

        //menambahkan data ke database
        BarangModel::create($request->all());
        return redirect('/stock')->with('status','Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangModel  $barangModel
     * @return \Illuminate\Http\Response
     */
    public function show(BarangModel $barangModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangModel  $barangModel
     * @return \Illuminate\Http\Response
     */
    public function edit($idbarang)
    {
        $dt = BarangModel::find($idbarang);
        return view('v_editbarang',compact('dt'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangModel  $barangModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangModel $idbarang)
    {
        //QUERY ELOQUENT UNTUK UPDATE DATA
       $input = BarangModel::where('idbarang',$idbarang->idbarang)
                    ->update([
                        'kodebarang' => $request->kodebarang,
                        'namabarang' => $request->namabarang,
                        'stockbarang' =>$request->stockbarang
                    ]);
        if($input){

            return redirect('/stock')->with('status','Data Berhasil Diubah!');
        }else{

            return redirect('/stock')->with('status','Data Gagal Diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangModel  $barangModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangModel $idbarang)
    {
        //
    }
}
