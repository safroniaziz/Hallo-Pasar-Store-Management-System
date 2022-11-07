<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-info-circle"></i>&nbsp;Informasi Detail Produk</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12" style="margin-bottom:10px !important;">
                    <a href="{{ route('admin.produk') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
            </div>
        </div>
        <table class="table table-striped table-bordered">
            <tr>
                <th style="vertical-align: middle;">Foto Produk</th>
                <td style="vertical-align: middle;"> : </td>
                <td colspan="2">
                    <img src="{{ asset('upload/foto_produk/'.$produk->foto_produk) }}" width="100" alt="">
                </td>
            </tr>
            <tr>
                <th>Nama Produk</th>
                <td> : </td>
                <td>
                    {{ $produk->nama_produk }}
                </td>
            </tr>
            <tr>
                <th>Kategori Produk</th>
                <td> : </td>
                <td>
                    {{ $produk->kategori->nama_kategori }}
                </td>
            </tr>

            <tr>
                <th>Harga</th>
                <td> : </td>
                <td>
                    Rp.{{ number_format($produk->harga) }}
                </td>
            </tr>
            <tr>
                <th>Diskon</th>
                <td> : </td>
                <td>
                    Rp.{{ number_format($produk->diskon) }}
                </td>
            </tr>
            <tr>
                <th>Biaya Tambahan</th>
                <td> : </td>
                <td>
                    Rp.{{ number_format($produk->tambahan) }}
                </td>
            </tr>
            <tr>
                <th>Point Produk</th>
                <td> : </td>
                <td>
                    {{ $produk->point }}
                </td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <td> : </td>
                <td>
                    {{ $produk->deskripsi }}
                </td>
            </tr>
            <tr>
                <th>Tampilkan Produk</th>
                <td> : </td>
                <td>
                    @if ($produk->is_display == true)
                        Ya
                    @else
                        Tidak
                    @endif
                </td>
            </tr>
            <tr>
                <th>Jenis Produk</th>
                <td> : </td>
                <td>
                    @if ($produk->is_paketan == true)
                        Produk Paketan
                    @else
                        Produk Satuan
                    @endif
                </td>
            </tr>
        </table>
    </div>
</div>
