 <div  class="form">
 <h1> Tambah Kategori </h1>
 
  <form action="?module=database/kategori" method="post">
      <table width="400" border="0" align="center" cellpadding="5" cellspacing="0">
        
        <tr>
              <td><label for="name">Nama Kategori</label></td>
              <td></td>
              <td><input name="kategori" type="text" required="" ></td>
        </tr>
		
		<tr>
              <td colspan="3" align="center">
				<button class="btn2 info" type="submit" >Simpan </button>
                <button class="btn2 info" type="button"  onclick="window.location.href='?module=daftar_kategori#pos'"> Batal </button>
              </td>
        </tr>
		
        </table>

	 </form>
  </div>