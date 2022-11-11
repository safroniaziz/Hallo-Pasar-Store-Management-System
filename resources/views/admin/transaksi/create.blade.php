@extends('layouts.layout')
@section('mahasiswa_login')
    <a style="color:#3c8dbc">{{ Session::get('nama_lengkap') }}</a>
@endsection
@push('styles')
    @include('css/tambahan')
    @include('css/datatables')
    @include('css/icheck')
@endpush
@section('topbar')
    @include('admin/topbar')
@endsection
@section('content')
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-plus"></i>&nbsp;Tambah Data transaksi</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <form action="{{ route('admin.transaksi.post') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="form-group col-md-6 ">
                            <label>Pelanggan</label>
                            <select name="pelanggan_id" class="form-control" id="">
                                <option disabled selected>-- pilih pelanggan --</option>
                                @foreach ($pelanggans as $pelanggan)
                                    <option value="{{ $pelanggan->id }}" @if ($pelanggan->id == $transaksi->pelanggan_id)
                                        selected
                                    @endif>{{ $pelanggan->nama_pelanggan }}</option>
                                @endforeach
                            </select>
                            <div>
                                @if ($errors->has('pelanggan_id'))
                                    <small class="form-text text-danger">{{ $errors->first('pelanggan_id') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Metode Pembayaran</label>
                            <select name="metode_pembayaran_id" class="form-control" id="">
                                <option disabled selected>-- pilih metode --</option>
                                @foreach ($metodes as $metode)
                                    <option value="{{ $metode->id }}" @if ($metode->id == $transaksi->metode_pembayaran_id)
                                        selected
                                    @endif>{{ $metode->nama_metode }}</option>
                                @endforeach
                            </select>
                            <div>
                                @if ($errors->has('metode_pembayaran_id'))
                                    <small class="form-text text-danger">{{ $errors->first('metode_pembayaran_id') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Total Belanja <small class="text-muted text-danger">(Rupiah)</small></label>
                            <input type="number" name="total_belanja" value="{{ $transaksi->total_belanja }}" class="form-control">
                            <div>
                                @if ($errors->has('total_belanja'))
                                    <small class="form-text text-danger">{{ $errors->first('total_belanja') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Pilih Provinsi Pengiriman</label>
                            <select name="provinsi_id" id="provinsi_id" class="form-control">
                                <option disabled selected>-- pilih provinsi --</option>
                                @foreach ($provinces as $provinsi)
                                    <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                                @endforeach
                            </select>
                            <div>
                                @if ($errors->has('provinsi_id'))
                                    <small class="form-text text-danger">{{ $errors->first('provinsi_id') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Pilih Kota Pengiriman</label>
                            <select name="kota_id" id="kota_id" class="form-control">
                                <option disabled selected>-- pilih kota --</option>
                            </select>
                            <div>
                                @if ($errors->has('kota_id'))
                                    <small class="form-text text-danger">{{ $errors->first('kota_id') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Pilih Kecamatan Pengiriman</label>
                            <select name="kecamatan_id" id="kecamatan_id" class="form-control">
                                <option disabled selected>-- pilih kota --</option>
                            </select>
                            <div>
                                @if ($errors->has('kecamatan_id'))
                                    <small class="form-text text-danger">{{ $errors->first('kecamatan_id') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Pilih Kelurahan Pengiriman</label>
                            <select name="kelurahan_id" id="kelurahan_id" class="form-control">
                                <option disabled selected>-- pilih kota --</option>
                            </select>
                            <div>
                                @if ($errors->has('kelurahan_id'))
                                    <small class="form-text text-danger">{{ $errors->first('kelurahan_id') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Ongkos Kirim <small class="text-muted text-danger">(Rupiah)</small></label>
                            <input type="number" name="ongkir" value="{{ $transaksi->ongkir }}" id="ongkir" class="form-control" readonly>
                            <div>
                                @if ($errors->has('ongkir'))
                                    <small class="form-text text-danger">{{ $errors->first('ongkir') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Biaya Tambahan <small class="text-muted text-danger">(Rupiah)</small></label>
                            <input type="number" name="tambahan" value="{{ $transaksi->tambahan }}" class="form-control">
                            <div>
                                @if ($errors->has('tambahan'))
                                    <small class="form-text text-danger">{{ $errors->first('tambahan') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Nama Driver</label>
                            <select name="driver_id" class="form-control" id="">
                                <option disabled selected>-- pilih driver --</option>
                                @foreach ($drivers as $driver)
                                    <option value="{{ $driver->id }}" @if ($driver->id == $transaksi->driver_id)
                                        selected
                                    @endif>{{ $driver->nama_user }}</option>
                                @endforeach
                            </select>
                            <div>
                                @if ($errors->has('driver_id'))
                                    <small class="form-text text-danger">{{ $errors->first('driver_id') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-12 ">
                            <label>Alamat Lengkap</label>
                            <textarea name="alamat" id="" cols="30" rows="3" class="form-control">{{ $transaksi->alamat }}</textarea>
                            <div>
                                @if ($errors->has('alamat'))
                                    <small class="form-text text-danger">{{ $errors->first('alamat') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <a href="{{ route('admin.transaksi') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
                            <button type="reset" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-refresh"></i>&nbsp; Ulangi</button>
                            <button type="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-check-circle"></i>&nbsp; Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        <!-- /.box-body -->
        </div>
    </section>
@endsection
@push('scripts')
    @include('js/datatables')
    @include('js/icheck')
    @include('js/get_region')
@endpush
