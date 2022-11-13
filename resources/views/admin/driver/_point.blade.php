<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-info-circle"></i>&nbsp;Riwayat Point Pelanggan</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('admin.pelanggan') }}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
            </div>
            <div class="col-md-12" style="margin-top:10px !important">
                <table class="table table-striped table-bordered table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Transaksi</th>
                            <th>Point</th>
                            <th>Status Point</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pelanggan->pelanggan_points()->get() as $index=> $point)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $point->transaksi->created_at }}</td>
                                <td>{{ $point->point }}</td>
                                <td>{{ $point->status_point }}</td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <form action="{{ route('admin.pelanggan.delete_foto',[$foto->id]) }}" method="POST">
                                                    {{ csrf_field() }} {{ method_field("DELETE") }}
                                                    <a href="" onClick="return confirm('Apakah anda yakin menghapus foto ini?')"/><button type="submit" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i>&nbsp; Hapus</button></a>
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
