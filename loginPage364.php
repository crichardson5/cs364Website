﻿<?php
session_start();
$error = false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body class= "loginBody">
 <?php
      if ($error) {
        echo "Invalid username or password.";
      }
     ?>
<h1> Welcome to the Personal Finance Tracker</h1>
  <div class="loginBox">
  <img src="genericAvatar.png" class="avatar">
    <h2> Login Here</h2>
	<div class= "form">
    <form name="loginPage364" action="index.html" method="POST" onSubmit = "return Validate_Info_Form_Data()">
    <p><span class= "userInfo">Email Address</span></p>
    <input type="text" id="emailAddress" name="emailAddress" placeholder="Enter Email Address"
    value="<?php if (isset($_POST["username"]))
                            echo $_POST["username"]; ?>"/>
    <p><span class= "userInfo">Password</span></p>
    <input type="password" id="password" name="password" placeholder="Enter Password" />
    <input type="submit" name="submit" value="Login" />
    <? php echo $errorMessage; ?>
       </form>
    </div>
  </div>
<script src="script.js"></script>
</body>
</html>