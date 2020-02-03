<?php
include"koneksi.php";
$id=$_GET['id_video'];
$hapus="DELETE FROM tb_video WHERE id_video='$id'";
$hasil=mysqli_query($conn, $hapus);
if($hapus){
	echo"<script>alert('Data berhasil dihapus');window.location.href='?module=daftar_video#pos';</script>";
}?>
