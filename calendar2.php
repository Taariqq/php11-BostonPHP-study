<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Calendar2</title>
</head>

<body>
  <form action="calendar2.php" method="post">
    <?php # script 2.9 - calendar2.php
      // this script makes 3 pull-down menus for an html form: months, days, years
      //make the months array:
      $months = [1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
      // rewrite $days array using loop
      // $days and $years array deleted. will be created with loops

      
      // months pull-down
      echo '<select name="month">';
      foreach ($months as $key => $value) {
        echo "<option value = \"$key\">$value</option>\n";
      }
      echo '</select>';
      
      // $days foreach rewrite as for - days pull-down menu:
      echo '<select name="day">';
        for ($day = 1; $day <= 31; $day++) {
          echo "<option value=\$day\">$day</option>\n";
        }
      echo '</select>';

      // years pull-down, foreach rewrite in 'for'
      echo '<select name="year">';
        for ($year = 2017; $year <= 2027; $year++) {
          echo "<option value=\"$year\">$year</option>\n";
        }
      echo '</select>';
      echo '<hr>';
    ?>
  </form>

</body>

</html>