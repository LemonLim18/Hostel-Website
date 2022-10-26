<!--Memanggil fail header-->
<?PHP include('header.php'); ?>

<!--Menyediakan form bagi daftar masuk pengguna-->
<div class="w3-row w3-margin-top">
  <div class="w3-third w3-container">
        <div class='w3-container w3-cyan w3-round-large'>
            <h4 class='w3-tulisan-p2 '>Login</h4>
        </div>
        <div class='w3-container w3-card'>
            <h4>Please fill in all the following information</h4>
            <form action='' method='POST'>
                <label>I.C. no. <span class="w3-badge w3-red w3-tiny">Required</span></label>
                <input class='w3-input w3-border w3-round-xxlarge w3-large' type='text' name='nokp'>
            
                <label>Password <span class="w3-badge w3-red w3-tiny">Required</span></label>
                <input class='w3-input w3-border w3-round-xxlarge w3-large' type='password' name='katalaluan'><br>
            
                <input class="w3-button w3-blue w3-round-xxlarge w3-margin-bottom" type='submit' value='Login'>
            </form>
        </div>  
  </div>
  <div class="w3-twothird w3-container">
        <p><img class='w3-image w3-round-large w3-card-4' src='https://cf.bstatic.com/images/hotel/max1024x768/974/97419633.jpg'></p>
  </div>

</div>

<?PHP include('footer.php'); ?>

<?PHP 
# menyemak kewujudan data POST
if (!empty($_POST))
{
    # memanggil fail connection.php
    include ('connection.php');

    # mengambil data POST
    $nokp=$_POST['nokp'];
    $katalaluan=$_POST['katalaluan'];

    # arahan SQL untuk mencari data dari jadual penyewa
    $arahan_sql_cari="select* from penyewa 
    where nokp_penyewa='$nokp' and katalaluan_penyewa='$katalaluan'
    limit 1 ";

    # melaksanakan proses carian 
    $laksana_arahan=mysqli_query($condb,$arahan_sql_cari);

    # jika terdapat 1 baris rekod di temui
    if(mysqli_num_rows($laksana_arahan)==1)
    {
        # login berjaya

        # pembolehubah $rekod mengambil data yang di temui semasa proses mencari
        $rekod=mysqli_fetch_array($laksana_arahan);

        #mengumpukkan kepada pembolehubah session
        $_SESSION['nama_penyewa']=$rekod['nama_penyewa'];
        $_SESSION['nokp_penyewa']=$rekod['nokp_penyewa'];
        $_SESSION['notel_penyewa']=$rekod['notel_penyewa'];
        
        # mengarahkan fail index.php dibuka
        echo "<script>window.location.href='index.php';</script>";
    }
    else
    {
        # login gagal. kembali ke laman sebelumnya
        echo "<script>alert('login failed');
        window.history.back();</script>";
    }
}
?>