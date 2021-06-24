@extends('layout.v_template')

@section('title','Stock Barang')

@section('content')


    <!-- Notifikasi -->

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

    <!--End Notifikasi -->



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
                    <th>Nama Barang</th>
                    <th>Jumlah Stock</th>
                    <th>Terakhir Di Buat</th>
                    <th>Terakhir Di Update</th>
                </tr>

                @foreach ($data as $dt )
                <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->kodebarang }}</td>
                        <td>{{ $dt->namabarang }}</td>
                        <td>{{ $dt->stockbarang }} </td>
                        <td>{{ $dt->created_at }}</td>
                        <td>{{ $dt->updated_at }}</td>
                        <td>
                            <a href="/stock/edit/{{ $dt->idbarang }}" class="btn btn-info">edit</a>

                        </td>
                    </tr>
                 @endforeach
            </thead>
        </table>
    </div>
    <!-- /.box-body -->
    <!-- /.box-footer-->
    </div>
    <!-- /.box -->



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
        <form action="/stock" method="POST">
            @csrf
            <div class="form-group">
              <label for="kodebarang">Kode Barang</label>
              <input type"text" class="form-control" id="kodebarang" placeholder="Masukan Kode Barang" name="kodebarang">
            </div>

            <div class="form-group">
              <label for="namabarang">Nama Barang</label>
              <input type"text" class="form-control" id="namabarang" placeholder="Masukan Nama Barang" name="namabarang">
            </div>


            <div class="form-group">
                <label for="stockbarang">stock Barang</label>
                <input type"number" class="form-control" id="stockbarang" placeholder="Masukan stock Barang" name="stockbarang">
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

@endsection
