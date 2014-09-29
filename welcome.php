<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: index.html");
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
	<style >
	a, a:before, a:after  {color: #999; text-decoration: none; outline: 0;}
	a:hover, a:focus {
    color: #666;
    text-decoration: none;
    outline: 0;
}

	</style>
	
	<!-- Other CSS -->
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
								<li><a href="index.html" class="smoothScroll">Home</a></li>
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
		<br><br><br><br>Currently this page is in a bare bones stage. It will be changed to a better looking one with more effects and better photos but the content will remain almost the same
		<h2 align="center"> Where would you like to begin ? </h2>
		<br><br>
		<div class="col-lg-6">
		<a href="books.php"><h3 align="center"> BOOKS </h3>
		<img src="assets/img/books.png"/></a>
		</div>
		<div class="col-lg-6">
		<a href="mags.php"><h3 align="center"> MAGAZINES </h3>
		<img src="assets/img/mags.jpg"/></a>
		</div>
	</div>
</div>
</body>
</html>