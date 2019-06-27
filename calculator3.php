<?php # script 3.9 - calculator3.php modified w/ fxns
// this fxn creates a radio btn and takes 1 argument: the value. It also makes the btn sticky
function create_radio($value, $name = 'gallon_price') {
  // start the element
  echo '<input type="radio" name="' . $name .'" value="' . $value . '"';
  // check for stickiness
  if (isset($_POST[$name]) && ($_POST[$name] == $value)) {
    echo ' checked="checked"';
  }
  // complete the element
  echo "> $value ";
} // end of create_gallon_radio() function.

$page_title = 'Trip Cost Calculator 3';
include('_includes/header.html');
// check for form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  // minimal form validation
  if (isset($_POST['distance'], $_POST['gallon_price'], $_POST['efficiency']) &&
  is_numeric($_POST['distance']) && is_numeric($_POST['gallon_price']) && is_numeric($_POST['efficiency'])) {
    
    // calculate the results:
    $gallons = $_POST['distance'] / $_POST['efficiency'];
    $dollars = $gallons * $_POST['gallon_price'];
    $hours = $_POST['distance'] / 65;
    
    // print the results
    echo '<div class="page-header"><h1>Total Estimated Cost</h1></div>
    <p>The total cost of driving ' . $_POST['distance'] . ' miles, averaging ' .
    $_POST['efficiency'] . ' miles per gallon, and paying an average of $' .
    $_POST['gallon_price'] . ' per gallon, is $' . number_format($dollars, 2) . '.
    If you drive at an average of 65 miles per hour, the trip will take approximately '.
    number_format($hours, 2) . ' hours.</p>';
  
  } else { // invalid submitted values
      echo '<div class="page-header"><h1>Error!</h1></div>
      <p class="text-danger">Please enter a valid distance, price per gallon and fuel efficiency.</p>';
    }
  }  // end of main submission IF
  // leave the php section and create the html form
?>
<div class="page-header"><h1>Trip Cost Calculator</h1></div>
<form action="" method="post">
  <p>Distance (in miles): <input type="number" name="distance"
      value="<?php if (isset($_POST['distance'])) echo $_POST['distance']; ?>"></p>
  <p>Ave. Price Per Gallon:
    <?php
    create_radio('3.00');
    create_radio('3.50');
    create_radio('4.00');
    ?>
    <p>Fuel Efficiency: <select name="efficiency" id="">
        <option value="10"
          <?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == "10")) echo 'selected="selected" '; ?>>
          Terrible</option>
        <option value="20"
          <?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == "20")) echo 'selected="selected" '; ?>>
          Decent</option>
        <option value="30"
          <?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == "30")) echo 'selected="selected" '; ?>>Very
          Good</option>
        <option value="50"
          <?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == "50")) echo 'selected="selected" '; ?>>
          Outstanding</option>
      </select></p>
    <p><input type="submit" name="submit" value="Calculate!"></p>
</form>
<?php include('_includes/footer.html'); ?>