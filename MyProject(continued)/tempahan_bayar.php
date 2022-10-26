<?PHP 
# memanggil fail header.php
include('header.php'); 
# nilai session['nokp_penyewa'] empty atau tidak
if(empty($_SESSION['nokp_penyewa']))
{
    # jika nilai session['nokp_penyewa'] empty. bermaksud penyewa belum login
    die("<script>alert('Please login first before you continue registation process');
    window.location.href='penyewa_login.php';</script>");
}
# menyemak kewujudan data GET
if(!empty($_GET))
{
    # Mengumpukan data GET kepada tatasusunan
    $data_get= array(
        'no_rumah'=>$_GET['no_rumah'],
        'alamat'=>$_GET['alamat'],
        'harga'=>$_GET['harga'],
        'jenis'=>$_GET['jenis'],
        'gambar'=>$_GET['gambar'],
        'masuk'=>$_GET['masuk'],
        'keluar'=>$_GET['keluar'],
        'jumlah_hari'=>$_GET['jumlah_hari']
    );
}
?><style>
body {
  background-image: url("https://www.itdc.co.id/file/portofolio/20200825162617aVw3vm8bqzkKh17fj0LZWMFT4uzKJ0.jpg");
}
</style>
<body>
<br>
<div class="w3-row">
  <div class="w3-quarter w3-container ">
    
  </div>
  <div class="w3-half w3-container w3-margin-top w3-card-2 w3-white ">
  <div class='w3-margin w3-animate-opacity'>
  <!-- Memaparkan semua maklumat tempahan -->
<h1><b>PAYMENT</b></h1>
<label><b>Home No. : </b></label><?PHP echo $data_get['no_rumah']; ?> <br>
<label><b>Address : </b></label><?PHP echo $data_get['alamat']; ?> <br>
<label><b>Home Type : </b></label><?PHP echo $data_get['jenis']; ?> <br>
<label><b>Check-in Date : </b></label><?PHP echo $data_get['masuk']; ?> <br>
<label><b>Check-out Date : </b></label><?PHP echo $data_get['keluar']; ?> <br>
<label><b>Number of Days : </b></label><?PHP echo $data_get['jumlah_hari']; ?> <br>
<label><b>Price per night: RM</b></label><?PHP echo $data_get['harga']; ?> <br>
<label><b>Amount payment : RM</b></label><?PHP echo $data_get['harga']*$data_get['jumlah_hari']; ?> <br>
<!-- borang untuk Pembayaran (tidak wajib) -->
<br><h4>Payment via credit card :</h4>
    <img class='w3-image' src="https://www.webspert.com.my/img/screens/visa_master_alipay.png" width="500">

	
<hr>
<form  action='tempahan_proses.php?<?PHP echo http_build_query($data_get); ?>' method='POST'>
<table class='w3-table w3-striped'>
<tr>
    <td colspan='3'>
        <input class='w3-input w3-border w3-round-xxlarge' type='text' name='name_on_card' placeholder = 'Name on The Card'>
    </td>
</tr>
<tr>
    <td colspan='3'>
        <input class='w3-input w3-border w3-round-xxlarge' type='text' name='card_no' placeholder = 'Card Front Number' maxlength='12'>
    </td>
</tr>
<tr>
    <td>
        <input class='w3-input w3-border w3-round-xxlarge' size='3' maxlength='2' type='text' name='mm' placeholder = 'MM' >            
    </td>
    <td>
        <input class='w3-input w3-border w3-round-xxlarge' size='3' maxlength='4' type='text' name='mm' placeholder = 'YYYY'>
    </td>
    <td>
        <input class='w3-input w3-border w3-round-xxlarge' size='3' maxlength='3' type='text' name='cc' placeholder = 'CCV'>       
    </td>
</tr>
<tr>
    <td colspan='3'>
        <input class='w3-input w3-border w3-round-xxlarge' type='text' name='alamat' placeholder = 'Address'> 
    </td>
</tr>
<tr>
    <td colspan='3'>
        <input class='w3-input w3-border w3-round-xxlarge' maxlength='5' type='text' name='poskod' placeholder = 'Postcode'>
    </td>
</tr>
</table>
<hr>
<input class="w3-button w3-round-xxlarge w3-blue w3-bar"  type='submit' onclick="return confirm('Are you sure you want to pay ?')" value='Pay'><br>
<br>
<br>
<br>
<br><h5>Yuli's Homestay---Your Very Own Trustworthy Holiday Homestay.<br>Come & Visit Us Right Now</h5>
</form>
</div>
  </div>
  <div class="w3-quarter w3-container">
   
  </div>
</div>
</body>