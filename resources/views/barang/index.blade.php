@extends('layouts.index')

@section('content')

<div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>

                <a href="{{route('barang.create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"> </i>Tambah Data</a>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Kategori Barang</th>
                            <th>Keterangan</th>
                            <th>Harga</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_barang }}</td>
                            <td>{{ $data->kategori->nama_kategori }}</td>
                            <td>{{ $data->keterangan }}</td>
                            <td> Rp. {{ number_format($data->harga) }}</td>
                            <td>{{ $data->satuan }}</td>
                            <td>
                                <form method="POST" action="{{route('barang.destroy', $data->id)}}">
									{{csrf_field()}}
									@include('layouts.include.action-button', ['id' => $data->id, 'url' => $url, 'menu' => $title])
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
