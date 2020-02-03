
<?php
		include"koneksi.php";
		if(isset($_GET['judul'])){
			$username=$_GET['judul'];
			$select="SELECT * FROM tb_judul WHERE judul LIKE '%$judul%'";
			$hasil=mysqli_query($conn, $select);
	
?>

 		<div id="margin"style="overflow-x:auto;">
		<?php	
		include"database/koneksi.php";
		$judul=$_GET['judul'];
		$select= "SELECT 
				tb_video.kategori as id,
				tb_video.id_video as id_video,
			    tb_video.judul as judul,
			    tb_video.tgl_upload as tgl_upload,
			    tb_video.deskripsi as deskripsi,
			    tb_kategori.kategori as kategori,
				tb_video.lokasi as lokasi
				FROM tb_video
				INNER JOIN tb_kategori
				ON tb_video.kategori = tb_kategori.id_kategori  where judul like '%$judul%'";";
		
		$hasil=mysqli_query($conn, $select);
		?>
			<table width="750px" border="0" class="table1">
				<tr>
				</tr>
			<?php
			while($buff=mysqli_fetch_array($hasil)){
			?>
				<tr>
					<td></br>
					<a>		<video width="350" preload="metadata" style="cursor: pointer;" controls="">
								<source 
								src="
								<?php
								$lok=$buff['lokasi'];
								$direktori="videos/$lok";
								echo ($direktori);
								?>"
								type="video/mp4">
							</video>
						</a></br>
					</td>
					
					<td >
					<p id="vid"> Judul : <?php echo $buff['judul'];?></p>
					<p id="vid"> Tgl_upload : <?php echo $buff['tgl_upload'];?></p>
					<p id="vid"> Deskripsi : <?php echo $buff['deskripsi'];?></p>
					<p id="vid" hidden=""><?php echo $buff['id'];?></p>
					<p id="vid"> Kategori : <?php echo $buff['kategori'];?></p>
					<a href="?module=respon&id_video=<?php echo $buff['id_video'];?>">Berikan Respon</a> 
					</td>
				</tr>
				
				<?php
				};
				mysqli_close($conn);
				?>
				</table>
				</div>
    		
			  