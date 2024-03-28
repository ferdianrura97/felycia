@extends('layouts.index')

@section('content')

<div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>

                <a href="{{route('penjualan.create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"> </i>Tambah Data</a>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Tgl Penjualan</th>
                            <th>Nomor Penjualan</th>
                            <th>Pelanggan</th>
                            <th>Total Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualan as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->tgl_penjualan }}</td>
                            <td>{{ $data->nomor_penjualan }}</td>
                            <td>{{ $data->pelanggan->nama_pelanggan }}</td>
                            <td>Rp. {{ number_format($data->total_dengan_diskon) }}</td>
                            <td>
                                <form method="POST" action="{{route('penjualan.destroy', $data->id)}}">
									{{csrf_field()}}
                                    <a href="{{route('penjualan.show', $data->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-show"> </i>Detail</a>
                                    
									@include('layouts.include.action-button', ['id' => $data->id, 'url' => $url, 'menu' => $title])

                                    <a href="{{route('penjualan.print', $data->id)}}" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-print"> </i>Print</a>
								</form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
