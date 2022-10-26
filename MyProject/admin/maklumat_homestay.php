<?PHP
# Memanggil fail header_admin.php
include ('header_admin.php');
# Memanggil fail connection dari folder luaran
include ('../connection.php');

#----------- Bahagian 2 : Proses penyimpan data-------
# Menyemak kewujudan data POST
if(!empty($_POST))
{
    # mengambil data POST
    $no_rumah=$_POST['no_rumah'];
    $alamat=$_POST['alamat'];
    $id_jenis=$_POST['id_jenis'];
    $harga=$_POST['harga'];

    # memproses maklumat gambar yang di upload
    # proses ini lebih kepada menukar nama fail gambar
    $timestmp=date("Y-m-d");
    $saiz_fail = $_FILES['gambar']['size'];
    $nama_fail=basename($_FILES["gambar"]["name"]);
    $jenis_gambar = pathinfo($nama_fail,PATHINFO_EXTENSION);
    $lokasi = $_FILES['gambar']['tmp_name'];
    $folder = "../images/";    
    $nama_baru_gambar=$no_rumah.$timestmp.".".$jenis_gambar;

    # Arahan untuk menyimpan data ke dalam jadual homestay
    $arahan_sql_simpan="insert into homestay
    values
    ('$no_rumah','$alamat','$id_jenis','$harga','$nama_baru_gambar')";

    # melaksanakan proses menyimpan dalam syarat IF
    if(mysqli_query($condb,$arahan_sql_simpan))
    {
        move_uploaded_file($lokasi,$folder.$nama_baru_gambar);
        # proses menyimpan data berjaya. papar mesej
        echo "<script>alert('Registration Successful');</script>";
    }
    else
    {
        # proses menyimpan data gagal. papar mesej
        echo "<script>alert('Registration Failed');
        window.history.back();</script>";
    }
}

# ----------- bahagian 1 : memaparkan data dalam bentuk jadual

# arahan SQL mencari data homestay 
$arahan_sql_cari="select* from homestay,jenis_rumah where homestay.id_jenis=jenis_rumah.id_jenis";

# melaksanakan arahan sql cari tersebut
$laksana_sql_cari=mysqli_query($condb,$arahan_sql_cari);
?>

<div class='w3-container w3-pale-red w3-text-black'>
<h5><b>Homestay Registered Lists</b></h5>
</div>

<div class='w3-container w3-card-2 w3-margin-bottom w3-center w3-sand'>
<table id='saiz' border='1' class='w3-table-all w3-responsive w3-margin w3-margin-bottom '>
 
	<center><div class="w3-content w3-third w3-section" style="max-width:700px">
  <img class="mySlides w3-animate-top" src="https://afar-production.imgix.net/uploads/images/post_images/images/hRj42VdpbP/original_f069b11ee7cca71315be660838c0daa1.jpg?1470707500?ixlib=rails-0.3.0&auto=format%2Ccompress&crop=entropy&fit=crop&h=719&q=80&w=954" style="width:150%">
  <img class="mySlides w3-animate-left" src="https://2.bp.blogspot.com/-AGmJk7jsuhg/VAMjKqjIT4I/AAAAAAAAG9E/Dzmq0hf-ZqA/s1600/2014-08-31%2B11.50.09.jpg" style="width:150%">
  <img class="mySlides w3-animate-left" src="https://www.vnethomes.com/images/p/710502.jpg" style="width:150%">
  <img class="mySlides w3-animate-right" src="https://www.windowmalaysia.my/jeriq_assets/images/M-8-2.jpg" style="width:150%">
</div></center>
 
   <tr>
        <td><b>No</b></td>
        <td><b>House Number</b></td>
        <td><b>Address</b></td>
        <td><b>Home Type</b></td>
        <td><b>Price</b></td>
        <td><b>Image</b></td>
		<td><b>Operations</b></td>
        <td></td>
    </tr>
    <tr>

    <form action='' method='POST' enctype='multipart/form-data'>
        <td>$</td>
        <td><input class='w3-input w3-border w3-round-xxlarge w3-large' size='5' type='text' name='no_rumah'></td>
        <td><input class='w3-input w3-border w3-round-xxlarge w3-large' type='text' name='alamat'></td>
        <td>
  
  
  
  
        <select class='w3-select w3-border w3-round-large' name='id_jenis' required>
                <option disabled selected value>Choose the category</option>
                <?PHP
                
       
                $arahan_sql_carijenis= "SELECT* from jenis_rumah";

             
                $laksana_sql_carijenis=mysqli_query($condb,$arahan_sql_carijenis);

             
                while($rekod_jenis=mysqli_fetch_array($laksana_sql_carijenis))
                {
              
                    echo"<option value='".$rekod_jenis['id_jenis']."'>
                    ".$rekod_jenis['jenis']."</option>";        
                }
                ?>
            </select>       
        </td>
        <td><input class='w3-input w3-border w3-round-xlarge ' type='text' name='harga'></td>
        <td><input class='w3-input w3-border w3-round-xlarge ' size='5' type='file' name='gambar'></td>
        <td><input class='w3-button w3-pale-red w3-round-xlarge w3-margin-bottom' type='submit' value='Save'></td>
    </form>
    </tr>
    <?PHP 

    $bil=0;

    while ($rekod=mysqli_fetch_array($laksana_sql_cari))
    {
   
        echo "
        <tr>
            <td>".++$bil."</td>
            <td>".$rekod['no_rumah']."</td>
            <td>".$rekod['alamat']."</td>
            <td>".$rekod['jenis']."</td>
            <td>".$rekod['harga']."</td>
            <td><img src='../images/".$rekod['gambar']."' width='70%'></td>
            <td><a  class='w3-button w3-pale-blue w3-round-xxlarge w3-margin-bottom'   
            href='hapus.php?jadual=homestay&medan_kp=no_rumah&kp=".$rekod['no_rumah']."'
            onClick=\"return confirm('Are you sure you want to delete this data?')\" >Delete</a></td>
        </tr>";
    }
    ?>
</table>
</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 4000);    
}
</script>
</div>
</div>
<?PHP include('../footer.php'); ?>