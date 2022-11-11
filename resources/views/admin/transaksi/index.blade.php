@extends('layouts.layout')
@section('mahasiswa_login')
    <a style="color:#3c8dbc">{{ Session::get('nama_lengkap') }}</a>
@endsection
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
@endpush
@section('topbar')
    @include('admin/topbar')
@endsection
@section('content')
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-exchange"></i>&nbsp;Data Transaksi</h3>
                <div class="pull-right">
                    <a href="{{ route('admin.transaksi.create') }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>&nbsp; Tambah</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Total Belanja</th>
                                    <th>Alamat</th>
                                    <th>No. Handphone</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        <!-- /.box-body -->
        </div>
    </section>
@endsection
@push('datatables')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js   "></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
@endpush
@push('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            $('#tbl_list').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'csv', 'print'
                ],
                processing: true,
                serverSide: true,
                responsive: true,
                columnDefs: [{
                    "defaultContent": "-",
                    "targets": "_all"
                }],
                ajax: '{{ url()->current() }}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'nama_pelanggan', name: 'nama_pelanggan' },
                    { data: 'total_bayar', name: 'total_bayar' },
                    { data: 'alamat', name: 'alamat' },
                    { data: 'pelanggan.no_hp', name: 'pelanggan.no_hp' },
                    { data: 'action', name: 'action' },
                ],
            });
        });
    </script>
@endpush
