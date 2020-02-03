<div  class="form">
 <h1> Edit Video </h1>
 
 <?php
		include"database/koneksi.php";
    $id=$_GET['id_video'];
		$select = "SELECT * FROM tb_video where id_video='$id'";
		$hasil=mysqli_query($conn, $select);
		$buff=mysqli_fetch_array($hasil);
    $user=$_SESSION['username'];
 ?>
 
 <form action ="?module=database/update_video" method="post">
        <td bgcolor="#FFFFFF">
        <table width="350" border="0" align="center" cellpadding="5" cellspacing="0">
        
        <tr >
              <td><label>id</label></td>
              <td></td>
              <td><input type="text" name="id" value="<?php echo $id;?>" readonly/></td>
        </tr>
        <tr>
              <td><label>Username</label></td>
              <td></td>
              <td><input type="text" name="username" value="<?php echo $user;?>" readonly/></td>
        </tr>
			 
        <tr>
              <td><label>Judul Video</label></td>
              <td></td>
              <td><input name="judul" type="text" value="<?php echo $buff['judul'];?>" placeholder="Masukan judul video" required="" /></td>
        </tr>

			  <tr>
          <td><label>Category</label></td>
           <td></td>
           <td>
              <select type="text" name="kategori" placeholder="Pilih Kategori" required="" />
              <?php
                include"database/koneksi.php";
                $sql="SELECT * FROM tb_kategori";
                $merge=mysqli_query($conn,$sql);
                $muncul2=mysqli_fetch_array($merge)
              ?>
                <option>pilih kategori</option>
              <?php
                while($muncul=mysqli_fetch_array($merge)){ 
              ?>
                  <option name="kategori" value="<?php echo $muncul['id_kategori']; ?>">
                    <?php echo $muncul['kategori']; ?>
                  </option>
              <?php
                }
              ?>
              </select>
            </td>
        </tr>

        <tr>
              <td><label>Deskripsi</label></td>
              <td></td>
              <td><textarea name="deskripsi" type="text" value="<?php echo $buff['deskripsi'];?>" required=""> </textarea></td>
        </tr>
            
        <tr>
              <td colspan="3" align="center">
				<button class="btn2 info" type="submit" name="submit">Simpan </button>
                 <button class="btn2 info" type="button"  onclick="window.location.href='?module=daftar_video#pos'"> Batal </button>
              </td>
        </tr>
        </table>
      </td>
	 </form>
  </div>
	