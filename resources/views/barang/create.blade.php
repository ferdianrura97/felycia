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
                <form method="POST" action="{{ route('barang.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Nama Barang" value="{{ old('nama_barang') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="kategori_barang_id">Kategori Barang</label>
                        <select name="kategori_barang_id" class="form-control select2" required>
                            <option value="">Pilih Kategori Barang</option>
                            @foreach ($kategori as $k)
                            <option value="{{ $k->id }}" @if($k->id == old('kategori_barang_id')) selected @endif>{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Nama barang" value="{{ old('keterangan', '-') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" class="form-control money" id="harga" placeholder="Harga" required value="{{ old('harga') }}">
                    </div>

                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="text" name="satuan" class="form-control" id="satuan" placeholder="Satuan" required value="{{ old('satuan') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
