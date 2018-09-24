<?php

include("../_includes/config.php");

// COLLECT INFORMATION FROM THE FORM
$firstname = $_POST['firstName'];
$lastname = $_POST['lastName'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// ENCRYPT PASSWORD (to match the data in the database)

$crypted_password = crypt($password, "21500");

// MAKE A CONNECTION TO THE DATABASE

$dsn = "mysql:dbname=elegler_funrun_db";
$DBUsername = "elegler";
$DBpassword = "elegler";

try{
 $conn = new PDO($dsn, $DBUsername, $DBpassword);

}
catch (PDOException $e){
}
// BUILD SQL QUERY TO INSERT DATA

$sql = "INSERT INTO users (firstname, lastname, email, username, password)
        VALUES (:firstname, :lastname, :email, :username, :password)";
// EXECUTE QUERY AND RECEIVE RESULTS

$pdoQuery = $conn->prepare($sql);

$pdoQuery->bindValue(":firstname", $firstname, PDO::PARAM_STR);
$pdoQuery->bindValue(":lastname", $lastname, PDO::PARAM_STR);
$pdoQuery->bindValue(":email", $email, PDO::PARAM_STR);
$pdoQuery->bindValue(":username", $username, PDO::PARAM_STR);
$pdoQuery->bindValue(":password", $crypted_password, PDO::PARAM_STR);

$pdoQuery->execute();

//Get the last inserted ID

$lastUserID = $conn->lastInsertId();

// IF RETURNED NUMBER OF ROWS IS 0 (meaning the username/password is invalid)
if ($lastUserID > 0)
{
 // SET A COOKIE THAT CONTAINS THE USER'S ID
 setcookie("userID", $lastUserID, 0,"/");
 // REDIRECT THE BROWSER TO success.php
 header("Location: success.php");
}
else
{
 // SET AN ERROR COOKIE
 setcookie("registrationError", "Something went wrong.", 0, "/");

 // REDIRECT BROWSER TO index.php
 header("Location: index.php");
}


?>
