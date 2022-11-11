<li class="{{ set_active('admin.dashboard') }}"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i>&nbsp;Dasbboard </a></li>
<li class="dropdown {{ set_active(['admin.kategori_produk','admin.kategori_produk.add','admin.kategori_produk.edit','admin.produk','admin.produk.edit','admin.produk.add']) }}">
    <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i>&nbsp;Manajemen Produk <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <li><a href="{{ route('admin.kategori_produk') }}">Kategori Produk</a></li>
        <li><a href="{{ route('admin.produk') }}">Produk</a></li>
    </ul>
</li>
<li class="{{ set_active('admin.metode') }}"><a href="{{ route('admin.metode') }}"><i class="fa fa-credit-card"></i>&nbsp;Metode Pembayaran </a></li>
<li class="dropdown {{ set_active(['admin.provinsi','admin.provinsi.add','admin.provinsi.edit','admin.kota','admin.kota.edit','admin.kota.add','admin.kecamatan']) }}">
    <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i>&nbsp;Data Wilayah <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
        <li><a href="{{ route('admin.provinsi') }}">Provinsi</a></li>
        <li><a href="{{ route('admin.kota') }}">Kabupaten Kota</a></li>
        <li><a href="{{ route('admin.kecamatan') }}">Kecamatan</a></li>
    </ul>
</li>
<li class="{{ set_active('admin.pelanggan') }}"><a href="{{ route('admin.pelanggan') }}"><i class="fa fa-users"></i>&nbsp;Data Pelanggan </a></li>
<li class="{{ set_active('admin.transaksi') }}"><a href="{{ route('admin.transaksi') }}"><i class="fa fa-exchange"></i>&nbsp;Transaksi </a></li>
