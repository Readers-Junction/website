<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: index.php");
	}

?>
<html>
<head>
<title>Details</title>
</head>
<body>

<?php
	ini_set ("display_errors", "1");
	error_reporting(E_ALL);
	
	require_once('connectvars.php');

	// Connect to the database
	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	
	$query = "SELECT * FROM users WHERE email = '" . $_SESSION['email'] . "'";
	
	$data = mysqli_query($connection, $query);
	
	if($data === FALSE) {
    echo '234567: ', mysql_error();
	
	die(mysql_error()); // TODO: better error handling
	}
	
	$row = mysqli_fetch_array($data);
	
	echo '<table>';
	echo '<tr><td class="label">Name:</td><td>' . $row['name'] . '</td></tr>';
	echo '<tr><td class="label">Registered Email:</td><td>' . $row['email'] . '</td></tr>';
  
	
?>



</body>
</html>