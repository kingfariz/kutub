<?php
include "koneksi.php"; // Memanggil file config.php yang berguna untuk koneksi ke database
include "judul_seo.php"; // Memanggil file judul_seo.php yang berguna untuk fungsi pengubah huruf menjadi kecil dan huruf serta angka saja, seperti: mobil-mobilan-yang-keren

      $allowed_ext  = array('mp4'); // Jenis file yang diperbolehkan untuk diupload

        // Proses insert data dari form ke db
        $sql = "UPDATE tb_video SET judul='$_POST[judul]',kategori='$_POST[kategori]',deskripsi='$_POST[deskripsi]',username_upload='$_POST[username]' WHERE id_video='$_POST[id]'";
                 
        $hasil=mysqli_query($conn, $sql);
        if($hasil){
          echo "<script>alert('Video berhasil di edit!');location.replace('?module=daftar_video#pos')</script>";
        }
        
        else{
          echo "Error updating record: " . mysqli_error($conn);
        }
  
?>