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
				<a class="active" href="viewCreateBudget.php">View and Create Budget</a>
				<a href="logout.php">Logout</a>
			</div>
		</div>

		<br><br> 

		<form id="selectBudgetMonth" class="form-vertical">
			<label for="budgetMonth">Select Month</label>
			<input type="month" id="budgetMonth" name="budgetMonth" value="2020-04">		
		</form>
		
		<br>
		
		<table class="viewTable">
			<tr>
				<th>Category</th>
				<th>Budgeted</th>
				<th>Spent</th>
				<th>Remaining</th>
			</tr>
			<tr>
				<td>Housing</td>
				<td>$100</td>
				<td>$0</td>
				<td>$100</td>
			</tr>
			<tr>
				<td>Transportation</td>
				<td>$100</td>
				<td>$0</td>
				<td>$100</td>
			</tr>
			<tr>
				<td>Food</td>
				<td>$100</td>
				<td>$0</td>
				<td>$100</td>				
			</tr>
			<tr>
				<td>Utilities</td>
				<td>$100</td>
				<td>$0</td>
				<td>$100</td>				
			</tr>
				<td>Insurance</td>
				<td>$100</td>
				<td>$0</td>
				<td>$100</td>
			<tr>
				<td>Debt Payments</td>
				<td>$100</td>
				<td>$0</td>
				<td>$100</td>
			</tr>
			<tr>
				<td>Investing</td>
				<td>$100</td>
				<td>$0</td>
				<td>$100</td>				
			</tr>
			<tr>
				<td>Saving</td>
				<td>$100</td>
				<td>$0</td>
				<td>$100</td>				
			</tr>
			<tr>
				<td>Personal</td>
				<td>$100</td>
				<td>$0</td>
				<td>$100</td>				
			</tr>
			<tr>
				<td>Recreation</td>
				<td>$100</td>
				<td>$0</td>
				<td>$100</td>				
			</tr>
			<tr>
				<td>Miscellaneous</td>
				<td>$100</td>
				<td>$0</td>
				<td>$100</td>				
			<tr>
			<tr>
				<td>Total</td>
				<td>$1100</td>
				<td>$0</td>
				<td>$1100</td>				
			<tr>
		</table>
			
		<br>
			<form id="addTransaction" class="form-vertical" method="post">
				<label for="addTransaction">Add Transaction</label>
				<input type="number" id="addTransaction" name="addTransaction">
		<br>

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
