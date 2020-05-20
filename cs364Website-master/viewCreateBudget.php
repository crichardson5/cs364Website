<?php include ('authenticate.php')
 if(isset($_POST["submitTransaction"])){
	if(isset($_POST["category"])){
		if(isset($_POST["addTransaction"])){
		
		}
	}
 }

$connection = new mysqli("localhost", "student", "CompSci364",
                         "budget");
?>
<!DOCTYPE html>
<html lang - "en">
	<head>
		<meta charset="utf-8">
			<link rel="stylesheet" href="stylesheet.css">
				<title>View and Create Your Budget</title>
	</head>

	<body>
		<div class = "header">
			<h1>View and Create Your Budget</h1>
			<div class="navBar" align="center">
				<a href="index.php">Home</a>
				<a class="active" href="viewCreateBudget.php">View and Create Budget</a>
				<a href="logout.php">Logout</a>
			</div>
		</div>

		<br><br> 

		<h3>View Your Budget</h3>
		<br>
		<form id="selectBudgetMonth" class="form-vertical">
			<label for="budgetMonth">Select Month</label>
			<input type="month" id="budgetMonth" name="budgetMonth" value="2020-04">		
		</form>
		
		<br>
		
		<?php
		$sql = "SELECT * FROM budgetCategory WHERE budget_id = '1'";
		$budgetSum = 0;
		$spentSum = 0;
		$remainingSum = 0;
		if($result = mysqli_query($connection, $sql)){
			if(mysqli_num_rows($result) > 0){
				echo "<table class = 'viewTable'>";
					echo "<tr>";
						echo "<th>Category</th>";
						echo "<th>Budgeted</th>";
						echo "<th>Spent</th>";
						echo "<th>Remaining</th>";
					echo "</tr>";
				while($row = mysqli_fetch_array($result)){
					echo"<tr>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . $row['amount_allocated'] . "</td>";
						echo "<td>" . $row['amount_spent'] . "</td>";
						$allocated = intval($row['amount_allocated']);
						$spent = intval($row['amount_spent']);
						$difference = $allocated - $spent;
						echo "<td>" .  $difference . "</td>";
						
						$budgetSum += $allocated;
						$spentSum += $spent;
						$remainingSum += $difference;
				}
				echo"<tr>";
						echo "<td>Total</td>";
						echo "<td>" . $budgetSum . "</td>";
						echo "<td>" . $spentSum . "</td>";
						echo "<td>" . $remainingSum . "</td>";
				echo"</tr>";
				echo"</table>";
			}
		}
		?>
			
		<br>
			<h3>Add A Transaction</h3>
			<form id="addTransaction" class="form-vertical" method="post">
				<label for="category">Choose a category:</label>
					<select name="category" id="category">
						<option value="Housing">Housing</option>
						<option value="Transportation">Transportation</option>
						<option value="Food">Food</option>
						<option value="Utilities">Utilities</option>
						<option value="Insurance">Insurance</option>
						<option value="Debt Payments">Debt Payments</option>
						<option value="investing">Investing</option>
						<option value="Saving">Saving</option>
						<option value="Personal">Personal</option>
						<option value="Recreation">Recreation</option>
						<option value="Miscellaneous">Miscellaneous</option>
					</select>
				<label for="addTransaction">Amount</label>
				<input type="number" id="addTransaction" name="addTransaction">
		<br>
			<div class="submitbutton" align="center">
				<input type="submit" name="submitTransaction" value="Submit Transaction">
			</div>
		<br><br>

		<h3>Create Your Budget</h3>
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
