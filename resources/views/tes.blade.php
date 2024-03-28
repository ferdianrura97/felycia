
<style type="text/css">
  table {
    font-size: 10px;
  }

  @media  print {

     button { display: none; }

  }
  
</style>
<!--<button onclick="window.print()" style="padding: 20px;font-size: 20px;margin: 10px;">Cetak Lewat PC/Laptop</button>-->
<!--<button onclick="BtPrint(document.getElementById('pre_print').innerText)" style="padding: 20px;font-size: 20px;margin: 10px;">Cetak Lewat Android</button>-->
<div id="pre_print">

<p align="center" style="font-size:11px;"> <img style="width:60px; height:60px;border-radius : 50%;"  src="{{ asset('assets/img/logo/logo2.png') }}" alt="Matmix Logo" style="width: 100%;"><br>AutoPhone <br> WA: 081212339939 <br> Instagram: @autophone
Jl. Ahmad Dahlan No.111, Kota Samarinda, Kalimantan Timur 75124</p>
<hr style="border: dotted black 1px;">
<table  border="0" cellspacing="1" style="width: 100%;">
  <tr>
    <td width="45%">No. Nota </b></td>
    <td width="5%">:</b></td>
    <td width="10%" valign="top"><strong>P000028</strong></td>
  </tr>
  <tr>
    <td>Tgl. Nota </b></td>
    <td>:</b></td>
    <td valign="top">2021-03-18</td>
  </tr>
  <tr>
    <td>Pelanggan</b></td>
    <td>:</b></td>
    <td valign="top">Tenda Rental</td>
  </tr>
  <tr>
    <td>Pemilik</b></td>
    <td>:</b></td>
    <td valign="top">Penjual Molen</td>
  </tr>
  <tr>
    <td>Alamat</b></td>
    <td>:</b></td>
    <td valign="top">Jl. Biawan</td>
  </tr>
  <tr>
    <td><strong>Metode Bayar</strong></td>
    <td>:</b></td>
    <td valign="top">Kredit</td>
  </tr>
    <tr>
    <td><strong>Keterangan</strong></td>
    <td>:</b></td>
    <td valign="top">Dp 150rb
Angsuran 258.730</td>
  </tr>
  <tr>
    <td><strong>Kasir</strong></td>
    <td>:</b></td>
    <td valign="top">manager 1</td>
  </tr>
  
</table>
<hr style="border: dotted black 1px;">
<strong>LIST PRODUCT </strong>
<table border="0" cellspacing="1" cellpadding="1" style="width: 100%;">
  
  <!-- <tr>
    <td width="25%">Hubla</td>
    <td width="5%">0</td>
    <td width="35%" valign="top">10000</td>
    <td width="35%" valign="top">10000</td>
  </tr> -->
  
<tr>
  <th>
    No
  </th>
  <th>
    Nama Barang
  </th>
  <th>
    Harga Barang
  </th>
  <th>
    Diskon (Rp.)
  </th>
  <th>
    Harga Setelah Di Diskon
  </th>
  <th>
    Qty
  </th>
  <th>
    Total (Rp)
  </th>
</tr>

    
<tr>
  <td align="center"> 1 </td>
  <td align="center"> SAMSUNG A12 4/128 WHITE </td>
  <td align="center"> 2,499,000 </td>
  <td align="center"> 0 </td>
  <td align="center"> Rp. 2,499,000 </td>
  <td align="center"> 1 </td>
  <td align="center"> 2,499,000 </td>
</tr>
  
  <tr>
    <th colspan="7">
      <hr style="border: dotted black 1px;">
    </th>
  </tr>

  <tr>
    <th align="right" colspan="6">
      BIAYA PENGIRIMAN (Rp) :
    </th>
    <th>
      0    </th>
  </tr>

  <tr>
    <th align="right" colspan="6">
      GRAND TOTAL (Rp) :
    </th>
    <th>
      2,499,000    </th>
  </tr>

  <tr>
    <th align="right" colspan="6">
      Uang Bayar (Rp) :
    </th>
    <th>
      0    </th>
  </tr>
  
  <tr>
    <th align="right" colspan="6">
      Sisa (Rp)  :
    </th>
    <th>
      2,499,000    </th>
  </tr>

</table>
<hr style="border: dotted black 1px;">
<div class="ket" style="font-size: 11px;">
  <center> <h2>* Terima Kasih *</h2></center>
  <p><center>Periksa &nbsp;kembali &nbsp;barang &nbsp;belanjaan<br />
Barang &nbsp;yang &nbsp;sudah &nbsp;di &nbsp;beli<br />
tidak &nbsp;dapat &nbsp;ditukar &nbsp;kembali</center></p>  
</div>
<hr style="border: dotted black 1px;">


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
