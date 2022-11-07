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
                <form id="form">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="img-container">
                                <img id="image" src="" alt="Picture">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="docs-preview clearfix">
                                        <div class="img-preview preview-lg"></div>
                                        <div class="img-preview preview-md"></div>
                                        <div class="img-preview preview-sm"></div>
                                        <div class="img-preview preview-xs"></div>
                                    </div>
                                </div>
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
                                    <div class="form-group">
                                        <label>Masukan Nama Kategori</label>
                                        <input type="text" name="nama_kategori" id="nama_kategori" class="form-control">
                                        <small id="nama_kategori_error" style="display: none" class="text-danger text-muted"></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <a href="javascript:void(0);" download="cropped.jpg" class="btn btn-block btn-info" id="download"><i class="fa fa-check-circle"></i>&nbsp;Simpan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script type="text/javascript">
        $('#download').on('click',function(e){
            e.preventDefault();
            var $image = $('#image');

            var nama_kategori = $('#nama_kategori').val();
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
            let form_url="{{ route('admin.kategori_produk.post') }}";

            var form = new FormData();
            form.append('thumbnail',url);
            form.append('nama_kategori',nama_kategori);
            let token="{{ csrf_token() }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "{{ route('admin.kategori_produk.post') }}",
                data: form,
                contentType: false,
                processData: false,
                success: function (data) {
                    window.location.href = "{{ route('admin.kategori_produk') }}";
                    $('#nama_kategori_error').hide();
                    toastr.success('Berhasil', 'data kategori produk berhasil ditambahkan', {
                        timeOut: 1000,
                        preventDuplicates: true,
                        positionClass: 'toast-top-right',
                    });
                },
                error: function(err){
                    $('#nama_kategori_error').show();
                    $('#nama_kategori_error').text(err.responseJSON['errors'].nama_kategori[0]);
                    // consol class="text-danger text-muted"e.log(err.responseJSON['errors'].nama_kategori[0]); class="text-danger text-muted"
                }
            });
        });
    </script>
    <script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>
    <script src="{{ asset('assets/cropper/jquery-cropper.js') }}"></script>
    <script src="{{ asset('assets/cropper/main.js') }}"></script>
@endpush

