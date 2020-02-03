<?php
include"koneksi.php";

//$masuk="SELECT * FROM register WHERE (username='".$_POST['username']."') and (password = '".$_POST['password']."')";
//$login = mysqli_query($conn,$masuk);
$username = $_POST['username'];
$password =$_POST['password'];
$sql_login = mysqli_query($conn, "SELECT * FROM register WHERE username = '$username' AND password = '$password'");
//$rowcount = mysqli_num_rows($login);
$rowcount = mysqli_fetch_array($sql_login);
$_SESSION['status_akun'] = $rowcount['status_akun'];

if(mysqli_num_rows($sql_login)>0 AND $_SESSION["status_akun"] == 2){
	$_SESSION['username'] = $rowcount['username'];
	$_SESSION['password'] = $rowcount['password'];
	
	echo"<script>alert('Anda berhasil Masuk');window.location.href='index.php';</script>";
}
elseif (mysqli_num_rows($sql_login)>0 AND $_SESSION["status_akun"] == 3) {
	$_SESSION['username'] = $rowcount['username'];
	$_SESSION['password'] = $rowcount['password'];
	
	echo"<script>alert('Anda berhasil Masuk');window.location.href='index2.php';</script>";
}
elseif (mysqli_num_rows($sql_login)>0 AND $_SESSION["status_akun"] == 1) {
	echo"<script>alert('Akun anda belu di ferivikasi oleh admin');window.location.href='?module=loginpage#pos';</script>";
}
else{
	echo"<script>alert('Kombinasi username dan password salah');window.location.href='?module=loginpage#pos';</script>";
}
?>