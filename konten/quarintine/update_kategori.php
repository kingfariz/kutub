<?php
include"database/koneksi.php";
if(isset($_POST['id_kategori'])){
	$edit="UPDATE tb_kategori SET kategori='$_POST[kategori]' WHERE id_kategori='$_POST[id_kategori]'";
	$hasil=mysqli_query($conn, $edit);
	if($hasil){
		echo"<script>alert('User berhasil di aktivasi');window.location.href='../index2.php';</script>";
}}?>