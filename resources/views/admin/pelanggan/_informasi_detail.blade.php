<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-info-circle"></i>&nbsp;Informasi Detail Pelanggan</h3>
    </div>
    <div class="box-body">
        <table class="table table-striped table-bordered">

            <tr>
                <th>Nama Pelanggan</th>
                <td> : </td>
                <td>
                    {{ $pelanggan->nama_pelanggan }}
                </td>
            </tr>
            <tr>
                <th>Jumlah Point</th>
                <td> : </td>
                <td>
                    {{ $pelanggan->pelanggan_point }} Point
                </td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td> : </td>
                <td>
                    @if ($pelanggan->jenis_kelamin == "L")
                        <small class="text-muted text-primary"><i class="fa fa-male"></i>&nbsp; Laki-Laki</small>
                    @else
                        <small class="text-muted text-warning"><i class="fa fa-female"></i>&nbsp; Perempuan</small>
                    @endif
                </td>
            </tr>

            <tr>
                <th>Pekerjaan</th>
                <td> : </td>
                <td>
                    {{ $pelanggan->pekerjaan }}
                </td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td> : </td>
                <td>
                    {{ $pelanggan->tanggal_lahir }}
                </td>
            </tr>
            <tr>
                <th>Provinsi</th>
                <td> : </td>
                <td>
                    {{ $pelanggan->provinsi }}
                </td>
            </tr>
            <tr>
                <th>Kabupaten/Kota</th>
                <td> : </td>
                <td>
                    {{ $pelanggan->kab_kota }}
                </td>
            </tr>
            <tr>
                <th>Kelurahan</th>
                <td> : </td>
                <td>
                    {{ $pelanggan->kelurahan }}
                </td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td> : </td>
                <td>
                    {{ $pelanggan->alamat }}
                </td>
            </tr>

            <tr>
                <th>No. Handphone</th>
                <td> : </td>
                <td>
                    {{ $pelanggan->no_hp }}
                </td>
            </tr>
        </table>
    </div>
</div>
