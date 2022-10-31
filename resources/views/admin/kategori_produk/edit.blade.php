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
                    <form action="{{ route('admin.kategori_produk.update',[$kategoriProduk->id]) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="form-group col-md-6">
                            <label>Masukan Kategori Produk</label>
                            <input type="text" name="nama_kategori" value="{{ $kategoriProduk->nama_kategori }}" class="form-control">
                            <div>
                                @if ($errors->has('nama_kategori'))
                                    <small class="form-text text-danger">{{ $errors->first('nama_kategori') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Thumnnail</label>
                            <input type="file" name="thumbnail" class="tags form-control @error('thumbnail') is-invalid @enderror" />
                            <div>
                                @if ($errors->has('thumbnail'))
                                    <small class="form-text text-muted text-danger">{{ $errors->first('thumbnail') }}</small>
                                @else
                                <small class="form-text text-muted text-success"><i class="fa fa-image"></i>&nbsp;File Lama : {{ $kategoriProduk->thumbnail }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <a href="{{ route('admin.kategori_produk') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
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
