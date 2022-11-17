<li class="header" style="font-weight:bold;">MENU UTAMA</li>
<li class="{{ set_active('admin.dashboard') }}">
    <a href="{{ route('admin.dashboard') }}">
        <i class="fa fa-home"></i> <span>Dashboard</span>
    </a>
</li>

<li class="treeview {{ set_active(['admin.kategori_produk','admin.kategori_produk.create','admin.kategori_produk.edit','admin.produk','admin.produk.edit','admin.produk.create','admin.tag','admin.tag.edit','admin.tag.create','admin.gizi_produk']) }}">
    <a href="#">
        <i class="fa fa-shopping-cart"></i> <span>Manajemen Produk</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu " style="padding-left:25px;">
        <li class="{{ set_active(['admin.tag','admin.tag.create','admin.tag.edit']) }}"><a href="{{ route('admin.tag') }}"><i class="fa fa-laptop"></i>Kandungan Gizi</a></li>
        <li class="{{ set_active(['admin.kategori_produk','admin.kategori_produk.create','admin.kategori_produk.edit']) }}"><a href="{{ route('admin.kategori_produk') }}"><i class="fa fa-laptop"></i>Kategori Produk</a></li>
        <li class="{{ set_active(['admin.produk','admin.produk.create','admin.produk.edit','admin.gizi_produk']) }}"><a href="{{ route('admin.produk') }}"><i class="fa fa-television"></i>Produk</a></li>
    </ul>
</li>

<li class="{{ set_active('admin.metode') }}">
    <a href="{{ route('admin.metode') }}">
        <i class="fa fa-credit-card"></i> <span>Metode Pembayaran</span>
    </a>
</li>

<li class="{{ set_active('admin.transaksi') }}">
    <a href="{{ route('admin.transaksi') }}">
        <i class="fa fa-exchange"></i> <span>Data Transaksi</span>
    </a>
</li>

<li class="header" style="font-weight:bold;">PENGATURAN</li>
<li class="treeview {{ set_active(['admin.pelanggan','admin.pelanggan.create','admin.pelanggan.edit','admin.operator','admin.operator.create','admin.operator.edit','admin.driver','admin.driver.create','admin.driver.edit','admin.administrator','admin.administrator.create','admin.administrator.edit']) }}">
    <a href="#">
        <i class="fa fa-users"></i> <span>Data Pengguna</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu " style="padding-left:25px;">
        <li class="{{ set_active(['admin.pelanggan','admin.pelanggan.create','admin.pelanggan.edit']) }}"><a href="{{ route('admin.pelanggan') }}"><i class="fa fa-user"></i>Pelanggan</a></li>
        <li class="{{ set_active(['admin.operator','admin.operator.create','admin.operator.edit']) }}"><a href="{{ route('admin.operator') }}"><i class="fa fa-user-circle"></i>Operator</a></li>
        <li class="{{ set_active(['admin.driver','admin.driver.create','admin.driver.edit']) }}"><a href="{{ route('admin.driver') }}"><i class="fa fa-user-plus"></i>Driver</a></li>
        <li class="{{ set_active(['admin.administrator','admin.administrator.create','admin.administrator.edit']) }}"><a href="{{ route('admin.administrator') }}"><i class="fa fa-users"></i>Administrator</a></li>
    </ul>
</li>

<li class="treeview {{ set_active(['admin.provinsi','admin.provinsi.create','admin.provinsi.edit','admin.kota','admin.kota.edit','admin.kota.create','admin.kecamatan','admin.kecamatan.edit','admin.kecamatan.create']) }}">
    <a href="#">
        <i class="fa fa-globe"></i> <span>Data Wilayah</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu " style="padding-left:25px;">
        <li class="{{ set_active('admin.provinsi') }}"><a href="{{ route('admin.provinsi') }}"><i class="fa fa-laptop"></i>Provinsi</a></li>
        <li class="{{ set_active('admin.kota') }}"><a href="{{ route('admin.kota') }}"><i class="fa fa-television"></i>Kabupaten/Kota</a></li>
        <li class="{{ set_active('admin.kecamatan') }}"><a href="{{ route('admin.kecamatan') }}"><i class="fa fa-television"></i>Kecamatan</a></li>
    </ul>
</li>

<li class="header" style="font-weight:bold;">INFORMASI</li>
<li class="treeview {{ set_active(['admin.provinsi','admin.provinsi.create','admin.provinsi.edit','admin.kota','admin.kota.edit','admin.kota.create','admin.kecamatan','admin.kecamatan.edit','admin.kecamatan.create']) }}">
    <a href="#">
        <i class="fa fa-history"></i> <span>Data Riwayat</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu " style="padding-left:25px;">
        <li class="{{ set_active('admin.provinsi') }}"><a href="{{ route('admin.provinsi') }}"><i class="fa fa-laptop"></i>Provinsi</a></li>
        <li class="{{ set_active('admin.kota') }}"><a href="{{ route('admin.kota') }}"><i class="fa fa-television"></i>Kabupaten/Kota</a></li>
        <li class="{{ set_active('admin.kecamatan') }}"><a href="{{ route('admin.kecamatan') }}"><i class="fa fa-television"></i>Kecamatan</a></li>
    </ul>
</li>

<li style="padding-left:2px;">
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa fa-power-off text-danger"></i> <span>Logout</span>
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</li>