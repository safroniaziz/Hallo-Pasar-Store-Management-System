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
                <h3 class="box-title"><i class="fa fa-home"></i>&nbsp; Metode Pembayaran</h3>
                <div class="pull-right">
                    <a href="{{ route('admin.metode.create') }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover" id="myTable" style="width:100% !important">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Nomor Rekening</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($metodes as $index=> $metode)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $metode->nama_metode }}</td>
                                        <td>
                                            @if ($metode->nomor_rekening == null)
                                                <a class="text-danger">-</a>
                                            @else
                                                {{ $metode->nomor_rekening }}
                                            @endif
                                        </td>
                                        <td>{{ $metode->keterangan }}</td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('admin.metode.edit',[$metode->id]) }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('admin.metode.delete',[$metode->id]) }}" method="POST">
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
