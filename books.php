<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: index.php");
	}

?>
<!DOCTYPE html>
<html lang="en">
<!-- TO DISPLAY THE BOOK CATEGORIES -->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Readers' Junction">
    <link rel="shortcut icon" href="assets/img/favico.png">

    <title> Books | Readers Junction | Books and Magazines on Rent</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
	
	<!-- Other CSS -->
	<link rel="stylesheet" href="assets/css/subpage.css" type="text/css" />
	<link rel="stylesheet" href="assets/css/books.css" type="text/css" />
	<link rel="stylesheet" href="assets/css/icomoon.css">
	
	
</head>

<body>
	<!-- ==== NAVIGATION BAR ==== -->
		<div id="navbar-main">
			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="container">
					<div class="col-md-9">
						<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li><a href="welcome.php" class="smoothScroll">Home</a></li>
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
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?PHP 
			require_once('connectvars.php');
			$dbname = DB_NAME;
			mysql_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			$sql = "SHOW TABLES FROM $dbname";
			$result = mysql_query($sql);
			$sub1 = "books";
		?>
		
		<div id="main_content" class="container">
			<div class="row">
			<div class="col-sm-3" >
			<div id = "catText">
				<ul>
					<?PHP 
						while ($row = mysql_fetch_row($result)) {
							$pos      = strripos($row[0], $sub1);
							if ($pos != false) {
								echo '<li><a href = "'.substr($row[0], 0, $pos).'.php">';
								echo strtoupper(substr($row[0], 0, $pos));
								echo "</a></li>";
							}
						}
					?>
				</ul>
			</div>
			</div>
			
			<div class="col-sm-9 padding-right">
				<div id = "catPics">
					<ul class="categories-list books">
							<li class="cat_pic col-md-offset-1" data-category="1">
								<div>
									<a href="art.php"><img src="images/categories/1.jpg" width = 150px alt="Art" /></a>
										<h5>
											<a href="art.php"><strong>Art</strong></a>
										</h5>
								</div>
							</li>
							<li class="cat_pic col-md-offset-1" data-category="2">
								<div>
									<a href="#"><img src="images/categories/2.jpg" width = 150px alt="Biography" /></a>
										<h5>
											<a href="#"><strong>Biography</strong></a>
										</h5>
								</div>
							</li>
							<li class="cat_pic col-md-offset-1" data-category="1">
								<div>
									<a href="#"><img src="images/categories/1.jpg" width = 150px alt="Art" /></a>
										<h5>
											<a href="#"><strong>Art</strong></a>
										</h5>
								</div>
							</li>
							<li class="cat_pic col-md-offset-1"  data-category="2">
								<div>
									<a href="#"><img src="images/categories/2.jpg" width = 150px alt="Biography" /></a>
										<h5>
											<a href="#"><strong>Biography</strong></a>
										</h5>
								</div>
							</li>
							<li class="cat_pic col-md-offset-1"  data-category="1">
								<div>
									<a href="#"><img src="images/categories/1.jpg" width = 150px alt="Art" /></a>
										<h5>
											<a href="#"><strong>Art</strong></a>
										</h5>
								</div>
							</li>
							<li class="cat_pic col-md-offset-1"  data-category="2">
								<div>
									<a href="#"><img src="images/categories/2.jpg" width = 150px alt="Biography" /></a>
										<h5>
											<a href="#"><strong>Biography</strong></a>
										</h5>
								</div>
							</li>
							<li class="cat_pic col-md-offset-1"  data-category="1">
								<div>
									<a href="#"><img src="images/categories/1.jpg" width = 150px alt="Art" /></a>
										<h5>
											<a href="#"><strong>Art</strong></a>
										</h5>
								</div>
							</li>
							<li class="cat_pic col-md-offset-1"  data-category="2">
								<div>
									<a href="#"><img src="images/categories/2.jpg" width = 150px alt="Biography" /></a>
										<h5>
											<a href="#"><strong>Biography</strong></a>
										</h5>
								</div>
							</li>
							<li class="cat_pic col-md-offset-1"  data-category="1">
								<div>
									<a href="#"><img src="images/categories/1.jpg" width = 150px alt="Art" /></a>
										<h5>
											<a href="#"><strong>Art</strong></a>
										</h5>
								</div>
							</li>
							<li class="cat_pic col-md-offset-1"  data-category="2">
								<div>
									<a href="#"><img src="images/categories/2.jpg" width = 150px alt="Biography" /></a>
										<h5>
											<a href="#"><strong>Biography</strong></a>
										</h5>
								</div>
							</li>
					</ul>
				</div>
			</div>
			</div>
		</div>
		
		<div id="footer">
		
		   <a href="index.php">Home</a> | <a href="books.html">Books</a> | <a href="mags.html">Magazines</a> | <a href="about.html">About</a> | <a href="contact.html">Contact Us</a><br />
			Copyright © 2048 <a href="#"><strong>Readers' Junction</strong></a>
	   
		</div> 

		
	</body>
</html>