		<h2>Edit Kategori</h2><br/>
		<?php
		include"database/koneksi.php";
		$select="SELECT * FROM tb_kategori";
		$hasil=mysqli_query($conn, $select);
		?>

	<form action="?module=update_kategoti&id=<?php echo $buff['id'];?>" method="post">
		<table width="100%" border="0" class="table1">
				<tr>
					<th width="20%">id</th>
					<th width="40%">kategori</th>
					<th width="40%">Aksi</th>
				</tr>
			<?php
			while($buff=mysqli_fetch_array($hasil)){
			$i++;
			?>
				<tr>
					<td><input type="text" name="id_kategori" value="<?php echo $buff['id_kategori'];?>" readonly/></td>
					<td><input type="text" name="kategori" value="<?php echo $buff['kategori'];?>" /></td>
					<td><input type="submit" name="submit" value="update" /></td>
				</tr>	
				<?php
		};
		mysqli_close($conn);
		?>
	</table>
	</form>	
	</br>

	<?php
include"database/koneksi.php";
if(isset($_POST['submit'])){
	$edit="UPDATE tb_kategori SET kategori='$_POST[kategori]' WHERE id_kategori='$_POST[id_kategori]'";
	$hasil=mysqli_query($conn, $edit);
	if($hasil){
		echo"<script>alert('User berhasil di aktivasi');window.location.href='../index2.php';</script>";
}}?>
		<a href="?module=home#pos">Kembali</a>	