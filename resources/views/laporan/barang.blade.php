@extends('layouts.index')

@push('style')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
@endpush

@section('content')
<div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover dataTableLaporan">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Keterangan</th>
                            <th>Harga</th>
                            <th>Banyaknya Diperjual Belikan </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_barang }}</td>
                            <td>{{ $data->kategori->nama_kategori }}</td>
                            <td>{{ $data->keterangan }}</td>
                            <td> Rp. {{ number_format($data->harga) }}</td>
                            <td>{{ $data->terlaris }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
@endpush