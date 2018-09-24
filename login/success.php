<?php
  include '../_includes/config.php';
  include ABSOLUTE_PATH . '/_includes/header.inc.php';
  include ABSOLUTE_PATH . '/_includes/main_nav.inc.php';
 ?>

 <h1>Login Successful</h1>

<?php
  echo 'Your user ID is: <b>' . $_COOKIE['userID'] . '</b>.';
 ?>
 <?php
 include ABSOLUTE_PATH . '/_includes/footer.inc.php';
  ?>
