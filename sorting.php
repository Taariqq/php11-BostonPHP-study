<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sorting Arrays</title>
</head>
<table border="0" cellspacing="3" cellpadding="3" align="center">
  <thead>
    <tr>
      <th>
        <h2>Title</h2>
      </th>
      <th>
        <h2>Rating</h2>
      </th>
    </tr>
  </thead>
  <tbody>
    <?php # Script 2.8 - sorting.php
      // create array
      $movies = [
        'Casablanca' => 10,
        'To Kill a Mockingbird' => 10,
        'The English Patient' => 2,
        'Stranger Than Fiction' => 9,
        'Story of the Weeping Camel' => 5,
        'Donnie Darko' => 7
      ];
      // display movies in the original order
      echo '<tr><td colspan="2"><b>In their original order:</b></td></tr>';
         foreach ($movies as $title => $rating) {
          echo "<tr><td>$title</td><td>$rating</td></tr>\n";
        }
  // display movies sorted by title: w/ ksort based on "key"
  ksort($movies);
  echo '<tr><td colspan="2"><b>Sorted by title: w/ ksort() based on "key"</b></td></tr>';
  foreach ($movies as $title => $rating) {
    echo "<tr><td>$title</td><td>$rating</td></tr>\n";
  }
  // display moves sorted by rating: w/ arsort based on "value"
  arsort($movies);
  echo '<tr><td colspan="2"><b>Sorted by rating: w/ arsort() based on "value"</b></td></tr>';
  foreach ($movies as $title => $rating) {
    echo "<tr><td>$title</td><td>$rating</td></tr>\n";
  }
  // what's the order now?
  echo '<tr><td colspan="2"><b>What is the order (original) now: So the array has changed!</b></td></tr>';
  foreach ($movies as $title => $rating) {
    echo "<tr><td>$title</td><td>$rating</td></tr>\n";
  }

   ?>
  </tbody>
</table>

<body>

</body>

</html>