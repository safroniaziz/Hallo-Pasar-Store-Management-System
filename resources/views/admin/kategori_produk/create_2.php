@extends('layouts.layout')
@section('mahasiswa_login')
    <a style="color:#3c8dbc">{{ Session::get('nama_lengkap') }}</a>
@endsection
@push('styles')
    @include('css/cropper')
@endpush
@section('topbar')
    @include('admin/topbar')
@endsection
@section('content')
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-plus"></i>&nbsp;Tambah Kategori Produk</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <form id="form">
                        {{-- {{ csrf_field() }} {{ method_field('POST') }} --}}
                            <div class="col-md-8">
                                <div class="img-container">
                                    <img id="image" src="" alt="Picture">
                                </div>
                                <div class="col-md-12">
                                    <div class="docs-data">
                                        <div class="input-group input-group-sm">
                                          <span class="input-group-prepend">
                                            <label class="input-group-text" for="dataX">X</label>
                                          </span>
                                          <input type="text" class="form-control" id="dataX" placeholder="x">
                                          <span class="input-group-append">
                                            <span class="input-group-text">px</span>
                                          </span>
                                        </div>
                                        <div class="input-group input-group-sm">
                                          <span class="input-group-prepend">
                                            <label class="input-group-text" for="dataY">Y</label>
                                          </span>
                                          <input type="text" class="form-control" id="dataY" placeholder="y">
                                          <span class="input-group-append">
                                            <span class="input-group-text">px</span>
                                          </span>
                                        </div>
                                        <div class="input-group input-group-sm">
                                          <span class="input-group-prepend">
                                            <label class="input-group-text" for="dataWidth">Width</label>
                                          </span>
                                          <input type="text" class="form-control" id="dataWidth" placeholder="width">
                                          <span class="input-group-append">
                                            <span class="input-group-text">px</span>
                                          </span>
                                        </div>
                                        <div class="input-group input-group-sm">
                                          <span class="input-group-prepend">
                                            <label class="input-group-text" for="dataHeight">Height</label>
                                          </span>
                                          <input type="text" class="form-control" id="dataHeight" placeholder="height">
                                          <span class="input-group-append">
                                            <span class="input-group-text">px</span>
                                          </span>
                                        </div>
                                        <div class="input-group input-group-sm">
                                          <span class="input-group-prepend">
                                            <label class="input-group-text" for="dataRotate">Rotate</label>
                                          </span>
                                          <input type="text" class="form-control" id="dataRotate" placeholder="rotate">
                                          <span class="input-group-append">
                                            <span class="input-group-text">deg</span>
                                          </span>
                                        </div>
                                        <div class="input-group input-group-sm">
                                          <span class="input-group-prepend">
                                            <label class="input-group-text" for="dataScaleX">ScaleX</label>
                                          </span>
                                          <input type="text" class="form-control" id="dataScaleX" placeholder="scaleX">
                                        </div>
                                        <div class="input-group input-group-sm">
                                          <span class="input-group-prepend">
                                            <label class="input-group-text" for="dataScaleY">ScaleY</label>
                                          </span>
                                          <input type="text" class="form-control" id="dataScaleY" placeholder="scaleY">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Pilih Gambar Thumbnail</label> <br>
                                        <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
                                            <input type="file" class="sr-only form-control" id="inputImage" name="file" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="Pilih Gambar Thumbnail">
                                                <span class="fa fa-upload"></span>&nbsp; Pilih Gambar
                                            </span>
                                        </label>
                                        <div>
                                            <small class="form-text text-danger" id="alert-gambar" style="display:none">Pilih gambar terlebih dahulu</small>
                                        </div>
                                        <div class="row" id="actions" style="margin-top:10px !important;">
                                            <div class="col-md-12 docs-buttons">
                                                <div class="docs-toggles">
                                                    <div class="btn-group d-flex flex-nowrap" data-toggle="buttons">
                                                        <label class="btn btn-primary active">
                                                            <input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.7777777777777777">
                                                            <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 16 / 9">
                                                            16:9
                                                            </span>
                                                        </label>
                                                        <label class="btn btn-primary">
                                                            <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1.3333333333333333">
                                                            <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 4 / 3">
                                                            4:3
                                                            </span>
                                                        </label>
                                                        <label class="btn btn-primary">
                                                            <input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio" value="1">
                                                            <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 1 / 1">
                                                            1:1
                                                            </span>
                                                        </label>
                                                        <label class="btn btn-primary">
                                                            <input type="radio" class="sr-only" id="aspectRatio4" name="aspectRatio" value="0.6666666666666666">
                                                            <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 2 / 3">
                                                            2:3
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="docs-preview clearfix col-md-12">
                                        <div class="img-preview preview-lg"></div>
                                        <div class="img-preview preview-md"></div>
                                        <div class="img-preview preview-sm"></div>
                                        <div class="img-preview preview-xs"></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Nama Kategori Produk</label>
                                        <input type="text" name="nama_kategori" id="nama_kategori" class="form-control">
                                        <div>
                                            <small class="form-text text-danger" id="nama_kategori_error"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <!-- Show the cropped image in modal -->
                                        <a href="javascript:void(0);" download="cropped.jpg" class="btn btn-block btn-info" id="download"><i class="fa fa-check-circle"></i>&nbsp;Simpan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <!-- /.box-body -->
        </div>
    </section>
@endsection
@push('scripts')
    @include('js/cropper')
@endpush

