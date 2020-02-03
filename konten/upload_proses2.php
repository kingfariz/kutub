<?php
include "database/koneksi.php"; // Memanggil file config.php yang berguna untuk koneksi ke database
include "judul_seo.php"; // Memanggil file judul_seo.php yang berguna untuk fungsi pengubah huruf menjadi kecil dan huruf serta angka saja, seperti: mobil-mobilan-yang-keren
if(isset($_POST['submit'])) // Menyatakan bahwa apabila tombol submit ditekan maka proses upload baru bisa dimulai
{
  $judul  = mysqli_real_escape_string($conn, $_POST['judul']); // Mengambil value/ nilai dari form input bernama judul

  $judul_seo    = judul_seo($judul); // Berfungsi untuk mengubah teks yang diinputkan pada form judul
  $cekdata = "SELECT judul FROM tb_video WHERE judul = '$judul' "; // Memilih field judul dari tabel gambar dengan judul yang telah diinputkan
  $ada     = mysqli_query($conn, $cekdata); // Proses koneksi ke database
  if(mysqli_num_rows($ada) > 0) // Mengecek ke database
  {
    echo "<script>alert('ERROR: Judul telah terdaftar, silahkan pakai Judul lain!');history.go(-1)</script>";
  }
    else // Apabila judul tidak ada yang sama maka akan dilanjutkan proses upload
    {
      $allowed_ext  = array('mp4'); // Jenis file yang diperbolehkan untuk diupload
      $file_name    = $_FILES['vid']['name']; // vid adalah name dari tombol input pada form
      $file_ext     = strtolower(end(explode('.', $file_name))); // Membuat
      $file_size    = $_FILES['vid']['size']; // Mengambil info size file
      $file_tmp     = $_FILES['vid']['tmp_name']; // Membuat file upload temporary/ sementara
      // Menentukan lokasi upload dan menggabungkan dengan judul_seo dan ekstensi file yang diupload
      $vid          = $judul_seo.'.'.$file_ext; // Membuat nama file dengan judul_seo dan ekstensi filenya
      $lokasi=$_SERVER["DOCUMENT_ROOT"]."/kutub/videos/".$vid;

      if(in_array($file_ext, $allowed_ext) === true) // Pengecekan tipe file yang diperbolehkan
      {
        move_uploaded_file($file_tmp, "$lokasi"); // Proses pengkopian foto ke loksi upload

        // Proses insert data dari form ke db
        $sql = "INSERT INTO  tb_video (judul,lokasi,kategori,deskripsi,username_upload)
                            VALUES ('$judul_seo','$vid','$_POST[kategori]','$_POST[deskripsi]','$_POST[username]')";

        if(mysqli_query($conn, $sql)){
          echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('../index2.php')</script>";
        }
        else{
          echo "Error updating record: " . mysqli_error($conn);
        }
      }
      else
      {
        echo "<script>alert('Jenis file tidak sesuai!');history.go(-1)</script>";
      }
    }
}
  else
  {
    echo "<script>alert('Pastikan semua data dimasukan dengan benar');history.go(-1)</script>";
  }
?>