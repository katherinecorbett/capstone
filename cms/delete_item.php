<?php

	$item_id=$_POST['item_id'];
	
	include("dbinfo.php");
	$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	
	if (!($conn)) {
	  die ("Connection failed: " . mysqli_connect_error());
	} 
	
	$TableName = "items";
	$QueryString = "SELECT * FROM $TableName WHERE item_id='$item_id'";
	$QueryString = mysqli_real_escape_string($QueryString);
	$QueryResult = mysqli_query($conn, $QueryString) or trigger_error( 
						mysqli_error(), E_USER_ERROR);
	while ($Row = mysqli_fetch_assoc($QueryResult)) {
		$image = $Row["picture"];
	}	
	if ($image!="") unlink("../images/$image");
	
	$query = "DELETE FROM $TableName WHERE item_id = '$item_id'";
	$query = mysqli_real_escape_string($query);
	$result = mysqli_query($conn, $query) or trigger_error( 
						mysqli_error(), E_USER_ERROR);
	
	mysqli_close($conn);
	header("Location:./view_items.php");
    
?>
