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
                <form method="POST" action="{{ route('pelanggan.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nomor_pelanggan"> Nomor Pelanggan</label>
                        <input type="text" name="nomor_pelanggan" class="form-control" id="nomor_pelanggan" placeholder="Nomor Pelanggan" value="{{ \Helper::nomorPelanggan() }}" readonly required>
                    </div>

                    <div class="form-group">
                        <label for="nama_pelanggan">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan" placeholder="Nama Pelanggan" value="{{ old('nama_pelanggan') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat Pelanggan</label>
                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" required>{{ old('alamat') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="no_hp">No Hp Pelanggan</label>
                        <input type="text" name="no_hp" class="form-control phone" id="no_hp" placeholder="No Hp" required value="{{ old('no_hp') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
