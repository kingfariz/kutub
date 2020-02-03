<?php
require "koneksi.php";

$sqlinsert="INSERT INTO tb_respon
(id_video,respon,username) VALUES
('$_POST[id_video]','$_POST[respon]','$_POST[username]')";

    mysqli_query($conn,$sqlinsert);

if(mysqli_query($conn,$sqlupdate))
	die (mysqli_error($conn));

echo"<script>alert('Berhasil mengirimkan respon');window.location.href='?module=view_video&id=1#pos';</script>";

mysqli_close($conn);
?>