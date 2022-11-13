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
                <h3 class="box-title"><i class="fa fa-home"></i>&nbsp; Data Provinsi</h3>
                {{-- <div class="pull-right">
                    <a href="{{ route('admin.provinsi.create') }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
                </div> --}}
            </div>
            <div class="box-body">
                <div class="row">
                    <form method="GET">
                        <div class="form-group col-md-12">
                            <label for="filter" class="">Cari Provinsi</label>
                            <input type="text" class="form-control" id="filter" name="filter" placeholder="Provinsi..." value="{{$filter}}">
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
                                    <th>Nama Provinsi</th>
                                    <th>Jumlah Kabupaten/Kota</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($provinces as $key=> $provinsi)
                                    <tr>
                                        <td> {{ $provinces->firstItem() + $key }}</td>
                                        <td>{{ $provinsi->name }}</td>
                                        <td>{{ $provinsi->regencies()->count() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$provinces->links("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>
        <!-- /.box-body -->
        </div>
    </section>
@endsection
