<?php
function addUser() {
  global $connection;

  $query = "INSERT INTO systemUser (first_name, last_name, emailAddress, password) VALUES (?, ?, ?, (SELECT SHA1(?)));";

  $statement = $connection->prepare($query);
  $statement->bind_param('ssss', $_POST['first_name'], $_POST['last_name'],   
  $_POST['emailAddress'], $_POST['password']);
  $statement->execute();
}
// create database connection ($connection)
$connection = new mysqli("localhost", "student", "CompSci364",
                         "budget");
if (isset($_POST['submit'])){
  if($_POST['password'] != $_POST['validatepassword']){
   echo "Password does not match. Try again.";
     }
  else{
  addUser();
  header("Location: loginPage364.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Create Account</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body class= "accountBody">
<h1> Enter Your Information Below to Get Started</h1>
  <div class="accountBox">
  <img src="genericAvatar.png" class="avatar">
    <h2> Account Information</h2>
	<div class= "form">
    <form name="createAccount" action=""
          method="post" onSubmit = "return Validate_Create_Form_Data()">

     <p><span class= "userInfo">First Name</span></p>
     <input type="text" id="first_name"  name="first_name" placeholder="Enter First Name"/>

      <p><span class= "userInfo">Last Name</span></p>
     <input type="text" id="last_name"  name="last_name" placeholder="Enter Last Name">

    <p><span class= "userInfo">Email Address</span></p>
    <input type="text" id="emailAddress"  name="emailAddress" placeholder="Enter Email Address"/>

    <p><span class= "userInfo">Password</span></p>
    <input type="password" id="password" name="password" placeholder="Enter Password"/>

    <p><span class= "userInfo">Validate Password</span></p>
    <input type="password" id="validatepassword" name="validatepassword" placeholder="Validate Password"/>
   
    <input type="submit" id="submit" name="submit" value="Create"/>
       </form>
     <a href="loginPage364.php">Back to Login Page</a>
    </div>
  </div>
<script src="script.js"></script>
</body>
</html>
