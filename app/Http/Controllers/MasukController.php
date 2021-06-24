<?php

namespace App\Http\Controllers;

use App\Models\Masuk;
use Illuminate\Http\Request;


class MasukController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //membuat tampilan awal / index
    public function index()
    {
        $data = Masuk::all();
       return view('masuk.v_masuk', compact('data'));

    }

    public function store(Request $request)
    {
        $request->validate([

            'kodebarang' => 'required',
            'tglmasuk' => 'required',
            'qtymasuk' => 'required'

        ]);
         Masuk::create($request->all());

        //menambahkan data ke database
            return redirect('/masuk')->with('status','Data Berhasil Ditambahkan!');
    }


    public function edit($idmasuk)
    {
        $mbarang = Masuk::find($idmasuk);
        return view('masuk.v_editmasuk',compact('mbarang'));
    }

    public function update(Request $request, Masuk $idmasuk)
{ //QUERY ELOQUENT UNTUK UPDATE DATA
    $input = Masuk::where('idmasuk',$idmasuk->idmasuk)
                 ->update([
                    'kodebarang'=>$request->kodebarang,
                    'qtymasuk' =>$request->qtymasuk
                 ]);
     if($input){

         return redirect('/masuk')->with('status','Data Berhasil Diubah!');
     }else{

         return redirect('/masuk')->with('status','Data Gagal Diubah!');
     }
}


//function delete
    public function destroy(Masuk $idmasuk)
    {
        //esekusi delete

        $idmasuk->delete();
       return redirect('/masuk')->with('delete','Data di hapus');

    }
}
