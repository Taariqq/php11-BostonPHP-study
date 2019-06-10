<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Form Feedback</title>
  <style>
    body {
      background: lightgray;
      color: #2b697a;
    }

    .error {
      font-weight: bold;
      color: #c00;
    }
  </style>
</head>

<body>
  <?php # Script 2.4 - handleForm.php #3 
  # the "null coalescing operator (??) is written like
  # $gender = $_POST['gender'] ?? NULL; // and does the same as follows
  
  // validate the name
  if (!empty($_POST['name'])) {
    $name = $_POST['name'];
  } else {
    $name = NULL;
    echo '<p class="error">You forgot to enter your name!</p>';
  }
  // validate the email
  if (!empty($_POST['email'])) {
    $email = $_POST['email'];
  } else {
    $email = NULL;
    echo '<p class="error">You forgot to enter your email address!</p>';
  }
  // validate comments
  if (!empty($_POST['comments'])) {
    $comments = $_POST['comments'];
  } else {
    echo '<p class="error">You did not enter any comments!</p>';
  }
  // validate gender
  if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
  }
  switch($gender) {
    case $gender == 'M':
      echo '<p>Good day Sir!</p>';
      break;
    case $gender == 'F':
      echo '<p>Good day Madam!</p>';
      break;
    default:
      echo '<p class="error">You don\'t know your gender!</p>';
  }

  ?>
</body>

</html>