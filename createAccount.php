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
    <form name="createAccount" action="<?php echo $_SERVER["PHP_SELF"].
                             "?".$_SERVER["QUERY_STRING"]; ?>"
          method="post" onSubmit = "return Validate_Info_Form_Data()">
     <p><span class= "userInfo">First Name</span></p>
     <input type="text" id="first_name"  name="first_name" value="<?php if         (isset($_POST["first_name"]))
     echo $_POST["first_name"]; ?>" placeholder="Enter First Name"/>
      <p><span class= "userInfo">Last Name</span></p>
     <input type="text" id="last_name"  name="last_name" value="<?php if         (isset($_POST["last_name"]))
     echo $_POST["last_name"]; ?>" placeholder="Enter Last Name"/>
    <p><span class= "userInfo">Email Address</span></p>
    <input type="text" id="emailAddress"  name="emailAddress" value="<?php if         (isset($_POST["emailAddress"]))
     echo $_POST["emailAddress"]; ?>" placeholder="Enter Email Address"/>
    <p><span class= "userInfo">Password</span></p>
    <input type="password" id="password" name="password" placeholder="Enter Password"/>
    <p><span class= "userInfo">Validate Password</span></p>
    <input type="password" id="password" name="password" placeholder="Validate Password"/>
    <input type="submit" name="submit" value="Create"/>
       </form>
    </div>
  </div>
<script src="script.js"></script>
</body>
</html>
