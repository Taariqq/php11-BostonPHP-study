<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>quotes</title>
  <style>
    body {
      background: lightgrey;
      color: #2B6A79;
    }

  </style>
</head>

<body>
  <?php # Script 1.10 - quotes.php 
    $quantity = 30;
    $price = 119.95;
    $taxrate = 0.05;
  
    $total = $quantity * $price;
    $total += ($total * $taxrate);
    $total = number_format($total, 2);
  
    echo "<h3>Using double quotation marks:</h3>";
  echo "<p>You are purchasing <b>$quantity</b> widget(s) at a cost of <b>$$price</b> each. With tax, the total comes to <b>\$$total</b>.</p>\n"; // $$var worked for me but the author mentioned it would not.
  // using single quotation marks
  echo '<h3>Using single quotation marks:</h3>';
  echo '<p>You are purchasing <b>$quantity</b> widget(s) at a cost of <b>\$$price</b> each. With tax the total comes to <b>$$total</b>.</p>\n';
  ?>

</body>

</html>




















