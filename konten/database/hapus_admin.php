<?php
include"koneksi.php";
$username=$_GET['username'];
$hapus="DELETE FROM register WHERE username='$username'";
$hasil=mysqli_query($conn, $hapus);
if($hapus){
	echo"<script>alert('Data berhasil dihapus');window.location.href='?module=daftar_admin#pos';</script>";
}?>