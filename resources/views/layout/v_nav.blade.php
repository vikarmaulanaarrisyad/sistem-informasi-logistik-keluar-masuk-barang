<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>

    <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="/"> <i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

    @if(auth()->user()->level_user == "admin" )

        <li class="{{ request()->is('stock') ? 'active' : '' }}"><a href="/stock"> <i class="fa fa-dashboard"></i> <span>Stock Barang</span></a></li>
        <li class="{{ request()->is('masuk') ? 'active' : '' }}"><a href="/masuk"> <i class="fa fa-dashboard"></i> <span>Barang Masuk</span></a></li>
        <li class="{{ request()->is('keluar') ? 'active' : '' }}"><a href="/keluar"> <i class="fa fa-dashboard"></i> <span>Barang Keluar</span></a></li>
        <li><a href="/laporan"> <i class="fa fa-dashboard"></i> <span>Laporan</span></a></li>
    @else
    <li><a href="/laporan"> <i class="fa fa-dashboard"></i> <span>Laporan</span></a></li>
    @endif

  </ul>
