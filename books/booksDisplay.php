<html style="background: black">
<head>
	<title>Books Display</title>
	<link rel="stylesheet" href="css/common.css" type="text/css" />
	<link rel="stylesheet" href="css/books.css" type="text/css" />
</head>
<body>
<h1 style="text-align: center"><u></u></h1>

    <form method='POST' action='bookDetails.php' style='text-align:center; float:right; margin: -10px 10px 10px 0'>
							<!--INSERT HERE --> 
			<!--Javascript code to send book id = ISBN 13 of the book-->
	
	</form>
    

<?php 
 mysql_connect("localhost", "root", "toor") or die(mysql_error()); 
 mysql_select_db("essar_township") or die(mysql_error()); 
 $sr_number = 1;
		
							//INSERT HERE 
			//JavaScipt Code to get the id of the book category clicked on last page i.e. books.html
		
							//INSERT HERE
			//Code to get the type of sorting i.e Name, Rating, Length, Author, Rent
			
							//INSERT HERE
			//Code to get the method of sorting i.e ASC or DESC
			
 //$data = mysql_query("SELECT * FROM ".booksCatTable." ORDER BY ".sortType."  ".sortMethod." ") 
 $data = mysql_query("SELECT * FROM artbooks ORDER BY name ASC") 
 or die(mysql_error()); 
 Print "<table border cellpadding=3>"; 
 Print "<th>"."<b>Sr.No.</b>"."</th>";
 Print "<th>"."<b>ROOM NUMBER</b>"."</th>";
 Print "<th>"."<b>NAME</b>"."</th>";
 Print "<th>"."<b>MOBILE NUMBER</b>"."</th>";
 Print "<th>"."<b>EMAIL</b>"."</th>";
 Print "<th>"."<b>AGE</b>"."</th>";
 Print "<th>"."<b>GENDER</b>"."</th>";
 Print "<th>"."<b>BLOCK</b>"."</th>";
 Print "<th>"."<b>MARITAL STATUS</b>"."</th>";
 

 while($info = mysql_fetch_array( $data )) 
 { 
	 Print "<tr>";
	 if($sr_number>0){
	 	Print "<td>".$sr_number. "</td> ";
	 }
	 $isbn13	=	$info['isbn13']; 
	 $isbn13	=	$info['isbn10'];   
	 $name		=	$info['name'];
	 $author	=	$info['author'];
	 $pages		=	$info['pages']; 
	 $rating	=	$info['rating']; 
	 $rent		=	$info['rent']; 
	 $sr_number++;
 } 

 Print "</table>"; 
 ?> 
 
 <div id="catPics" class="bookCategories">
		<ul class="categories-list books row-4-thumbs">
				<li class="cat_pic" data-category="1">
					<div>
						<a href="#"><img src="images/categories/1.jpg" width = 150px alt="Art" /></a>
							<h4>
								<a href="#"><strong><?php echo $name;?></strong></a>
							</h4>
							<h5>
								<a href="#"><strong>by <?php echo $author;?></strong></a>
							</h5>
							<h6>
								<a href="#"><strong><?php echo $rating;?></strong></a><br>
								<a href="#"><strong><?php echo $pages;?></strong></a>
								<a href="#"><strong><?php echo $rent;?></strong></a>
							</h6>
							
					</div>
				</li>
				<li class="cat_pic" data-category="2">
					<div>
						<a href="#"><img src="images/categories/2.jpg" width = 150px alt="Biography" /></a>
							<h4>
								<a href="#"><strong><?php echo $name;?></strong></a>
							</h4>
							<h5>
								<a href="#"><strong>by <?php echo $author;?></strong></a>
							</h5>
							<h6>
								<a href="#"><strong><?php echo $rating;?></strong></a><br>
								<a href="#"><strong><?php echo $pages;?></strong></a>
								<a href="#"><strong><?php echo $rent;?></strong></a>
							</h6>
							
					</div>
				</li>
				<li class="cat_pic" data-category="1">
					<div>
						<a href="#"><img src="images/categories/1.jpg" width = 150px alt="Art" /></a>
							<h4>
								<a href="#"><strong><?php echo $name;?></strong></a>
							</h4>
							<h5>
								<a href="#"><strong>by <?php echo $author;?></strong></a>
							</h5>
							<h6>
								<a href="#"><strong><?php echo $rating;?></strong></a><br>
								<a href="#"><strong><?php echo $pages;?></strong></a>
								<a href="#"><strong><?php echo $rent;?></strong></a>
							</h6>
							
					</div>
				</li>
 
</body>
</html>