<?php
include"koneksi.php";
$id=$_GET['id_video'];
$warn="INSERT INTO tb_peringatan
(id, password, nama, email, jk, ttl, notel) VALUES
('$_POST[username]', '$_POST[password]', '$_POST[nama]', '$_POST[email]', '$_POST[jk]', '$_POST[ttl]', '$_POST[notel]')";
$hasil=mysqli_query($conn, $warn);
if($hapus){
	echo"<script>alert('Data berhasil dihapus');window.location.href='?module=daftar_video#pos';</script>";
}?>
