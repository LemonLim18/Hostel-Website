<!-- Memanggil fail header_admin.php -->
<?PHP include ('header_admin.php'); ?>
<!-- menyediakan borang untuk mengemaskini data admin-->
<div class='w3-container w3-pale-blue'>
<h5>Admin Data Update</h5>
</div>
<div class='w3-container w3-card-2 w3-margin-bottom'>
<form class='w3-margin' action='' method='POST'>
<label><b>Admin Name</b><span class="w3-badge w3-light-blue w3-tiny">Required</span></label>
<input class='w3-input w3-border w3-round-xxlarge w3-large' type='text' name='nama_baru' value='<?PHP echo $_GET['nama']; ?>'><br>
<label><b>Admin Identity Card No.</b><span class="w3-badge w3-light-blue w3-tiny">Required</span></label>
<input class='w3-input w3-border w3-round-xxlarge w3-large' type='text' name='nokp_baru' value='<?PHP echo $_GET['nokp']; ?>'><br>
<label><b>Admin Password</b><span class="w3-badge w3-red w3-tiny">Required</span></label>
<input class='w3-input w3-border w3-round-xxlarge w3-large' type='password' name='katalaluan_baru' value='<?PHP echo $_GET['katalaluan']; ?>'><br>
<input class='w3-button w3-blue w3-round-xxlarge w3-margin-bottom' type='submit' value='Update'>
</form>
</div>

</div>
</div>
<?PHP include('../footer.php'); ?>
<?PHP 
# menyemak kewujudan data POST
if(!empty($_POST))
{
 
 
    include ('../connection.php');
  
    $nama_baru=$_POST['nama_baru'];
    $nokp_baru=$_POST['nokp_baru'];
    $katalaluan_baru=$_POST['katalaluan_baru'];
    $nokp_lama=$_GET['nokp'];



    $arahan_sql_update="update admin set 
    nama_admin='$nama_baru',
    nokp_admin='$nokp_baru',
    katalaluan_admin='$katalaluan_baru'
    where
    nokp_admin='$nokp_lama'";





    if(mysqli_query($condb,$arahan_sql_update))
    {
     
        echo "<script>alert('Update Success');
        window.location.href='maklumat_admin.php';
        </script>";
    }
    else
    {
     
        echo "<script>alert('Update Failed');
        window.history.back();</script>";
    }
}

?>