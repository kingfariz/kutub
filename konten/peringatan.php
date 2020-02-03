
		<h2 id="margin" style="color: green;">Daftar video user</h2>
		
		<?php	
		include"database/koneksi.php";
		$user=$_SESSION['username'];
		$select= "SELECT
				tb_video.id_video as id,
			    tb_video.judul as judul,
			    tb_video.tgl_upload as tgl_upload,
			    tb_video.deskripsi as deskripsi,
			    tb_kategori.kategori as kategori,
				tb_video.lokasi as lokasi,
				tb_video.username_upload as username

				FROM tb_video 
					INNER JOIN tb_kategori 
					ON tb_video.kategori = tb_kategori.id_kategori
					INNER JOIN register
					ON register.username = tb_video.username_upload
				WHERE not username_upload ='3';
				";
		$hasil=mysqli_query($conn, $select);
		?>
		
		<div style="overflow-x:auto" id="margin">
		<table border="1" id="user" width="35%">
			<tr >
				<th width="5%">No</th>
				<th hidden="5%">Id video</th>
				<th hidden="5%">Username</th>
				<th width="10%">Judul</th>
				<th width="15%">tgl_upload</th>
				<th width="10%">deskripsi</th>
				<th width="20%">kategori</th>
				<th width="20%">Video</th>
				<th colspan="2">Peringatin</th>
			</tr>
		
		
		<?php
		$i=0;
		while($buff=mysqli_fetch_array($hasil)){
			$i++;
		?>

				<tr style="text-align: center">
					<td><?php echo $i;?></td>
					<td><?php echo $buff['id'];?></td>
					<td><?php echo $buff['username'];?></td>
					<td><?php echo $buff['judul'];?></td>
					<td><?php echo $buff['tgl_upload'];?></td>
					<td><?php echo $buff['deskripsi'];?></td>
					<td><?php echo $buff['kategori'];?></td>
					<td>
						<video width="400" preload="metadata" style="cursor: pointer;" controls="">
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
					<td width="5%"><a href="?module=database/peringatan_modul&id_video=<?php echo $buff['id'];?>">Peringatkan User</td>
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