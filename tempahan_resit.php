<?PHP 
# memanggil fail header.php
include('header.php'); 

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
?>

<div class="w3-row">
  <div class="w3-quarter w3-container ">
  </div>
  <div class="w3-half w3-container w3-margin-top w3-card-2 ">
    <div class='w3-margin w3-animate-opacity'>
        <!-- Memaparkan semua maklumat tempahan -->
		
        <h4><b>PAYMENT SUCCESS</b></h4> 
		<img class='w3-image' src='https://www.clipartkey.com/mpngs/m/283-2836740_success-icon-transparent-green-success-png-icon.png' width="35%"><br>
		<br>
        <label><b>Home No : </b></label><?PHP echo $data_get['no_rumah']; ?> <br>
        <label><b>Address : </b></label><?PHP echo $data_get['alamat']; ?> <br>
        <label><b>Home Type : </b></label><?PHP echo $data_get['jenis']; ?> <br>
        <label><b>Check-in Date : </b></label><?PHP echo $data_get['masuk']; ?> <br>
        <label><b>Check-out Date : </b></label><?PHP echo $data_get['keluar']; ?> <br>
        <label><b>Number of Days : </b></label><?PHP echo $data_get['jumlah_hari']; ?> <br>
        <label><b>Price per Night : RM</b></label><?PHP echo $data_get['harga']; ?> <br>
        <label><b>Amount Payment : RM</b></label><?PHP echo $data_get['harga']*$data_get['jumlah_hari']; ?> <br>
        <hr>
        <a target='_BLANK' class='w3-button w3-blue w3-round-xxxlarge w3-margin-bottom' href='resit_cetak.php?<?PHP echo http_build_query($data_get); ?>'>Print Booking Receipt</a>
        <script>
          function myFunction()
          {
            window.print();
          }
        </script><br>
		<br>
		<br>
		<br>
		
        <button onclick='myFunction()'>Print</button>
    </div>
   </div>

  <div class="w3-quarter w3-container">
  </div>
</div>
