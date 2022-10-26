<?PHP 
# memanggil fail header.php dan fail connection.php
include('header.php'); 
include('connection.php');
# arahan untuk mendapatkan maklumat tempahan lalu pengguna yang telah login
$arahan_sql_mencari="select* from tempahan, homestay, penyewa, jenis_rumah
where 
homestay.id_jenis=jenis_rumah.id_jenis and
tempahan.nokp_penyewa=penyewa.nokp_penyewa AND
tempahan.no_rumah=homestay.no_rumah AND
tempahan.nokp_penyewa='".$_SESSION['nokp_penyewa']."'";
# melaksanakan arahan untuk mencari maklumat tempahan lalu
$laksana_arahan_sql=mysqli_query($condb,$arahan_sql_mencari);
?>

<div class='w3-row w3-margin'>
    <div class='w3-quarter w3-container w3-margin-bottom'>
        <div class='w3-container w3-card-2 w3-light-blue '>
            <h4 class='w3-tulisan-p2'>User Information</h4>
        </div>
        <div class='w3-container w3-card-2 w3-light-gray '>  
            <p class='w3-margin-top'><b>Name :</b> <?PHP echo $_SESSION['nama_penyewa']; ?></p>
            <p><b>I.C. no. :</b> <?PHP echo $_SESSION['nokp_penyewa']; ?></p>
            <p><b>Telephone no. :</b> <?PHP echo $_SESSION['notel_penyewa']; ?></p>
        </div>
    </div>
    <div class='w3-threequarter w3-container w3-margin-bottom'>    
        <div class='w3-container w3-card-2 w3-light-blue'>
            <h4 class='w3-tulisan-p2 '>	Past Booking Lists</h4>
        </div>
        <div class='w3-container w3-card-2 w3-light-gray w3-center'>
            <?PHP    
            # jika terdapat 1 row atau lebih maklumat tempahan yang dicari,         
            if(mysqli_num_rows($laksana_arahan_sql)>0)
            {
                echo"<table class='w3-table-all w3-margin-top w3-margin-bottom w3-pale-blue'>
                <tr>
                    <td>No</td>
                    <td>Address</td>
                    <td>Price per night</td>
                    <td>Check-in date</td>
                    <td>Check-out date</td>
                    <td>Total Amount</td>
                </tr>";
                $bil=0;
                # mengambil dan memaparkan maklumat tempahan yang dicari baris demi baris
                while ($rekod=mysqli_fetch_array($laksana_arahan_sql))
                {
                    echo"<tr>
                            <td>".++$bil."</td>
                            <td>".$rekod['no_rumah']." ".$rekod['alamat']."</td>
                            <td>".$rekod['harga']."</td>
                            <td>".$rekod['tarikh_masuk']."</td>
                            <td>".$rekod['tarikh_keluar']."</td>
                            <td>".$rekod['jumlah_bayaran']."</td>
                        </tr>";                       
                }      
            echo"</table>";   
            }
            ?>
        </div>    
    </div>
</div>
<?PHP include('footer.php'); ?>