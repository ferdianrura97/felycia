@extends('layouts.index')

@section('content')

<div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Barang</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" >
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Barang</th>
                            <th>Jumlah</th>
                            <th>Harga Barang</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data->barangRm as $barang)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $barang->barang->nama_barang }}</td>
                                <td>{{ $barang->jumlah }}</td>
                                <td>Rp. {{ number_format($barang->harga) }}</td>
                                <td>Rp. {{ number_format($barang->jumlah * $barang->harga) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" align="right"> <b>Total</b></td>
                            <td><b>Rp. {{ number_format($data->total) }}</b></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right"> <b>Diskon</b></td>
                            <td><b>Rp. {{ number_format($data->total*$data->diskon/100) }}</b></td>
                        </tr>
                        <tr>
                            <td style="font-size: 20px;" colspan="4" align="right"> <b>Total Akhir</b></td>
                            <td style="font-size: 20px;"> <b>Rp. {{ number_format($data->total_dengan_diskon) }}</b></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detail Penjualan</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="py-3">
                    <tr>
                        <td>Nomor Penjualan</td>
                        <td> : </td>
                        <td class="text-primary font-weight-bold"> {{ $data->nomor_penjualan }} </td>
                    </tr>
                    <tr>
                        <td>Tgl Penjualan</td>
                        <td> : </td>
                        <td class="text-primary font-weight-bold"> {{ $data->tgl_penjualan }} </td>
                    </tr>
                    <tr>
                        <td>Pelanggan</td>
                        <td> : </td>
                        <td class="text-primary font-weight-bold"> {{ $data->pelanggan->nama_pelanggan }} </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
