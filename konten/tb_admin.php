
		<h4 id="margin">Daftar Akun Admin</h4>
		<button class="btn3 info" type="button" value="user" id="margin2" onclick="window.location.href='konten/laporan_pdf2.php'"> Cetak (.pdf) </button></td>
		<button class="btn3 info" type="button" value="user" id="margin2" onclick="window.location.href='konten/laporan_xls2.php'"> Cetak (.xls) </button></td>

		
		<?php	
		include"database/koneksi.php";
		$select="SELECT * FROM register WHERE status_akun='3'";
		$hasil=mysqli_query($conn, $select);
		?>
		
		<div style="overflow-x:auto" id="margin">
		<table border="1" id="user" width="500px" id="margin">
			<tr>
				<th width="3%">No</th>
				<th width="10%">Nama</th>
				<th width="10%">Username</th>
				<th width="10%">Password</th>
			</tr>
			
		
		
		<?php
		$i=0;
		while($buff=mysqli_fetch_array($hasil)){
			$i++;
		?>
				<tr style="text-align: center">
					<td><?php echo $i;?></td>
					<td><?php echo $buff['nama'];?></td>
					<td><?php echo $buff['username'];?></td>
					<td><?php echo $buff['password'];?></td>
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