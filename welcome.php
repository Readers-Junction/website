<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: index.php");
	}

?>
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
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-theme.min.css" rel="stylesheet" >
	
	<!-- Other CSS -->
	<link rel="stylesheet" href="assets/css/icomoon.css">
	<link rel="stylesheet" href="assets/css/welcome.css">
	
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</head>

<body>
		<!-- ==== NAVIGATION BAR ==== -->

		<div id="navbar-main">
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse" >
						
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><b><img src="assets/img/logo.png" width="25" alt="logo" /> &nbsp; Readers' Junction</b></a>
				</div>
				<div id="navbarCollapse" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="welcome.php" class="smoothScroll">Home</a></li>
						<li> <a href="books.php" class="smoothScroll">Books</a></li>
						<li> <a href="mags.php" class="smoothScroll">Magazines</a></li>
						<li> <a href="index.php" class="smoothScroll">FAQ</a></li>
					</ul>
					<div class="navbar-header navbar-right">
						<p class="navbar-text">
							<a id="signup" href="#modal" name="signup" rel="leanModal">Log In </a>
						</p>
					</div>
				</div>
				</div>
			</nav>
		</div>
			
		<script type="text/javascript">
		$('.navbar-collapse a').click(function(){
		$(".navbar-collapse").collapse('hide');
		});
		</script>		
		
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



		