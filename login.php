<?php

session_start();
$errormessage = ''; 

if (isset($_POST['submit'])){

$emailAddress = $_POST['emailAddress'];
$password = $_POST['password'];
}