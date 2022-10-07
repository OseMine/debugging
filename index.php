<?php
$hostname = "10.35.232.119:3306";
$username = "k187495_chat";
$password = "SupersicheresPasswort";
$dbname = "k187495_chat";
	
$connection = new mysqli($hostname, $username, $password, $dbname);
				


$fname = "";
$lname = "";
$email = "";
$img = "";
$password = "";


$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST["email"];
	$img = $_POST["img"];
	$password = $_POST["password"];
	
		do {
		if ( empty($fname) || empty($lname) || empty($email) || empty($img) || empty($password) ) {
		$errorMessage = "Alle Felder sind auszufüllen";
			break;
		}
	
	
	$sql = "INSERT INTO users (fname, lname, email, img, password) " . 
			"VALUES ('$fname', '$lname', '$email', '$img', '$password');
			$result = $connection->query($sql);
				if (!$result) {
					$errorMessage = "Invalid query: " . $connection->error;
	

		
$fname = "";
$lname = "";
$email = "";
$img = "";
$password = "";
		
$successMessage = "Element wurde erfogreich zur Datenbank Hinzugefügt";

header("location: /index.php");
exit;
		
	} while (false);
}
?>
