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
                                    <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama_pelanggan }}</option>
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
                                <option disabled selected>-- pilih pelanggan --</option>
                                @foreach ($pelanggans as $pelanggan)
                                    <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama_pelanggan }}</option>
                                @endforeach
                            </select>
                            <div>
                                @if ($errors->has('metode_pembayaran_id'))
                                    <small class="form-text text-danger">{{ $errors->first('metode_pembayaran_id') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Ongkos Kirim</small></label>
                            <input type="text" name="ongkir" class="form-control">
                            <div>
                                @if ($errors->has('ongkir'))
                                    <small class="form-text text-danger">{{ $errors->first('diskon') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Nama Driver</label>
                            <select name="driver_id" class="form-control" id="">
                                <option disabled selected>-- pilih driver --</option>
                                @foreach ($pelanggans as $pelanggan)
                                    <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama_pelanggan }}</option>
                                @endforeach
                            </select>
                            <div>
                                @if ($errors->has('driver_id'))
                                    <small class="form-text text-danger">{{ $errors->first('driver_id') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label></small></label>
                            <input type="text" name="tambahan" class="form-control">
                            <div>
                                @if ($errors->has('tambahan'))
                                    <small class="form-text text-danger">{{ $errors->first('tambahan') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Satuan transaksi</label>
                            <input type="text" name="satuan" class="form-control">
                            <div>
                                @if ($errors->has('satuan'))
                                    <small class="form-text text-danger">{{ $errors->first('satuan') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Point transaksi <small class="text-muted text-danger">(Numeric)</small></label>
                            <input type="text" name="point" class="form-control">
                            <div>
                                @if ($errors->has('point'))
                                    <small class="form-text text-danger">{{ $errors->first('point') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Thumbnail transaksi <small class="text-muted text-danger">(Numeric)</small></label>
                            <input type="file" name="foto_transaksi" class="form-control">
                            <div>
                                @if ($errors->has('foto_transaksi'))
                                    <small class="form-text text-danger">{{ $errors->first('foto_transaksi') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-12 ">
                            <label>Deskripsi transaksi</label>
                            <textarea name="deskripsi" id="" cols="30" rows="3" class="form-control"></textarea>
                            <div>
                                @if ($errors->has('deskripsi'))
                                    <small class="form-text text-danger">{{ $errors->first('deskripsi') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-3 ">
                            <label>Tampilkan transaksi</label>
                            <br>
                            <input type="checkbox" name="is_display" class="flat-red"> Ya
                        </div>

                        <div class="form-group col-md-3 ">
                            <label>transaksi Paketan?</label>
                            <br>
                            <input type="checkbox" name="is_paketan" class="flat-red"> Ya
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
@endpush
