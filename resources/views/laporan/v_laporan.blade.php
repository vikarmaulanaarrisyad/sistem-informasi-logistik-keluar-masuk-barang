@extends('layout.v_template')

@section('title','Rekap Barang')

@section('content')






<div class="box">
    <div class="box-header with-border">
        <a href="/laporan/cetak"  target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>

    </div>

    <div class="box-body">
        <!-- Menampilkan data -->

        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Stock</th>
                    <th>Total Barang Masuk</th>
                    <th>Total Barang Keluar</th>
                </tr>

                @foreach ($data as $dt )
                <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->kodebarang }}</td>
                        <td>{{ $dt->namabarang }}</td>
                        <td>{{ $dt->stockbarang }}</td>
                        <td>{{ $dt->jumlahmasuk }}
                            @if($dt->jumlahmasuk == NULL)
                            0

                            @endif
                        </td>
                        <td>
                            {{ $dt->jumlahkeluar }}
                            @if($dt->jumlahkeluar == NULL)
                            0

                            @endif
                        </td>
                    </tr>
                @endforeach
            </thead>
        </table>
    </div>
</div>



@endsection
