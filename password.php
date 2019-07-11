<?php # script 9.7 - password.php 
// this page lets a user change their password

$page_title = 'Change Your Password';
include ('_includes/header.html');

// check for form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  require('../mysqli_connect.php'); // connect to db

  $errors = []; // initialize an error array

  // check for an email address
  if (empty($_POST['email'])) {
    $errors[] = 'You forgot to enter yoru email address';
  } else {
    $e = mysqli_escape_string($dbc, trim($_POST['email']));
  }

  // check for current password
  if (empty($_POST['pass'])) {
    $errors[] = 'You forgot to enter your current password';
  } else {
    $p = mysqli_escape_string($dbc, trim($_POST['pass']));
  }

  // check for a new password and match against confirmed password
  if (!empty($_POST['pass1'])) {
    if ($_POST['pass1'] != $_POST['pass2']) {
      $errors[] = 'Your new password did not match the confirmed password';
    } else {
      $np = mysqli_escape_string($dbc, trim($_POST['pass1']));
    }
  } else {
    $errors[] = 'You forgot to enter your new password';
  }

  if (empty($errors)) { // if everything is OK
    // check that they've entered the right email address/password combination
    $q = "SELECT user_id
          FROM sitename.users
          WHERE (email='$e' AND pass=SHA2('$p', 512))";

    $r = @mysqli_query($dbc, $q); // runs the query

    $num = @mysqli_num_rows($r); // shows number of returned rows
    if ($num == 1) { // match was made
      
      // get the user_id
      $row = mysqli_fetch_array($r, MYSQLI_NUM);

      // make the UPDATE query
      $q = "UPDATE sitename.users
            SET pass=SHA2('$np', 512)
            WHERE user_id=$row[0]";
      $r = @mysqli_query($dbc, $q);

      if (mysqli_affected_rows($dbc) == 1) { // if it ran OKY
        // print message
        echo'<h1>Thank you!</h1> 
        <p>Your password has been updated. In chapter 12 you will actually be able to log in</p><p><br></p>';
      } else { // if it did not run OK
        // public message
        echo '<h1>System Error</h1>
        <p class="error">Your password could not be changed due to a syste error.
        We apologize for any inconvenience. </p>';

        // debugging message
        echo '<p>' . mysqli_error($dbc) . '<br><br>Query : ' . $q . '</p>';
      }
      mysqli_close($dbc); // close the db connection

      // include the footer and quit the script (to not show the form)
      include('_includes/footer.html');
      exit();

    } else { // invalid email address/password combination
      echo '<h1>Error!</h1>
      <p class="error">The email address and password do not match those on file.</p>';
    }

  } else { // report the errors
    echo '<h1>Error!</h1>
    <p class="error">The following error(s) occured:<br>';

    foreach ($errors as $msg) { // print each error
      echo " - $msg<br>\n";
    }
    echo '</p><p>Please try again.</p><p><br></p>';
  } // end of if (empty($erroes)) IF

  mysqli_close($dbc); // close the db connection
}// end of the main submittal conditional
?>
<h1>Change Your Password</h1>
<form action="password.php" method="post">
  <p>Email Address : <input type="email" name="email" size="20" maxlength="60" value="<?php 
    if (isset($_POST['email'])) echo $_POST['email']; ?>" > </p>
  <p>Current Password : <input type="password" name="pass" size="10" maxlength="20" value="<?php
    if (isset($_POST['pass'])) echo $_POST['pass']; ?>" ></p>
  <p>New Password : <input type="password" name="pass1" size="10" maxlength="20" value="<?php
    if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"></p>
  <p>Confirm New Password : <input type="password" name="pass2" size="10" maxlength="20" value="<?php
    if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" ></p>
  <p><input type="submit" name="submit" value="Change Password"></p>
</form>

<?php include('_includes/footer.html'); ?>