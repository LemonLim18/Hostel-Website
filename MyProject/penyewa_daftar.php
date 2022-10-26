<!--Memanggil fail header-->
<?PHP include('header.php'); ?>

<!--Menyediakan form bagi daftar pengguna baru-->
<br>
<div class="w3-row w3-margin-top">
  <div class="w3-third w3-container">
        <div class='w3-container w3-cyan w3-round-large'>
            <h4 class='w3-tulisan-p2 '>Registration for New Users</h4>
        </div>
        <div class='w3-container w3-card'>
            <h4>Please fill in all the information</h4>
            <form action='' method='POST'>
                <label>Name <span class="w3-badge w3-red w3-tiny">Required</span></label>
                <input class='w3-input w3-border w3-round-xxlarge w3-large' type='text' name='nama'>
            
                <label>I.C. no.<span class="w3-badge w3-red w3-tiny">Required</span></label>
                <input class='w3-input w3-border w3-round-xxlarge w3-large' type='text' name='nokp'>
            
                <label>Telephone no.<span class="w3-badge w3-red w3-tiny">Required</span></label>
                <input class='w3-input w3-border w3-round-xxlarge w3-large' type='text' name='notel'>
            
                <label>Password <span class="w3-badge w3-red w3-tiny">Required</span></label>
                <input class='w3-input w3-border w3-round-xxlarge w3-large' type='password' name='katalaluan'><br>
            <br>
                <input class="w3-button  w3-blue w3-round-xxlarge w3-margin-bottom" type='submit' value='Register'>
            </form>
        </div>  
  </div>
  <div class="w3-twothird w3-container">
        <p><img class='w3-image w3-card-4'src='https://cf.bstatic.com/images/hotel/max1280x900/223/223518724.jpg'></p>
  </div>

</div>

<?PHP include('footer.php'); ?>

<?PHP 
# menyemak kewujudan data POST
if (!empty($_POST))
{
    # memanggil fail connection
    include ('connection.php');

    # mengambil data POST
    $nama=$_POST['nama'];
    $notel=$_POST['notel'];
    $nokp=$_POST['nokp'];
    $katalaluan=$_POST['katalaluan'];

    # -- data validation --
    if(empty($nama) or empty($notel) or empty($nokp) or empty($katalaluan))
    {
        die("<script>alert('Please fill in the information required.');
        window.history.back();</script>");
    }
    # --- data validation
    if(strlen($nokp)!=12 or !is_numeric($nokp))
    {
	die("<script>alert('Error found in I.C. no.');
        window.history.back();</script>");
    }
 
    # arahan SQL untuk menyimpan data
    $arahan_sql_simpan="insert into penyewa
    (nama_penyewa,nokp_penyewa,notel_penyewa,katalaluan_penyewa)
    values
    ('$nama','$nokp','$notel','$katalaluan')";

    # melaksanakan proses menyimpan dalam syarat IF
    if(mysqli_query($condb,$arahan_sql_simpan))
    {
        # jika proses menyimpan berjaya. papar info dan buka laman penyewa_login.php
        echo "<script>alert('Registration Success');
        window.location.href='penyewa_login.php';</script>";
    }
    else
    {
        # jika proses menyimpan gagal, kembali ke laman sebelumnya
        echo "<script>alert('Registration Failed');
        window.history.back();</script>";
    }
}
?>