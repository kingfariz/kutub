<?php
require "koneksi.php";

$sqlinsert="INSERT INTO tb_video 
(judul,kategori,lokasi) VALUES
('$_POST[judul]','$_POST[kategori]','vid')";

    mysqli_query($conn,$sqlinsert);

    $id=mysqli_insert_id($conn);
    $vid=$_SERVER['DOCUMENT_ROOT'] . "/videos/lokasivid".$id.$_FILES["lokasivid"]["name"];
    move_uploaded_file($_FILES["lokasivid"]["tmp_name"],$vid);
    $sqlupdate="UPDATE tb_video SET lokasi='$vid' WHERE id='$id'";

if(mysqli_query($conn,$sqlupdate))
	die (mysqli_error($conn));

echo"<script>alert('Video anda telah terupload');window.location.href='../../index.php';</script>";

mysqli_close($conn);
?>