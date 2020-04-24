<?php
session_start();
if(session_destroy()) // Destroying All Sessions {
header("Location: loginPage364.php"); // Redirecting To Home Page
}
?>