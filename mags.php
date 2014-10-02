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
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
				
		<div id="main_content">
			<div class="col-md-2" >
			<div id = "catText">
				<ul>
					<li><a href="#">Arts & Photography</a></li>
					<li><a href="#">Automotive</a></li>
					<li><a href="#">Business</a></li>
					<li><a href="#">Children's </a></li>
					<li><a href="#">Computers & Internet</a></li>
					<li><a href="#">Cooking, Food & Wine</a></li>
					<li><a href="#">Education</a></li>
					<li><a href="#">Electronics & Audio</a></li>
					<li><a href="#">Entertainment</a></li>
					<li><a href="#">Fashion & Style</a></li>
					<li><a href="#">Health, Mind & Body</a></li>
					<li><a href="#">History</a></li>
					<li><a href="#">Lifestyle & Cultures</a></li>
					<li><a href="#">Men's Interest</a></li>
					<li><a href="#">Movies & Music</a></li>
					<li><a href="#">News & Politics</a></li>
					<li><a href="#">Newspapers</a></li>
					<li><a href="#">Outdoors & Nature</a></li>
					<li><a href="#">Parenting & Families</a></li>
					<li><a href="#">Pets</a></li>
					<li><a href="#">Professional & Trade</a></li>
					<li><a href="#">Religion & Spirituality</a></li>
					<li><a href="#">Science & Nature</a></li>
					<li><a href="#">Sports & Leisure</a></li>
					<li><a href="#">Travel & Regional</a></li>
					<li><a href="#">Women's Interest</a></li>
				</ul>
			</div>
			</div>
			
			<div class="col-md-10" >
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
		
		<div id="footer">
		
		   <a href="index.php">Home</a> | <a href="books.html">Books</a> | <a href="mags.html">Magazines</a> | <a href="about.html">About</a> | <a href="contact.html">Contact Us</a><br />
			Copyright © 2048 <a href="#"><strong>Readers' Junction</strong></a>
	   
		</div> 

		
	</body>
</html>