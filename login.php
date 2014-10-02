<html>
<head>
</head>
<body>
<?php
require_once('connectvars.php');
$tbl_name="user"; // Table name


// Connect to server and select databse.
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if (isset($_POST['login'])) 
{
        $email = mysqli_real_escape_string($connection,$_POST['mail']);
        $password = mysqli_real_escape_string($connection,$_POST['pass']);
		$password = md5($password);
        $strSQL = mysqli_query($connection,"select * from users where email='".$email."' and pass='".$password."'");
        $Results = mysqli_fetch_array($strSQL);
		if(count($Results)>=1)
        {
			session_start();
			$_SESSION['login'] = "1";
			$_SESSION['email'] = $email;
			header("location: welcome.php");
        }
        else
        {
			$strSQL = mysqli_query($connection,"select * from users where email='".$email."'");
			$Results = mysqli_fetch_array($strSQL);
			if(count($Results)>=1)
			{
				session_start();
				$_SESSION['login'] = "";
				$_SESSION['error'] = "0"; //Incorrect Password
				header("location: index.php");

			}
			else
			{
				session_start();
				$_SESSION['login'] = "";
				$_SESSION['error'] = "1"; //Email not found in database
				header("location: index.php");
			}
        }        
    }
elseif(isset($_POST['signup']))
    {
        $name       = mysqli_real_escape_string($connection,$_POST['name']);
        $email      = mysqli_real_escape_string($connection,$_POST['mail']);
        $password   = mysqli_real_escape_string($connection,$_POST['pass']);
		$password = md5($password);
        $query = "SELECT email FROM users where email='".$email."'";
        $result = mysqli_query($connection,$query);
		$numResults = mysqli_num_rows($result);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
        {
            session_start();
			$_SESSION['login'] = "";
			$_SESSION['error'] = "2"; // Invalid Email
            header("location: index.php"); 
        }
        elseif($numResults>=1)
        {
            session_start();
			$_SESSION['login'] = "";
			$_SESSION['error'] = "3"; // Already Registered
            header("location: index.php");
        }
        else
        {
            mysqli_query($connection,"INSERT into users(name,email,pass) VALUES('".$name."','".$email."','".$password."')");
			session_start();
			$_SESSION['login'] = "1";
			$_SESSION['email'] = $email;
			header("location: welcome.php");
        }
    }
	
	
	mysqli_close($connection);
?>

</body>
</html>