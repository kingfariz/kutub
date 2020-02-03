

<title>Upload Video</title>
<div  class="form">
    <h1> Upload Video </h1>
  <form action="konten/upload_proses.php" method="post" enctype="multipart/form-data">
      <td bgcolor="#FFFFFF">
      <table width="400" border="0" align="center" cellpadding="5" cellspacing="0">
        <?php
              include"database/koneksi.php";
              $user=$_SESSION['username'];

        ?>
        <tr>
              <td><p class="contact"><label>Username</label><p></td>
              <td></td> 
              <td><input type="text" name="username" value="<?php echo $user;?>" readonly /></td>
        </tr>
        <tr>
              <td><p class="contact"><label>Judul Video</label><p></td>
              <td></td>
              <td><input name="judul" type="text" placeholder="Masukan judul video" required="" /></td>
        </tr>

        <tr>
          <td><p class="contact"><label>Category</label><p></td>
           <td></td>
           <td>
              <select type="text" name="kategori" placeholder="Pilih Kategori" />
              <?php
                include"database/koneksi.php";
                $sql="SELECT * FROM tb_kategori";
                $merge=mysqli_query($conn,$sql);
              ?>
                <option>Pilih Kategori</option>
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
              <td><p class="contact"><label>Deskripsi</label><p></td>
              <td></td>
              <td><textarea name="deskripsi" placeholder="Deskripsi video" required=""></textarea> </td>
        </tr>

        <tr>
              <td><p class="contact"><label for="name">Video</label><p></td>
              <td></td>
              <td><input type="file" name="vid" required/></td>
        </tr>


        
        <tr>
              <td colspan="3" align="center">
			        <button class="btn2 info" type="submit" name="submit" >Upload </button>
              <button class="btn2 info" type="button"  onclick="window.location.href='?module=myprofil#pos'"> Batal </button>
              </td>
        </tr>
      </table>
      </td>
  </form>
  </div>  