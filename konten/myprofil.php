
<div  class="form4">
 <h1> My Profile </h1>
 
 <?php
		include"database/koneksi.php";
		$select = "SELECT * FROM register where (username='".$_SESSION['username']."')";
		$hasil=mysqli_query($conn, $select);
		$buff=mysqli_fetch_array($hasil);
?>
<form> 
        <td bgcolor="#FFFFFF">
        <table  border="0" align="center" cellpadding="5" cellspacing="0">
        
        <tr>
              <td><label>Nama</label></td>
              <td>:</td>
               <td><p><?php echo $buff['nama'];?> </p></td>
        </tr>
			 
        <tr>
              <td><label>Username</label></td>
              <td>:</td>
              <td><p><?php echo $buff['username'];?></p></td>
        </tr>

			  <tr>
              <td><label >Password</label></td>
              <td>:</td>
              <td><p><?php echo $buff['password'];?></p></td>
        </tr>

        <tr>
              <td><label>Jenis Kelamin </label></td>
              <td> :</td>
              <td> <p><?php echo $buff['jk'];?></p></td>
        </tr>
		
		<tr>
              <td><label for="name">TTL</label></td>
              <td>:</td>
              <td><p><?php echo $buff['ttl'];?></P</td>
        </tr>
       
	   <tr>
              <td><label for="name">E-mail</label></td>
              <td>:</td>
              <td><p><?php echo $buff['email'];?></p></td>
        </tr>
		
        <tr>
              <td><label for="name">No.Hp</label></td>
              <td>:</td>
              <td><p><?php echo $buff['notel'];?></p></td>
        </tr>
        
		<tr>
              <td><label for="name">Status Akun</label></td>
              <td>:</td>
              <td><p><?php echo 'Aktif';?></p></td>
        </tr>
		
        <tr>
              <td colspan="3" align="center">
				  <button class="btn1 info" type="button"  onclick="window.location.href='?module=Edit_akun#pos'"> Edit </button>
              </td>
        </tr>
        </table>
		<?php
	
		mysqli_close($conn);
		?>
      </td>
	</br>
	 </form>
	 </div>

