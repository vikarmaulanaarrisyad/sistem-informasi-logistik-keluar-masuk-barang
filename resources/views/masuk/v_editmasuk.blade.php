
@extends('layout.v_template')

@section('title','Edit Barang')


@section('content')

<form action="/masuk/update/{{ $mbarang->idmasuk }}" method="post" enctype=" multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="kodebarang">Kode Barang</label>
      <input type"text" class="form-control" id="kodebarang"  name="kodebarang" value="{{ $mbarang->kodebarang}}">
    </div>
    <div class="form-group">
      <label for="qtymasuk">Jumlah Barang Masuk</label>
      <input type"number" class="form-control" id="qtymasuk"  name="qtymasuk" value="{{ $mbarang->qtymasuk}}">
    </div>



    <div class="modal-footer">
        <button type="reset" class="btn btn-success" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
</form>

    @endsection
