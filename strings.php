<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Strings</title>
  <style>
    body {
      background: #CFF09E;
      color: #2B6A79;
    }

  </style>
</head>

<body>
  <?php # Script 1.6 - strings.php 
    // create the variables
  $firstName = 'Haruki';
  $lastName = 'Murakami';
  $book = 'Kafka on the Shore';
  
  // Print the values
  echo "<p>The book <i>$book</i> was written by $firstName $lastName.</p>";
  # Script 1.7 - concat.php 
  
  // create the variables
  $fName = 'Melissa';
  $lName = 'Bank';
  $author = "$fName $lName";
  
  $book = 'The Girls\' Guide to Hunting and Fishing';
  echo "<p>The book <i>$book</i> was written by $author.</p>";
  
  echo($num = strlen('some string').'<br>');
  echo($n = round(3.14159, 3).'<br>');
  echo(number_format(12895689, 2));
  ?>

</body>

</html>
















































