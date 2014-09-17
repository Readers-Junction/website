<html>
<head>
<title>Processed Data</title>
<style>
td,tr
{ border:1px dotted black; }
table { border:1px solid black; width:80%; margin: 25px auto 0 auto }
td { text-align: center; vertical-align: middle; font-size: 18px ; color: black}
</style>

</head>

<body>
<?php
	$con = mysqli_connect("localhost" , "root", "toor", "readersjunction");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();	
	}	
	$BookID = $_POST['bookid'];
	$Name = strtoupper($_POST['name']);
	$Author = strtoupper($_POST['author']);
	$Pages = $_POST['pages'];
	$Rating = $_POST['rating'];
	$MRP = $_POST['mrp'];
	$Rent = $_POST['rent'];
	$tags1 = $_POST['tags'];
	for ($i=0; $i<count($tags1); $i++){
	$tableName = $tags1[$i];
	echo $tableName;
	
		switch ($tableName) {
			  case 'biogbooks':
					$insert= "INSERT INTO biogbooks(bookid, book_name,author,pages,rating,mrp, rent)
	VALUES ('$BookID','$Name','$Author','$Pages','$Rating' ,'$MRP','$Rent')" ;
					echo $insert;    break;
			  case 'childrenbooks':
					$insert= "INSERT INTO childrenbooks(bookid,book_name,author,pages,rating,mrp, rent)
	VALUES ('$BookID','$Name','$Author','$Pages','$Rating' ,'$MRP','$Rent')" ;
					
					echo $insert;    break;
			  case 'classicbooks':
					$insert= "INSERT INTO classicbooks(bookid,book_name,author,pages,rating,mrp, rent)
	VALUES ('$BookID','$Name','$Author','$Pages','$Rating' ,'$MRP','$Rent')" ;
					echo $insert;    break;
			  case 'comicbooks':
					$insert= "INSERT INTO comicbooks(bookid,book_name,author,pages,rating,mrp, rent)
	VALUES ('$BookID','$Name','$Author','$Pages','$Rating' ,'$MRP','$Rent')" ;
					echo $insert;    break;
			  case 'crimebooks':
					$insert= "INSERT INTO crimebooks(bookid,book_name,author,pages,rating,mrp, rent)
	VALUES ('$BookID','$Name','$Author','$Pages','$Rating' ,'$MRP','$Rent')" ;
					echo $insert;    break;
			  case 'fictionbooks':
					$insert= "INSERT INTO fictionbooks(bookid,book_name,author,pages,rating,mrp, rent)
	VALUES ('$BookID','$Name','$Author','$Pages','$Rating' ,'$MRP','$Rent')" ;
					echo $insert;    break;
			  case 'horrorbooks':
					$insert= "INSERT INTO horrorbooks(bookid,book_name,author,pages,rating,mrp, rent)
	VALUES ('$BookID','$Name','$Author','$Pages','$Rating' ,'$MRP','$Rent')" ;
					echo $insert;    break;
			  case 'humorbooks':
					$insert= "INSERT INTO humorbooks(bookid,book_name,author,pages,rating,mrp, rent)
	VALUES ('$BookID','$Name','$Author','$Pages','$Rating' ,'$MRP','$Rent')" ;
					echo $insert;    break;
			  case 'nonfictionbooks':
					$insert= "INSERT INTO nonfictionbooks(bookid,book_name,author,pages,rating,mrp, rent)
	VALUES ('$BookID','$Name','$Author','$Pages','$Rating' ,'$MRP','$Rent')" ;
					echo $insert;    break;
			  case 'philosophybooks':
					$insert= "INSERT INTO philosophybooks(bookid,book_name,author,pages,rating,mrp, rent)
	VALUES ('$BookID','$Name','$Author','$Pages','$Rating' ,'$MRP','$Rent')" ;
					echo $insert;    break;
			  case 'religionbooks':
					$insert= "INSERT INTO religionbooks(bookid,book_name,author,pages,rating,mrp, rent)
	VALUES ('$BookID','$Name','$Author','$Pages','$Rating' ,'$MRP','$Rent')" ;
					echo $insert;    break;
			  case 'romancebooks':
					$insert= "INSERT INTO romancebooks(bookid,book_name,author,pages,rating,mrp, rent)
	VALUES ('$BookID','$Name','$Author','$Pages','$Rating' ,'$MRP','$Rent')" ;
					echo $insert;    break;
			  case 'sciencefictionbooks':
					$insert= "INSERT INTO sciencefictionbooks(bookid,book_name,author,pages,rating,mrp, rent)
	VALUES ('$BookID','$Name','$Author','$Pages','$Rating' ,'$MRP','$Rent')" ;
					echo $insert;    break;
			  case 'selfhelpbooks':
					$insert= "INSERT INTO selfhelpbooks(bookid,book_name,author,pages,rating,mrp, rent)
	VALUES ('$BookID','$Name','$Author','$Pages','$Rating' ,'$MRP','$Rent')" ;
					echo $insert;    break;
			  case 'suspensebooks':
					$insert= "INSERT INTO suspensebooks(bookid,book_name,author,pages,rating,mrp, rent)
	VALUES ('$BookID','$Name','$Author','$Pages','$Rating' ,'$MRP','$Rent')" ;
					echo $insert;    break;
			  case 'spiritualitybooks':
					$insert= "INSERT INTO spiritualitybooks(bookid,book_name,author,pages,rating,mrp, rent)
	VALUES ('$BookID','$Name','$Author','$Pages','$Rating' ,'$MRP','$Rent')" ;
					echo $insert;    break;
			  case 'thrillerbooks':
					$insert= "INSERT INTO thrillerbooks(bookid,book_name,author,pages,rating,mrp, rent)
	VALUES ('$BookID','$Name','$Author','$Pages','$Rating' ,'$MRP','$Rent')" ;
					echo $insert;    break;
			  case 'travelbooks':
					$insert= "INSERT INTO travelbooks(bookid,book_name,author,pages,rating,mrp, rent)
	VALUES ('$BookID','$Name','$Author','$Pages','$Rating' ,'$MRP','$Rent')" ;
					echo $insert;    break;
				default:
				$insert= "INSERT INTO otherbooks(bookid,book_name,author,pages,rating,mrp, rent)
	VALUES ('$BookID','$Name','$Author','$Pages','$Rating' ,'$MRP','$Rent')" ;
			}
				if (!mysqli_query($con,$insert)) {
					die('Error: ' . mysqli_error($con));
				}
				echo "   1 record added    ";

	}
	
	if (!$insert) {
		die("there was an error in entering the values in the database");
	};

	mysqli_close($con);
?>
</body>
</html>