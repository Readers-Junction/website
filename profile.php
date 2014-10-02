<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: index.php");
	}

?>
<html>
<head>
<title>PROFILE</title>
</head>
<body>

<?php
	ini_set ("display_errors", "1");
	error_reporting(E_ALL);
	
  //require_once('appvars.php');
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
	
	if (!empty($row['gender'])) {
      echo '<tr><td class="label">Gender:</td><td>';
      if ($row['gender'] == 'M') {
        echo 'Male';
      }
      else if ($row['gender'] == 'F') {
        echo 'Female';
      }
      else {
        echo '?';
      }
      echo '</td></tr>';
    }
    if (!empty($row['birthdate'])) {
      if (!isset($_GET['user_id']) || ($_SESSION['user_id'] == $_GET['user_id'])) {
        // Show the user their own birthdate
        echo '<tr><td class="label">Birthdate:</td><td>' . $row['birthdate'] . '</td></tr>';
      }
      else {
        // Show only the birth year for everyone else
        list($year, $month, $day) = explode('-', $row['birthdate']);
        echo '<tr><td class="label">Year born:</td><td>' . $year . '</td></tr>';
      }
    }
    
    if (!empty($row['city']) || !empty($row['state'])) {
      echo '<tr><td class="label">Location:</td><td>' . $row['city'] . ', ' . $row['state'] . '</td></tr>';
    }
    if (!empty($row['picture'])) {
      echo '<tr><td class="label">Picture:</td><td><img src="' . MM_UPLOADPATH . $row['picture'] .
        '" alt="Profile Picture" /></td></tr>';
    }
    echo '</table>';
    if (!isset($_GET['user_id']) || ($_SESSION['user_id'] == $_GET['user_id'])) {
      echo '<p>Would you like to <a href="editprofile.php">edit your profile</a>?</p>';
    }
  
	
?>

</body>
</html>