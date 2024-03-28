
<div id="pre_print">
  <style type="text/css">
    table {
      font-size: 12px;
    }
  </style>
  <img style="width:60px; height:60px;"  src="{{ asset('assets/img/logo/logo2.png') }}" alt="Matmix Logo" style="width: 50%;">
  <h1 style="text-align: center;width:50%;font-size:21px;" id="nama">
    AutoPhone
  </h1>
  
  <p align="center" style="font-size:11px;width:50%">
      WA: 081212339939 <br> Instagram: @autophone<br />
Jl. Ahmad Dahlan No.111, Kota Samarinda, Kalimantan Timur 75124 </p>
  <hr>
  <table  border="0" cellspacing="1" class="table-print">
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
      <td><strong>Keterangan</strong></td>
      <td>:</b></td>
      <td valign="top">Kredit</td>
    </tr>
    <tr>
      <td><strong>Kasir</strong></td>
      <td>:</b></td>
      <td valign="top">manager 1</td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top">&nbsp;</td>
    </tr>
  </table>
  
  <p><strong>LIST  PRODUCT </strong></p>
  <table class="table-list" border="0" cellspacing="1" cellpadding="1" >
    
   <!--  <tr>
      <td bgcolor="#F5F5F5">Product</td>
      <td  align="left" bgcolor="#F5F5F5">Price</td>
      
      <td align="left" bgcolor="#F5F5F5">Qty</td>
      <td  align="left" bgcolor="#F5F5F5">Total</td>
    </tr> -->
        
                <tr>
      <td  colspan="4">Name : SAMSUNG A12 4/128 WHITE</td>
    </tr>
    <tr>
      <td colspan="4">Harga Barang : Rp.2,499,000</td>
    </tr>
    <tr>
        <td colspan="4">Diskon : 0</td>
    </tr>
    <tr>
      <td colspan="4">Qty : 1</td>
  
    </tr>
    <tr>
      <td colspan="4">
        Total Harga Barang : Rp.2,499,000        </td>
      
    </tr>
    <tr>
      <td colspan="4"><hr></td>
    </tr>
          <tr>
      <td colspan="4">
        <br>
     
      </td>
    </tr>
    <tr>
      <td colspan="4" align="left">BIAYA PENGIRIMAN (Rp)  : 0</b></td>
  
    </tr>
    <tr>
      <td colspan="4" align="left">GRAND TOTAL (Rp)  : 2,499,000</b></td>
  
    </tr>
    <tr>
      <td colspan="4" align="left"> Uang Bayar (Rp)  : 0</b></td>
  
    </tr>
     <tr>
      <td colspan="4" align="left"> Sisa (Rp)  : 2,499,000</b></td>
     
    </tr>
  </table>
  
  <div class="ket" style="font-size: 11px;width:50%">
  <br>
    <center> <h2 align=\"center\" >* Terima Kasih *</h2></center>
    <p><center>Periksa &nbsp;kembali &nbsp;barang &nbsp;belanjaan<br />
Barang &nbsp;yang &nbsp;sudah &nbsp;di &nbsp;beli<br />
tidak &nbsp;dapat &nbsp;ditukar &nbsp;kembali</center></p>  
  </div>
  
  
  </div>
    
  {{-- <button onclick="BtPrint(document.getElementById('pre_print').innerText)" style="padding: 20px;font-size: 20px;">Cetak Lewat Android</button> --}}


<!-- Or use a CDN -->
<script src="https://cdn.rawgit.com/adriancooney/console.image/c9e6d4fd/console.image.min.js"></script>
  
  <script type="text/javascript">
  document.getElementById('nama').style.cssText = 'text-align: center;width:50%;font-size:21px;';
  // console.image("http://i.imgur.com/hv6pwkb.png");

      // function getBase64Image(img) {
      // let canvas = document.createElement("canvas");
      // canvas.width = img.width;
      // canvas.height = img.height;
      // let ctx = canvas.getContext("2d");
      // ctx.drawImage(img, 0, 0);
      // return dataURL = canvas.toDataURL("image/png");
      // }

      // let base64 = getBase64Image(document.getElementById("img"));
      function BtPrint(prn){
          var S = "#Intent;scheme=rawbt;";
          var P =  "package=ru.a402d.rawbtprinter;end;";
          var textEncoded = encodeURI(prn);
          window.location.href="intent:"+textEncoded+S+P;
          console.log(prn)
      }
  </script>