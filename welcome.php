<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: index.html");
}
?>
<html>
<head>
<title>PROFILE</title>
</head>
<body>
<a href = "logout.php">Log out</a>

<br><br><br><br>
<h1>
Login Successful

</body>
</html>