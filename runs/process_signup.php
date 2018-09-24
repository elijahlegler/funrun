<?php
  include("../_includes/config.php");

  $userID = $_COOKIE['userID'];
  $raceID = $_GET['id'];

  $dsn = "mysql:dbname=elegler_funrun_db";
  $DBUsername = "elegler";
  $DBpassword = "elegler";

  try{
   $conn = new PDO($dsn, $DBUsername, $DBpassword);

  }
  catch (PDOException $e){
  }
  // BUILD SQL QUERY TO INSERT DATA

  $sql = "INSERT INTO signups (userid, raceid, registrationdate)
          VALUES (:userID, :raceID, :dateNow)";
  // EXECUTE QUERY AND RECEIVE RESULTS

  $pdoQuery = $conn->prepare($sql);

  $pdoQuery->bindValue(":userID", $userID, PDO::PARAM_STR);
  $pdoQuery->bindValue(":raceID", $raceID, PDO::PARAM_STR);
  $pdoQuery->bindValue(":dateNow", date('Y:m:d H:i:s'), PDO::PARAM_STR);

  $pdoQuery->execute();

  $lastSignupID = $conn->lastInsertId();

  if ($lastSignupID > 0) {
    setcookie("signupID", $lastSignupID, 0, '/');
    header('Location: success.php');
  }
  else {
    setcookie("signupError", 'Something appears to have gone wrong',
    0, '/');
    header('Location: index.php');
  }
 ?>
