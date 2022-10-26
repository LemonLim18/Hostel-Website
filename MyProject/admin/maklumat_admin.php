<?PHP 
# Memanggil fail header_admin.php
include ('header_admin.php');
# Memanggil fail connection dari folder luaran
include ('../connection.php');
# ----------- bahagian 1 : memaparkan data dalam bentuk jadual
    # arahan SQL mencari kereta yang masih belum dijual
    $arahan_sql_cari="select* from admin";
    # melaksanakan arahan sql cari tersebut    
    $laksana_sql_cari=mysqli_query($condb,$arahan_sql_cari);
?>
<!-- menyediakan header bagi jadual -->
<!-- selepas header akan diselitkan dengan borang untuk mendaftar kereta baru -->
<div class='w3-container w3-pale-red'>
<h4><b>Admin Registration List</b></h4>
</div>
<div class='w3-container w3-card-2 w3-margin-bottom'>
<table id='saiz' border='1' class='w3-table-all w3-responsive w3-margin w3-margin-bottom'>
    <tr>
        <td>No :</td>
        <td>Admin Name :</td>
        <td>Admin I.C. No :</td>
        <td>Admin Password :</td>
        <td></td>
    </tr>
    <tr>
    <!-- menyediakan borang untuk mendaftar kereta baru -->
    <form action='' method='GET'>
        <td>$</td>
        <td><input class='w3-input w3-border w3-round-xxlarge w3-large' type='text' name='Name'></td>
        <td><input class='w3-input w3-border w3-round-xxlarge w3-large'type='text' name='I.C. No.'></td>
        <td><input class='w3-input w3-border w3-round-xxlarge w3-large'type='password' name='password '></td>
        <td><input class='w3-button w3-pale-yellow w3-round-xxlarge w3-margin-bottom' type='submit' value='Save'></td>
    </form>
    </tr>
    <?PHP 
	
	
	
    $bil=0;




    while ($rekod=mysqli_fetch_array($laksana_sql_cari))
    {
  
        echo "
        <tr>
            <td>".++$bil."</td>
            <td>".$rekod['nama_admin']."</td>
            <td>".$rekod['nokp_admin']."</td>
            <td>".$rekod['katalaluan_admin']."</td>
            <td>| <a href='hapus.php?jadual=admin&medan_kp=nokp_admin&kp=".$rekod['nokp_admin']."' onClick=\"return confirm('Are you dure you want to delete this data?')\" >Delete</a> |
                | <a href='kemaskini_admin.php?nama=".$rekod['nama_admin']."&nokp=".$rekod['nokp_admin']."&katalaluan=".$rekod['katalaluan_admin']."' onClick=\"return confirm('Are you sure you want to update this data?')\" >Update</a> |</td>
        </tr>";
    }
    ?>
</table>
</div>

</div>
</div>
<?PHP include('../footer.php'); ?>

<?PHP 

if(!empty($_GET))
{
    $nama=$_GET['nama'];
    $nokp=$_GET['nokp'];
    $katalaluan=$_GET['katalaluan'];
    
   
    if(empty($nama) or empty($nokp) or empty($katalaluan))
    {
        die("<script>alert('Please complete your information!');
        window.history.back();</script>");
    }

   
    if(strlen($nokp)!=12 or !is_numeric($nokp))
    {
        die("<script>alert('Error found at I.C. No.');
        window.history.back();</script>");
    }

    # Arahan untuk menyimpan data ke dalam jadual admin
    $arahan_sql_simpan="insert into admin
    (nama_admin,nokp_admin,katalaluan_admin)
    values
    ('$nama','$nokp','$katalaluan')";

    # melaksanakan proses menyimpan dalam syarat IF
    if(mysqli_query($condb,$arahan_sql_simpan))
    {
        # proses menyimpan data berjaya. papar mesej
        echo "<script>alert('Registration Success');
        window.location.href='maklumat_admin.php';
        </script>";
    }
    else
    {
        # proses menyimpan data gagal. papar mesej
        echo "<script>alert('Registration Failed');
        window.history.back();</script>";
    }
}
?>