@extends('layouts.backend')
@section('halaman')
 Halaman Administrator
@endsection
@section('user-login')
    <a style="color:#3c8dbc">{{ Auth::user()->nama_user }}</a>
@endsection
@push('styles')
    @include('css/tambahan')
    @include('css/datatables')
@endpush
@section('sidebar-menu')
    @include('admin/sidebar')
@endsection
@section('content')
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-users"></i>&nbsp; Data operator</h3>
                <div class="pull-right">
                    <a href="{{ route('admin.operator.create') }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover" id="myTable" style="width:100% !important">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama operator</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Pekerjaan</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>No Handphone</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($operators as $index=> $operator)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $operator->nama_user }}</td>
                                        <td>
                                            @if ($operator->jenis_kelamin == "L")
                                                <small class="text-muted text-primary"><i class="fa fa-male"></i>&nbsp; Laki-Laki</small>
                                            @else
                                                <small class="text-muted text-warning"><i class="fa fa-female"></i>&nbsp; Perempuan</small>
                                            @endif
                                        </td>
                                        <td>{{ $operator->pekerjaan }}</td>
                                        <td>{{ $operator->tanggal_lahir }}</td>
                                        <td>{{ $operator->alamat }}</td>
                                        <td>{{ $operator->no_hp }}</td>
                                        </td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('admin.operator.edit',[$operator->id]) }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('admin.operator.delete',[$operator->id]) }}" method="POST">
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
