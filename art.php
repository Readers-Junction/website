<!DOCTYPE html>
<html lang="en">

<head>
    <title>Books Display</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Readers' Junction">
    <link rel="shortcut icon" href="assets/img/favico.png">

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

		<div id="main_content" class="container">
			<div id = "orderByForm" class="col-sm-offset-9">
				<form name="sort" action="art.php" method="post">
					<select name="order">
					   <option value="choose">Sort By ... </option>
					   <option value="book_name" class = "1">Book Name (A to Z)</option>
					   <option value="book_name" class = "2">Book Name (Z to A)</option>
					   <option value="author" class = "1">Author (A to Z)</option>
					   <option value="author" class = "2">Author (Z to A)</option>
					   <option value="rating" class = "2">Rating (High to Low)</option>
					   <option value="rating" class = "1">Rating (Low to High)</option>
					   <option value="rent" class = "1">Rent (Low to High)</option>
					   <option value="rent" class = "2">Rent (High to Low)</option>
					   <option value="pages" class = "1">Rent (Less to More)</option>
					   <option value="pages" class = "2">Rent (More to Less)</option>
					</select>
					<input type="submit" value=" - Sort - " />
				</form>
			</div>
				
			<br><br>
			<div class="row">
				<div class="col-sm-3" >
					<div id = "catText">
						<ul>
							<li><a href = "art.php">Art</a>
							</li>
							<li>Biography
							</li>
							<li>Business
							</li>
							<li>Children's
							</li>
							<li>Classics
							</li>
							<li>Comics
							</li>
							<li>Contemporary
							</li>
							<li>Crime
							</li>
							<li>Fantasy
							</li>
							<li>Fiction
							</li>
							<li>Historical Fiction
							</li>
							<li>History
							</li>
							<li>Horror
							</li>
							<li>Humor And Comedy
							</li>
							<li>Memoir
							</li>
							<li>Music
							</li>
							<li>Mystery
							</li>
							<li>Non Fiction
							</li>
							<li>Paranormal
							</li>
							<li>Philosophy
							</li>
							<li>Poetry
							</li>
							<li>Psychology
							</li>
							<li>Religion
							</li>
							<li>Romance
							</li>
							<li>Science
							</li>
							<li>Science Fiction
							</li>
							<li>Self Help
							</li>
							<li>Suspense
							</li>
							<li>Spirituality
							</li>
							<li>Sports
							</li>
							<li>Thriller
							</li>
							<li>Travel
							</li>
							<li>Young Adult
							</li>
						</ul>
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<?php 
						mysql_connect( "localhost", "root", "toor") or die(mysql_error()); 
						mysql_select_db( "readersjunction") or die(mysql_error()); 
						$sort=$_POST["order"]!="choose"?$_POST["order"]:"book_name";
						$data=mysql_query( "SELECT * FROM artbooks ORDER BY ".mysql_real_escape_string($sort)." ASC") or die(mysql_error()); 
					?>																											
					<div id="catPics">
						
						<?php include("select.php"); ?>
						<div id="bookPics" class="displayBooks">
							<ul class="categories-list books">
								<?php $info= mysql_fetch_array( $data ) ?>
								<li class="book_pic col-md-offset-1">
									<div>
										<a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = "150" alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
										<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong>
										<br> by <?php echo ucwords($info['author']); ?></a>
									</div>
								</li>
								
								<?php $info= mysql_fetch_array( $data ) ?>
								<li class="book_pic col-md-offset-1">
									<div>
										<a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = "150" alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
										
													<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
												
									</div>
								</li>
								
								<?php $info= mysql_fetch_array( $data ) ?>
								<li class="book_pic col-md-offset-1">
									<div>
										<a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = "150" alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
											
												<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
											
									</div>
								</li>
								
								<?php $info= mysql_fetch_array( $data ) ?>
								<li class="book_pic col-md-offset-1">
									<div>
										<a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = "150" alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
										
													<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?></a>
												
									</div>
								</li>
								
								<?php $info= mysql_fetch_array( $data ) ?>
								<li class="book_pic col-md-offset-1">
									<div>
										<a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = "150" alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
										
													<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
												
									</div>
								</li>
								
								<?php $info= mysql_fetch_array( $data ) ?>
								<li class="book_pic col-md-offset-1">
									<div>
										<a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = "150" alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
										
													<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
												
									</div>
								</li>
								
								<?php $info= mysql_fetch_array( $data ) ?>
								<li class="book_pic col-md-offset-1">
									<div>
										<a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = "150" alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
										
													<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
												
									</div>
								</li>
								
								<?php $info= mysql_fetch_array( $data ) ?>
								<li class="book_pic col-md-offset-1">
									<div>
										<a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = "150" alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
										
													<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
												
									</div>
								</li>
								
								<?php $info= mysql_fetch_array( $data ) ?>
								<li class="book_pic col-md-offset-1">
									<div>
										<a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = "150" alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
										
													<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
												
									</div>
								</li>
								
								<?php $info= mysql_fetch_array( $data ) ?>
								<li class="book_pic col-md-offset-1">
									<div>
										<a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = "150" alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
										
													<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
												
									</div>
								</li>
								
								<?php $info= mysql_fetch_array( $data ) ?>
								<li class="book_pic col-md-offset-1">
									<div>
										<a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = "150" alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
										
													<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
												
									</div>
								</li>
								
								<?php $info= mysql_fetch_array( $data ) ?>
								<li class="book_pic col-md-offset-1">
									<div>
										<a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = "150" alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
										
													<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
												
									</div>
								</li>
								
								<?php $info= mysql_fetch_array( $data ) ?>
								<li class="book_pic col-md-offset-1">
									<div>
										<a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = "150" alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
										
													<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
												
									</div>
								</li>
								
								<?php $info= mysql_fetch_array( $data ) ?>
								<li class="book_pic col-md-offset-1">
									<div>
										<a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = "150" alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
										
													<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
												
									</div>
								</li>
								
								<?php $info= mysql_fetch_array( $data ) ?>
								<li class="book_pic col-md-offset-1">
									<div>
										<a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = "150" alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
										
													<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
												
									</div>
								</li>
								
								<?php $info= mysql_fetch_array( $data ) ?>
								<li class="book_pic col-md-offset-1">
									<div>
										<a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = "150" alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
										
													<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
												
									</div>
								</li>
								
								<?php $info= mysql_fetch_array( $data ) ?>
								<li class="book_pic col-md-offset-1">
									<div>
										<a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = "150" alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
										
													<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
												
									</div>
								</li>
								
								<?php $info= mysql_fetch_array( $data ) ?>
								<li class="book_pic col-md-offset-1">
									<div>
										<a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = "150" alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
										
													<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
												
									</div>
								</li>
								
								<?php $info= mysql_fetch_array( $data ) ?>
								<li class="book_pic col-md-offset-1">
									<div>
										<a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = "150" alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
										
													<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
												
									</div>
								</li>
								
								<?php $info= mysql_fetch_array( $data ) ?>
								<li class="book_pic col-md-offset-1">
									<div>
										<a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = "150" alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
										
													<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
												
									</div>
								</li>
							</ul>
						</div>
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