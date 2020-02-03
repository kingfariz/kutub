<div  class="form">
 <h1> Kirim Respon </h1>

 <?php
		include"database/koneksi.php";
		$id=$_GET['id_video'];
    	$vid="SELECT * FROM tb_video where id_video='$id'";
		$username=$_SESSION['username'];
		$hasil=mysqli_query($conn, $vid);
		$buff=mysqli_fetch_array($hasil);
 ?>

<form action="?module=database/insert_respon&id_video=<?php;?>" method="post">
	<table width="350" border="0" align="center" cellpadding="5" cellspacing="0">
		<tr>
			<td><label>Berikan respon</label></td>
			<td></td>
			<td>	
		    <input name="respon" type="radio"  value="Like" required="">
		        <label class="gender" > Like</label> &nbsp; 
		    <input name="respon" type="radio" value="Dislike" required="">
		        <label class="gender" > Dislike </label>
		    </td>
	    </tr>
		<tr hidden="">
		    <td><label>Current Username</label></td>
		    <td></td>
		    <td><input type="text" name="username" value="<?php echo $username;?>" readonly/></td>
		</tr>
		<tr hidden="">
			<td><label>Current video id</label></td>
		    <td></td>
		    <td><input type="text" name="id_video" value="<?php echo $buff['id_video'];?>" readonly/></td>
	    </tr>
	    <tr>
			<td><label>Aksi</label></td>
			<td></td>
			<td>
			</br>
	        <button class="btn info" type="submit" > Kirim </button>
			<button class="btn info" type="button"  onclick="window.location.href='?module=view_video&id=1#pos'"> Batal </button>
			</td>
			</td>
		</tr>
	</table>
    </form>
</div>