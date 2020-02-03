
		<h2 id="margin">Daftar video yang telah di upload</h2>
		
		<?php	
		include"database/koneksi.php";
		$user=$_SESSION['username'];
		$select= "SELECT
				tb_video.id_video as id,
			    tb_video.judul as judul,
			    tb_video.tgl_upload as tgl_upload,
			    tb_video.deskripsi as deskripsi,
			    tb_kategori.kategori as kategori,
				tb_video.lokasi as lokasi
				FROM tb_video 
					INNER JOIN tb_kategori 
					ON tb_video.kategori = tb_kategori.id_kategori
				where(username_upload='$user')";
		$hasil=mysqli_query($conn, $select);
		?>
		
		<div style="overflow-x:auto" id="margin">
		<table border="1" id="user" width="100%">
			<tr >
				<th width="5%">No</th>
				<th hidden="">id</th>
				<th width="20%">Judul</th>
				<th width="20%">Tgl_upload</th>
				<th width="30%">Deskripsi</th>
				<th width="30%">Kategori</th>
				<th width="30%">Video</th>
				<th colspan="2">Aksi</th>
			</tr>
		
		
		<?php
		$i=0;
		while($buff=mysqli_fetch_array($hasil)){
			$i++;
		?>

				<tr style="text-align: center">
					<td><?php echo $i;?></td>
					<td hidden=""><?php echo $buff['id'];?></td>
					<td><?php echo $buff['judul'];?></td>
					<td><?php echo $buff['tgl_upload'];?></td>
					<td><?php echo $buff['deskripsi'];?></td>
					<td><?php echo $buff['kategori'];?></td>
					<td>
						<video width="200" preload="metadata" style="cursor: pointer;" controls="">
							<source 
							src="
							<?php
							$lok=$buff['lokasi'];
							$direktori="videos/$lok";
							echo ($direktori);
							?>
								"
							type="video/mp4">
						</video>
					</td>
					<td width="5%"><a href="?module=edit_video&id_video=<?php echo $buff['id'];?>">Edit</td>
					<td width="5%"><a href="?module=database/hapus_video&id_video=<?php echo $buff['id'];?>">Hapus</td>
				</tr>
	
		
		<?php
		};
		echo '</table>';
		mysqli_close($conn);
		?>
		 </table>
	</div>
	</br>
	</br>