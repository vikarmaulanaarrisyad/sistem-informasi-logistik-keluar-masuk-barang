@extends('layout.v_template')

@section('title','Barang Keluar')

@section('content')


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
    </div>
@elseif(session('delete'))
    <div class="alert alert-danger">
        {{ session('delete') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
</div>

@endif


<!-- Default box -->
<div class="box">
<div class="box-header with-border">
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Tambah Data</button>

</div>
<div class="box-body">
    <!-- Menampilkan data -->

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Jumlah Barang Keluar</th>
                <th>Tanggal Keluar</th>
            </tr>

            @foreach ($data as $dt )
            <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dt->kodebarang }}</td>
                    <td>{{ $dt->qtykeluar}}</td>
                    <td>{{ $dt->tglkeluar}}</td>
                    <td>
                        <a href="/keluar/delete/{{$dt->idkeluar}}" class="btn btn-sm btn-danger"> Delete</a>
                    </td>
                </tr>
             @endforeach
        </thead>
    </table>
</div>
<!-- /.box-body -->
<!-- /.box-footer-->
</div>






<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Form Input Barang</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/keluar" method="POST">
            @csrf
            <div class="form-group">
              <label for="kodebarang">Kode Barang</label>
              <input type"text" class="form-control" id="kodebarang" placeholder="Masukan Kode Barang" name="kodebarang">
            </div>

            <div class="form-group">
                <label for="tglkeluar">Tanggal Keluar Barang </label>
                <input type="date" class="form-control" name="tglkeluar" id="tglkeluar">
            </div>


            <div class="form-group">
                <label for="qtykeluar">Jumlah Barang Keluar</label>
                <input type"number" class="form-control" id="qtykeluar" placeholder="Masukan stock Barang" name="qtykeluar">
              </div>



                 <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- Akhir Modal Box -->


<!-- /.box -->
@endsection
