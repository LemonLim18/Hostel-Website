<?PHP
# Memanggil fail header_admin.php
include ('header_admin.php');
# Memanggil fail connection dari folder luaran
include ('../connection.php');

# menyemak kewujudan data POST
if(!empty($_POST))
{
    $tambahan="AND tarikh_masuk like '%".$_POST['bulan']."%'";
}
else
{
    $tambahan=" ";
}

# arahan SQL untuk mencari data penjualan mengikut bulan
$arahan_sql_cari="SELECT*
FROM tempahan,penyewa,jenis_rumah,homestay
WHERE
tempahan.nokp_penyewa=penyewa.nokp_penyewa AND
tempahan.no_rumah=homestay.no_rumah AND
homestay.id_jenis=jenis_rumah.id_jenis $tambahan";

# melaksanakan arahan SQL mencari data penjualan
$laksana_sql_cari=mysqli_query($condb,$arahan_sql_cari);
?>

<!-- Menyediakan form untuk memilih bulan-->
<div class='w3-container w3-pale-blue'>
<h5>Booking List</h5>
</div>
<div class='w3-container w3-card-2 w3-margin-bottom'>
<form class='w3-form w3-margin' action='' method='POST'>
<table class='w3-table-all w3-centered'>
                <tr>
                    <td>
                    <select class='w3-select w3-border' name='bulan' required>
                        <option value selected disabled>Select Month</option>
                        <option value='-01-'>January</option>
                        <option value='-02-'>February</option>
                        <option value='-03-'>March</option>
                        <option value='-04-'>April</option>
                        <option value='-05-'>May</option>
                        <option value='-06-'>June</option>
                        <option value='-07-'>July</option>
                        <option value='-08-'>Auguust</option>
                        <option value='-09-'>September</option>
                        <option value='-10-'>October</option>
                        <option value='-11-'>November</option>
                        <option value='-12-'>December</option>
                    </select>
                    </td>
                    <td>
                    <input class='w3-button w3-block w3-blue' type='submit' value='Find'>
                    </td>
                </tr>
            </table>
            </form>

<!-- menyediakan header untuk jadual yang hendak memaparkan data yang dicari -->
    <?PHP 
    $bil=0;
    $jum_pendapatan=0;
    if(mysqli_num_rows($laksana_sql_cari)>=1)
    {
        echo "
        <table id='saiz' border='1' class='w3-table-all w3-responsive w3-margin w3-margin-bottom'>
            <tr>
                <td>No</td>
                <td>Rental Name</td>
                <td>Rental I.C No</td>
                <td>Rental Tel No.</td>
                <td>Home No.</td>
                <td>Address</td>
                <td>Type</td>
                <td>Price</td>
                <td>Check-In Date</td>
                <td>Check-Out Date</td>
                <td>Payment Amount</td>
            </tr>";
    
    # pembolehubah $rekod mengambil data yang dicari
    while ($rekod=mysqli_fetch_array($laksana_sql_cari))
    {
        $jum_pendapatan=$jum_pendapatan+$rekod['jumlah_bayaran'];
        echo "
        <tr>
        <td>".++$bil."</td>
        <td>".$rekod['nama_penyewa']."</td>
        <td>".$rekod['nokp_penyewa']."</td>
        <td>".$rekod['notel_penyewa']."</td>
        <td>".$rekod['no_rumah']."</td>
        <td>".$rekod['alamat']."</td>
        <td>".$rekod['jenis']."</td>
        <td>".$rekod['harga']."</td>
        <td>".$rekod['tarikh_masuk']."</td>
        <td>".$rekod['tarikh_keluar']."</td>
        <td>".$rekod['jumlah_bayaran']."</td>
        </tr>";
    }
    echo"</table>";
    echo "<h4><b>Profit Amount : RM ".$jum_pendapatan."</b></h4>";
    }
    else
    {
        echo "Sorry.No Vacancy for the selected month";
    }
    ?>
    </div>

</div>
</div>
    <?PHP include('../footer.php'); ?>
