<!DOCTYPE html PUBLIC " - //W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Add An Item</title>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	</head>

	<body>

		<h2>Enter Item Details Below</h2>

   		<FORM action="check_item_add.php" method="POST" enctype="multipart/form-data">
 	
			Category: <select name="catdropdown">
    						<option value = "">Choose a category</option>
<?php
   
	include("dbinfo.php");
	$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	
	if (!($conn)) {
	  die ("Connection failed: " . mysqli_connect_error());
	} 

	$sql = "SELECT category_id, category FROM categories";
	$result = mysqli_query($conn, $sql) or trigger_error( 
						mysqli_error(), E_USER_ERROR);
	while ($row = mysqli_fetch_assoc($result)) {
			$category_id = $row['category_id'];
			$category = $row['category'];
			echo "<option value=\"$category_id\">$category\n";
	}
	mysqli_close($conn);
?>	
	 		</select><br /><br />
      		Title: 		<input type="text" name="title" value="" /><br /><br />
	  		Description : 	<input type="text" name="description" value="" /><br /><br />
			Price: 		<input type="text" name="price" value="" /><br /><br />
	  		Quantity:		<input type="text" name="quantity" value="" /><br /><br />
	  		SKU  : 			<input type="text" name="sku" value="" /><br /><br />
	 		Please choose an image: <input name="uploaded" type="file" /><br /><br />

      		<input type="submit" name="submit" value="Save" />
   		</FORM>

		<br /><a href="index.html">Return To Main</a>   
   
	</body>

</html>