@extends('layout.v_template')

@section('title','Edit Barang')


@section('content')


    <form action="/stock/update/{{ $dt->idbarang }}" method="POST">
        @csrf

        <div class="form-group">
          <label for="kodebarang">Kode Barang</label>
          <input type"text" class="form-control" id="kodebarang"  name="kodebarang" value="{{ $dt->kodebarang }}">
        </div>

        <div class="form-group">
          <label for="namabarang">Nama Barang</label>
          <input type"text" class="form-control" id="namabarang" name="namabarang" value="{{ $dt->namabarang }}">
        </div>


        <div class="form-group">
            <label for="stockbarang">stock Barang</label>
            <input type"number" class="form-control" id="stockbarang" name="stockbarang" value="{{ $dt->stockbarang }}">
          </div>


             <div class="modal-footer">
            <button type="reset" class="btn btn-success" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
    </form>

@endsection
