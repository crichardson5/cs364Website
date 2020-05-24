<?php
session_start(); // start (or resume) session
	
	// create database connection ($connection)
	$connection = new mysqli("localhost", "student", "CompSci364",
                         "budget");
			
$query = "UPDATE systemUser SET login= FALSE WHERE login= TRUE;";			 
  // query database for  account information
  $statement = $connection->prepare($query);
  $statement->execute();

session_destroy();
header("Location: loginPage364.php");
?>
