<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: index.php");
	}

?>
<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Readers' Junction">
    <link rel="shortcut icon" href="assets/img/favico.png">

    <title> Welcome | Readers Junction | Books and Magazines on Rent</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
	
	<!-- Other CSS -->
	<link rel="stylesheet" href="assets/css/subpage.css" type="text/css" />
	<link rel="stylesheet" href="assets/css/icomoon.css">
	<link rel="stylesheet" href="assets/css/slider.css">
	
	
	<!-- JavaScript -->
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.jcarousel.min.js"></script>
	<script type="text/javascript" src="assets/js/jcarousellite_1.0.1.js"></script>
	<script type="text/javascript" src="assets/js/sliderFunctions.js"></script>
	
</head>

<body>
		<!-- ==== NAVIGATION BAR ==== -->
		<div id="navbar-main">
			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="container">
					<div class="col-md-9">
						<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li><a href="index.php" class="smoothScroll">Home</a></li>
								<li> <a href="books.html" class="smoothScroll">Books</a></li>
								<li> <a href="mags.html" class="smoothScroll">Magazines</a></li>
								<li> <a href="faq.html" class="smoothScroll">FAQ</a></li>
							</ul>
						</div><!--/.nav-collapse -->
					</div>
					<div class="col-md-3">
						<div class="social-icons">
							<ul class="nav navbar-nav">
								<li><a href="#" class="icon icon-facebook"></a></li>
								<li><a href="#" class="icon icon-twitter"></a></li>
								<li><a href="#" class="icon icon-google-plus"></a></li>
								<li><a href="profile.php" class="icon icon-user"></a></li> <!--Will go to SEARCH BAR right end-->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
	<div id="main_content" class="container">
		<!-- ==== SLIDER ==== -->	
		<div id="slider">
		<br><br><br><h3>CHECK FOR PROBLEM HERE</h3>
			<div class="shell">
				<ul>
					<li>
						<div class="image">
							<img src="assets/img/slider1.jpg" alt="Slider 1" width = "300px" />
						</div>
						<div class="details">
							<h2>Special Offers</h2>
							<p class="title">25% Discount</p>
							<p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id odio in tortor scelerisque dictum. Phasellus varius sem sit amet metus volutpat vel vehicula nunc lacinia.</p>
							<a href="offers.html" class="read-more-btn">Read More</a>
						</div>
					</li>
					<li>
						<div class="image">
						</div>
							<img src="assets/img/slider2.png" alt="Slider 2" width = "300px" />
						<div class="details">
							<h2>Most Popular</h2>
							<p class="title">Check out the most popular books</p>
							<p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id odio in tortor scelerisque dictum. Phasellus varius sem sit amet metus volutpat vel vehicula nunc lacinia.</p>
							<a href="#" class="read-more-btn">Read More</a>
						</div>
					</li>
					<li>
						<div class="image">
						</div>
							<img src="assets/img/slider3.jpg" alt="Slider 3" width = "300px" />
						<div class="details">
							<h2>Top Rated</h2>
							<p class="title">Check out the top rated books</p>
							<p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id odio in tortor scelerisque dictum. Phasellus varius sem sit amet metus volutpat vel vehicula nunc lacinia.</p>
							<a href="#" class="read-more-btn">Read More</a>
						</div>
					</li>
				</ul>
				<div class="nav">
					<a href="#">1</a>
					<a href="#">2</a>
					<a href="#">3</a>
				</div>
			</div>
		</div>

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
</div>
</body>
</html>