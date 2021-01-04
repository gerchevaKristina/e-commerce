<!DOCTYPE html>
<?php
if (!session_id()) {
  session_start();
}//connect to the database
$connect = mysql_connect("localhost", "root", "") 
  or die ("Hey loser, check your server connection.");
mysql_select_db("ecommerce");
?>
<html>
<head>
<title>Beauty</title>
    <link href="styles/products.css" rel="stylesheet">
</head>
<body>
<h1><strong>KG Beauty</strong> </h1> 
<div align="center">
<h3>You currently have

<?php

$sessid = session_id();

//display number of products in cart
$query = "SELECT * FROM carttemp WHERE carttemp_sess = '$sessid'";
$results = mysql_query($query)
  or die (mysql_query());
$rows = mysql_num_rows($results);
echo $rows;
?>

product(s) in your cart.</h3><br>

<table class="b" cellpadding="5">
  <tr>
    <th>Quantity</th>
    <th>Product Image</th>
    <th>Product Name</th>
    <th>Price Each</th>
    <th>Extended Price</th>
    <th></th>
    <th></th>
<?php
$total = 0;
while ($row = mysql_fetch_array($results)) {
  echo "<tr>";
  extract($row);
  $prod = "SELECT * FROM products " .
          "WHERE products_prodnum='$carttemp_prodnum'";
  $prod2 = mysql_query($prod);
  $prod3 = mysql_fetch_array($prod2);
  extract($prod3);
  echo "<td>
          <form method=\"POST\" action=\"modcart.php?action=change\">
            <input type=\"hidden\" name=\"modified_hidden\"
              value=\"$carttemp_hidden\">
            <input type=\"text\" name=\"modified_quan\" size=\"2\"
              value=\"$carttemp_quan\">";
  echo "</td>";
  echo "<td>";
  echo "<a href=\"getprod.php?prodid=" . $products_prodnum . "\">";
  echo "<img src='$products_images' style='float:left'; width='400' height='200'\></a></td>";
  echo "<td>";
  echo "<a href=\"getprod.php?prodid=" . $products_prodnum . "\">";
  echo $products_name;
  echo "</a></td>";
  echo "<td>";
  echo $products_price;
  echo "</td>";
  echo "<td>";
  //get extended price
  $extprice = number_format($products_price * $carttemp_quan, 2);
  echo $extprice;
  echo "</td>";
  echo "<td>";
  echo "<input type=\"submit\" name=\"Submit\"
          value=\"Change Qty\">
        </form></td>";
  echo "<td>";
  echo "<form method=\"POST\" action=\"modcart.php?action=delete\">
        <input type=\"hidden\" name=\"modified_hidden\"
          value=\"$carttemp_hidden\">";
  echo "<input type=\"submit\" name=\"Submit\"
          value=\"Delete Item\">
        </form></td>";
  echo "</tr>";
  //add extended price to total
  $total = $extprice + $total;

}
?>
  <tr>
    <td colspan=\"4\" align=\"right\"><h3>
      Your total before shipping is:</h3></td>
    <td align=\"right\"><h3> <?php echo number_format($total, 2); ?> Lv.</h3></td>
    <td></td>
    <td>
<?php
echo "<form method=\"POST\" action=\"modcart.php?action=empty\">
        <input type=\"hidden\" name=\"carttemp_hidden\"
          value=\"";
if (isset($carttemp_hidden)) {
  echo $carttemp_hidden;
}
echo "\">";
echo "<input type=\"submit\" name=\"Submit\" value=\"Empty Cart\">
      </form>";
?>

</td>
</tr>
<tr>
<td colspan=\"2\"><form method="POST" action="checkout.php">
<input type="submit" name="Submit" value="Proceed to Checkout">
</form></td>
<td><p><a href="shop.php">Go back to the shop</a></p></td>
<td></td>
<td></td>
</tr>
</table>
</div>
</body>
</html>
