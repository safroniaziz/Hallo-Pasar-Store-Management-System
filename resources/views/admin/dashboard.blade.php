@extends('layouts.backend')
@section('halaman')
 Halaman Administrator
@endsection
@section('user-login')
    <a style="color:#3c8dbc">{{ Auth::user()->nama_user }}</a>
@endsection
@push('styles')
    @include('css/tambahan')
@endpush
@section('sidebar-menu')
    @include('admin/sidebar')
@endsection
@section('content')
<section class="content">
    <div class="callout callout-info">
        <h4>Selamat Datang, <b>{{ Auth::user()->nama_user }}</b></h4>
        <p>
            <i><b>Catatan</b>: Untuk keamanan, silahkan keluar setelah selesai menggunakan aplikasi</i>
        </p>
    </div>
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-home"></i>&nbsp;Dashboard HalloPasar Bengkulu</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-list-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Kategori Produk</span>
                      <span class="info-box-number">{{ $kategori->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Produk</span>
                      <span class="info-box-number">{{ $produk->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-exchange"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Transaksi</span>
                      <span class="info-box-number">{{ $transaksi->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Pelanggan</span>
                      <span class="info-box-number">{{ $pelanggan->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>
                                @if (empty($paling_laris))
                                    0
                                @else
                                    {{ $paling_laris->jumlah }}
                                @endif
                            </h3>
                            <p>Produk Paling Laris</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>
                                @if ($penambahan_point->total_point == null)
                                    0
                                @else
                                    {{ $penambahan_point->total_point }}
                                @endif
                            </h3>
                            <p>Jumlah Point Ditambahkan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>
                                @if ($pengurangan_point->total_point == null)
                                    0
                                @else
                                    {{ $pengurangan_point->total_point }}
                                @endif
                            </h3>

                            <p>Jumlah Point Dipakai</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-pie-chart"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>
                                @if ($pengurangan_point->total_point == null && $penambahan_point == null)
                                    0
                                @else
                                    {{ $penambahan_point->total_point - $pengurangan_point->total_point }}
                                @endif
                            </h3>

                            <p>Point Tersedia</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-line-chart"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
@endsection
