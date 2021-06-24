
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Barang Politeknik Harapan Bersama</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('template/') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template/') }}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('template/') }}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/') }}/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row page-header">
      <div class="col-xs-4 text-left">

        <img class="text-left"src="{{ asset('img/logo2.png') }}" alt="" width="65px" height="75px">
      </div>

      <div class="col-xs-4 text-center">
        <h3>LAPORAN BARANG <br> POLITEKNIK HARAPAN BERSAMA TEGAL </h3>

      </div>

      <div class="col-xs-4">

        <small class="pull-right">
            @php

            date_default_timezone_set('Asia/Jakarta');
            $tgl = date("l , h:i:s a");
            echo $tgl;

            @endphp

        </small>
      </div>

      <!-- /.col -->
    </div>
    <!-- info row -->

    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped table-bordered">
          <thead>
          <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Stock</th>
            <th>Total Barang Masuk</th>
            <th>Total Barang Keluar</th>
          </tr>
          </thead>

          @foreach ( $data as $dt )

          <tbody>
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $dt->kodebarang }}</td>
            <td>{{ $dt->namabarang }}</td>
            <td>{{ $dt->stockbarang }}
            </td>
            <td>
                {{ $dt->jumlahmasuk }}

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

          </tbody>
          @endforeach


        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->

      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
