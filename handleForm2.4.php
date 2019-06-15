<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Form Feedback</title>
  <style>
    body {
      background: grey;
      color: white;
    }
    .error {
      font-weight: bold;
      color: #c00;
    }
  </style>
</head>

<body>
  <?php # Script 2.4 - handleForm.php 
  // validate the name:
  if (!empty($_REQUEST['name'])) {
    $name = $_REQUEST['name'];
  } else {
    $name = NULL;
    echo '<p class="error">You forgot to enter your name!<p>';
  }
  // validate the email:
  if (!empty($_REQUEST['email'])) {
    $email = $_REQUEST['email'];
  } else {
    $email = NULL;
    echo '<p class="error">You forgt to enter your email address</p>';
  }
  // validate comments:
  if (!empty($_REQUEST['comments'])) {
    $comments = $_REQUEST['comments'];
  } else {
    $comments = NULL;
    echo '<p class="error">You forgot to enter comments!</p>';
  }
  // validate gender:
  if (isset($_REQUEST['gender'])) {
    $gender = $_REQUEST['gender'];

    if ($gender == 'M') {
      $greeting = '<p><b>Good day, Sir!</b></p>';
    } elseif ($gender == 'F') {
      $greeting = '<p><b>Good day, Madam!</b><p>';
    } else { // unacceptable value
      $gender = NULL;
      echo '<p class="error">Gender should be either "M" or "F"!</p>';
    }
  } else { // $_REQUEST['gender'] is not set
    $gender = NULL;
    echo '<p class="error">You forgot to select your gender!</p>';
  }
  // If everything is okay, print the message:
  if ($name && $email && $gender && $comments) {
    echo "<p>Thank you, <b>$name</b>, for the following comments:</p>
    <pre>$comments</pre>
    <p>We will reply to you at <i>$email</i>.</p>\n";

    echo $greeting;
  } else { // missing form value(s)
    echo '<p class="error">Please go back and fill out the form again.</p>';
  }
  
  ?>

</body>

</html>