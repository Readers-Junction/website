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
	<link rel="stylesheet" href="assets/css/icomoon.css">
	<link rel="stylesheet" href="assets/css/welcome.css">
	
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
								<li><a href="profile.php" class="icon icon-user"></a></li> <!--Will go to SEARCH BAR right end-->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="flip-3d">
				<figure>
					<a href="books.php"><img src="assets/img/books.png" class="bookimg" alt="BOOKS"/></a>
					<figcaption><a href="books.php"><h1>BOOKS</h1><br></a></figcaption>
				</figure>			
		</div>
		
		
		<div class="flip-3d">
			<figure>
				<a href="mags.php"><img src="assets/img/mags.jpg" class="magimg" alt="MAGAZINES"/></a>
				<figcaption><a href="mags.php"><h1>MAGAZINES</h1><br></a></figcaption>
			</figure>
		</div>
		
		
		
		
		

</body>
</html>



		