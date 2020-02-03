<?php
require "koneksi.php";

$mysql = "INSERT INTO register
(username, password, nama, email,  jk, ttl, notel, status_akun) VALUES
('$_POST[username]', '$_POST[password]', '$_POST[nama]', '$_POST[email]', '$_POST[jk]', '$_POST[ttl]', '$_POST[notel]' ,'$_POST[status_akun]')";

if(!mysqli_query($conn, $mysql))
	die (mysqli_error($conn));

echo"<script>alert('selamat, anda telah terdaftar');window.location.href='?module=daftar_admin#pos';</script>";

mysqli_close($conn);
?>