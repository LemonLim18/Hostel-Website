<?PHP 
# memanggil fail header.php
include('header.php'); 

# menyemak kewujudan data POST
if(!empty($_POST))
{
    # memanggil fail connection.php
    include('connection.php');
    
    # mengambil data POST
    $masuk=$_POST['tarikh_masuk'];
    $keluar=$_POST['tarikh_keluar'];
    
    # data validation tarikh masuk lebih kecil dari tarikh keluar
    if($masuk>=$keluar)
    {
        die("<script>alert('Check-in date is larger than Check-out date');
        window.history.back();</script>");
    }
    
    # mengira bilangan hari
    $start = strtotime($masuk);
    $end = strtotime($keluar);
    $jumlah_hari = ceil(abs($end - $start) / 86400);

    # arahan sql untuk memilih homestay yang masih kosong pada tarik dipilih
    $arahan_SQL_cari= "select* from homestay,jenis_rumah
    where 
    homestay.no_rumah not in(select no_rumah from tempahan where 
    tarikh_keluar >='$masuk')
    and homestay.id_jenis=jenis_rumah.id_jenis";

    # melaksanakan arahan memilih
    $laksana_arahan_cari=mysqli_query($condb,$arahan_SQL_cari);

    # jika bilangan row yang ditemui lebih kecil dari 1. bermaksud tiada kekosongan
    if(mysqli_num_rows($laksana_arahan_cari)<1)
    {
        die ("<script>alert('Sorry.No vacancy on this date '); 
        window.location.href='index.php';</script>");
    }

    echo"<table class='w3-table-all'>";
    # pembolehubah rekod mengambil data yang di pilih baris demi baris
    while ($rekod=mysqli_fetch_array($laksana_arahan_cari))
    {
        # mengumpukan data yang diambil kepada tatasusunan
        $data_get= array(
            'no_rumah'=>$rekod['no_rumah'],
            'alamat'=>$rekod['alamat'],
            'harga'=>$rekod['harga'],
            'jenis'=>$rekod['jenis'],
            'masuk'=>$masuk,
            'keluar'=>$keluar,
            'jumlah_hari'=>$jumlah_hari
        );
        # memaparkan data yang diambil baris demi baris
        echo "
        <tr>
            <td width='50%'>

            <div class='w3-container w3-card w3-white'>
            <h4 class='w3-center'><b>Jenis Rumah : </b>".$rekod['jenis']."</h4>

            <table class='w3-table-all'>
                <tr>
                    <td><b>Home No.</b></td>
                    <td>:</td>
                    <td>".$rekod['no_rumah']."</td>
                </tr>
                <tr>
                    <td><b>Home Address</b></td>
                    <td>:</td>
                    <td>".$rekod['alamat']."</td>
            </tr>
            <tr>
                    <td><b>Price per night</b></td>
                    <td>:</td>
                    <td>RM ".$rekod['harga']."</td>
                </tr>
                <tr>
                    <td><b>No. of Days</b></td>
                    <td>:</td>
                    <td>".$jumlah_hari." Day(s)</td>
                </tr>
                <tr>
                    <td><b>Amount Payment</b></td>
                    <td>:</td>
                    <td>RM  ".$rekod['harga']*$jumlah_hari."</td>
                </tr>
            </table>
            <hr>
            <a class='w3-button w3-blue w3-round-xlarge w3-margin-bottom w3-bar' href='tempahan_bayar.php?".http_build_query($data_get)."'>Book</a>
            </div>
            </td>
            
        </tr>";
    }
    echo "</table>";

}
include('footer.php');
?>