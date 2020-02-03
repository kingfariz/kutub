
<head>
	<title>Data Admin .xls</title>
</head>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Admin.xls");
	?>



<table border="1">
	<tr>
		<th>No.</th>
		<th>Nama</th>
		<th>Username</th>
		<th>Password</th>
		<th>Jenis Kelamin</th>
		<th>Tanggal Lahir</th>
		<th>Email</th>
		<th>No.Hp</th>
	</tr>
	<?php
	//koneksi ke database
	include"database/koneksi.php";
	$select = "SELECT * FROM register where status_akun='3'";
	$hasil=mysqli_query($conn, $select);
	$no = 1;
	while($data=mysqli_fetch_array($hasil)){
		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$data['nama'].'</td>
			<td>'.$data['username'].'</td>
			<td>'.$data['password'].'</td>
			<td>'.$data['jk'].'</td>
			<td>'.$data['ttl'].'</td>
			<td>'.$data['email'].'</td>
			<td>'.$data['notel'].'</td>
		</tr>
		';
		$no++;
	}
	?>
</table>

