<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-info-circle"></i>&nbsp;Gambar Detail Produk</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <form action="{{ route('admin.produk.foto_post',[$produk->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}

                <div class="form-group col-md-12 ">
                    <label>Thumbnail Produk <small class="text-muted text-danger">(Numeric)</small></label>
                    <input type="file" name="foto_produk" class="form-control">
                    <div>
                        @if ($errors->has('foto_produk'))
                            <small class="form-text text-danger">{{ $errors->first('foto_produk') }}</small>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <a href="{{ route('admin.produk') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
                    <button type="reset" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-refresh"></i>&nbsp; Ulangi</button>
                    <button type="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-check-circle"></i>&nbsp; Simpan</button>
                </div>
            </form>
            <div class="col-md-12" style="margin-top:10px !important">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto Produk</th>
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
