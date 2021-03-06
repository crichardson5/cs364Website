<?php include ('authenticate.php')?>
﻿<!DOCTYPE html>
<html lang - "en">
	<head>
		<meta charset="utf-8">
			<link rel="stylesheet" href="stylesheet.css">
				<title>Create Your Budget</title>
	</head>

	<body>
		<div class = "header">
			<h1>Create Your Budget</h1>
			<div class="navBar" align="center">
				<a href="index.php">Home</a>
				<a class="active" href="createBudget.php">Create Budget</a>
				<a href="viewBudget.php">View Budget</a>
				<a href="logout.php">Logout</a>
			</div>
		</div>

		<br><br> 

		<form id="createBudgetForm" class="form-vertical" method="post">
			<label for="budgetMonth">Month</label>
			<input type="month" id="budgetMonth" name="budgetMonth" value="2020-04">
			<table class="createTable">
				<tr>
					<th>Category</th>
					<th>Enter Dollar Amount</th>
				</tr>
				<tr>
					<td>Housing</td>
					<td><input type="text"></td>
				</tr>
				<tr>
					<td>Transportation</td>
					<td><input type="text"></td>
				</tr>
				<tr>
					<td>Food</td>
					<td><input type="text"></td>
				</tr>
				<tr>
					<td>Utilities</td>
					<td><input type="text"></td>
				</tr>
				<tr>
					<td>Insurance</td>
					<td><input type="text"></td>
				</tr>
				<tr>
					<td>Debt Payments</td>
					<td><input type="text"></td>
				</tr>
				<tr>
					<td>Investing</td>
					<td><input type="text"></td>
				</tr>
				<tr>
					<td>Saving</td>
					<td><input type="text"></td>
				</tr>
				<tr>
					<td>Personal</td>
					<td><input type="text"></td>
				</tr>
				<tr>
					<td>Recreation</td>
					<td><input type="text"></td>
				</tr>
				<tr>
					<td>Miscellaneous</td>
					<td><input type="text"></td>
				</tr>
			</table>

			<br>

			<div class="submitbutton" align="center">
				<input type="submit" name="submit" value="Submit Budget">
			</div>

		</form>
	</body>
</html>
