<?php # script 9.4 w/ mod- view_users.php
// this script retrieves all the records from the users table
$page_title = 'View the Current Users';
include('_includes/header.html');
// page header
echo '<h1>Registered Users</h1>';

require('../mysqli_connect.php'); // connect to the database

// make the query
$q = "SELECT CONCAT(last_name, ', ', first_name) AS name, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr
FROM sitename.users
ORDER BY registration_date ASC";

// query to count the records
$c = "SELECT * 
      FROM sitename.users"; // here SELECT COUNT(*) won't work
// run query
$rc = @mysqli_query($dbc, $c); // to count users/num rows

$r = @mysqli_query($dbc, $q); // run the query

if ($rc) { // to print number of records
  echo 'total number of registered users is ' . mysqli_num_rows($rc)  . ' right now.<br><br>';
}


if ($r) { // if it ran OK, display the records.

  // Table header
  echo '<table width="60%">
  <thead>
  <tr>
    <th align="left">Name</th>
    <th align="left">Date Registered</th>
  </th>
  </thead>
  <tbody>';

  // fetch and print all the records
  while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    echo '<tr><td align="left">' . $row['name'] . '</td><td align="left">' . $row['dr'] .  '</td></tr>';
  }
  echo '</tbody></table>'; // close the table

  mysqli_free_result($r); // free up the resources
} else { // if it did not run OK
  // public message
  echo '<p class="error">The current users could not be retrieved. We apologize for any inconvenience this may have caused.</p>';

  // debugging message
  echo '<p>' . mysqli_error($dbc) . '<br><br>Query : ' . $q . '</p>';
} // end of if ($r) IF

mysqli_close($dbc); // close the db connection

include('_includes/footer.html');
?>