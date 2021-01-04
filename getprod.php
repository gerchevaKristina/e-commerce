<!DOCTYPE html>
<?php
session_start();
//connect to the database - either include a connection variable file 
//or type the following lines:
$connect = mysql_connect("localhost", "root", "") 
  or die("Hey loser, check your server connection.");
//make our database active
mysql_select_db("ecommerce");

//get our variable passed through the URL
if (isset($_REQUEST['prodid'])) {
  $prodid = $_REQUEST['prodid'];
}

//get information on the specific product we want
$query = "SELECT * FROM products WHERE products_prodnum='$prodid'";
$results = mysql_query($query)
  or die(mysql_error());
$row = mysql_fetch_array($results);
extract((array)$row);
$nameErr='';
?>
<html>
<head>
<title><?php echo $products_name; ?></title>
    <link href="styles/products.css" rel="stylesheet" />
    <!--<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" />
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>-->
</head>
<body>
<h1 class="d-flex justify-content-center"><strong>KG Beauty</strong></h1>
<div align="center">
<table width="80%">
  <tr>
    <td><?php echo "<img src='{$row['products_images']}' style='float:left'; width='600' height='400'\>";?></td>
    <td><h2><strong><?php echo $products_name; ?></strong></h2>
      <?php echo "<p>" . $products_proddesc . "</p>"; ?>
      <p><strong>Price:<?php echo $products_price; ?> Lv.</strong></p>
      <form method="POST" action="modcart.php?action=add">
        Quantity: <input type="text" name="qty">
        <input type="hidden" name="products_prodnum" 
          value="<?php echo $products_prodnum ?>">
        <input type="submit" name="Submit" value="Add to cart">
      </form>

      <form method="POST" action="cart.php">
        <input type="submit" name="Submit" value="View cart">
      </form><br><br><br>
	  <p><a href="shop.php">Go back to the shop</a></p>
    </td>
  </tr>
  <tr>
	<td>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>"> 
<span class="error">* required field</span><br>
  Name: <br><input type="text" name="comments_name" value="<?php echo isset($_POST['comments_name']);?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Comment: <br><textarea name="comments_messages" rows="10" cols="76"><?php echo isset($_POST['comments_messages']);?></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
</td>
<td></td>
  <tr/>
</table>   
</div>
</body>
</html>