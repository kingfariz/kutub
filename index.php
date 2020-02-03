<?php session_start(); ?>
<html>
<head>
	<title>Kutub.com</title>
	<link href = "style/style.css" type="text/css" rel="stylesheet" />
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
	<?php 
		if(isset($_SESSION['username'])){
			?>
				<a href="konten/logout.php" style="float:right ; color: yellow ">Logout</a>
				<div class="dropdown" style="float:right" >
				<button class="dropbtn">Setting  <i class="fa fa-caret-down"></i></button>
					<div class="dropdown-content">
					<a href="?module=daftar_video#pos">Daftar Video</a>
				</div>
				</div> 
				 <a href="?module=form_upload#pos" style="float:right"><img src="images/upload4.png"  style="height: 19px; width: 25px"></a>

			<?php
				} 
		else {
			?>
				<a href="?module=loginpage#pos" style="float:right ; color: yellow ">Login </a>
				<a href="?module=signup#pos" style="float:right ">Sign Up</a>
			
			<?php 
				}
				//session_destroy(); 
			?> 		
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
	  			<?php echo '<strong><big><big><p align=center>'.$_SESSION['username'].'</strong></p>';?>
	  
				<p align="center" style="font-size: 14px" class="line" > 	<?php 
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
        		
        		<p><button class="button2 info" onclick="window.location.href='?module=myprofil#pos'">My Profil</button></p>
     
				</div>	
			</div>		
		</div>
					
		<div id="card">
			<img
			src="images/kutub.gif"
			alt="Gambar gif"
			style="width: 100%;">
		</div>
	
			<?php
				}
				else{
			?>
				<div id="card">
			<img
			src="images/kutub.gif"
			alt="Gambar gif"
			style="width: 100%;">
				</div>
			<?php 
				}
			?> 		
		  </div>
		</div>

		
<div id="footer">
  <h2 style="color: white;">Copy Right&copy; 2018</h2>
</div>

</body>

</html>

