<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Multidimentional Arrays</title>
</head>

<body>
  <p>Some North American States, Provinces, and Territories</p>
  <?php # Script 2.7 multi.php
  // create one array:
  $mexico = [
    'YU' => 'Yucatan',
    'BC' => 'Baja California',
    'OA' => 'Oaxaca'
  ];
  // create another array:
  $us = [
    'MD' => 'Maryland',
    'IL' => 'Illinois',
    'PA' => 'Pennsylvania',
    'IA' => 'Iowa'
  ];
  // create a third array:
  $canada = [
    'QC' => 'Quebec',
    'AB' => 'Alberta',
    'NT' => 'Northwest Territories',
    'YT' => 'Yukon',
    'PE' => 'Prince Edward Island'
  ];
  // combine the arrays:
  $n_america = [
    'Mexico' => $mexico,
    'United States' => $us,
    'Canada' => $canada
  ];
  // loop thru any country:
  echo 'Mexico provinces are as follows:<br>';
  foreach ($mexico as $key => $value) {
    echo "$key => $value<br>";
  }
  echo '<hr>';
  // now loop thru all countries:
  echo 'All North American Countries:<br>';
  foreach ($n_america as $key => $value) {
    echo "$key's territories are as follows:<br>";
    foreach ($value as $abbr => $state) {
      echo "$abbr => $state<br>";
    }
  }
  echo '<hr>';
  // now the book version:
  foreach ($n_america as $country => $list) {
    // print a heading:
    echo "<h2>$country</h2><ul>";
    // print each state, province, or territory:
      foreach ($list as $k => $v) {
        echo "<li>$k - $v</li>\n";
    }
    echo '</ul>';
  }
  ?>
</body>

</html>