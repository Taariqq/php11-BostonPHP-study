<?php # script 9.6 mod with mysql_num_rows() - view_users.php
// this script retrieves all the records from the users table
$page_title = 'View the Current Users 2';
include('_includes/header.html');
// page header
echo '<h1>Registered Users</h1>';

require('../mysqli_connect.php'); // connect to the database

// make the query
$q = "SELECT CONCAT(last_name, ', ', first_name) AS name, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr
FROM sitename.users
ORDER BY registration_date ASC";

$r = @mysqli_query($dbc, $q); // run the query

// count number of returned rows
$num = mysqli_num_rows($r);

if ( $num > 0) { // If the querry ran OK and there were records returned
  // print number of users
  echo"<p>There are currently $num registered users.</p>\n";  

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
} else { // If no records were returned.

  echo '<p class="error">There are currently no registered users.</p>';

  // debugging message
  echo '<p>' . mysqli_error($dbc) . '<br><br>Query : ' . $q . '</p>';
} // end of if ($r) IF

mysqli_close($dbc); // close the db connection

include('_includes/footer.html');
?>