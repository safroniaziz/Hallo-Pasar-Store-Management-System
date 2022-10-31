<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-info-circle"></i>&nbsp;Informasi Detail Produk</h3>
    </div>
    <div class="box-body">
        <table class="table table-striped table-bordered">
            <tr>
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
                    {{ $produk->harga }}
                </td>
            </tr>
            <tr>
                <th>Diskon</th>
                <td> : </td>
                <td>
                    {{ $produk->diskon }}
                </td>
            </tr>
            <tr>
                <th>Biaya Tambahan</th>
                <td> : </td>
                <td>
                    {{ $produk->biaya_tambahan }}
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
        </table>
    </div>
</div>
