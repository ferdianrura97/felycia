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
                <form method="POST" action="{{ route('level.update', $level->id) }}">
                    @csrf
                    {{method_field('PUT')}}

                    <div class="form-group">
                        <label for="nama_level">Nama level</label>
                        <input type="text" name="nama_level" class="form-control" id="nama_level" placeholder="Nama level" value="{{ old('nama_level', $level->nama_level) }}" required>
                    </div>

                    <div class="form-group table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" class="check_all" data-target=".pilihan" id="pilih">
                                        <label for="pilih">Pilih Semua</label>
                                    </th>
                
                                    <th>
                                        Menu
                                    </th>
                
                                    <th>
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $nama = "";
                                $pil = 0;
                            @endphp
                                @foreach($menus as $key => $menu)
                                    @if($nama != $menu->nama_menu)
                                        @php
                
                                            $pil ++;
                                        @endphp
                                        @if($key > 0)
                                            </tr>
                
                                        @endif
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="check_all pilihan" data-target=".pilihan-{{ $pil }}" >
                                            </td>
                                            <td>
                                                {{ $menu->nama_menu }}
                
                                            </td>
                                            <td>
                                                <input type="checkbox" @if(isset($levelMenus) && in_array($menu->id,$levelMenus)) checked @endif id="menu-{{ $menu->id }}" name="menu_id[]" class="pilihan pilihan-{{ $pil }}" value="{{ $menu->id }}">
                                                <label for="menu-{{ $menu->id }}">{{ $menu->aksi_menu }}</label>
                                        @php
                                            $nama = $menu->nama_menu;
                
                                        @endphp
                                    @else
                                        <input type="checkbox" @if(isset($levelMenus) && in_array($menu->id,$levelMenus)) checked @endif id="menu-{{ $menu->id }}" name="menu_id[]" class="pilihan pilihan-{{ $pil }}" value="{{ $menu->id }}">
                                        <label for="menu-{{ $menu->id }}">{{ $menu->aksi_menu }}</label>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@push('script')
    <script>
        $(document).ready(function(){
            $(document).on('change','.check_all',function(e){
                $($(this).data('target')).prop('checked',$(this).is(':checked'));
            });
        });
    </script>
@endpush