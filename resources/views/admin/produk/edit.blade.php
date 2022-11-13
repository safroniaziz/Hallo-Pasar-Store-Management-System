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
                <h3 class="box-title"><i class="fa fa-edit"></i>&nbsp;Edit Kategori Produk</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <form action="{{ route('admin.produk.update',[$produk->id]) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="form-group col-md-6 ">
                            <label>Nama Produk</label>
                            <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" class="form-control">
                            <div>
                                @if ($errors->has('nama_produk'))
                                    <small class="form-text text-danger">{{ $errors->first('nama_produk') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Kategori Produk</label>
                            <select name="kategori_id" class="form-control" id="">
                                <option disabled selected>-- pilih kategori --</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" @if ($produk->kategori_id == $kategori->id)
                                        selected
                                    @endif>{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                            <div>
                                @if ($errors->has('kategori_id'))
                                    <small class="form-text text-danger">{{ $errors->first('kategori_id') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Harga <small class="text-muted text-danger">(Rupiah)</small></label>
                            <input type="text" name="harga" value="{{ $produk->harga }}" class="form-control">
                            <div>
                                @if ($errors->has('harga'))
                                    <small class="form-text text-danger">{{ $errors->first('harga') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Diskon <small class="text-muted text-danger">(Rupiah)</small></label>
                            <input type="text" name="diskon" value="{{ $produk->diskon }}" class="form-control">
                            <div>
                                @if ($errors->has('diskon'))
                                    <small class="form-text text-danger">{{ $errors->first('diskon') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Biaya Tambahan <small class="text-muted text-danger">(Rupiah)</small></label>
                            <input type="text" name="tambahan" value="{{ $produk->tambahan }}" class="form-control">
                            <div>
                                @if ($errors->has('tambahan'))
                                    <small class="form-text text-danger">{{ $errors->first('tambahan') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Satuan Produk</label>
                            <input type="text" name="satuan" value="{{ $produk->satuan }}" class="form-control">
                            <div>
                                @if ($errors->has('satuan'))
                                    <small class="form-text text-danger">{{ $errors->first('satuan') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Point Produk <small class="text-muted text-danger">(Numeric)</small></label>
                            <input type="text" name="point" value="{{ $produk->point }}" class="form-control">
                            <div>
                                @if ($errors->has('point'))
                                    <small class="form-text text-danger">{{ $errors->first('point') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Thumbnail Produk <small class="text-muted text-danger">(Numeric)</small></label>
                            <input type="file" name="foto_produk" class="form-control">
                            <div>
                                @if ($errors->has('foto_produk'))
                                    <small class="form-text text-danger">{{ $errors->first('foto_produk') }}</small>
                                @else
                                    <small class="form-text text-success"><i class="fa fa-image"></i>&nbsp;Foto Lama : {{ $produk->foto_produk }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-12 ">
                            <label>Deskripsi Produk</label>
                            <textarea name="deskripsi" id="" cols="30" rows="3" class="form-control">{{ $produk->deskripsi }}</textarea>
                            <div>
                                @if ($errors->has('deskripsi'))
                                    <small class="form-text text-danger">{{ $errors->first('deskripsi') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-3 ">
                            <label>Tampilkan Produk</label>
                            <br>
                            <input type="checkbox" name="is_display" class="flat-red" @if ($produk->is_display == true)
                                checked
                            @endif> Ya
                        </div>

                        <div class="form-group col-md-3 ">
                            <label>Produk Paketan?</label>
                            <br>
                            <input type="checkbox" name="is_paketan" class="flat-red" @if ($produk->is_paketan == true)
                                checked
                            @endif> Ya
                        </div>

                        <div class="col-md-12">
                            <a href="{{ route('admin.produk') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
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
