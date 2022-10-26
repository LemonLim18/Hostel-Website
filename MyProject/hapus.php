<?PHP 
# menyemak kewujudan data GET
if(!empty($_GET))
{
    # Memanggil fail connection dari folder luaran
    include ('../connection.php');

    # Mengambil data GET
    $jadual=$_GET['jadual'];
    $medan_kp=$_GET['medan_kp'];
    $kp=$_GET['kp'];

    # Arahan menghapuskan data
    $arahan_sql_hapus="delete from $jadual where $medan_kp='$kp'";

    # melaksanakan proses hapus rekod dalam syarat IF
    if(mysqli_query($condb,$arahan_sql_hapus))
    {
        # Proses menghapus rekod berjaya
        echo"<script>alert('You have successfully deleted a staff!!');
        window.history.back();</script>";
    }
    else
    {
        # Proses menghapus rekod gagal
        echo"<script>alert('You have failed deleting a staff!!');
        window.history.back();</script>";
    }
}
?>