<?php
  include '../_includes/config.php';
  include ABSOLUTE_PATH . '/_includes/header.inc.php';
  include ABSOLUTE_PATH . '/_includes/main_nav.inc.php';
 ?>

 <h1>Sign Up Success!</h1>

 <?php
 echo 'Your sign up ID is <b>' . $_COOKIE['signupID'] . '</b>.';
 include ABSOLUTE_PATH . '/_includes/footer.inc.php';
  ?>
