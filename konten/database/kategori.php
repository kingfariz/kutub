<?php
require "koneksi.php";

$sqlinsert="INSERT INTO tb_kategori (kategori) VALUES ('$_POST[kategori]')";

if(!mysqli_query($conn, $sqlinsert))
	die (mysqli_error($conn));

echo"<script>alert('Kategori berhasil ditambah'); window.location.href='?module=daftar_kategori#pos'</script>";

mysqli_close($conn);
?>

 