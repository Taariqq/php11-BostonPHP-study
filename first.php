<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Basic PHP page</title>
  <style>
    body {
      background: #8BA069;
      color: #2B6A79;
    }

  </style>
</head>

<body>
  <!--  Script 1.2 thru 1.4  -->
  <p>This is standard HTML.</p>
  <?php
    echo 'Hello! World, from PHP';
    echo '<p>This is a line of text. <br> This is another line.</p>';
    /* echo '<p>Here is something that would be commented out</p>'; */
    echo "<p>Now I'm Done.</p>";
  // end php
  ?>
</body>

</html>
