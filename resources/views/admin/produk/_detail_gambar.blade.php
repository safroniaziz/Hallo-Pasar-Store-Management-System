@include('css/cropper')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-info-circle"></i>&nbsp;Gambar Detail</h3>
        <div class="pull-right">
            <a onclick="tambahGambar()" class="btn btn-primary btn-sm btn-flat" id="tambah_gambar"><i class="fa fa-plus"></i>&nbsp;Tambah Gambar Produk</a>
            <a onclick="batalTambahGambar()" class="btn btn-warning btn-sm btn-flat" id="batal_tambah_gambar" style="display: none"><i class="fa fa-minus-circle"></i>&nbsp;Batal Gambar Produk</a>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="row" id="upload_gambar" style="display: none">
                    <form id="form">
                        <div class="col-md-12">
                            <input type="hidden" name="produk_id" id="produk_id" value="{{ $produk->id }}">
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
                            <div class="docs-preview clearfix">
                                <div class="img-preview preview-lg"></div>
                                <div class="img-preview preview-md"></div>
                                <div class="img-preview preview-sm"></div>
                                <div class="img-preview preview-xs"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="img-container">
                                <img id="image" src="" alt="Picture">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="javascript:void(0);" download="cropped.jpg" class="btn btn-primary btn-sm btn-flat" id="download"><i class="fa fa-check-circle"></i>&nbsp;Simpan</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-12">
                <table class="table table-striped table-bordered table-hover" style="margin-top:10px !important">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto Detail Produk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produk->photos()->get() as $index=> $foto)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>
                                    <img src="{{ asset('upload/foto_produk_detail/'.$foto->foto_produk) }}" width="100" alt="">
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <form action="{{ route('admin.produk.delete_foto',[$foto->id]) }}" method="POST">
                                                    {{ csrf_field() }} {{ method_field("DELETE") }}
                                                    <a href="" onClick="return confirm('Apakah anda yakin menghapus foto ini?')"/><button type="submit" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i>&nbsp; Hapus</button></a>

                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-danger">tidak ada foto produk ditambahkan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        function tambahGambar(){
            $('#upload_gambar').show(500);
            $('#tambah_gambar').hide(500);
            $('#batal_tambah_gambar').show(500);
        }

        function batalTambahGambar(){
            $('#upload_gambar').hide(500);
            $('#tambah_gambar').show(500);
            $('#batal_tambah_gambar').hide(500);
        }

        $('#download').on('click',function(e){
            e.preventDefault();
            var $image = $('#image');
            var cropper = $image.data('cropper');
            var produk_id = $('#produk_id').val();
            if(cropper.getCroppedCanvas() == null)
            {
                $('#alert-gambar').show();
            }
            else
            {
                $('#alert-gambar').hide();
                var url = cropper.getCroppedCanvas().toDataURL('image/jpeg').replace(/^data:image\/[^;]+/, 'data:application/octet-stream');
            }
            let form_url="{{ route('admin.produk.foto_post_gambar') }}";

            var form = new FormData();
            form.append('foto_produk',url);
            form.append('produk_id',produk_id);
            let token="{{ csrf_token() }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "{{ route('admin.produk.foto_post_gambar') }}",
                data: form,
                contentType: false,
                processData: false,
                success: function (data) {
                    window.location.reload();
                    if (data.success == true) {
                        toastr.success('Berhasil', 'Foto detail produk berhasil ditambahkan', {
                            timeOut: 1000,
                            preventDuplicates: true,
                            positionClass: 'toast-top-right',
                        });
                    }else{
                        alert('gagal');
                    }
                },
                error: function(err){
                    // $('#nama_produk_error').show();
                    // $('#harga_error').show();
                    // $('#diskon_error').show();
                    // $('#tambahan_error').show();
                    // $('#satuan_error').show();
                    // $('#point_error').show();
                    // $('#deskripsi_error').show();
                    // console.log(err.responseJSON['errors']);
                    // $('#nama_produk_error').text(err.responseJSON['errors'].nama_produk[0]);
                    // $('#harga_error').text(err.responseJSON['errors'].harga[0]);
                    // $('#diskon_error').text(err.responseJSON['errors'].diskon[0]);
                    // $('#tambahan_error').text(err.responseJSON['errors'].tambahan[0]);
                    // $('#satuan_error').text(err.responseJSON['errors'].satuan[0]);
                    // $('#point_error').text(err.responseJSON['errors'].point[0]);
                    // $('#deskripsi_error').text(err.responseJSON['errors'].deskripsi[0]);
                }
            });
        });
    </script>
    <script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>
    <script src="{{ asset('assets/cropper/jquery-cropper.js') }}"></script>
    <script src="{{ asset('assets/cropper/main.js') }}"></script>
@endpush
