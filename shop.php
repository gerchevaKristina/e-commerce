<!DOCTYPE html>
<?php

$connect = mysql_connect("localhost", "root", "") 
  or die ("Hey loser, check your server connection.");
mysql_select_db ("ecommerce");
$query = "SELECT * FROM products";
$results = mysql_query($query)
  or die(mysql_error());
?>
<html>
  <head>
    <title>Beauty</title>
    <link href="styles/shop.css" rel="stylesheet">

  </head>
  <body>
    <h1><strong>KG Beauty</strong> </h1> 
<div>
<table>
<?php

// Show only Name, Price and Image
while ($row = mysql_fetch_array($results)) {
  extract($row);
  echo "<tr><td>";
  echo "<a href=\"getprod.php?prodid=" . $products_prodnum . "\">";
  echo "<img src='{$row['products_images']}' style='float:left'; width='600' height='400'\></a></td>";
  echo "<td>";
  echo "<a href=\"getprod.php?prodid=" . $products_prodnum . "\">";
  echo "<p><strong>" . $products_name . "</strong></p>";
  echo "</td></a>";
  echo "<td>";
  echo "<a href=\"getprod.php?prodid=" . $products_prodnum . "\">";
  echo "<p><strong> Lv." . $products_price . "</strong></p>";
  echo "</a></td></tr>";
}

?>
</table>
</div>
</body>
</html>