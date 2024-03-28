@extends('layouts.index')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route($url.'.update', $kategori->id) }}">
                    @csrf
                    {{method_field('PUT')}}

                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control" id="nama_kategori" placeholder="Nama Kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
