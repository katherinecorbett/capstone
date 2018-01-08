<?php

	include("dbinfo.php");
	$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	
	if (!($conn)) {
	  die ("Connection failed: " . mysqli_connect_error());
	} 
    
  	$category=$_POST['category'];
  
  	$errors = 0;
  
  	if ($category=="") $errors=1;
  
	$TableName = "categories";
	$sql = "SELECT * FROM $TableName WHERE category='$category'";
	$DuplicateCheck = mysqli_query($conn, $sql) or trigger_error( 
						mysqli_error(), E_USER_ERROR);
	if ( mysqli_num_rows($DuplicateCheck) > 0 ) {  $errors=2; $is_duplicate="yes"; }	  

	if ($errors>0) {
?>  
<!DOCTYPE html PUBLIC " - //W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Check Category Add</title>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	</head>

	<body>

		<FONT color=red><h2>All Fields Are Required</h2></font>
	   	<FORM action="check_category_add.php" method="POST">
	      	Category: <input type="text" name="category" value="<?php echo "$category"; ?>" />
			<?php if ($category=="") echo "<font color=red> *required</font>"; ?>
			<?php if ($category!="" && $is_duplicate=="yes") echo "<font color=red> *duplicate</font>"; ?>
	      	<br><br>
	      	<input type="submit" name="submit" value="Add" />
	   	</FORM>

	</body>

</html>
<?php
		mysqli_close($conn);

  	} else {

		$SQLString = "INSERT INTO $TableName(category)values('$category')";
		$QueryResult = mysqli_query($conn, $SQLString) or trigger_error( 
						mysqli_error(), E_USER_ERROR);

		mysqli_close($conn);
		header("Location:./view_categories.php");
	}


		


?>
  


