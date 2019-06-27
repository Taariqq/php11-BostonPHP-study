<?php # script 3.4 & script 3.7 - index.php
// this fxn outputs theoretical HTML for adding ads to the page
function create_ad() {
  echo '<div class="alert alert-info" role="alert"><p>This is an annoying ad! This is an annoying ad! This is an annoying ad!</p></div>';
} // end fxn def

$page_title = 'Welcome to this site!';
include('_includes/header.html');
// fxn call
create_ad();
?>
<!-- Begin page content -->
<div class="page-header">
  <h1>Content Header</h1>
</div>
<p>This is where the page-specific content goes. This section, and the corresponding header, will change from one
  page to the next.</p>
<p>Marty Jr.Hey fruit, fruit please! (The fruit thing comes down.) Thank you. Aren't you and Jennifer getting along?
  Oh yeah, great Mom, we're like a couple of teenagers, ya know. (The phone rings on the kids goggles.) Marty
  Jr.Dad, telephone, its Needles.
</p>
<!-- End page content -->
<?php 
// call the fxn again
create_ad();
include('_includes/footer.html'); ?>