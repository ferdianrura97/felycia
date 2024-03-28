@extends('layouts.index')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <!-- Form Basic -->
        <form method="POST" action="{{ route('penjualan.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="nomor_penjualan"> Nomor Penjualan</label> <i class="text-danger">*</i>
                            <input type="text" name="nomor_penjualan" class="form-control" id="nomor_penjualan" placeholder="Nomor Pelanggan" value="{{ \Helper::nomorPenjualan() }}" readonly required>
                        </div>
    
                        <div class="form-group">
                            <label for="tgl_penjualan"> Tgl Penjualan</label> <i class="text-danger">*</i>
                            <input type="text" name="tgl_penjualan" class="form-control date" id="tgl_penjualan" value="{{ date("Y-m-d") }}" required>
                        </div>
    
                        <div class="form-group">
                            <label for="pelanggan_id">Pilih Pelanggan</label>
                            <select name="pelanggan_id" class="form-control select2" required>
                                <option value="">Pilih Pelanggan</option>
                                @foreach ($pelanggans as $pelanggan)
                                <option value="{{ $pelanggan->id }}" @if($pelanggan->id == old('pelanggan_id')) selected @endif>{{ $pelanggan->nama_pelanggan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ "List Barang " . $title }}</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        Barang <i class="text-danger">*</i>
                    </div>

                    <div class="col-lg-2">
                        Harga <i class="text-danger">*</i>
                    </div>

                    <div class="col-lg-2">
                        Jumlah <i class="text-danger">*</i>
                    </div>

                    <div class="col-lg-3">
                        Sub Total <i class="text-danger">*</i>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12" id="dynamic-field">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <select name="barang_id[]" class="form-control select2 barang" required>
                                        <option value="">Pilih Barang</option>
                                        @foreach ($kategori as $k)
                                        <optgroup label="List Kategori {{ $k->nama_kategori }}">
                                            @foreach ($k->barang as $o)
                                            <option value="{{ $o->id }}" data-harga={{ $o->harga }}>{{ $o->nama_barang }}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <input type="number" name="harga[]" class="form-control harga" id="harga" required>
                                </div>
                            </div>
        
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <input type="number" name="jumlah[]" class="form-control jumlah" id="jumlah" required value=1>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <input type="text" class="form-control sub-total" readonly>
                                </div>
                            </div>
        
                            <div class="col-lg-1 my-auto">
                                <div class="form-group">
                                    <a href="#!" class="btn btn-success btn-sm add-button"> <i class="fa fa-plus"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-4">
                        Diskon (%) <i class="text-danger">*Diskon dihitung persen dari total biaya</i>
                        <div class="form-group">
                            <input type="number" name="diskon" class="form-control diskon" id="diskon" value="0" required>
                        </div>
                    </div>
                </div>
                <h4 class="total">Total : Rp. 0</h4>
                <input type="hidden" name="total" value="0">


                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

        </form>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js" integrity="sha512-USPCA7jmJHlCNRSFwUFq3lAm9SaOjwG8TaB8riqx3i/dAJqhaYilVnaf2eVUH5zjq89BU6YguUuAno+jpRvUqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function hitungTotal(){
        var total = 0;
        var totalTanpaDiskon = 0;
        var diskon = $("#diskon").val();
        if (!diskon) {
            diskon = 0;
        }
        $('.sub-total').each(function(i, e){
            var harga = $(e).parent().parent().parent().find('.harga').val();
            var jumlah = $(e).parent().parent().parent().find('.jumlah').val();
            var subTotal = harga * jumlah;
            $(e).val(subTotal);

            total += subTotal;
            totalTanpaDiskon += subTotal;

        });
        total = total - (total * diskon / 100);
        
        $('.total').text('Total : Rp. ' + numeral(total).format('0,0'));
        $('input[name=total]').val(totalTanpaDiskon);
    }

    function init(){
        $('.barang').change(function(){
            const hargaAwal = $(this).find(':selected').data('harga');
            const harga = $(this).parent().parent().parent().find('.harga').val(hargaAwal);
            const jumlah = $(this).parent().parent().parent().find('.jumlah').val();
            const subTotal = harga * jumlah;
            
            $(this).parent().parent().parent().find('.sub-total').val(numeral(subTotal).format('0,0')) 
            hitungTotal();
        });

        $('.jumlah').keyup(function(){
            const harga = $(this).parent().parent().parent().find('.harga').val();
            const jumlah = $(this).val();
            const subTotal = harga * jumlah;
            
            $(this).parent().parent().parent().find('.sub-total').val(numeral(subTotal).format('0,0')) 
            hitungTotal();
        });

        $('.jumlah').change(function(){
            const harga = $(this).parent().parent().parent().find('.harga').val();
            const jumlah = $(this).val();
            const subTotal = harga * jumlah;
            
            $(this).parent().parent().parent().find('.sub-total').val(numeral(subTotal).format('0,0')) 
            hitungTotal();
        });

        $('.harga').change(function(){
            const harga = $(this).val();
            const jumlah = $(this).parent().parent().parent().find('.jumlah').val();
            const subTotal = harga * jumlah;
            
            $(this).parent().parent().parent().find('.sub-total').val(numeral(subTotal).format('0,0')) 
            hitungTotal();
        });

        $('.harga').keyup(function(){
            const harga = $(this).val();
            const jumlah = $(this).parent().parent().parent().find('.jumlah').val();
            const subTotal = harga * jumlah;
            
            $(this).parent().parent().parent().find('.sub-total').val(numeral(subTotal).format('0,0')) 
            hitungTotal();
        });

        $('.diskon').change(function(){
            hitungTotal();
        });

        $('.diskon').keyup(function(){
            hitungTotal();
        });
    }
    
    $(document).ready(function(){
        var addButton = $('.add-button'); //Add button selector
        var wrapper = $('#dynamic-field'); //Input field wrapper
        var fieldHTML = `
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <select name="barang_id[]" class="form-control select2 barang" required>
                        <option value="">Pilih Barang</option>
                        @foreach ($kategori as $k)
                        <optgroup label="List Kategori {{ $k->nama_kategori }}">
                            @foreach ($k->barang as $o)
                            <option value="{{ $o->id }}" data-harga={{ $o->harga }}>{{ $o->nama_barang }}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="form-group">
                    <input type="number" name="harga[]" class="form-control harga" id="harga" required>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="form-group">
                    <input type="number" name="jumlah[]" class="form-control jumlah" id="jumlah" required value=1>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <input type="text" class="form-control sub-total" readonly>
                </div>
            </div>

            <div class="col-lg-1 my-auto">
                <div class="form-group">
                    <a href="javascript:void(0);" class="btn btn-danger btn-sm remove-button"> <i class="fa fa-trash"></i> </a>
                </div>
            </div>
        </div>
        `;

        init();
        
        //Once add button is clicked
        $(addButton).click(function(){
            $(wrapper).append(fieldHTML); //Add field html
            $('.select2').select2();


            $('.remove-button').click(function(){
                $(this).parent().parent().parent().remove();
                hitungTotal();
            });

            init();

        });

    });
</script>
@endpush