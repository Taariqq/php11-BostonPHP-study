<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Constants</title>
    <style>
    body {
      background: lightgrey;
      color: #2B6A79;
    }
  </style>
</head>
<body>
  <?php # Script 1.9 - constants.php 
  // set today's data sa a constant;
  define('TODAY', date('M d Y'));
  // print a message using predefined constants and the TODAY constant
  echo '<p>Today is '. TODAY .'.<br>This server is running version <b>'. PHP_VERSION. '</b> of PHP on the <b>'. PHP_OS .'</b> operating system.</p>';
  ?>
</body>
</html>
























