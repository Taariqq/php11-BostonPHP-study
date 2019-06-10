<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Predefined Variables</title>
  <style>
    body {
      background: #CFF09E;
      color: #2B6A79;
    }

  </style>

</head>

<body>
  <?php # Script 1.5 - predefined.php 
  // create shorthand for variables
  $file = $_SERVER['SCRIPT_FILENAME'];
  $user = $_SERVER['HTTP_USER_AGENT'];
  $server = $_SERVER['SERVER_SOFTWARE'];
  // to write a fxn that retrieves each element of the $_SERVER array.
  foreach($_SERVER as $key => $value) {
    echo "<i>$key</i>  ===>  <b>$value</b> <br>";
  }
  
  // print the name of this script:
  echo "<p>You are running the file:<br>
  <b>$file</b>.</p>\n";
  // print user information
  echo "<p>You are viewing this page using:<br>
  <b>$user</b></p>\n";
  // print server information
  echo "<p>This server is running:<br>
  <b>$server</b>.</p>\n";
  // and now print the whole $_SERVER output
//  echo "<p>The complete server info is:<br>
//  <b>$_SERVER</b>\n"; --- causes 'array to string' conversion err
?>

</body>

</html>
