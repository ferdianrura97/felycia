@extends('layouts.index')

@section('content')

<div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{route('pelanggan.create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"> </i>Tambah Data</a>
                        <a href="{{route('pelanggan.upload')}}" class="btn btn-sm btn-info"><i class="fa fa-upload"> </i>Upload Data</a>
                    </div>
                </div>

            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Nomor Identitas</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Hp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggan as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nomor_pelanggan }}</td>
                            <td>{{ $data->nama_pelanggan }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->no_hp }}</td>
                            <td>
                                <form method="POST" action="{{route('pelanggan.destroy', $data->id)}}">
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
