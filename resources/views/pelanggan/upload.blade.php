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
                <a href="{{ asset('template_import_pelanggan.xlsx') }}" target="_blank">
                    <p class="text-primary"><i>Contoh Template Excel</i></p>
                </a>
                <form method="POST" action="{{ route('pelanggan.storeUpload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="file"> Upload Excel</label>
                        <input type="file" name="file" class="form-control" id="file" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
