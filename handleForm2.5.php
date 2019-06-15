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
  <?php # print the submitted information

  if (!empty($_POST['name']) && !empty($_POST['comments']) && !empty($_POST['email'])) {
    echo "<p>Thank you, <b>{$_POST['name']}</b>, for the following comments:</p>
      <pre>{$_POST['comments']}</pre>
      <p>We will reply to you at <i>{$_POST['email']}</i>.</p>\n";
  } else { // missing form value(s).
     echo '<p>Please go back and fill out the form again.</p>';
  }
  
  ?>

</body>

</html>