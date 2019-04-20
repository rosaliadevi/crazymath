<?php 
	session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Game CrazyMath</title>
 </head>
 <body>
  	<center>
 	<h1>CRAZY MATH</h1>
 	<form  method="post" action="index.php" >
 		<input type="submit" name="submitYA" value="START">
 	</form>
 	</center>
 	<?php
 		$_SESSION['lives'] = 5;
 		$_SESSION['score'] = 0;
 	?>
 </body>
 </html>