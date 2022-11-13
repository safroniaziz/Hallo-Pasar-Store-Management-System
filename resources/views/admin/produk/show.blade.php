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
    @include('css/icheck')
@endpush
@section('sidebar-menu')
    @include('admin/sidebar')
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                @include('admin/produk._informasi_detail')
            </div>
            <div class="col-md-8">
                @include('admin/produk._detail_gambar')
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    @include('js/datatables')
    @include('js/icheck')
@endpush
