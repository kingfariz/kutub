<?php
require "koneksi.php";
if(isset($_POST['username'])){
	$edit="UPDATE register SET nama='$_POST[nama]',username='$_POST[username]', password='$_POST[password]', jk='$_POST[jk]',
	 ttl='$_POST[ttl]', email='$_POST[email]', notel='$_POST[notel]' WHERE username='$_POST[username]'";
	$hasil=mysqli_query($conn, $edit);
	if($hasil){
		echo"<script>alert('Data berhasil diedit'); window.location.href='?module=myprofil#pos';</script>";
}}?>


