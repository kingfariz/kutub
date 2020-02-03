<div  class="form">
 <h1> Edit Profile </h1>
 
 <?php
		include"database/koneksi.php";
		$select = "SELECT * FROM register where(username='".$_SESSION['username']."')";
		$hasil=mysqli_query($conn, $select);
		$buff=mysqli_fetch_array($hasil);
 ?>
 
 <form action ="?module=database/update_profile" method="post">
        <td bgcolor="#FFFFFF">
        <table width="400" border="0" align="center" cellpadding="5" cellspacing="0">
        
        <tr>
              <td><p class="contact"><label for="name">Nama</label></td>
              <td></td>
              <td><input name="nama" type="text" required="" value="<?php echo $buff['nama'];?>"></td>
        </tr>
			 
        <tr>
              <td><p class="contact"><label >Username</label></p></td>
              <td></td>
              <td><input name="username" type="text"  value="<?php echo $buff['username'];?>" readonly></td>
        </tr>

			  <tr>
              <td><p class="contact"><label >Password</label></p></td>
              <td></td>
              <td><input name="password" type="password" required="" value="<?php echo $buff['password'];?>" ></td>
        </tr>

        <tr>
              <td><p class="contact"><label>Jenis Kelamin</label></p></td>
              <td></td>
              <td> &nbsp;
                  <input name="jk" type="radio"  value="Laki-laki"  required="" >
               <label class="gender" > Laki-laki</label> &nbsp; 
                  <input name="jk" type="radio" value="Perempuan"  required="">
               <label class="gender" > Perempuan </label></td>
        </tr>

		<tr>
              <td><p class="contact"><label for="name">TTL</label></p></td>
              <td></td>
              <td><input name="ttl" type="text" required="" value="<?php echo $buff['ttl'];?>" ></td>
        </tr>

        <tr>
              <td><p class="contact"><label for="name">E-mail</label></p></td>
              <td></td>
              <td><input name="email" type="email" required="" value="<?php echo $buff['email'];?>"></td>
        </tr>
			  
        
        <tr>
              <td><p class="contact"><label for="name">No.Hp</label></p></td>
              <td></td>
              <td><input name="notel" type="text" required="" value="<?php echo $buff['notel'];?>" ></td>
        </tr>
            
        <tr>
              <td colspan="3" align="center">
				<button class="btn2 info" type="submit" >Simpan </button>
                 <button class="btn2 info" type="button"  onclick="window.location.href='?module=myprofil#pos'"> Batal </button>
              </td>
        </tr>
        </table>
      </td>
	 </form>
  </div>
	