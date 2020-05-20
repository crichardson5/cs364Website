<?php include ('authenticate.php')?>
<!DOCTYPE html>

<html lang = "en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="stylesheet.css">
		<script src="script.js"></script>
		<title>Budget</title>
	</head>
	
	<body>
		<div class="header">
			<h1>Welcome to the Personal Finance Tracker</h1>
			<div class="navBar" align="center">
				<a class="active" href="index.php">Home</a>
				<a href="viewCreateBudget.php">View and Create Budget</a>
				<a href="logout.php">Logout</a>
				<input onclick="processRequest()" type="button" value="Test Submit"/>
				<textarea cols="80" id="response" name="response"
                    readonly="readonly" rows="8"></textarea>
			</div>
        </div>
		
		<br><br><br>
		<h2>
			Click on <span class="italicize"> View and Create Budget</span> to set up your own customized budget or to view your current budget.<br> 
		</h2>
	</body>
</html>
