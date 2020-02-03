
<div  class="form">
 <h1> Tambah Admin </h1>
 
 
 <form action="?module=database/register_admin" method="post">
        <td bgcolor="#FFFFFF">
        <table width="400" border="0" align="center" cellpadding="5" cellspacing="0">
        
        <tr>
              <td><p class="contact"><label for="name">Nama</label></td>
              <td></td>
              <td><input name="nama" type="text" required="" ></td>
        </tr>
			 
        <tr>
              <td><p class="contact"><label >Username</label></p></td>
              <td></td>
              <td><input name="username" type="text" required="" ></td>
        </tr>

			  <tr>
              <td><p class="contact"><label >Password</label></p></td>
              <td></td>
              <td><input name="password" type="password" required=""  ></td>
        </tr>

        <tr>
              <td><p class="contact"><label>Jenis Kelamin</label></p></td>
              <td></td>
              <td> &nbsp;
                  <input name="jk" type="radio"  value="Laki-laki" required="">
               <label class="gender" > Laki-laki</label> &nbsp; 
                  <input name="jk" type="radio" value="Perempuan" required="">
               <label class="gender" > Perempuan </label></td>
        </tr>

		<tr>
              <td><p class="contact"><label for="name">TTL</label></p></td>
              <td></td>
              <td><input name="ttl" type="text" required=""  ></td>
        </tr>

        <tr>
              <td><p class="contact"><label for="name">E-mail</label></p></td>
              <td></td>
              <td><input name="email" type="email" required="" ></td>
        </tr>
			  
        
        <tr>
              <td><p class="contact"><label for="name">No.Hp</label></p></td>
              <td></td>
              <td><input name="notel" type="text" required=""  ></td>
        </tr>
            	  <input type="hidden" name="status_akun" value="3" />
        <tr>
              <td colspan="3" align="center">
				<button class="btn2 info" type="submit" >Simpan </button>
                 <button class="btn2 info" type="button"  onclick="window.location.href='?module=daftar_admin#pos'"> Batal </button>
              </td>
        </tr>
        </table>
      </td>
	 </form>
  </div>
	