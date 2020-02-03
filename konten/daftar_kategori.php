
		<h2 id="margin">Daftar Kategori</h2>
		<button class="btn info" type="button" value="user" id="margin" onclick="window.location.href='?module=form_kategori#pos'"> Tambah </button>
		
		<?php	
		include"database/koneksi.php";
		$select="SELECT * FROM tb_kategori";
		$hasil=mysqli_query($conn, $select);
		?>
		
		<div style="overflow-x:auto" id="margin">
		<table border="1" id="user" width="35%">
			<tr >
				<th width="5%">No</th>
				<th width="30%">Nama Kategori</th>
			</tr>
		
		
		<?php
		$i=0;
		while($buff=mysqli_fetch_array($hasil)){
			$i++;
		?>
				<tr style="text-align: center">
					<td><?php echo $i;?></td>
					<td><?php echo $buff['kategori'];?></td>
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