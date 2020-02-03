<?php
include"database/koneksi.php";
$id=$_GET['username'];
	$edit="UPDATE register SET status_akun='2' WHERE username='$id'";
	$hasil=mysqli_query($conn, $edit);
	if($hasil){
		echo"<script>alert('User berhasil di aktivasi');window.location.href='?module=akun_user#pos';</script>";
}?>