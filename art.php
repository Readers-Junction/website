<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Books Display</title>
    <link rel="stylesheet" href="css/common.css" type="text/css" />
	<link rel="stylesheet" href="css/bookDisplay.css" type="text/css" />
	
</head>

<body>
	<div id="header" class="shell">
		<div id="logo">
			<a href="index.html">
				<img src="images/logo.png" alt="Logo" height="80px">
				</img>
			</a>
		</div>
		<div id = "sitename">
			<a href="index.html">
				Readers' junction
			</a>
		</div>
	</div>

    <div id="search_box">
		<form id="searchbox" action="">
			<input id="search" type="text" placeholder="Type here">
			<input id="submit" type="submit" value="Search">
		</form>
	</div>
	
	<div id="main_menu">
    	<ul class="Level_1">
            <li><a href="index.html" class="current">Home</a></li>
            <li><a href="books.html">Books</a></li>
			<li><a href="mags.html">Magazines</a></li>            
            <li><a href="about.html">Company</a></li> 
            <li><a href="contact.html">Contact</a></li>
    	</ul>
    </div> <!-- end of menu -->   		
 	
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
	
	<div id = "orderByForm">
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
		
    <?php include("select.php"); ?>
    <div id="bookPics" class="displayBooks">
        <ul class="categories-list books row-4-thumbs">
            <?php $info= mysql_fetch_array( $data ) ?>
            <li class="book_pic">
                <div>
                    <a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = 150px alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
                    <a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong>
					<br> by <?php echo ucwords($info['author']); ?>
	            </div>
            </li>
			
			<?php $info= mysql_fetch_array( $data ) ?>
            <li class="book_pic">
                <div>
                    <a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = 150px alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
                    
								<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
							
                </div>
            </li>
			
			
			<?php $info= mysql_fetch_array( $data ) ?>
            <li class="book_pic">
                <div>
                    <a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = 150px alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
						
							<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
						
                </div>
            </li>
			
			
			<?php $info= mysql_fetch_array( $data ) ?>
            <li class="book_pic">
                <div>
                    <a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = 150px alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
                    
								<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?></a>
							
                </div>
            </li>
			
			
			<?php $info= mysql_fetch_array( $data ) ?>
            <li class="book_pic">
                <div>
                    <a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = 150px alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
                    
								<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
							
                </div>
            </li>
			
			
			<?php $info= mysql_fetch_array( $data ) ?>
            <li class="book_pic">
                <div>
                    <a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = 150px alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
                    
								<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
							
                </div>
            </li>
			
			
			<?php $info= mysql_fetch_array( $data ) ?>
            <li class="book_pic">
                <div>
                    <a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = 150px alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
                    
								<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
							
                </div>
            </li>
			
			
			<?php $info= mysql_fetch_array( $data ) ?>
            <li class="book_pic">
                <div>
                    <a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = 150px alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
                    
								<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
							
                </div>
            </li>
			
			
			<?php $info= mysql_fetch_array( $data ) ?>
            <li class="book_pic">
                <div>
                    <a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = 150px alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
                    
								<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
							
                </div>
            </li>
			
			
			<?php $info= mysql_fetch_array( $data ) ?>
            <li class="book_pic">
                <div>
                    <a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = 150px alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
                    
								<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
							
                </div>
            </li>
			
			
			<?php $info= mysql_fetch_array( $data ) ?>
            <li class="book_pic">
                <div>
                    <a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = 150px alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
                    
								<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
							
                </div>
            </li>
			
			
			
			<?php $info= mysql_fetch_array( $data ) ?>
            <li class="book_pic">
                <div>
                    <a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = 150px alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
                    
								<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
							
                </div>
            </li>
			
			
			<?php $info= mysql_fetch_array( $data ) ?>
            <li class="book_pic">
                <div>
                    <a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = 150px alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
                    
								<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
							
                </div>
            </li>
			
			
			<?php $info= mysql_fetch_array( $data ) ?>
            <li class="book_pic">
                <div>
                    <a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = 150px alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
                    
								<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
							
                </div>
            </li>
			
			
			<?php $info= mysql_fetch_array( $data ) ?>
            <li class="book_pic">
                <div>
                    <a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = 150px alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
                    
								<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
							
                </div>
            </li>
			
			<?php $info= mysql_fetch_array( $data ) ?>
            <li class="book_pic">
                <div>
                    <a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = 150px alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
                    
								<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
							
                </div>
            </li>
			
			<?php $info= mysql_fetch_array( $data ) ?>
            <li class="book_pic">
                <div>
                    <a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = 150px alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
                    
								<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
							
                </div>
            </li>
			
			<?php $info= mysql_fetch_array( $data ) ?>
            <li class="book_pic">
                <div>
                    <a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = 150px alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
                    
								<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
							
                </div>
            </li>
			
			<?php $info= mysql_fetch_array( $data ) ?>
            <li class="book_pic">
                <div>
                    <a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = 150px alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
                    
								<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
							
                </div>
            </li>
			
			<?php $info= mysql_fetch_array( $data ) ?>
            <li class="book_pic">
                <div>
                    <a href="#"><img src="images/categories/'<?php echo ucwords($info['isbn10']); ?>'.jpg" width = 150px alt="<?php echo ucwords($info['book_name']); ?>" /></a> <br>
                    
								<a href="#"><strong><?php echo ucwords($info['book_name']); ?> </strong> <br> by <?php echo ucwords($info['author']); ?> </a>
							
                </div>
            </li>
		</div>
		<div id="footer">
    
	   <a href="index.html">Home</a> | <a href="books.html">Books</a> | <a href="mags.html">Magazines</a> | <a href="about.html">About</a> | <a href="contact.html">Contact Us</a><br />
        Copyright © 2048 <a href="#"><strong>Readers' Junction</strong></a>
   
	</div> 
			
</body>

</html>