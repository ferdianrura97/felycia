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
                <form method="POST" action="{{ route('profil.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama"> Nama Aplikasi <i class="text-danger">*</i></label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nomor Pelanggan" value="{{ $profil->nama }}" required>
                    </div>

                    <div class="form-group">
                        <label for="no_hp">No Hp <i class="text-danger">*</i></label>
                        <input type="text" name="no_hp" class="form-control phone" id="no_hp" placeholder="No Hp" required value="{{ $profil->no_hp }}">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat <i class="text-danger">*</i></label>
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Nama Pelanggan" value="{{ $profil->alamat }}" required>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan Bawah Nota <i class="text-danger">*</i></label>
                        <textarea name="keterangan" id="keterangan" class="form-control" placeholder="keterangan" required>{{ $profil->keterangan }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="npwp">NPWP <i class="text-danger">*</i></label>
                        <input type="text" name="npwp" class="form-control" id="npwp" placeholder="NPWP" value="{{ $profil->npwp }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email <i class="text-danger">*</i></label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ $profil->email }}" required>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class=" col-md-8">
                            <img src="{{asset('assets/img/logo/'.($profil->logo ?? 'logo.png'))  }}" style="max-width: 20%;">
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Logo</label>
                        <div class=" col-md-8">
                            <input type="file" name="logo" class="form-control">
                            
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
