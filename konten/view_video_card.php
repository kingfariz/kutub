<form action="index.php" method="get">
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
        		</tr>

		        <tr>
		              <td colspan="3" align="center">
						<input type="submit" value="cari" />
		              </td>
		        </tr>
		  </form>
    </table>

