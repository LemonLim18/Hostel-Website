<?PHP 
# Memanggil fail header_admin.php
include ('header_admin.php'); 
# Memanggil fail connection dari folder luaran
include ('../connection.php');
# -----------------------------------------------------------------------------
# arahan SQL untuk mencari bilangan homestay
$arahan_sql_bilhomestay="select count(no_rumah) as bil_homestay from homestay";
# Laksanakan arahan mencari bilangan homestay yang ada yang pernah berdaftar
$laksana_sql_bilhomestay=mysqli_query($condb,$arahan_sql_bilhomestay);
# pembolehubah $rekod_bilhomestay mengambil data bilangan homestay yang pernah berdaftar
$rekod_bilhomestay=mysqli_fetch_array($laksana_sql_bilhomestay);
#------------------------------------------------------------------------------
# arahan SQL untuk mencari bilangan homestay yang telah kosong di hari ini
$arahan_sql_bilhomestaykosong="select count(no_rumah) as bil_homestaykosong from homestay,jenis_rumah
where 
homestay.no_rumah not in(select no_rumah from tempahan where 
tarikh_keluar >= '".date('Y-m-d')."')
and homestay.id_jenis=jenis_rumah.id_jenis";
# laksanakan arahan  mencari bilangan homestay yang telah kosong di hari ini
$laksana_sql_bilhomestaykosong=mysqli_query($condb,$arahan_sql_bilhomestaykosong);
# pembolehubah $rekod_bilhomestaykosong mengambil data bilangan homestay yang telah kosong di hari ini
$rekod_bilhomestaykosong=mysqli_fetch_array($laksana_sql_bilhomestaykosong);
# -----------------------------------------------------------------------------
# arahan SQL untuk mengira pendapatan bulanan
$arahan_sql_untung="select sum(jumlah_bayaran) as untung from tempahan
where tarikh_keluar LIKE '%".date('-m-')."%'";
# laksanakan arahan mengira jumlah bayaran yang telah dibuat
$laksana_sql_untung=mysqli_query($condb,$arahan_sql_untung);
# pemboleh ubah $rekod_untung mengambil data jumlah keuntungan
$rekod_untung=mysqli_fetch_array($laksana_sql_untung);
# -----------------------------------------------------------------------------
?>
<!-- memaparkan maklumat hasil carian di atas -->
<div class='w3-container w3-sand'>
<div class='w3-container w3-pale-red'>
    <h4><b>Admin Main Page</b></h4>
</div>
<center>
<img src="https://www.seekpng.com/png/detail/347-3472704_admin-icon.png" class="w3-round-xxlarge" alt="Admin" style="width:30%"></center>

    <div class='w3-container w3-card-2 w3-margin-bottom'>
        <div class="w3-panel w3-topbar w3-bottombar w3-border-blue w3-light-blue">
            <p><b>Homestay No: </b> <?PHP echo $rekod_bilhomestay['bil_homestay']; ?> </p>
        </div>
        <div class="w3-panel w3-topbar w3-bottombar w3-border-blue w3-light-blue">
            <p><b>No of Homestay Rented Today: </b> <?PHP echo $rekod_bilhomestaykosong['bil_homestaykosong']; ?> </p>
        </div>
        <div class="w3-panel w3-topbar w3-bottombar w3-border-blue w3-light-blue">
            <p><b>Profit Amount : </b>RM <?PHP echo $rekod_untung['untung']; ?></p>
        </div>
    </div>
</div>

<?PHP include('../footer.php'); ?>