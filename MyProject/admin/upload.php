<!-- Memanggil fail header_admin.php-->
<?PHP include('header_admin.php'); ?>
<!-- form untuk upload fail data-->
<div class='w3-container w3-pale-blue'>
<h5>Admin Login List</h5>
</div>
<div class='w3-container w3-card-2 w3-margin-bottom'>
<form  action='' method='POST' enctype='multipart/form-data'>
<table class='w3-table-all'><br><br><br>
                <caption>Please Select Text File You Wanted To Upload.</caption>
                <tr>
                    <td>
                        <input class='w3-input w3-border' type='file' name='data_admin'>
                    </td>
                    <td>
                    <button class='w3-button w3-blue' type='submit' name='btn-upload'>Upload</button>
                    </td>
                </tr>
            </table><br><br><br><br>
</form>
</div>
</div>
</div> 
<br><br>  
<?PHP include('../footer.php'); ?>    
<?PHP 
if (isset($_POST['btn-upload']))
{
    include ('../connection.php');

    $namafailsementara=$_FILES["data_admin"]["tmp_name"];

    $namafail=$_FILES['data_admin']['name'];
    # mengambil jenis fail
    $jenisfail=pathinfo($namafail,PATHINFO_EXTENSION);   
    # menguji jenis fail dan saiz fail
    if($_FILES["data_admin"]["size"]>0 AND $jenisfail=="txt")
    {
        # membuka fail yang diambil
        $fail_data=fopen($namafailsementara,"r");

        # mendapatkan data dari fail baris demi baris
        while (!feof($fail_data)) 
        {   
            # mengambil data sebaris sahaja bg setiap pusingan
            $ambilbarisdata = fgets($fail_datafail_data);
    
            #memecahkan baris data mengikut tanda pipe
            $pecahkanbaris = explode("|",$ambilbarisdata);
            
            # selepas pecahan tadi akan diumpukan kepada 3
            list($nokp_admin,$nama_admin,$katalaluan_admin) = $pecahkanbaris;
            
            # arahan SQl untuk menyimpan data
            $arahan_sql_simpan="insert into admin
            (nokp_admin,nama_admin,katalaluan_admin) values
            ('$nokp_admin','$nama_admin','$katalaluan_admin')";            
            
            # memasukkan data kedalam jadual admin
            $laksana_arahan_simpan=mysqli_query($condb, $arahan_sql_simpan);     
            echo"<script>alert('File Data Import Done.');
            window.location.href='maklumat_admin.php';</script>";            
        }                  
    fclose($fail_data);
    }
    else  {
        echo"<script>alert('You have successfully uploaded the file!!');</script>";
    }
}
?> 
