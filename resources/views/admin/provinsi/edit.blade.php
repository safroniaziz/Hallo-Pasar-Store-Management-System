@extends('layouts.layout')
@section('mahasiswa_login')
    <a style="color:#3c8dbc">{{ Session::get('nama_lengkap') }}</a>
@endsection
@push('styles')
    @include('css/tambahan')
    @include('css/datatables')
@endpush
@section('topbar')
    @include('admin/topbar')
@endsection
@section('content')
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-edit"></i>&nbsp;Edit Kategori Produk</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <form action="{{ route('admin.metode.update',[$metodePembayaran->id]) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="form-group col-md-6">
                            <label>Nama Metode Pembayaran</label>
                            <input type="text" name="nama_metode" value="{{ $metodePembayaran->nama_metode }}" class="form-control">
                            <div>
                                @if ($errors->has('nama_metode'))
                                    <small class="form-text text-danger">{{ $errors->first('nama_metode') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Nomor Rekening</label>
                            <input type="text" name="nomor_rekening" value="{{ $metodePembayaran->nomor_rekening }}" class="form-control">
                            <div>
                                @if ($errors->has('nomor_rekening'))
                                    <small class="form-text text-danger">{{ $errors->first('nomor_rekening') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label>Keterangan</label>
                            <textarea name="keterangan" class="form-control" id="" cols="30" rows="3">{{ $metodePembayaran->keterangan }}</textarea>
                            <div>
                                @if ($errors->has('keterangan'))
                                    <small class="form-text text-danger">{{ $errors->first('keterangan') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <a href="{{ route('admin.metode') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
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
@endpush
