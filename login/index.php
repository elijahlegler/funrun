<?php
  include '../_includes/config.php';
  include ABSOLUTE_PATH . '/_includes/header.inc.php';
  include ABSOLUTE_PATH . '/_includes/main_nav.inc.php';
 ?>

<?php
if(isset ($_COOKIE["loginError"])){
  echo $_COOKIE["loginError"];
  setcookie("loginError", "",time()-3600, "/");
}
?>

 <form action="process_login.php" class="basic-grey" method="post">

 <div>
 <label for="username" id="usernameLabel">* Username:</label>
 <input type="text" name="username" id="username" required/>
 </div>

 <label for="password" id="passwordLabel">* Password:</label>
 <input type="password" name="password" id="password" required/>

 <input type="submit" name="submitButton" class="button" value="Submit" />

 </form>

 <?php
 include ABSOLUTE_PATH . '/_includes/footer.inc.php';
  ?>
