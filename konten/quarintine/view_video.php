		<h2>Video</h2><br/>
<div  class="form5">
<form action="#" method="get">
	<input type="hidden" name="module" value="view_video" />
			<table>
				<tr>
	          		<td><label>Category</label></td>
	           		<td></td>
	           		<td>
		              <select <input type="text" name="id" />
		              <?php
		              include"database/koneksi.php";
		                $sql="SELECT * FROM tb_kategori";
		                $merge=mysqli_query($conn,$sql);
		              ?>
		                <option>Pilih Kategori</option>
		              <?php while($muncul=mysqli_fetch_array($merge)){ ?>
		                  <option name="id" value="<?php echo $muncul['id_kategori']; ?>">
		                    <?php echo $muncul['kategori']; ?>
		                  </option>
		              <?php
		                }
		              ?>
	              	  </select>
	            	</td>
	            	<td colspan="3" align="center">
						<input class="btn4 info" type="submit" value="cari" />
		              </td>
		        </tr>
		   </table>
		  </form>
   </div>

			<?php 
				if(isset($_SESSION['username'])){
			?>
    	<div id="margin"style="overflow-x:auto;">
		<?php
		$cari=$_GET['id'];
		?>

		<?php	
		/*$select= "SELECT 
				tb_video.kategori as id,
				tb_video.id_video as id_video,
			    tb_video.judul as judul,
			    tb_video.tgl_upload as tgl_upload,
			    tb_video.deskripsi as deskripsi,
			    tb_kategori.kategori as kategori,
				tb_video.lokasi as lokasi,
                count(tb_respon.respon) as jumlah
				FROM tb_video, tb_kategori, tb_respon 
				WHERE tb_video.kategori = tb_kategori.id_kategori AND
                tb_respon.id_video=tb_video.id_video AND tb_respon.respon LIKE 'like' ";*/

/*$select= "SELECT 
				tb_video.kategori as id,
				tb_video.id_video as id_video,
			    tb_video.judul as judul,
			    tb_video.tgl_upload as tgl_upload,
			    tb_video.deskripsi as deskripsi,
			    tb_kategori.kategori as kategori,
				tb_video.lokasi as lokasi,
                sum(tb_respon.respon like 'like') as jumlah,
                sum(tb_respon.respon like 'dislike') as jumlah2
				FROM tb_video
				INNER JOIN tb_kategori
				ON tb_video.kategori = tb_kategori.id_kategori AND tb_kategori.id_kategori ='$cari'
                INNER JOIN tb_respon
                ON tb_video.id_video = tb_respon.id_video
                WHERE tb_video.id_video = tb_respon.id_video";  */

		/*$select= "SELECT 
				tb_video.kategori as id,
				tb_video.id_video as id_video,
			    tb_video.judul as judul,
			    tb_video.tgl_upload as tgl_upload,
			    tb_video.deskripsi as deskripsi,
			    tb_kategori.kategori as kategori,
				tb_video.lokasi as lokasi
				FROM tb_video
				INNER JOIN tb_kategori
				ON tb_video.kategori = tb_kategori.id_kategori AND tb_kategori.id_kategori ='$cari'
                "; */
		$select= "SELECT 
				tb_video.kategori as id,
				tb_video.id_video as id_video,
			    tb_video.judul as judul,
			    tb_video.tgl_upload as tgl_upload,
			    tb_video.deskripsi as deskripsi,
			    tb_kategori.kategori as kategori,
				tb_video.lokasi as lokasi,
                sum(tb_respon.respon like 'like') as jumlah,
                sum(tb_respon.respon like 'dislike') as jumlah2
				FROM tb_video
				LEFT JOIN tb_kategori
				ON tb_video.kategori = tb_kategori.id_kategori AND tb_kategori.id_kategori ='$cari'
                LEFT JOIN tb_respon
                ON tb_video.id_video = tb_respon.id_video
              	WHERE tb_kategori.id_kategori ='$cari'
              	GROUP BY tb_video.kategori, tb_video.id_video, tb_video.judul, tb_video.tgl_upload, tb_video.deskripsi, tb_kategori.kategori, tb_video.lokasi
              	ORDER BY tgl_upload desc
              	"
              	;

		/*
count(tb_respon.respon) as jumlah
AND tb_respon.respon LIKE 'like'
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
				WHERE id_kategori ='$cari'"; */

	//	$select_hitung="SELECT count(respon) as hitung FROM tb_respon WHERE id_video='$cari' AND respon LIKE 'like'";
	//	$hasil2=mysqli_query($conn, $select_hitung);
		$hasil=mysqli_query($conn, $select);
	//	$buff2=mysqli_fetch_array($hasil2);
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
					<p id="vid" class="label"> Judul : <?php echo $buff['judul'];?></p>
					<p id="vid"> tgl_upload : <?php echo $buff['tgl_upload'];?></p>
					<p id="vid"> deskripsi  : <?php echo $buff['deskripsi'];?></p>
					<p id="vid" hidden=""><?php echo $buff['id'];?></p>
					<p id="vid"> kategori : <?php echo $buff['kategori'];?></p>
					<p id="vid"> Like : 
						<?php 
						echo $buff['jumlah'];
						?>
						</p>
					<p id="vid"> Dislike : 
						<?php 
						echo $buff['jumlah2'];
						?>
						</p>
					<a id="vid" href="?module=respon&id_video=<?php echo $buff['id_video'];?>">
						Berikan Respon	</a> 
					</td>
				</tr>
				<!--<td><a href="?module=akun_user_modul&pos&username=<?php echo $buff['username']; ?>">Validasi </a></td> -->

				<?php
		};
		mysqli_close($conn);
		?>
	</table>
	</div>

				<?php 
			}
			else{
			?>

			<?php
		//include"database/koneksi.php";
		$cari=$_GET['id'];
		?>
		<?php
		$select= "SELECT 
				tb_video.kategori as id,
				tb_video.id_video as id_video,
			    tb_video.judul as judul,
			    tb_video.tgl_upload as tgl_upload,
			    tb_video.deskripsi as deskripsi,
			    tb_kategori.kategori as kategori,
				tb_video.lokasi as lokasi,
                sum(tb_respon.respon like 'like') as jumlah,
                sum(tb_respon.respon like 'dislike') as jumlah2
				FROM tb_video
				LEFT JOIN tb_kategori
				ON tb_video.kategori = tb_kategori.id_kategori AND tb_kategori.id_kategori ='$cari'
                LEFT JOIN tb_respon
                ON tb_video.id_video = tb_respon.id_video
              	WHERE tb_kategori.id_kategori ='$cari'
              	GROUP BY tb_video.kategori, tb_video.id_video, tb_video.judul, tb_video.tgl_upload, tb_video.deskripsi, tb_kategori.kategori, tb_video.lokasi
              	ORDER BY tgl_upload desc
              	"
              	;

		/*
count(tb_respon.respon) as jumlah
AND tb_respon.respon LIKE 'like'
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
				WHERE id_kategori ='$cari'"; */

	//	$select_hitung="SELECT count(respon) as hitung FROM tb_respon WHERE id_video='$cari' AND respon LIKE 'like'";
	//	$hasil2=mysqli_query($conn, $select_hitung);
		$hasil=mysqli_query($conn, $select);
	//	$buff2=mysqli_fetch_array($hasil2);
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
					<p id="vid" class="label"> Judul : <?php echo $buff['judul'];?></p>
					<p id="vid"> tgl_upload : <?php echo $buff['tgl_upload'];?></p>
					<p id="vid"> deskripsi  : <?php echo $buff['deskripsi'];?></p>
					<p id="vid" hidden=""><?php echo $buff['id'];?></p>
					<p id="vid"> kategori : <?php echo $buff['kategori'];?></p>
					<p id="vid"> Like : 
						<?php 
						echo $buff['jumlah'];
						?>
						</p>
					<p id="vid"> Dislike : 
						<?php 
						echo $buff['jumlah2'];
						?>
						</p>
					
					</td>
				</tr>
				<!--<td><a href="?module=akun_user_modul&pos&username=<?php echo $buff['username']; ?>">Validasi </a></td> -->

				<?php
		};
		mysqli_close($conn);
		?>
	</table>
			<?php
				}
			?>