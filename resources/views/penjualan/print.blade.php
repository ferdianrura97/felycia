
<style type="text/css">
  table {
    font-size: 10px;
  }

  @media print {

     button { display: none; }
     @page {
      margin: 0;
    }

  }
  
</style>
<!--<button onclick="window.print()" style="padding: 20px;font-size: 20px;margin: 10px;">Cetak Lewat PC/Laptop</button>-->
<!--<button onclick="BtPrint(document.getElementById('pre_print').innerText)" style="padding: 20px;font-size: 20px;margin: 10px;">Cetak Lewat Android</button>-->
<div id="pre_print">

<p align="center" style="font-size:11px;"> <img style="width:60px; height:60px;border-radius : 50%;"  src="{{ asset('assets/img/logo') .'/' . \Helper::getLogo()  }}" alt="Matmix Logo" style="width: 100%;"><br>{{$profil->nama}} <br> {{$profil->no_hp}} <br> {{$profil->alamat}}</p>
<hr style="border: dotted black 1px;">
<table  border="0" cellspacing="1" style="width: 100%;">
  <tr>
    <td width="45%">No. Nota </b></td>
    <td width="5%">:</b></td>
    <td width="10%" valign="top"><strong><?php echo $data->nomor_penjualan; ?></strong></td>
  </tr>
  <tr>
    <td>Tgl. Periksa </b></td>
    <td>:</b></td>
    <td valign="top"><?php echo $data->tgl_penjualan; ?></td>
  </tr>
  <tr>
    <td>Pelanggan</b></td>
    <td>:</b></td>
    <td valign="top"><?php echo $data->pelanggan->nama_pelanggan; ?></td>
  </tr>
  <tr>
    <td>Alamat</b></td>
    <td>:</b></td>
    <td valign="top"><?php echo $data->pelanggan->alamat; ?></td>
  </tr>
    <tr>
    <td><strong>Penanganan</strong></td>
    <td>:</b></td>
    <td valign="top"><?php echo $data->penanganan; ?></td>
  </tr>
  
</table>
<hr style="border: dotted black 1px;">
<strong>DAFTAR Barang </strong>
<table border="0" cellspacing="1" cellpadding="1" style="width: 100%;">
  
  <!-- <tr>
    <td width="25%">Hubla</td>
    <td width="5%">0</td>
    <td width="35%" valign="top">10000</td>
    <td width="35%" valign="top">10000</td>
  </tr> -->

  @foreach($data->barangRm as $dd)
  <tr>
    
    <td colspan="4">
      <?php echo $dd->barang->nama_barang; ?>
    </td>
  </tr>
  <tr>
    <td colspan="4">Rp. {{ number_format($dd->harga) }} * {{ $dd->jumlah }}  : Rp. {{ number_format($dd->jumlah * $dd->harga) }}</td>
  </tr>
  <tr>
    <td colspan="4">
      <hr style="border: dotted #B3B3B3 1px;">
    </td>
  </tr>

  @endforeach
  <tr>
    <td colspan="4">
      <hr style="border: dotted black 1px;">
    </td>
  </tr>
  
  <tr>
    <td colspan="4" align="left">TOTAL AKHIR (Rp)  : <b>Rp. {{ number_format($data->total_dengan_diskon) }}</b></td>
    
  </tr>
</table>

<div class="ket" style="font-size: 11px;">
  <center> <h2>* Terima Kasih *</h2></center>
  <p><center>{!!nl2br(str_replace(" ", " &nbsp;", $profil->keterangan))!!}</center></p>  
</div>


</div>

<!--<button onclick="window.print()" style="padding: 20px;font-size: 20px;margin: 10px;">Cetak Lewat PC/Laptop</button>-->
<!--<button onclick="BtPrint(document.getElementById('pre_print').innerText)" style="padding: 20px;font-size: 20px;margin: 10px;">Cetak Lewat Android</button>-->

<script type="text/javascript">
    function BtPrint(prn){
        var S = "#Intent;scheme=rawbt;";
        var P =  "package=ru.a402d.rawbtprinter;end;";
        var textEncoded = encodeURI(prn);
        window.location.href="intent:"+textEncoded+S+P;
    }
    
    window.onload = function() {window.print();}
</script>
