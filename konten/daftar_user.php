
		<h2 id="margin">Daftar Akun User</h2>
		<button class="btn info" type="button" value="user" id="margin" onclick="window.location.href='?module=akun_user#pos'"> Aktivasi </button>
		
		<?php	
		include"database/koneksi.php";
		$select="SELECT * FROM register WHERE status_akun='2'";
		$hasil=mysqli_query($conn, $select);
		?>
		
		<div style="overflow-x:auto" id="margin">
		<table border="1" id="user" width="1800px">
			<tr >
				<th width="3%">No</th>
				<th width="10%">Nama</th>
				<th width="10%">Username</th>
				<th width="10%">Password</th>
				<th width="10%">Jenis Kelamin</th>
				<th width="10%">Tanggal Lahir</th>
				<th width="10%">email</th>
				<th width="10%">No.Hp</th>
				<th width="10%">Subscriber</th>
				<th width="5%">aksi</th>
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
					<td><?php echo $buff['jk'];?></td>
					<td><?php echo $buff['ttl'];?></td>
					<td><?php echo $buff['email'];?></td>
					<td><?php echo $buff['notel'];?></td>
					<td><?php echo $buff['subscribers'];?></td>
					<td><a href="?module=database/hapus&username=<?php echo $buff['username'];?>">hapus</td>
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