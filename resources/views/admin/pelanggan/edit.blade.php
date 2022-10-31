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
                <h3 class="box-title"><i class="fa fa-edit"></i>&nbsp;Edit Data Pelanggan</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <form action="{{ route('admin.pelanggan.update',[$pelanggan->id]) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="form-group col-md-6 ">
                            <label>Nama Pelanggan</label>
                            <input type="text" name="nama_pelanggan" value="{{ $pelanggan->nama_pelanggan }}" class="form-control">
                            <div>
                                @if ($errors->has('nama_pelanggan'))
                                    <small class="form-text text-danger">{{ $errors->first('nama_pelanggan') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="">
                                <option disabled selected>-- pilih jenis kelamin --</option>
                                <option value="L" @if ($pelanggan->jenis_kelamin == "L")
                                    selected
                                @endif>Laki-Laki</option>
                                <option value="P" @if ($pelanggan->jenis_kelamin == "P")
                                    selected
                                @endif>Perempuan</option>
                            </select>
                            <div>
                                @if ($errors->has('jenis_kelamin'))
                                    <small class="form-text text-danger">{{ $errors->first('jenis_kelamin') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" value="{{ $pelanggan->pekerjaan }}" class="form-control">
                            <div>
                                @if ($errors->has('pekerjaan'))
                                    <small class="form-text text-danger">{{ $errors->first('pekerjaan') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" value="{{ $pelanggan->tanggal_lahir }}" class="form-control">
                            <div>
                                @if ($errors->has('tanggal_lahir'))
                                    <small class="form-text text-danger">{{ $errors->first('tanggal_lahir') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Provinsi</label>
                            <input type="text" name="provinsi" value="{{ $pelanggan->provinsi }}" class="form-control">
                            <div>
                                @if ($errors->has('provinsi'))
                                    <small class="form-text text-danger">{{ $errors->first('provinsi') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Kabupaten/Kota</label>
                            <input type="text" name="kab_kota" value="{{ $pelanggan->kab_kota }}" class="form-control">
                            <div>
                                @if ($errors->has('kab_kota'))
                                    <small class="form-text text-danger">{{ $errors->first('kab_kota') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Kecamatan</label>
                            <input type="text" name="kecamatan" value="{{ $pelanggan->kecamatan }}" class="form-control">
                            <div>
                                @if ($errors->has('kecamatan'))
                                    <small class="form-text text-danger">{{ $errors->first('kecamatan') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Kelurahan</label>
                            <input type="text" name="kelurahan" value="{{ $pelanggan->kelurahan }}" class="form-control">
                            <div>
                                @if ($errors->has('kelurahan'))
                                    <small class="form-text text-danger">{{ $errors->first('kelurahan') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Nomor Handphone</label>
                            <input type="text" name="no_hp" value="{{ $pelanggan->no_hp }}" class="form-control">
                            <div>
                                @if ($errors->has('no_hp'))
                                    <small class="form-text text-danger">{{ $errors->first('no_hp') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-12 ">
                            <label>Alamat Lengkap</label>
                            <textarea name="alamat" id="" cols="30" rows="3" class="form-control">{{ $pelanggan->alamat }}</textarea>
                            <div>
                                @if ($errors->has('alamat'))
                                    <small class="form-text text-danger">{{ $errors->first('alamat') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <a href="{{ route('admin.pelanggan') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
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
