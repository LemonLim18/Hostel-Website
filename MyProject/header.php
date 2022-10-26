<?PHP

session_start();
date_default_timezone_set("Asia/Kuala_Lumpur"); 

$tarikh_masuk=date("Y-m-d"); 
$tarikh_keluar=date('Y-m-d', strtotime(' +1 day'));


$namafail = basename($_SERVER['PHP_SELF']);
if(($namafail !='index.php'  and $namafail !='tempahan_bayar.php' and $namafail !='tempahan_senarai.php' and $namafail !='penyewa_daftar.php' and $namafail !='penyewa_login.php')  and empty($_SESSION['nama_penyewa']))
{
    die("<script>alert('Please login first');window.location.href='logout.php'</script>");
}
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
	
		<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar"> 
		<button class="w3-bar-item w3-button w3-large"
		onclick="w3_close()">Close &times;</button>
				<a class=echo"<div class='w3-bar w3-aqua w3-mobile'>                   
				<a href='index.php' class='w3-bar-item w3-pale-red w3-button  w3-mobile'><li class="w3-large"><i class="fa fa-home"></i> Home</li></a>  
				
				<a class=echo"<div class='w3-dropdown-content w3-bar-block w3-border '>     <a href='penyewa_daftar.php' class='w3-bar-item w3-pale-blue w3-button'><li class="w3-large"><i class="fa fa-male"></i> Register</li></a>
				<a class=echo"<div class='w3-dropdown-content w3-bar-block w3-border '>     <a href='penyewa_login.php' class='w3-bar-item w3-pale-green w3-button'><li class="w3-large"><i class="fa fa-refresh"></i> Login</li></a>
				<a class=echo"<div class='w3-dropdown-content w3-bar-block w3-border '>     <a href='logout.php' class='w3-bar-item w3-aqua w3-pale-yellow'><li class="w3-large"><i class="fa fa-close"></i> Log Out</li></a>   
				<a class=echo"<div class='w3-dropdown-content w3-bar-block w3-border '>     
		
		<a href=<?PHP 

	if(empty($_SESSION["nama_penyewa"]))
		{
			echo"<div class='w3-dropdown-hover '>
			
			<div class='w3-dropdown-content w3-bar-block w3-border '>
			<a href='penyewa_daftar.php' class='w3-bar-item w3-aqua w3-button'>Registration</a>
			</div>
			</div>";
		}
	else
		{
			echo"
			<a href='logout.php' class='w3-bar-item w3-button w3-right w3-margin-right w3-cyan w3-mobile'>Log out</a>
			<a href='penyewa_senarai_tempahan.php' class='w3-bar-item w3-button w3-right w3-margin-right   w3-mobile'>".$_SESSION['nama_penyewa']."</a>
			";
		}
			echo "</div>";
			?> </a>


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
					<img src="https://media.expedia.com/hotels/36000000/35180000/35171800/35171734/0d94ff57_z.jpg" class="w3-round-xxlarge" alt="Norway" style="width:30%">
					<img src="https://cf.bstatic.com/images/hotel/max1024x768/758/75837284.jpg" class="w3-round-xxlarge" alt="Norway" style="width:30%">
					<img src="https://cf.bstatic.com/images/hotel/max1024x768/289/28965894.jpg" class="w3-round-xxlarge" alt="Norway" style="width:30%">
				</div>
				</div> 
	
		</div>

	</div>

<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>

</html>