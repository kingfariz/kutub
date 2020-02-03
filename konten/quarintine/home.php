		<h2>Video</h2><br/>
<div  class="form5">
	<form action="#" method="get">

          	<input type="hidden" name="module" value="home" />
			<input type="text" name="pencarian" placeholder="ketikan judul video" />
			<button class="btn5 info" type="submit" value="cari" >Cari </button>
</form>
</div>
			<?php 
			include"database/koneksi.php";
				if(isset($_SESSION['username'])){
			?>


<!-- IF LOGIN -->
		<?php
		if(isset($_GET['pencarian'])){
		$pencarian=$_GET['pencarian'];
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
					ON tb_video.kategori = tb_kategori.id_kategori
					WHERE judul LIKE '%$pencarian%'
					ORDER BY tgl_upload desc"
					;
		$hasil=mysqli_query($conn, $select);
		?>
				<table width="700px" border="0" class="table1">
					<tr>
					</tr>
				<?php

				for($i=1;$buff=mysqli_fetch_array($hasil);$i++){
					if($i==1){
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
										?>
											"
										type="video/mp4">
									</video>
								</a></br>
							</td>
					<?php 
					}
					?>
							<td >
							<p id="vid"> Judul : <?php echo $buff['judul'];?></p>
							<p id="vid"> Tgl_upload : <?php echo $buff['tgl_upload'];?></p>
							<p id="vid"> deskripsi : <?php echo $buff['deskripsi'];?></p>
							<p id="vid" hidden=""><?php echo $buff['id'];?></p>
							<p id="vid"> kategori : <?php echo $buff['kategori'];?></p>
							<a id="vid" href="?module=respon&id_video=<?php echo $buff['id_video'];?>">
								Berikan Respon	</a> 
							</td>
						</tr>
						
						<?php
						echo "</table>";
						};
						mysqli_close($conn);
						?>
						

			<?php 
			}
			else{
			?>

    		
			<?php	

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
					ON tb_video.kategori = tb_kategori.id_kategori
					ORDER BY tgl_upload desc"
					;
		
			$hasil=mysqli_query($conn, $select);
			?>
				<table width="700px" border="0" class="table1">
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
									?>
										"
									type="video/mp4">
								</video>
							</a></br>
						</td>
						
						<td >
						<p id="vid"> Judul : <?php echo $buff['judul'];?></p>
						<p id="vid"> Tgl_upload : <?php echo $buff['tgl_upload'];?></p>
						<p id="vid"> deskripsi : <?php echo $buff['deskripsi'];?></p>
						<p id="vid" hidden=""><?php echo $buff['id'];?></p>
						<p id="vid"> kategori : <?php echo $buff['kategori'];?></p>
						<a id="vid" href="?module=respon&id_video=<?php echo $buff['id_video'];?>">
							Berikan Respon	</a> 
						</td>
					</tr>
					
					<?php
					};
					mysqli_close($conn);
					?>
					</table>
					




    		<?php 
			}}
			else{
			?>

<!-- if not login -->
		<?php
		if(isset($_GET['pencarian'])){
		$pencarian=$_GET['pencarian'];
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
					ON tb_video.kategori = tb_kategori.id_kategori
					WHERE judul LIKE '%$pencarian%'
					ORDER BY tgl_upload desc"
					;
		$hasil=mysqli_query($conn, $select);
		?>
				<table width="700px" border="0" class="table1">
					<tr>
					</tr>
				<?php

				for($i=1;$buff=mysqli_fetch_array($hasil);$i++){
					if($i==1){
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
										?>
											"
										type="video/mp4">
									</video>
								</a></br>
							</td>
					<?php 
					}
					?>
							<td >
							<p id="vid"> Judul : <?php echo $buff['judul'];?></p>
							<p id="vid"> Tgl_upload : <?php echo $buff['tgl_upload'];?></p>
							<p id="vid"> deskripsi : <?php echo $buff['deskripsi'];?></p>
							<p id="vid" hidden=""><?php echo $buff['id'];?></p>
							<p id="vid"> kategori : <?php echo $buff['kategori'];?></p>
							</td>
						</tr>
						
						<?php
						echo "</table>";
						};
						mysqli_close($conn);
						?>
						

			<?php 
			}
			else{
			?>
		
			<?php	

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
				ON tb_video.kategori = tb_kategori.id_kategori
				ORDER BY tgl_upload desc";  
		
		
		$hasil=mysqli_query($conn, $select);
		?>
			<table width="700px" border="0" class="table1">
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
								?>
									"
								type="video/mp4">
							</video>
						</a></br>
					</td>
					
					<td >
					<p id="vid"> Judul : <?php echo $buff['judul'];?></p>
					<p id="vid"> Tgl_upload : <?php echo $buff['tgl_upload'];?></p>
					<p id="vid"> deskripsi : <?php echo $buff['deskripsi'];?></p>
					<p id="vid" hidden=""><?php echo $buff['id'];?></p>
					<p id="vid"> kategori : <?php echo $buff['kategori'];?></p>
					</td>
				</tr>
				
				<?php
				};
				mysqli_close($conn);
				?>
				</table>
				
			
			?>
			<?php
				}}
			?>