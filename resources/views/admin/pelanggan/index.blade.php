@extends('layouts.layout')
@section('mahasiswa_login')
    <a style="color:#3c8dbc">{{ Session::get('nama_lengkap') }}</a>
@endsection
@push('styles')
    @include('css/tambahan')
    @include('css/datatables')
@endpush
@section('topbar')
    @include('admin/topbar')
@endsection
@section('content')
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-users"></i>&nbsp; Data Pelanggan</h3>
                <div class="pull-right">
                    <a href="{{ route('admin.pelanggan.create') }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover" id="myTable" style="width:100% !important">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Pekerjaan</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>No Handphone</th>
                                    <th>Point</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelanggans as $index=> $pelanggan)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $pelanggan->nama_pelanggan }}</td>
                                        <td>
                                            @if ($pelanggan->jenis_kelamin == "L")
                                                <small class="text-muted text-primary"><i class="fa fa-male"></i>&nbsp; Laki-Laki</small>
                                            @else
                                                <small class="text-muted text-warning"><i class="fa fa-female"></i>&nbsp; Perempuan</small>
                                            @endif
                                        </td>
                                        <td>{{ $pelanggan->pekerjaan }}</td>
                                        <td>{{ $pelanggan->tanggal_lahir }}</td>
                                        <td>{{ $pelanggan->alamat }}</td>
                                        <td>{{ $pelanggan->no_hp }}</td>
                                        <td>
                                            <a href="{{ route('admin.pelanggan.show',[$pelanggan->id]) }}" class="btn btn-success btn-sm btn-flat">{{ $pelanggan->pelanggan_point }}</a>
                                        </td>
                                        </td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('admin.pelanggan.edit',[$pelanggan->id]) }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('admin.pelanggan.delete',[$pelanggan->id]) }}" method="POST">
                                                            {{ csrf_field() }} {{ method_field("DELETE") }}
                                                            <a href="" onClick="return confirm('Apakah anda yakin menghapus data ini?')"/><button type="submit" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i>&nbsp; Hapus</button></a>

                                                        </form>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <!-- /.box-body -->
        </div>
    </section>
@endsection
@push('scripts')
    @include('js/datatables')
@endpush
