<?PHP 
# memulakan fungsi session
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
		<title>YULI'S HOMESTAY</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
	<div id="main">
		<div class="w3-pale-blue">	
		<button class="w3-button w3-black w3-xlarge" onclick="w3_open()" id="openNav">&#9776;</button>
		<div class="w3-container">
					
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
			<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
		
		<style>
			.w3-lobster {
							font-family: "Lobster", serif;
						}
		</style>
		<body>

		<div class="w3-container w3-lobster">
				<p class="w3-xxxlarge">   YULI'S HOMESTAY</p>
				<p class="w3-xxlarge">   Come and Enjoy Your Holidays Right Here!!</p>
		</div>
		
		</div>
		</div>


		<div class="w3-container">
				
				<div id="main">
				<div class="w3-container w3-center w3-animate-fading"> 
				<h2>Welcome to Yuli's Homestay Website</h2>
					<img src="https://media.expedia.com/hotels/36000000/35180000/35171800/35171734/0d94ff57_z.jpg" class="w3-round-xxlarge" alt="LMN" style="width:30%">
					<img src="https://cf.bstatic.com/images/hotel/max1024x768/758/75837284.jpg" class="w3-round-xxlarge" alt="LMN" style="width:30%">
					<img src="https://cf.bstatic.com/images/hotel/max1024x768/289/28965894.jpg" class="w3-round-xxlarge" alt="LMN" style="width:30%">
				</div>
				</div> 
	
		</div>

	</div>
	<br>
	<br>
	<br>

<div class='w3-container w3-light-blue'>
    <h4 class='w3-center  '><b>Admin Page</b></h4>
</div>
<div class='w3-container w3-sand'>
<div class='w3-row w3-margin '>
    <div class='w3-third w3-container'></div>
    <div class='w3-third w3-container'>
        <div class='w3-container w3-pale-blue'>
            <h4>Please Login</h4>
        </div>
        <div class='w3-container w3-card-2 w3-light-gray'>
            <p class='w3-margin-top w3-medium'>Please Key In Your I.C. No and Password</p>
            <form action='' method='POST'>
            <label >I.C. No</label>
            <input class='w3-input w3-border ' type='text' name='nokp'>
            <label>Password</label>
            <input class='w3-input w3-border ' type='password' name='katalaluan'>
            <input class='w3-button w3-blue w3-round-xlarge w3-margin-top w3-margin-bottom' type='submit' value='LOGIN'>
            </form>
        </div>
    </div>
    <div class='w3-third w3-container'></div>
</div>
</div>
</div>
<?PHP include('../footer.php'); ?>

<?PHP 
# menyemak kewujudan data POST
if(!empty($_POST))
{
    # memanggil fail connection.php dari folde luaran
    include ('../connection.php');

    # mengambil data POST
    $nokp=$_POST['nokp'];
    $katalaluan=$_POST['katalaluan'];

    # menyemak data POST
    if(empty($nokp) or empty($katalaluan))
    {
        die("<script>alert('Please complete your information'); window.history.back();</script>");
    }

    # Arahan untuk memilih rekod di pangkalan data yang sepadan dengan data POST
    $sql="select* from admin where nokp_admin='$nokp' and katalaluan_admin='$katalaluan' limit 1";
    # melaksanakan arahan memilih rekod
    $laksana_query=mysqli_query($condb,$sql);
    # jika bilangan rekod yang ditemui == 1
    if(mysqli_num_rows($laksana_query)==1)
    {
        # login berjaya. ambil data dari rekod yang ditemui
        $rekod=mysqli_fetch_array($laksana_query);
        # umpukan kepada pembolehubah session
        $_SESSION['nokp_admin']=$rekod['nokp_admin'];
        $_SESSION['nama_admin']=$rekod['nama_admin'];
        # buka fail laman_utama.php
        header("location:laman_utama.php");
    }
    else
    {
        # login gagal. kembali ke page sebelumnya
        echo "<script>alert('Register failed'); window.history.back();</script>";
    }
}
?>