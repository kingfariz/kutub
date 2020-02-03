<?php
include"database/koneksi.php";
require('fpdf.php');

//Menampilkan data dari tabel di database
$select="SELECT * FROM register WHERE status_akun='2'";
$hasil=mysqli_query($conn, $select);

//Inisiasi untuk membuat header kolom
$column_nama = "";
$column_username = "";
$column_password = "";
$column_jk = "";
$column_ttl = "";
$column_email = "";
$column_notel ="";


//For each row, add the field to the corresponding column
while ($row = mysqli_fetch_array($hasil))
{
    $nama = $row["nama"];
    $username = $row["username"];
    $password = $row["password"];
    $jk = $row["jk"];
	$ttl= $row["ttl"];
    $email = $row["email"];
    $notel = $row["notel"];
 

    $column_nama = $column_nama.$nama."\n";
    $column_username = $column_username.$username."\n";
    $column_password = $column_password.$password."\n";
    $column_jk = $column_jk.$jk."\n";
    $column_ttl = $column_ttl.$ttl."\n";
    $column_email= $column_email.$email."\n";
    $column_notel = $column_notel.$notel."\n";
    

//Create a new PDF file
$pdf = new FPDF('L','mm','A4'); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
//$pdf->Image('../foto/logo.png',10,10,-175);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(125);
$pdf->Cell(30,10,'DATA USER',0,0,'C');
$pdf->Ln();
$pdf->Cell(125);
$pdf->Cell(30,5,'------------------------------------------------------------',0,50,'C');
$pdf->Ln();

}


//Fields Name position
$Y_Fields_Name_position = 30;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(10);
$pdf->Cell(40,8,'Nama',1,0,'C',1);
$pdf->SetX(50);
$pdf->Cell(40,8,'Username',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(40,8,'Password',1,0,'C',1);
$pdf->SetX(130);
$pdf->Cell(50,8,'Tanggal Lahir',1,0,'C',1);
$pdf->SetX(180);
$pdf->Cell(35,8,'Jenis kelamin',1,0,'C',1);
$pdf->SetX(215);
$pdf->Cell(40,8,'Email',1,0,'C',1);
$pdf->SetX(255);
$pdf->Cell(32,8,'Notel',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(10);
$pdf->MultiCell(40,6,$column_nama,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(50);
$pdf->MultiCell(40,6,$column_username,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(40,6,$column_password,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(130);
$pdf->MultiCell(50,6,$column_ttl,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(180);
$pdf->MultiCell(35,6,$column_jk,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(215);
$pdf->MultiCell(40,6,$column_email,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(255);
$pdf->MultiCell(32,6,$column_notel,1,'C');

$pdf->Output();
?>