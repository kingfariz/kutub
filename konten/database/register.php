<?php
require "koneksi.php";

$mysql = "INSERT INTO register
(username, password, nama, email, jk, ttl, notel) VALUES
('$_POST[username]', '$_POST[password]', '$_POST[nama]', '$_POST[email]', '$_POST[jk]', '$_POST[ttl]', '$_POST[notel]')";

$hasil=mysqli_query($conn, $mysql);

if($hasil){
          echo "<script>alert('selamat, anda telah terdaftar. silahkan tunggu akun anda diaktivasi oleh admin');window.location.href='index.php';</script>";
    }
   	     else{
          echo "Eror :" . mysqli_error($conn);
    }


mysqli_close($conn);
?>