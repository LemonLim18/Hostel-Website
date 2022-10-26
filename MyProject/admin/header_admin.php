<?PHP
# Memulakan fungsi session
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur");
# Menyemak nama fail semasa
$namafail = basename($_SERVER['PHP_SELF']);
# Menguji adakah fail semasa bukan index.php dan pembolehubah session tidak mempunyai nilai
if(empty($_SESSION['nama_admin']))
{
    die("<script>alert('Please login');
    window.location.href='../logout.php?id=admin'</script>");
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
				<a href='index.php' class='w3-bar-item w3-pale-red w3-button  w3-mobile'><li class="w3-large"><i class="fa fa-home"></i>Main Menu</li></a>  
				
				<a class=echo"<div class='w3-dropdown-content w3-bar-block w3-border '>     <a href='laman_utama.php' class='w3-bar-item w3-pale-blue w3-button'><li class="w3-large"><i class="fa fa-male"></i> Main Page</li></a>
				<a class=echo"<div class='w3-dropdown-content w3-bar-block w3-border '>     <a href='maklumat_homestay.php' class='w3-bar-item w3-pale-green w3-button'><li class="w3-large"><i class="fa fa-bed "></i> Homestay Info</li></a>
				<a class=echo"<div class='w3-dropdown-content w3-bar-block w3-border '>     <a href='maklumat_tempahan.php' class='w3-bar-item w3-pale-yellow w3-button'><li class="w3-large"><i class="fa fa-calendar-check-o"></i> Booking Info</li></a>
				<a class=echo"<div class='w3-dropdown-content w3-bar-block w3-border '>     <a href='maklumat_penyewa.php' class='w3-bar-item w3-pale-red w3-button'><li class="w3-large"><i class="fa fa-users"></i> Rental Info</li></a>
				<a class=echo"<div class='w3-dropdown-content w3-bar-block w3-border '>     <a href='maklumat_admin.php' class='w3-bar-item w3-pale-blue w3-button'><li class="w3-large"><i class="fa fa-users"></i> Admin Info</li></a>
				<a class=echo"<div class='w3-dropdown-content w3-bar-block w3-border '>     <a href='analisis.php' class='w3-bar-item w3-pale-green w3-button'><li class="w3-large"><i class="fa fa-line-chart"></i> Monthly Analysis</li></a>
				<a class=echo"<div class='w3-dropdown-content w3-bar-block w3-border '>     <a href='upload.php' class='w3-bar-item w3-pale-yellow w3-button'><li class="w3-large"><i class="fa fa-upload"></i> Admin Data Upload</li></a>
				<a class=echo"<div class='w3-dropdown-content w3-bar-block w3-border '>     <a href='../logout.php?id=admin' class='w3-bar-item w3-pale-red w3-button'><li class="w3-large"><i class="fa fa-sign-out"></i>Logout</li></a>

		
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
			?> </a></div>



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
	
<br>
<br>
<br>
    <div class='w3-twoquarter w3-container w3-margin-bottom  w3-lobster'>
        <div class='w3-container w3-light-blue w3-center w3-lobster'>
        <h3><b>Main Menu</b></h3>
        </div>
		
		
		<div class='w3-container w3-pale-green'>
		<div class="w3-left w3-large">
			<input class= ' w3-button w3-border-bottom w3-mobile w3-pale-yellow w3-circle  w3-right' name='reSize1' type='button' value='reset' onclick="resizeText(2)" />
			<input class= ' w3-button w3-border-bottom w3-mobile w3-pale-blue w3-circle w3-right' name='reSize' type='button' value='+A' onclick="resizeText(1)" />
			<input class= ' w3-button w3-border-bottom w3-mobile w3-pale-red w3-circle w3-right' name='reSize2' type='button' value='-A' onclick="resizeText(-1)" /></div>
		</div>
		

<script>
function resizeText(multiplier) {
    var elem = document.getElementById("saiz");
    var currentSize = elem.style.fontSize || 1;
    if(multiplier==2)
    {
        elem.style.fontSize = "1em";
    } 
    else 
    {
    elem.style.fontSize = ( parseFloat(currentSize) + (multiplier * 0.2)) + "em";
    }
}


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

</body>