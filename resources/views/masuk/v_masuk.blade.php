@extends('layout.v_template')

@section('title','Barang Masuk')

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
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" > Tambah Data</button>

    </div>
    <div class="box-body">
        <!-- Menampilkan data -->

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Tanggal Masuk</th>
                    <th>Jumlah Barang</th>
                    <th class="text-center">Aksi</th>
                </tr>

                @foreach ($data as $dt )
                <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->kodebarang }}</td>
                        <td>{{ $dt->tglmasuk }}</td>
                        <td>{{ $dt->qtymasuk }}</td>
                        <td>
                            <a href="/masuk/delete/{{$dt->idmasuk}}" class="btn btn-sm btn-danger"> Delete</a>
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
            <h4 class="modal-title" id="exampleModalLabel"> Form Input Barang</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/masuk" method="POST">
                @csrf
                <div class="form-group">
                <label for="kodebarang">Kode Barang</label>
                <input type"text" class="form-control" id="kodebarang" name="kodebarang">
                </div>

                <div class="form-group">
                    <label for="tglmasuk">Tanggal Masuk Barang </label>
                    <input type="date" class="form-control" name="tglmasuk" id="tglmasuk">
                </div>

                <div class="form-group">
                    <label for="qtymasuk">Jumlah Barang Masuk</label>
                    <input type"number" class="form-control" id="qtymasuk" placeholder="Masukan Jumlah Barang" name="qtymasuk">
                </div>


                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>

        </div>

        </div>
    </div>
    </div>

@endsection
