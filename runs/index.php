<?php
  include '../_includes/config.php';
  include ABSOLUTE_PATH . '/_includes/header.inc.php';
  include ABSOLUTE_PATH . '/_includes/main_nav.inc.php';
?>
<h2>Runs</h2>

<?php
  if (isset($_COOKIE['signupError'])){
    echo $_COOKIE['signupError'];
    setcookie('signupError','', time()-3600, '/');
  }

  $dsn = "mysql:dbname=elegler_funrun_db";
  $username = "elegler";
  $password = "elegler";

  $conn = new PDO($dsn, $username, $password);

  $query1 = 'SELECT * FROM runs ORDER BY startdate';
  $rows = $conn->query($query1);
  echo '<table>';
  echo '<tr><th>Run Name</th><th>Run Date and Time</th><th>Price</th><th>Number of Registrations Available</th>';
  if (isset($_COOKIE['userID'])) {
    echo '<th>Sign Up</th>';
  }
  echo '</tr>';
  foreach($rows as $runInfo) {
    echo '<tr><td>' . $runInfo['name'] . '</td>';
    echo '<td>' . $runInfo['startdate'] . '</td>';
    echo '<td>' . $runInfo['price'] . '</td>';
    echo '<td>' . $runInfo['maxregistrations'] . '</td>';
    if (isset($_COOKIE['userID'])) {
      echo "<td><a href = '" . URL_ROOT . "runs/process_signup.php?id=" . $runInfo['id'] . "'>Sign Up!</a></td>";
    }
    echo '</tr>';
  }

  echo '</table>';
 ?>

<?php
  include ABSOLUTE_PATH . '/_includes/footer.inc.php';
?>
