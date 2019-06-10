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
  </style>
</head>

<body>
  <?php # Script 2.3 - handleForm.php 
    // shorthand for form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comments = $_POST['comments'];
  /* not used: 
  $_POST['age'];
  $_POST['gender'];
  $_POST['submit'];
  */
  if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
  } else {
    $gender = NULL;
  }
  // print submitted info
  echo "<p>Thank you, <b>$name</b>, for the following comments:</p>
  <pre>$comments</pre>
  <p>We will reply to you at <i>$email</i> soon.</p>\n";
  // message based on gender
  if ($gender == 'M') {
    echo '<p><b>Good day, Sir!</b></p>';
  } elseif ($gender == 'F') {
    echo '<p><b>Good day, Madam!</b></p>';
  } else {// nothing selected 
    echo '<p><b>You forgot to specify the gender</b></p>';
  }
  
  ?>

</body>

</html>