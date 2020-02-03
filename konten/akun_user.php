
		<h2 id="margin">Daftar Aktivasi Akun User</h2><br/>
		<?php	
		include"database/koneksi.php";
		$select="SELECT * FROM register WHERE status_akun='1'";
		$hasil=mysqli_query($conn, $select);
		?>
		
		<div id="margin"style="overflow-x:auto;">
		<table border="1" id="user" width="700px">
			<tr >
				<th width="3%">No</th>
				<th width="10%">Nama</th>
				<th width="10%">Username</th>
				<th width="10%">Password</th>
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
					<td width="3%"><a href="?module=akun_user_modul&pos&username=<?php echo $buff['username']; ?>">Validasi </a></td>
				</tr>
	
		
		<?php
		};
		echo '</table>';
		mysqli_close($conn);
		?>
		</br>
		</br>
		 <a style="font-famly: Gotham; font-size:14" href="?module=daftar_user#pos"><--Kembali Kedaftar Akun</a>
	   </table>
		
		 
	</div>
	
		