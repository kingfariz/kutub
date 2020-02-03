<?php
include"database/koneksi.php";
if(isset($_POST['id'])){
	$edit="UPDATE tb_kategori SET kategori='$_POST[kategori]' WHERE id_kategori='$_POST[id_kategori]'";
	$hasil=mysqli_query($conn, $edit);
	if($hasil){
		echo"<script>alert('User berhasil di aktivasi');window.location.href='?module=form_edit_kategori#pos';</script>";
}}?>