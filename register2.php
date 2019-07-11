<?php # script 9.5 - register2.php #2
// this script performs an INSERT query to add a record to the users table

$page_title = 'Register2';
include('_includes/header.html');

// check for form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  require('../mysqli_connect.php'); // connect to the db

  $errors = []; // initialize an error array

  // check for a first name
  if (empty($_POST['first_name'])) {
    $errors = 'You forgot to enter your first name.';
  } else {
    $fn = mysqli_escape_string($dbc, trim($_POST['first_name']));
  }

  // check for a last name
  if (empty($_POST['last_name'])) {
    $errors[] = 'You forgot to enter your last name.';
  } else {
    $ln = mysqli_escape_string($dbc, trim($_POST['last_name']));
  }

  // check for email address
  if(empty($_POST['email'])) {
    $errors[] = 'You forgot to enter your email address';
  } else {
    $e = mysqli_escape_string($dbc, trim($_POST['email']));
  }

  // check for a password and match against the confirmed password
  if (!empty($_POST['pass1'])) {
    if ($_POST['pass1'] != $_POST['pass2']) {
      $errors[] = 'Your password did not match the confirmed password.';
    } else {
      $p = mysqli_escape_string($dbc, trim($_POST['pass1']));
    }
  } else {
    $errors[] = 'You forgot to enter your password.';
  }

  if (empty($errors)) {
    // if everything is okay register the user in the database ... 
    // ** this is where the 'mysqli_connect' was. we moved up top to be able to use mysqli_escape_string
    // make the query
    $q = "INSERT INTO sitename.users (first_name, last_name, email, pass, registration_date)
    VALUES ('$fn', '$ln', '$e', SHA2('$p', 512), NOW() )";
    $r = @mysqli_query($dbc, $q); // run the querry

    // writing sql to check email duplicate
    $dq = "SELECT user_id
          FROM sitename.users
          WHERE email = '$e'";

    $duplicate = mysqli_query($dbc, $dq);

    $num = mysqli_num_rows($duplicate);

    if ($num > 0) { // if querry ran okay
      // print message
      echo '<h1>Thank you!</h1>
      <p>You are now registered. In chapter 12 you will actually be able to log in!</p><br>';
    } else { // if the query did not run okay
      // public message:
      echo '<h1>System Error</h1>
      <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';

      // debugging message:
      echo '<p>'. mysqli_error($dbc) . '<br><br>Query: '. $q . '</p>';
    } // end of if ($r) IF
    mysqli_close($dbc); // close the database connection

    // include the footer and quit the script:
    include('_includes/footer.html');
    exit();
  } else { // report the error
    echo '<h1>Error!</h1>
    <p class="errors">The following error(s) occured:<br>';
    foreach ($errors as $msg) { // print each error
      echo " - $msg<br>\n";
    }
    echo '</p><p>Please try again.</p><p><br></p>';
  } // end of if (empty($errors)) IF
  mysqli_close($dbc); // 2nd close call for the script 9.5 w/ mysqli_real_escape_string() fxn
} // end of the main Submit conditional
?>
<h1>Register</h1>
<form action="register2.php" method="post">
  
  <p>First Name : <input type="text" name="first_name" size="15" maxlength="20" value="<?php
    if (isset($_POST['first_name'])) echo $_POST['first_name'];?>"></p>
  
  <p>Last Name : <input type="text" name="last_name" size="15" maxlength="40" value="<?php
  if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>"></p>

  <p>Email Address: <input type="email" name="email" size="20" maxlength="60" value="<?php
  if (isset($_POST['email'])) echo $_POST['email']; ?>"></p>

  <p>Password : <input type="password" name="pass1" size="10" maxlength="20" value="<?php 
  if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"></p>

  <p>Confirm Password : <input type="password" name="pass2" size="10" maxlength="20" value="<?php
  if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"></p>

  <p><input type="submit" name="submit" value="Register"></p>
</form>
<?php include('_includes/footer.html'); ?>