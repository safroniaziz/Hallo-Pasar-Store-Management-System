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
                <h3 class="box-title"><i class="fa fa-home"></i>&nbsp; Kandungan Gizi</h3>
                <div class="pull-right">
                    <a href="{{ route('admin.tag.create') }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <form action="">
                        <div class="form-group col-md-12">
                            <label for="">Pilih Kandungan Gizi</label>
                            <select name="tag_id" class="form-control" id="">
                                <option disabled selected>-- pilih kandungan gizi --</option>
                                @foreach ($collection as $item)
                                    
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover" id="myTable" style="width:100% !important">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kandungan Gizi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produk->tags()->get() as $index=> $tag)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $tag->nama_tag }}</td>
                                        <td>
                                            @if ($tag->nomor_rekening == null)
                                                <a class="text-danger">-</a>
                                            @else
                                                {{ $tag->nomor_rekening }}
                                            @endif
                                        </td>
                                        <td>{{ $tag->keterangan }}</td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <form action="{{ route('admin.tag.delete',[$tag->id]) }}" method="POST">
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
