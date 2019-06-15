<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Calendar</title>
</head>

<body>
  <form action="calendar.php" method="post">
    <?php # script 2.6 - calendar.php
      // this script makes 3 pull-down menus for an html form: months, days, years
      //make the months array:
      $months = [1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
      // days and years arrays:
      $days = range(1, 31);
      $years = range(2017, 2027);
      
      // months pull-down
      echo '<select name="month">';
      foreach ($months as $key => $value) {
        echo "<option value = \"$key\">$value</option>\n";
      }
      echo '</select>';
      
      // days pull-down
      echo '<select name="day">';
      foreach ($days as $value) {
        echo "<option value=\"$value\">$value</option>\n";
      }
      echo '</select>';

      // years pull-down
      echo '<select name="year">';
      foreach ($years as $value) {
        echo "<option value=\"$value\">$value</option>\n";
      }
      echo '</select>';
      echo '<hr>';
      echo count($years);
    ?>
  </form>

</body>

</html>