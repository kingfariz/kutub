<?php session_start(); ?>
<html>
<head>
	<title>Kutub.com</title>
	<link href = "style/style.css" type="text/css" rel="stylesheet" />
	<link href = "style/style_portofolio.css" type="text/css" rel="stylesheet" />
	<link href = "style/style_portofolio.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
</head>

<body>
	
	<div id="header">
			<img
			src="images/kutub2.gif"
			alt="Gambar gif"
			style="width: 100%;">
	</div>

<div class="navbar">
    <a href="?module=home#pos">Home</a>
   	<a href="?module=view_video&id=1#pos">Categories</a>
	<a href="?module=about#pos">About Us</a>
	
	<a href="konten/logout.php" style="float:right ; color: Yellow ">Logout</a>
	<div class="dropdown" style="float:right" >
    <button class="dropbtn">Setting  <i class="fa fa-caret-down"></i></button>
    <div class="dropdown-content">
      <a href="?module=daftar_user#pos">Manage user</a>
 	  <a href="?module=daftar_admin#pos">Manage Admin</a>
      <a href="?module=daftar_kategori#pos">Add Category</a>
	  <a href="?module=daftar_video#pos">Daftar Video</a>
      <a href="?module=laporan#pos">Chart report</a>
    </div>
  </div> 

 <a href="?module=form_upload#pos" style="float:right"><img src="images/upload4.png"  style="height: 19px; width: 25px"></a>

 </div>

	<div id="row">
	  <div id ="leftcolumn">
	  		<div id="card">
				<?php if(isset($_GET['module']))
				include "konten/$_GET[module].php";
			else
				include "konten/home.php";?>
			</div>
      </div>

	  <div id="rightcolumn">

			<?php 
				if(isset($_SESSION['username'])){
			?>
				<div id="card">
					<div id="row">
     <img src="images/profile.png" alt="Jane" width="100px" height="120px" class="center" >
      <div class="container">
	  
	 <?php echo '<strong><p align=center>'.$_SESSION['username'].'</p>';?> 
	  
		<p align="center" style="font-size: 14px" class="line" >	<?php 
					    include"konten/database/koneksi.php";
					    $subs = "SELECT subscribers FROM register where(username='".$_SESSION['username']."')";
					    $status_akun = "SELECT register.status_akun,tb_status.akun FROM register INNER JOIN tb_status ON register.status_akun = tb_status.status where(username='".$_SESSION['username']."')";
					   	$execute=mysqli_query($conn, $subs); 
						$execute2=mysqli_query($conn, $status_akun);
			
			if (mysqli_num_rows($execute) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($execute)) {
			    	  echo $row["subscribers"] ;    
			    	  echo "  subscribers" ; 
			    }
			} 
			else {
			    echo "eror : null";
			}
		    ?>
		    	
		</p>
        <p><button class="button2 info" onclick="window.location.href='?module=myprofil#pos'">My Profile</button></p>
     
	</div>	
	</div>
				
				
				
				</div>
				
				<div id="card">
				<img
			src="images/kutub.gif"
			alt="Gambar gif"
			style="width: 100%;">
				</div>
				
				<div id="card">

					<div id="map"></div>
			    <script>
			      var map;
			      function initMap() {
			        map = new google.maps.Map(document.getElementById('map'), {
			          center: {lat: -34.397, lng: 150.644},
			          zoom: 8
			        });
			      }
			    </script>
			    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxD7GQdj_Bpfuoc494O_O0Io3pCKuwIXc&callback=initMap"
			    async defer></script>
				</div>

			<?php
					} else {
			?>
				<div id="card">
				<img
			src="images/kutub.gif"
			alt="Gambar gif"
			style="width: 100%;">
				</div>
				
				<div id="card">
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxD7GQdj_Bpfuoc494O_O0Io3pCKuwIXc&callback=initMap"
  type="text/javascript"></script>
				</div>
			
			<?php 
				}
				//session_destroy(); 
			?> 		
		      
		  

		    

		  </div>
		</div>

		
<div id="footer">
  <h3 style="color: white;">Copy Right &copy; 2018</h3>
</div>

</body>

</html>

