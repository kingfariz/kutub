<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUSAN NEEGRI 2 LANGSA',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,6,'NAMA',1,0);
$pdf->Cell(30,6,'USER NAME',1,0);
$pdf->Cell(30,6,'PASSWORD',1,0);
$pdf->Cell(30,6,'JENIS KELAMIN',1,0);
$pdf->Cell(30,6,'TANGGAL LHR',1,1);

$pdf->SetFont('Arial','',10);

include"database/koneksi.php";
$select="SELECT * FROM register ";
$hasil=mysqli_query($conn, $select);
while ($row = mysqli_fetch_array($hasil)){
    $pdf->Cell(30,6,$row['nama'],1,0);
    $pdf->Cell(30,6,$row['username'],1,0);
	$pdf->Cell(30,6,$row['password'],1,0);
	$pdf->Cell(30,6,$row['jk'],1,0);
    $pdf->Cell(30,6,$row['ttl'],1,1);  

}
$pdf->Output();
?>