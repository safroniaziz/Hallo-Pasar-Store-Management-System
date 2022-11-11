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
                <h3 class="box-title"><i class="fa fa-home"></i>&nbsp; Data Provinsi</h3>
                {{-- <div class="pull-right">
                    <a href="{{ route('admin.provinsi.create') }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
                </div> --}}
            </div>
            <div class="box-body">
                <div class="row">
                    <form method="GET">
                        <div class="form-group col-md-12">
                            <label for="filter" class="">Cari Kecamatan</label>
                            <input type="text" class="form-control" id="filter" name="filter" placeholder="kecamatan..." value="{{$filter}}">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-sm btn-flat">Cari</button>
                        </div>
                    </form>
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover" id="myTable" style="width:100% !important">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama kecamatan</th>
                                    <th>Kabupaten/Kota</th>
                                    <th>Provinsi</th>
                                    <th>Jumlah Kelurahan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kecamatans as $key=> $kecamatan)
                                    <tr>
                                        <td> {{ $kecamatans->firstItem() + $key }}</td>
                                        <td>{{ $kecamatan->name }}</td>
                                        <td>{{ $kecamatan->regency->name }}</td>
                                        <td>{{ $kecamatan->regency->province->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.kelurahan',[$kecamatan->id]) }}" class="btn btn-primary btn-sm btn-flat">{{ $kecamatan->villages()->count() }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$kecamatans->links("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>
        <!-- /.box-body -->
        </div>
    </section>
@endsection
