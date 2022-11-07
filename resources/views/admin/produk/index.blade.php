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
                <h3 class="box-title"><i class="fa fa-home"></i>&nbsp; Produk</h3>
                <div class="pull-right">
                    <a href="{{ route('admin.produk.create') }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover" id="myTable" style="width:100% !important">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori</th>
                                    <th>Thumbnail</th>
                                    <th>Harga</th>
                                    <th>Diskon</th>
                                    <th>Biaya Tambahan</th>
                                    <th>Total Harga</th>
                                    <th>Paketan Sayur</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produks as $index=> $produk)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $produk->nama_produk }}</td>
                                        <td>{{ $produk->kategori->nama_kategori }}</td>
                                        <td>
                                            @if ($produk->foto_produk != null)
                                                <img src="{{ asset('upload/foto_produk/'.$produk->foto_produk) }}" width="100" alt="">
                                            @else
                                            <a style="color:red">tidak ada gambar</a>
                                            @endif
                                        </td>
                                        <td>
                                            Rp.{{ number_format($produk->harga) }}
                                        </td>
                                        <td>
                                            Rp.{{ number_format($produk->diskon) }}
                                        </td>
                                        <td>
                                            Rp.{{ number_format($produk->tambahan) }}
                                        </td>
                                        <td>
                                            Rp.{{ number_format(($produk->harga + $produk->tambahan)- $produk->diskon) }}
                                        </td>
                                        <td>
                                            @if ($produk->is_paketan == true)
                                                <small class="text-muted text-success">Ya</small>
                                            @else
                                                <small class="text-muted text-danger">Tidak</small>
                                            @endif
                                        </td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('admin.produk.show',[$produk->id]) }}" class="btn btn-success btn-sm btn-flat"><i class="fa fa-info-circle"></i>&nbsp; Detail</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.produk.edit',[$produk->id]) }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp; Edit</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('admin.produk.delete',[$produk->id]) }}" method="POST">
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
