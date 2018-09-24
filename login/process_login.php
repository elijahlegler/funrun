<?php

require_once("../_includes/config.php");

// COLLECT INFORMATION FROM THE FORM
$username = $_POST["username"];
$password = $_POST["password"];

// ENCRYPT PASSWORD (to match the data in the database)

$crypted_password = crypt($password, "21500");

// MAKE A CONNECTION TO THE DATABASE

$dsn = "mysql:dbname=elegler_funrun_db";;
$DBUsername = "elegler";
$DBpassword = "elegler";

try{
 $conn = new PDO($dsn, $DBUsername, $DBpassword);
}
catch (PDOException $e){
 echo 'something went wrong';
}
// BUILD SQL QUERY TO RETRIEVE DATA

$sql = "SELECT * FROM  users WHERE username=:username AND password=:password LIMIT 1";
// EXECUTE QUERY AND RECEIVE RESULTS

$pdoQuery = $conn->prepare($sql);

$pdoQuery-> bindValue(":username", $username, PDO::PARAM_STR);

$pdoQuery-> bindValue(":password", $crypted_password, PDO::PARAM_STR);

$pdoQuery->execute();

$row = $pdoQuery->fetch(PDO::FETCH_ASSOC);


// IF RETURNED NUMBER OF ROWS IS 0 (meaning the username/password is invalid)
if (!is_array($row))
{
 // SET AN ERROR COOKIE
 setcookie("loginError", "Your username or password was invalid", 0, "/");

 // REDIRECT BROWSER TO index.php
 header("Location: index.php");
}

// ELSE (a record was returned from the database)
else
{
 // SET A COOKIE THAT CONTAINS THE USER'S ID
 setcookie("userID", $row["id"],0,"/");
 // REDIRECT THE BROWSER TO success.php
 header("Location: success.php");
}

?>
