<?PHP
# Memanggil fail header_admin.php
include ('header_admin.php');
# Memanggil fail connection dari folder luaran
include ('../connection.php');

# arahan SQL mencari penyewa berdaftar
$arahan_sql_cari="select* from penyewa";
# Melaksanakan arahan SQL mencari penyewa berdaftar
$laksana_sql_cari=mysqli_query($condb,$arahan_sql_cari);
?>
<!-- menyediakan header bagi jadual -->
<div class='w3-container w3-pale-red'>
<h4><b>Rental Registration List</b></h4>
</div>
<div class='w3-container w3-card-2 w3-margin-bottom w3-sand'>
<table id='saiz' border='1' class='w3-table-all w3-responsive w3-margin w3-margin-bottom'>
    <tr>
        <td>No :</td>
        <td>Rental Name :</td>
        <td>Rental I.C. Card : :</td>
        <td>Rental Telephone No :</td>
        <td>Rental Password :</td>
        <td></td>
    </tr>
    <?PHP  
    $bil=0;
   
    while ($rekod=mysqli_fetch_array($laksana_sql_cari))
    {
      
        echo "
        <tr>
            <td>".++$bil."</td>
            <td>".$rekod['nama_penyewa']."</td>
            <td>".$rekod['nokp_penyewa']."</td>
            <td>".$rekod['notel_penyewa']."</td>
            <td>".$rekod['katalaluan_penyewa']."</td>
            <td><a class='w3-button w3-pale-red w3-round-xxlarge w3-margin-bottom' href='hapus.php?jadual=penyewa&medan_kp=nokp_penyewa&kp=".$rekod['nokp_penyewa']."' 
            onClick=\"return confirm('Are you sure you want to delete this data?')\" >Delete</a></td>
        </tr>";
    }
    ?>
</table>
</div>

</div>
</div>
<?PHP include('../footer.php'); ?>