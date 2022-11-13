@extends('layouts.backend')
@section('halaman')
 Halaman Administrator
@endsection
@section('user-login')
    <a style="color:#3c8dbc">{{ Auth::user()->nama_user }}</a>
@endsection
@push('styles')
    @include('css/tambahan')
    @include('css/datatables')
    @include('css/icheck')
@endpush
@section('sidebar-menu')
    @include('admin/sidebar')
@endsection
@section('content')
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-plus"></i>&nbsp;Tambah Data Pelanggan</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <form action="{{ route('admin.pelanggan.post') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="form-group col-md-6 ">
                            <label>Nama Pelanggan</label>
                            <input type="text" name="nama_user" class="form-control">
                            <div>
                                @if ($errors->has('nama_user'))
                                    <small class="form-text text-danger">{{ $errors->first('nama_user') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                            <div>
                                @if ($errors->has('email'))
                                    <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="">
                                <option disabled selected>-- pilih jenis kelamin --</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <div>
                                @if ($errors->has('jenis_kelamin'))
                                    <small class="form-text text-danger">{{ $errors->first('jenis_kelamin') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control">
                            <div>
                                @if ($errors->has('pekerjaan'))
                                    <small class="form-text text-danger">{{ $errors->first('pekerjaan') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Tanggal Lahir</label>
                             <div class="input-group date">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="tanggal_lahir" class="form-control pull-right date" autocomplete="off">
                            </div>
                            <div>
                                @if ($errors->has('tanggal_lahir'))
                                    <small class="form-text text-danger">{{ $errors->first('tanggal_lahir') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Pilih Provinsi</label>
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
                            <label>Pilih Kota</label>
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
                            <label>Pilih Kecamatan</label>
                            <select name="kecamatan_id" id="kecamatan_id" class="form-control">
                                <option disabled selected>-- pilih kecamatan --</option>
                            </select>
                            <div>
                                @if ($errors->has('kecamatan_id'))
                                    <small class="form-text text-danger">{{ $errors->first('kecamatan_id') }}</small>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6 ">
                            <label>Pilih Kelurahan</label>
                            <select name="kelurahan_id" id="kelurahan_id" class="form-control">
                                <option disabled selected>-- pilih kelurahan --</option>
                            </select>
                            <div>
                                @if ($errors->has('kelurahan_id'))
                                    <small class="form-text text-danger">{{ $errors->first('kelurahan_id') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Nomor Handphone</label>
                            <input type="text" name="no_hp" class="form-control">
                            <div>
                                @if ($errors->has('no_hp'))
                                    <small class="form-text text-danger">{{ $errors->first('no_hp') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Password Login</label>
                            <input type="password" name="password" class="form-control">
                            <div>
                                @if ($errors->has('password'))
                                    <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-12 ">
                            <label>Alamat Lengkap</label>
                            <textarea name="alamat" id="" cols="30" rows="3" class="form-control"></textarea>
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
    @include('js/datepicker')
    @include('js/get_region')
@endpush
