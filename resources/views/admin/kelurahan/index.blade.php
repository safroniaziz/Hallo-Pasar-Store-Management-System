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
                <h3 class="box-title"><i class="fa fa-home"></i>&nbsp; Data Kelurahan</h3>
                {{-- <div class="pull-right">
                    <a href="{{ route('admin.provinsi.create') }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
                </div> --}}
            </div>
            <div class="box-body">
                <div class="row">
                    <form method="GET">
                        <div class="form-group col-md-12">
                            <label for="filter" class="">Cari Kelurahan</label>
                            <input type="text" class="form-control" id="filter" name="filter" placeholder="kelurahan..." value="{{$filter}}">
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
                                    <th>Nama Kelurahan</th>
                                    <th>Ongkos Kirim</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelurahans as $key=> $kelurahan)
                                    <tr>
                                        <td> {{ $kelurahans->firstItem() + $key }}</td>
                                        <td>{{ $kelurahan->name }}</td>
                                        <td>
                                            <form action="{{ route('admin.kelurahan.update',[$kecamatan->id,$kelurahan->id]) }}" method="post">
                                                {{ csrf_field() }} {{ method_field('PATCH') }}
                                                <input type="text" name="ongkir" value="{{ $kelurahan->ongkir }}" class="form-control">
                                                <button type="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-check-circle"></i>&nbsp; Update</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$kelurahans->links("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>
        <!-- /.box-body -->
        </div>
    </section>
@endsection
