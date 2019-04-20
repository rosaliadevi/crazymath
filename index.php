<?php 
	session_start();
	setcookie('username',"",time()+1);
	if (isset($_COOKIE['username'])){
		$status = true;
	} else {
		$status = false;
		setcookie('username',"",time()-3600);
		setcookie('score',"",time()-3600);
		setcookie('lasttime',"",time()-3600);
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Game CrazyMath</title>
 </head>
 <body>
  	<center>
 	<h1>CRAZY MATH</h1>

 	<form enctype="multipart/form-data" method="post" action="tampil2.php" >
 		<?php
			if ($status == false){
		?>
			Masukkan nama Anda <input type="text" name="username"><br><br>
			Masukkan foto anda : <input type="file" name="userfile"/><br><br>
			<input type="submit" name="submit1" value="Start !!">
		<?php		
			} else {
			echo "<p>Welcome back, ".$_COOKIE['username']."</p>";
			echo "<p>Sebelumnya, terakhir kali Anda main game ini tanggal ".$_COOKIE['lasttime']." dengan score ".$_COOKIE['score']."</p>";
			echo "<a href='index.php' name='status' value='false'>Bukan kamu ?</a>";

		?><br><br>
			<input type="submit" name="submit2" value="Start !!">
		<?php		
			}
		?>
 	</form>
 	</center>

		<?php
 			$_SESSION['lives'] = 5;
 			$_SESSION['score'] = 0;
 		?>

 </body>
 </html>

