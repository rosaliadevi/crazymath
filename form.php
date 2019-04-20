<?php
// koneksi ke mysql -> crazymath
$db = mysqli_connect("localhost", "root", "", "crazymath");

// query insert
$query = "INSERT INTO scores(username, score, playtime)
		VALUES ('rosalia', 35, '2019-04-04 13:27:00')";

$result = mysqli_query($db, $query);

if ($result) {
	echo "Insert data sukses";
} else {
	echo "Insert data gagal";
}

?>