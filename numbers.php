<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Numbers</title>
  <style>
    body {
      background: lightgrey;
      color: #3a65a3;
    }
  </style>

</head>

<body>
  <?php # Script 1.8 - numbers.php 
    // set variables
  $quantity = 30;
  $price = 119.95;
  $taxrate = 0.05;
  // calculate total
  $total = $quantity * $price;
  $total = $total + ($total * $taxrate); // calculate and add tax.
  // format total
  $total = number_format($total, 2);
  // print results 
  echo "<p>You are purchasing <b>$quantity</b> widget(s) at a cost of <b>$$price</b> each. With tax, the total comes to <b>$$total</b>";
  
  ?>
</body>

</html>


















