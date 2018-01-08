<!DOCTYPE html PUBLIC " - //W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>View Categories</title>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	</head>

	<body>
		<H1>View Categories</h1>
		<TABLE>
<?php
	include("dbinfo.php");
	$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	
	if (!($conn)) {
	  die ("Connection failed: " . mysqli_connect_error());
	} 

 	$TableName = "categories";
	$QueryString = "SELECT * FROM $TableName ORDER BY category ASC";
	$QueryString = mysqli_real_escape_string($QueryString);
	
	$QueryResult = mysqli_query($conn, $QueryString) or trigger_error( 
						mysqli_error(), E_USER_ERROR);
	while ($Row = mysqli_fetch_assoc($QueryResult)) {
   		$category = $Row["category"];
   		$category_id = $Row["category_id"];
   
   		echo "<tr>";
   		echo "  <td width=\"100\">$category</td>";
   		echo "  <td>\n";
   		echo "    <FORM action=\"edit_category.php\" method=\"POST\">\n";
   		echo "      <input type=\"hidden\" name=\"category_id\" value=\"$category_id\" />\n";
   		echo "      <input type=\"submit\" name=\"submit\" value=\"EDIT\" />\n";
   		echo "    </FORM>\n";
   		echo "  </td>\n";
   		echo "  <td>\n";
   		echo "  </td>\n";
   		echo "</tr>";
   
 	}

	mysqli_close($conn);
?>
		</table>
		<br /><a href="index.html">Return To Main</a>

	</body>

</html>
