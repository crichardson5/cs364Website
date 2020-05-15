<?php
session_start(); // start (or resume) session

// create database connection ($connection)
$connection = new mysqli("localhost", "student", "CompSci364",
                         "budget");

$error = false;
if (! isset($_SESSION["emailAddress"]) // already authenticated
    && isset($_POST["emailAddress"], $_POST["password"])) {
  // query database for  account information
  $statement = $connection->prepare("SELECT password
                                     FROM systemUser
                                     WHERE emailAddress = ?;");
  $statement->bind_param("s", $_POST["emailAddress"]);

  $statement->execute();
  $statement->bind_result($password_hash);

  // emailAddress present in database
  if ($statement->fetch()) {
    // verify that the password matches stored password hash
    if ( sha1($_POST["password"]) ==  $password_hash) {
      // store the emailAddress to indicate authentication
      $_SESSION["emailAddress"] = $_POST["emailAddress"];
    }
  }

  $error = true;
}

if (isset($_SESSION["emailAddress"])) { // authenticated
  $location = dirname($_SERVER["PHP_SELF"]);
  if (isset($_REQUEST["redirect"])) {
    $location = $_REQUEST["redirect"];
  }

  // redirect to requested page
    header("Location: ".$location);
}

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
        echo "Invalid email address or password.";
      }
     ?>
<h1> Welcome to the Personal Finance Tracker</h1>
  <div class="loginBox">
  <img src="genericAvatar.png" class="avatar">
    <h2> Login Here</h2>
	<div class= "form">
    <form name="loginPage364" action="<?php echo $_SERVER["PHP_SELF"].
                             "?".$_SERVER["QUERY_STRING"]; ?>"
          method="post" onSubmit = "return Validate_Info_Form_Data()">
    <p><span class= "userInfo">Email Address</span></p>
    <input type="text" id="emailAddress"  name="emailAddress" value="<?php if         (isset($_POST["emailAddress"]))
     echo $_POST["emailAddress"]; ?>" placeholder="Enter Email Address"/>
    <p><span class= "userInfo">Password</span></p>
    <input type="password" id="password" name="password" placeholder="Enter Password"/>
    <input type="submit" name="submit" value="Login"/>
       </form>
   <div style="text-align:center">   
    <a href="createAccount.php">Create Account</a>
   </div>
    </div>
  </div>
<script src="script.js"></script>
</body>
</html>
