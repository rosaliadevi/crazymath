<?php
	session_start();
	$a = rand(0, 100);
	$b = rand(0, 100);

	if (isset($_POST['submit1'])){
		$uploaddir = 'foto/';
	 	$uploadtime = date('YmdHis');
	 	$uploadfile = $_POST['username']."-".$uploadtime.".".pathinfo($_FILES['userfile']['name'],PATHINFO_EXTENSION);
	 	if(move_uploaded_file($_FILES['userfile']['tmp_name'],$uploaddir.$uploadfile)){
	 		echo "File BERHASIL diupload";
	 	} else {
	 		echo "File GAGAL diupload";
	 	}
	 	$_SESSION['filenameupload'] = $uploadfile;
	 	setcookie('username', $_POST['username'], time()+3600*24*7);
	 	header("Location: tampil2.php");

	}

	if (isset($_POST['submit'])){
		if ($_POST['a_old'] + $_POST['b_old'] == $_POST['hasil']){
			$_SESSION['score'] += 10;
			$status = true;
		} else {
			$_SESSION['score'] -= 5;
			$_SESSION['lives'] -= 1;
			$status = false;
		}
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
	<?php
		echo "<p>username: ".$_COOKIE['username']."</p>";
		echo "<p> LIVES : ".$_SESSION['lives']."</p>";
		echo "<p> SCORE : ".$_SESSION['score']."</p>";
	?>

	<?php
		if (isset($status)) {
			if ($status == true) {
				echo "<h3>JAWABAN ANDA BENAR!</h3>";
			} else {
				echo "<h3>JAWABAN ANDA SALAH!</h3>";
			}
		}
	?>

	<?php
		if ($_SESSION['lives'] == 0) {
			echo "<h2>GAME TELAH BERAKHIR !!</h2>";
			echo "<p><a href='index.php'>ULANGI LAGI</a></p>";
			setcookie('score', $_SESSION['score'], time()+3600*24*7);
			setcookie('lasttime', date('d/m/Y H:i'), time()+3600*24*7);

			include "config.php";
			$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			$query = "INSERT INTO scores(username, score, playtime) VALUES('".$_COOKIE['username']."', ".$_SESSION['score'].", '".date('y-m-d H:i:s')."')";

			$result = mysqli_query($db, $query);
		} else {
	?>

	<form method="post" action="tampil2.php">
		<?php
			echo "$a + $b = ";
		?>
		<input type="hidden" name="a_old" value="<?php echo "$a";?>">
		<input type="hidden" name="b_old" value="<?php echo "$b";?>">
		<input type="text" name="hasil" autofocus>
		<input type="submit" name="submit">
	</form>
	</center>
	<?php
		}
	?>
</body>
</html>