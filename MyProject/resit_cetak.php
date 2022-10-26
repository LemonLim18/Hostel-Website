<?PHP 
# memulakan fungsi session
session_start();
# memanggil fail fpdf.php dan fail connection.php
require('fpdf.php');
require('connection.php');

# mengambil data get
$data_get= array(
  'no_rumah'=>$_GET['no_rumah'],
  'alamat'=>$_GET['alamat'],
  'harga'=>$_GET['harga'],
  'jenis'=>$_GET['jenis'],
  'gambar'=>$_GET['gambar'],
  'masuk'=>$_GET['masuk'],
  'keluar'=>$_GET['keluar'],
  'jumlah_hari'=>$_GET['jumlah_hari']
);


class PDF extends FPDF{
  # fungsi header bagi memaparkan maklumat pada header resit
  function Header(){
    $tarikh=date("d/m/Y");
    $this->SetFont('Arial','B',16);
    $title="Yuli,s HomeStay ";
    $subtitle="Come and Spend Your Holidays.";
    $datetitle="Printed at : ".$tarikh; 
    $this->Cell(100,5,$title,0,1);
    $this->Ln(1);
    
    $this->SetFont('Arial','I',9);
    $this->Cell(100,5,$subtitle,0,1);
    $this->SetFont('Arial','',9);
    $this->Cell(100,5,$datetitle,0,1);  
}
  # fungsi footer bagi memaparkan maklumat pada footer
  function Footer(){
    $this->SetY(-15);
    $this->SetFont('Arial','B',8);
    $this->Cell(0,10,'Muka Surat '.$this->PageNo()." / {pages}",0,0,'C');
  }
  
}

$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages('{pages}');
$pdf -> AddPage();
$pdf -> SetFont('Arial','',12);

//Cell(width, height, text, border, endline, [align])

$pdf->SetFont('Arial','',10);
$pdf->SetDrawColor(50,50,100);
$pdf->Ln(1);

$pdf->Ln(4);
$pdf->SetFillColor(200,220,255);
$pdf->Cell(0,5,'Butiran Tetamu',0,0,'L',true);
$pdf->Ln(4);

$pdf->Ln(4);
$pdf->Cell(25,5,'Nama Tetamu :',0,0,'R');
$pdf->Cell(30,5,$_SESSION['nama_penyewa'],0,0);
$pdf->Ln(4);
$pdf->Cell(25,5,'Nokp :',0,0,'R');
$pdf->Cell(30,5,$_SESSION['nokp_penyewa'],0,0);
$pdf->Ln(4);
$pdf->Cell(25,5,'No Telefon :',0,0,'R');
$pdf->Cell(30,5,$_SESSION['notel_penyewa'],0,0);
$pdf->Ln(4);

$pdf->Ln(4);
$pdf->SetFillColor(200,220,255);
$pdf->Cell(0,5,'Butiran Tempahan',0,0,'L',true);
$pdf->Ln(4);

$pdf->Ln(3);
$pdf->Cell(25,5,'No Rumah :',0,0,'R');
$pdf->Cell(30,5,$data_get['no_rumah'],0,0);
$pdf->Cell(80);
$pdf->Cell(25,5,'Tarikh Masuk :',0,0,'R');
$pdf->Cell(30,5,$data_get['masuk'],0,0);
$pdf->Ln(4);
$pdf->Cell(25,5,'Alamat :',0,0,'R');
$pdf->Cell(30,5,$data_get['alamat'],0,0);

$pdf->Cell(80);
$pdf->Cell(25,5,'Tarikh Keluar :',0,0,'R');
$pdf->Cell(30,5,$data_get['keluar'],0,0);
$pdf->Ln(4);

$pdf->Cell(25,5,'Jenis Rumah :',0,0,'R');
$pdf->Cell(30,5,$data_get['jenis'],0,0);
$pdf->Cell(80);
$pdf->Cell(25,5,'Jumlah Hari :',0,0,'R');
$pdf->Cell(30,5,$data_get['jumlah_hari'],0,0);
$pdf->Ln(4);

$pdf->Cell(25,5,'Harga Semalam :',0,0,'R');
$pdf->Cell(30,5,"RM".$data_get['harga'],0,0);
$pdf->Cell(80);
$pdf->SetFillColor(200,220,255);
$jum_bayaran=$data_get['harga'].$data_get['jumlah_hari'];
$pdf->Cell(25,5,'Jumlah Bayaran :',0,0,'R');
$pdf->Cell(0,5,"RM $jum_bayaran",0,0,'L',True);
$pdf->Ln(5);
$pdf->Cell(25,5,' ',0,0,'R');
$pdf->Cell(30,5," ",0,0);
$pdf->Cell(80);

$pdf->Cell(25,5,'Pembayaran :',0,0,'R');
$pdf->Cell(0,5,"CARD",0,0,'L');
$pdf->Ln(4);

$pdf->Cell(25,1,'_________________________________________________________________________________________________',0,0,'L');

$pdf->Ln(170);
$pdf->SetFillColor(230,82,9);
$pdf->Cell(0,5,'Make sure you  bring along your receipt to ease the registration',0,0,'C',True);

$pdf->SetAutoPageBreak(true,15);
$pdf->Output();
?>