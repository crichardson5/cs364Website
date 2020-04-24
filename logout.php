<?php
session_start();
unset($_SESSION['login_user']);
if(!isset($_SESSION["login_user"])) // Destroying All Sessions
{header("Location: loginPage364.php"); // Redirecting To Home Page
}
?>