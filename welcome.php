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
		<br><br><br><h1>ONE WAY </h1>
		<h4>Works for slected browsers IE>10 and other browsers here <a>http://www.w3schools.com/css/css3_3dtransforms.asp</a></h4>
			<div id="books_container" class="col-md-6">
				<div id="books" class="shadow">
					<div class="front face">
						<a href="books.php"><img src="assets/img/books.png" class="bookimg"/></a>
					</div>
					<div class="back face center">
						<a href="books.php"><h1>BOOKS</h1><br>
						<p> Select from a wide variety of books, chosen after an extensive survey</p></a>
					</div>
				</div>
			</div>
			
			<div id="mags_container" class="col-md-6">
				<div id="mags" class="shadow">
					<div class="front face">
						<a href="mags.php"><img src="assets/img/mags.jpg" class="magimg"/></a>
					</div>
					<div class="back face center">
						<a href="mags.php"><h1>MAGAZINES</h1><br>
						<p>Check the latest issues of some of the most popular magazines on India.</p></a>
					</div>
				</div>
			</div>
		
		</div>
		
		<div id="Way2">
		<br><br><br><h1>ANOTHER WAY </h1>
		<h3>(Safer - Works in all browser)</h3>
		
			<div class="booksBackground col-md-6">
				<div class="booksTransbox">
					<a href="books.php"><h2>BOOKS</h2></a>
				</div>
			</div>

			<div class="magsBackground col-md-6">
				<div class="magsTransbox">
					<a href="mags.php"><h2>MAGAZINES</h2></a>
				</div>
			</div>
		</div>
	
</body>
</html>



		