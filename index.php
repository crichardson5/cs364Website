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
	<div id="page-container">
		<div id="content-wrap">
		<div class="header">
			<h1>Welcome to the Personal Finance Tracker</h1>
			<div class="navBar" align="center">
				<a class="active" href="index.php">Home</a>
				<a href="viewCreateBudget.php">Manage Budget</a>
				<a href="viewTransaction.php">Transactions</a>
				<a href="logout.php">Logout</a>
			</div>
        </div>
		
		<br><br>
		<h3 class="mainPage">
			The personal finance tracker is a financial management tool created by four Air Force Academy students to help you practice smart money managament.<br>
			This tool allows you to construct a monthly budget and keep it up to date by recording your spending through our transactions feature, which will then dynamically update how much you have left to spend for the month.<br><br>
			Click on <span class="italicize"> Manage Budget</span> to set up your own customized budget or to view your current budget.<br><br>
			Click on <span class="italicize"> Transactions</span> to view your transaction history.<br>
		</h3>
		</div>
		<footer id = "footer">
			Created by C1Cs Belcher, Reddy, Richardson and Shumate
		</footer>
		</div>
	</body>
</html>
