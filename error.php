<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: index.html");
	if (isset($_SESSION['error']))
	{
		if ($_SESSION['error']==0)
		{?>
			<script>
				alert("Incorrect Password");
			</script>

<?php 	}
		if ($_SESSION['error']==1)
		{ ?>
			<script>
				alert("Email not found in database");
			</script>

<?php 	}
		if ($_SESSION['error']==2)
		{?>
			<script>
			
				alert("Please check your Email");
			
			</script>
<?php 	}
		if ($_SESSION['error']==3)
		{?>
			<script>
			
				alert("Already Registered");
			
			</script>
<?php 	}
	}
	}
?>	


	<html>
	<head>
	<title>Error Page</title>
	
	</head>
	<body>

		<h1> Should redirect to index.html after displaying error </h1>
	</body>
	</html>
