@extends('layouts.layout')
@section('mahasiswa_login')
    <a style="color:#3c8dbc">{{ Session::get('nama_lengkap') }}</a>
@endsection
@push('styles')
    @include('css/tambahan')
    @include('css/datatables')
    @include('css/icheck')
    @include('css/cropper')
@endpush
@section('topbar')
    @include('admin/topbar')
@endsection
@section('content')
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-plus"></i>&nbsp;Tambah Produk</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <form id="form">
                        <div class="col-md-5">
                            <div class="form-group ">
                                <label>Nama Produk</label>
                                <input type="text" name="nama_produk" id="nama_produk" class="form-control">
                                <small id="nama_produk_error" style="display: none" class="text-danger text-muted"></small>
                            </div>

                            <div class="form-group ">
                                <label>Kategori Produk</label>
                                <select name="kategori_id" class="form-control" id="kategori_id">
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                <small id="kategori_id_error" style="display: none" class="text-danger text-muted"></small>
                            </div>

                            <div class="form-group ">
                                <label>Harga <small class="text-muted text-danger">(Rupiah)</small></label>
                                <input type="number" name="harga" id="harga" class="form-control">
                                <small id="harga_error" style="display: none" class="text-danger text-muted"></small>
                            </div>

                            <div class="form-group ">
                                <label>Diskon <small class="text-muted text-danger">(Rupiah)</small></label>
                                <input type="number" name="diskon" id="diskon" class="form-control">
                                <small id="diskon_error" style="display: none" class="text-danger text-muted"></small>
                            </div>

                            <div class="form-group ">
                                <label>Biaya Tambahan <small class="text-muted text-danger">(Rupiah)</small></label>
                                <input type="number" name="tambahan" id="tambahan" class="form-control">
                                <small id="tambahan_error" style="display: none" class="text-danger text-muted"></small>
                            </div>

                            <div class="form-group ">
                                <label>Satuan Produk</label>
                                <input type="text" name="satuan" id="satuan" class="form-control">
                                <small id="satuan_error" style="display: none" class="text-danger text-muted"></small>
                            </div>

                            <div class="form-group ">
                                <label>Point Produk <small class="text-muted text-danger">(Numeric)</small></label>
                                <input type="number" name="point" id="point" class="form-control">
                                <small id="point_error" style="display: none" class="text-danger text-muted"></small>
                            </div>

                            <div class="form-group">
                                <label>Deskripsi Produk</label>
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="3" class="form-control"></textarea>
                                <small id="deskripsi_error" style="display: none" class="text-danger text-muted"></small>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 ">
                                    <label>Tampilkan Produk</label>
                                    <select name="is_display" id="is_display" class="form-control">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                    <small id="is_display_error" style="display: none" class="text-danger text-muted"></small>
                                </div>

                                <div class="form-group col-md-6 ">
                                    <label>Produk Paketan?</label>
                                    <select name="is_paketan" id="is_paketan" class="form-control">
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                    <small id="is_paketan_error" style="display: none" class="text-danger text-muted"></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="btn-group">
                                            <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
                                            <input type="file" class="sr-only" id="inputImage" name="file" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="Import image with Blob URLs">
                                                <span class="fa fa-upload"></span>&nbsp; Upload Gambar
                                            </span>
                                        </label>
                                    </div>
                                    <br>
                                    <small id="alert-gambar" class="text-danger text-muted" style="display: none">Silahkan upload gambar terlebih dahulu</small>

                                </div>
                                <div class="col-md-12 docs-toggles" style="margin-top:10px !important">
                                    <!-- <h3>Toggles:</h3> -->
                                    <div class="btn-group d-flex flex-nowrap" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" class="sr-only" id="aspectRatio0" name="aspectRatio" value="1.7777777777777777">
                                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="aspectRatio: 16 / 9">
                                                16:9
                                            </span>
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.3333333333333333">
                                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="aspectRatio: 4 / 3">
                                                4:3
                                            </span>
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1">
                                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="aspectRatio: 1 / 1">
                                                1:1
                                            </span>
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio" value="0.6666666666666666">
                                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="aspectRatio: 2 / 3">
                                                2:3
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="docs-preview clearfix">
                                        <div class="img-preview preview-lg"></div>
                                        <div class="img-preview preview-md"></div>
                                        <div class="img-preview preview-sm"></div>
                                        <div class="img-preview preview-xs"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="img-container">
                                <img id="image" src="" alt="Picture">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('admin.produk') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
                                    <button type="reset" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-refresh"></i>&nbsp; Ulangi</button>
                                    <a href="javascript:void(0);" download="cropped.jpg" class="btn btn-primary btn-sm btn-flat" id="download"><i class="fa fa-check-circle"></i>&nbsp;Simpan</a>
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
    <script type="text/javascript">
        $('#download').on('click',function(e){
            e.preventDefault();
            var $image = $('#image');

            var nama_produk = $('#nama_produk').val();
            var kategori_id = $('#kategori_id').val();
            var harga = $('#harga').val();
            var diskon = $('#diskon').val();
            var tambahan = $('#tambahan').val();
            var satuan = $('#satuan').val();
            var point = $('#point').val();
            var deskripsi = $('#deskripsi').val();
            var is_display = $('#is_display').val();
            var is_paketan = $('#is_paketan').val();
            var cropper = $image.data('cropper');
            if(cropper.getCroppedCanvas() == null)
            {
                $('#alert-gambar').show();
            }
            else
            {
                $('#alert-gambar').hide();
                var url = cropper.getCroppedCanvas().toDataURL('image/jpeg').replace(/^data:image\/[^;]+/, 'data:application/octet-stream');
            }
            let form_url="{{ route('admin.produk.post') }}";

            var form = new FormData();
            form.append('foto_produk',url);
            form.append('nama_produk',nama_produk);
            form.append('kategori_id',kategori_id);
            form.append('harga',harga);
            form.append('diskon',diskon);
            form.append('tambahan',tambahan);
            form.append('satuan',satuan);
            form.append('point',point);
            form.append('deskripsi',deskripsi);
            form.append('is_display',is_display);
            form.append('is_paketan',is_paketan);
            let token="{{ csrf_token() }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "{{ route('admin.produk.post') }}",
                data: form,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.success == true) {
                        window.location.href = "{{ route('admin.produk') }}";
                        $('#nama_produk_error').hide();
                        $('#harga_error').hide();
                        $('#diskon_error').hide();
                        $('#tambahan_error').hide();
                        $('#satuan_error').hide();
                        $('#point_error').hide();
                        $('#deskripsi_error').hide();
                        toastr.success('Berhasil', 'Data produk berhasil ditambahkan', {
                            timeOut: 1000,
                            preventDuplicates: true,
                            positionClass: 'toast-top-right',
                        });
                    }else{
                        alert('gagal');
                    }
                },
                error: function(err){
                    $('#nama_produk_error').show();
                    $('#harga_error').show();
                    $('#diskon_error').show();
                    $('#tambahan_error').show();
                    $('#satuan_error').show();
                    $('#point_error').show();
                    $('#deskripsi_error').show();
                    console.log(err.responseJSON['errors']);
                    $('#nama_produk_error').text(err.responseJSON['errors'].nama_produk[0]);
                    $('#harga_error').text(err.responseJSON['errors'].harga[0]);
                    $('#diskon_error').text(err.responseJSON['errors'].diskon[0]);
                    $('#tambahan_error').text(err.responseJSON['errors'].tambahan[0]);
                    $('#satuan_error').text(err.responseJSON['errors'].satuan[0]);
                    $('#point_error').text(err.responseJSON['errors'].point[0]);
                    $('#deskripsi_error').text(err.responseJSON['errors'].deskripsi[0]);
                }
            });
        });
    </script>
    <script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>
    <script src="{{ asset('assets/cropper/jquery-cropper.js') }}"></script>
    <script src="{{ asset('assets/cropper/main.js') }}"></script>
@endpush
