@extends('layouts.index')

@push('style')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
@endpush

@section('content')

@include('layouts.include.filter')

<div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>

            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover dataTableLaporan p-1">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Tgl Penjualan</th>
                            <th>Nomor Penjualan</th>
                            <th>Pelanggan</th>
                            <th>Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $totalKeseluruhan = 0;
                        @endphp
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->tgl_penjualan }}</td>
                            <td>{{ $data->nomor_penjualan }}</td>
                            <td>{{ $data->pelanggan->nama_pelanggan }}</td>
                            <td>Rp. {{ number_format($data->total_dengan_diskon) }}</td>
                        </tr>
                        @php
                        $totalKeseluruhan += $data->total_dengan_diskon;
                        @endphp
                        @endforeach
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td align="right"> <b>Total</b></td>
                                <td align="right"> <b>Rp. {{ number_format($totalKeseluruhan) }}</b></td>
                            </tr>
                        </tfoot>
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