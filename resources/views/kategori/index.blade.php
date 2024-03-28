@extends('layouts.index')

@section('content')

<div class="row">
    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>

                <a href="{{route($url.'.create')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"> </i>Tambah Data</a>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_kategori }}</td>
                            <td>
                                <form method="POST" action="{{route($url.'.destroy', $data->id)}}">
									{{csrf_field()}}
									@include('layouts.include.action-button', ['id' => $data->id, 'url' => $url, 'title' => $title])
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
