<?php
  include '../_includes/config.php';
  include ABSOLUTE_PATH . '/_includes/header.inc.php';
  include ABSOLUTE_PATH . '/_includes/main_nav.inc.php';
 ?>

  <?php
  if (isset($_COOKIE['registrationError'])) {
    echo $_COOKIE['registrationError'];
    setcookie('registrationError', '', time()-3600, '/');
  }
  ?>

 <h4>All fields are required</h4>
<form id = 'registerForm' action = 'process_registration.php' method = 'post'>
  <label for = 'firstName'>First Name</label>
  <input type = 'text' id = 'firstName' name = 'firstName' required>
  <br>
  <br>
  <label for = 'lastName'>Last Name</label>
  <input type = 'text' id = 'lastName' name = 'lastName' required>
  <br>
  <br>
  <label for = 'email'>Email Address</label>
  <input type = 'email' id = 'email' name = 'email' required>
  <br>
  <br>
  <label for = 'username'>Username</label>
  <input type = 'text' id = 'username' name = 'username' required>
  <br>
  <br>
  <label for = 'password'>Password</label>
  <input type = 'password' id = 'password' name = 'password' required>
  <br>
  <br>
  <label for = 'confirmPassword'>Confirm Password</label>
  <input type = 'password' id = 'confirmPassword' name = 'confirmPassword' required>
  <br>
  <br>
  <input type = 'submit' onclick = 'return passwordsMatch();'>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = 'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js'></script>
<script>
$('#registerForm').validate();
function passwordsMatch() {
  var password = document.getElementById('password').value;
  var confirmPassword = document.getElementById('confirmPassword').value;
  if (password != confirmPassword) {
    alert('Passwords do not match!');
    return false;
  }
  else {
    return true;
  }
}
</script>


<?php
 include ABSOLUTE_PATH . '/_includes/footer.inc.php';
  ?>
