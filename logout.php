<?php
session_start(); // start (or resume) session
if (! isset($_SESSION["emailAddress"]) // already authenticated
    && isset($_POST["emailAddress"], $_POST["password"])) {
	
	// create database connection ($connection)
	$connection = new mysqli("localhost", "root", "",
                         "budget");
						 
  // query database for  account information
  $statement = $connection->prepare("UPDATE systemUser
                                     SET login = FALSE
                                     WHERE login = TRUE;");
  $statement->execute();
}
session_destroy();
header("Location: loginPage364.php");
?>
