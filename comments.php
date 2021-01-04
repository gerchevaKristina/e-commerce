
<!DOCTYPE HTML> 
<?php
//connect to the database - either include a connection variable file or
//type the following lines:
$connect = mysql_connect("localhost", "root", "") or 
  die ("Hey loser, check your server connection.");
mysql_select_db("ecommerce");

?> 
<html>
<head>
<link href="styles/products.css" rel="stylesheet" />
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = "";

if (isset($_POST['comments_name'])) {
  $comments_name = $_POST['comments_name'];
}
if (empty($_POST["comments_name"])) {
    $nameErr = "Name is required";
}

if (isset($_POST['comments_messages'])) {
  $comments_messages = $_POST['comments_messages'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST["submit"])) { 
    $query1 = "INSERT INTO comments (
			  comments_name, 
              comments_messages)
              VALUES ('$comments_name','$comments_messages')";
	$results = mysql_query($query1)
	or die(mysql_error());

  } else {
    $nameErr = "Item not added.";
  }
}
?>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>"> 
<span class="error">* required field</span><br>
  Name: <br><input type="text" name="comments_name" value="<?php echo $comments_name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Comment: <br><textarea name="comments_messages" rows="5" cols="75"><?php echo $comments_messages;?></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
<table width="40%">
<?php
$query = "SELECT * FROM comments";
$results = mysql_query($query)
  or die(mysql_error());
echo "<h2>Your Comments:</h2>";
while ($row = mysql_fetch_array($results)) {
extract($row);
echo "<tr><td>";
echo $comments_name;
echo "</td><td>";
echo $comments_messages;
echo "</td></tr>";
}
?>
</table>
</body>
</html>
