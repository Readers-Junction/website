<html xmlns="http://www.w3.org/1999/xhtml">

<head>
</head>
<body>
	<?php 
		mysql_connect( "localhost", "root", "toor") or die(mysql_error()); 
		mysql_select_db( "readersjunction") or die(mysql_error()); 
		$sort=$_POST["order"]!="choose"?$_POST["order"]:"book_name";
		$data=mysql_query( "SELECT * FROM thrillerbooks ORDER BY ".mysql_real_escape_string($sort)." ASC") or die(mysql_error()); 
	?>
</body>
</html>