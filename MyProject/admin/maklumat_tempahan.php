<?PHP
# Memanggil fail header_admin.php
include ('header_admin.php');
# Memanggil fail connection dari folder luaran
include ('../connection.php');

# arahan SQL mencari maklumat tempahan homestay
$arahan_sql_cari="SELECT* FROM tempahan,penyewa,jenis_rumah,homestay
WHERE
tempahan.nokp_penyewa=penyewa.nokp_penyewa AND
tempahan.no_rumah=homestay.no_rumah AND
homestay.id_jenis=jenis_rumah.id_jenis";

# arahan SQL mencari tempahan homestay
$laksana_sql_cari=mysqli_query($condb,$arahan_sql_cari);
?>
<!-- menyediakan header bagi jadual -->
<div class='w3-container w3-pale-red'>
<h4><b>Booking Info</b></h4>
</div>
<div class='w3-container w3-card-2 w3-margin-bottom '>
<table id='saiz' border='1' class='w3-table-all w3-responsive w3-margin w3-margin-bottom'>
    <tr>
        <td>No :</td>
        <td>Rental name :</td>
        <td>Rental I.C. No :</td>
        <td>Rental Telephone No :</td>
        <td>Home No :</td>
        <td>Address :</td>
        <td>Home Type :</td>
        <td>Price :</td>
        <td>Check-In Date :</td>
        <td>Check-Out Date :</td>
        <td>Payment Amount :</td>
    </tr>
    <?PHP 
    $bil=0;
    # pemboleh ubah $rekod mengambail semua data yang ditemui oleh $laksana_sql_cari
    while ($rekod=mysqli_fetch_array($laksana_sql_cari))
    {
        # sistem akan memaparkan data $rekod baris demi baris sehingga habis
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
    ?>
</table>
</div>
</div>
</div>
<?PHP include('../footer.php'); ?>