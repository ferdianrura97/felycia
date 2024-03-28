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
                <form method="POST" action="{{ route('user.update', $user->id) }}">
                    @csrf
                    {{method_field('PUT')}}

                    <div class="form-group">
                        <label for="nama_user">Nama User</label>
                        <input type="text" name="nama_user" class="form-control" id="nama_user" placeholder="Nama user" value="{{ old('nama_user', $user->nama_user) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="level_id">Pilih Level</label>
                        <select name="level_id" class="form-control select2" required>
                            <option value="">Pilih Level</option>
                            @foreach ($levels as $level)
                            <option value="{{ $level->id }}" @if($level->id == $user->level_id) selected @endif >{{ $level->nama_level }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="email">Email <i class="text-danger">(*Digunakan Sebagai Username Login)</i> </label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email', $user->email) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password <i class="text-danger">(*Kosongkan Jika Tidak Ingin Mengganti Password)</i> </label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="{{ old('password') }}">
                    </div>

                    <div class="form-group">
                        <label for="no_hp">No Hp</label>
                        <input type="text" name="no_hp" class="form-control phone" id="no_hp" placeholder="No Hp" required value="{{ old('no_hp', $user->no_hp) }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
