<?php include ('authenticate.php');
 if(isset($_POST["submitTransaction"])){
	if(isset($_POST["category"])){
		if(isset($_POST["amount"])){
		
		}
	}
 }

$connection = new mysqli("localhost", "student", "CompSci364",
                         "budget");

if (isset($_POST['submitBudget'])){
	//gets the current user's ID num
	$query = "SELECT * FROM systemUser WHERE login = '1'";
	global $idNum;
	if($result = mysqli_query($connection, $query)){
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_array($result)){
					$idNum = intval($row['id']);
				}
		}
	}
	
	
	if(isset($_POST["budgetMonth"], $idNum)){
		$budgetDate = $_POST['budgetMonth'];
		$budgetDate .= "-01";
			
		
		//overwrites any budget from that month
		$query = "DELETE FROM userBudget WHERE budget_date = '$budgetDate';";
		if($statement = $connection->prepare($query)){
			$statement->execute();
			$statement->close();
		}
		
		//creates a new budget
		$query = "INSERT INTO userBudget (user_id, budget_date) VALUES (?, ?);";
		if($statement = $connection->prepare($query)){
			$statement->bind_param('ss', $idNum, $budgetDate);
			$statement->execute();
			$statement->close();
		}
	}
	
	if(isset($budgetDate)){
		//gets that budget's budget num
		$query = "SELECT * FROM userBudget WHERE budget_date ='$budgetDate';";
		if($result = mysqli_query($connection, $query)){
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
						$budgetNum = intval($row['budget_id']);
					}
			}
		}
	}
	
	if(isset($budgetNum)){
		$query = "INSERT INTO budgetCategory (name, budget_id, amount_allocated, amount_spent) VALUES (?, ?, ?, ?);";
		if($statement = $connection->prepare($query)){
			
			$null = 0;
			$statement->bind_param('ssss', $categoryName, $budgetNum, $alloc, $null);
			
			$categoryName = "Housing";
			$alloc = $_POST['housingAmt'];
			$statement->execute();
			
			$categoryName = "Transportation";
			$alloc = $_POST['transportationAmt'];
			$statement->execute();
			
			$categoryName = "Food";
			$alloc = $_POST['foodAmt'];
			$statement->execute();
			
			$categoryName = "Utilities";
			$alloc = $_POST['utilitiesAmt'];
			$statement->execute();
			
			$categoryName = "Insurance";
			$alloc = $_POST['insuranceAmt'];
			$statement->execute();
			
			$categoryName = "Debt Payments";
			$alloc = $_POST['debtAmt'];
			$statement->execute();
			
			$categoryName = "Investing";
			$alloc = $_POST['investAmt'];
			$statement->execute();
			
			$categoryName = "Savings";
			$alloc = $_POST['savingsAmt'];
			$statement->execute();
			
			$categoryName = "Personal";
			$alloc = $_POST['personalAmt'];
			$statement->execute();
			
			$categoryName = "Recreation";
			$alloc = $_POST['recAmt'];
			$statement->execute();
			
			$categoryName = "Miscellaneous";
			$alloc = $_POST['miscAmt'];
			$statement->execute();
			
			$statement->close();
		}
	}
}

if (isset($_POST['submitTransaction'])){
	//gets the current user's ID num
	$query = "SELECT * FROM systemUser WHERE login = '1'";
	global $idNum;
	if($result = mysqli_query($connection, $query)){
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_array($result)){
					$idNum = intval($row['id']);
				}
		}
	}
	
	//makes transaction
	if(isset($idNum, $_POST["addTransDate"], $_POST["addTransAmt"], $_POST["addTransDes"], $_POST["category"])){
	  $tdate = $_POST["addTransDate"];
		$tAmt = $_POST['addTransAmt'];
		$tdesc = $_POST["addTransDes"];
		$tcate = $_POST["category"];
	//echo "<script type='text/javascript'>alert('$tdate');</script>";
		
		//creates a new transaction
		$query = "INSERT INTO budgetTransaction (user_id, t_date, t_amount, description, category_name) VALUES (?, ?, ?, ?, ?);";
		if($statement = $connection->prepare($query)){
			$statement->bind_param('sssss', $idNum, $tdate, $tamt, $tdesc, $tcate);
			$statement->execute();
			$statement->close();
			//echo "<script type='text/javascript'>alert('$query');</script>";
		}
		$query2 = "SELECT * FROM budgetTransaction WHERE user_id ='$idNum';";
		if($result = mysqli_query($connection, $query2)){
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
						$transNum = intval($row['transaction_id']);
						echo "<script type='text/javascript'>alert('$transNum');</script>";
					}
			}
		}
	}
	
	if(isset($budgetDate) && false){
		//gets that budget's budget num
		$query = "SELECT * FROM userBudget WHERE budget_date ='$budgetDate';";
		if($result = mysqli_query($connection, $query)){
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
						$budgetNum = intval($row['budget_id']);
					}
			}
		}
	}
}
  

  ?>
  
  <!DOCTYPE html>
<html lang - "en">
	<head>
		<meta charset="utf-8">
			<link rel="stylesheet" href="stylesheet.css">
				<title>Manage Your Budget</title>
	</head>

	<body>
		<div class = "header">
			<h1>Manage Your Budget</h1>
			<div class="navBar" align="center">
				<a href="index.php">Home</a>
				<a class="active" href="viewCreateBudget.php">Manage Budget</a>
				<a href="viewTransaction.php">Transactions</a>
				<a href="logout.php">Logout</a>
			</div>
		</div>

		<br><br> 

		
		<?php
		
		
		//gets the current user's ID num
		$query = "SELECT * FROM systemUser WHERE login = '1'";
		global $idNum;
		if($result = mysqli_query($connection, $query)){
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
						$idNum = intval($row['id']);
					}
			}
		}
		
		//gets the most recent budget's budget num
		$query = "SELECT * FROM userBudget WHERE user_id ='$idNum';";
		$budgetNum = -1;
		$budgetMonth;
		if($result = mysqli_query($connection, $query)){
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
						$budgetNum = intval($row['budget_id']);
						$date = $row['budget_date'];
					}
			}
		}
		
		if($budgetNum > 0){
			echo" <h3>View Your Budget</h3>
			<form id='selectBudgetMonth' class='form-vertical'>
				<label for='budgetMonth'>Select Month</label>
				<input type='month' id='budgetMonth' name='budgetMonth' value=". substr($date, 0, -3) .">		
			</form>
			
			<br>";
			
			$sql = "SELECT * FROM budgetCategory WHERE budget_id = $budgetNum";
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
							echo "<td>$" . $row['amount_allocated'] . "</td>";
							echo "<td>$" . $row['amount_spent'] . "</td>";
							$allocated = intval($row['amount_allocated']);
							$spent = intval($row['amount_spent']);
							$difference = $allocated - $spent;
							
							if($difference > 0){
								echo "<td>$" .  $difference . "</td>";
							} else {
								echo "<td class = 'broke'>$" .  $difference . "</td>";
							}
							
							$budgetSum += $allocated;
							$spentSum += $spent;
							$remainingSum += $difference;
					}
					echo"<tr>";
							echo "<td>Total</td>";
							echo "<td>$" . $budgetSum . "</td>";
							echo "<td>$" . $spentSum . "</td>";
							if ($remainingSum > 0){
								echo "<td>$" . $remainingSum . "</td>";
							} else {
								echo "<td class='broke'>$" . $remainingSum . "</td>";
							}
					echo"</tr>";
					echo"</table>";
				}
			}
		} else {
			echo "<h1> No Budgets Found</h1>";
		}
		
		?>
			
		<br>
			<h3>Add A Transaction</h3>
			<form id="addTransForm" class="form-vertical" method="POST">
				<label for="category">Choose a category:</label>
					<select name="category" id="category">
						<option value="Housing">Housing</option>
						<option value="Transportation">Transportation</option>
						<option value="Food">Food</option>
						<option value="Utilities">Utilities</option>
						<option value="Insurance">Insurance</option>
						<option value="Debt Payments">Debt Payments</option>
						<option value="investing">Investing</option>
						<option value="Saving">Savings</option>
						<option value="Personal">Personal</option>
						<option value="Recreation">Recreation</option>
						<option value="Miscellaneous">Miscellaneous</option>
					</select>
				<label for="addTransAmt">Amount</label>
				<input type="number" min="0" id="addTransAmt" name="addTransAmt">
				<label for="addTransDate">Date</label>
				<input type="date" id="addTransDate" name="addTransDate">
				<label for="addTransDes">Description</label>
				<input type="text" id="addTransDes" name="addTransDes">
		<br><br>
				<label class="switch">
          <input type="checkbox" id="transSwitch" onclick="transactionSwitch()">
          <span class="slider"></span>
        </label>
				<input type="submit" name="submitTransaction" id="submitTransaction" value="Submit Expense">
		<br><br>

		<h3>Create A New Budget</h3>
		<br>
		<form id="createBudgetForm" class="form-vertical" action = "addBudget.php" method="POST" >
			<label for="budgetMonth">Month</label>
			<input type="month" id="budgetMonth" name="budgetMonth" value=<?php echo date("Y-m"); ?>>
			<table class="createTable">
				<tr>
					<th>Category</th>
					<th>Enter Dollar Amount</th>
				</tr>
				<tr>
					<td>Housing</td>
					<td><input type="number" min="0" class = "budgetAmt" name = "housingAmt"></td>
				</tr>
				<tr>
					<td>Transportation</td>
					<td><input type="number" min="0" class = "budgetAmt" name = "transportationAmt"></td>
				</tr>
				<tr>
					<td>Food</td>
					<td><input type="number" min="0" class = "budgetAmt" name = "foodAmt"></td>
				</tr>
				<tr>
					<td>Utilities</td>
					<td><input type="number" min="0" class = "budgetAmt" name = "utilitiesAmt"></td>
				</tr>
				<tr>
					<td>Insurance</td>
					<td><input type="number" min="0" class = "budgetAmt" name = "insuranceAmt"></td>
				</tr>
				<tr>
					<td>Debt Payments</td>
					<td><input type="number" min="0" class = "budgetAmt" name = "debtAmt"></td>
				</tr>
				<tr>
					<td>Investing</td>
					<td><input type="number" min="0" class = "budgetAmt" name = "investAmt"></td>
				</tr>
				<tr>
					<td>Savings</td>
					<td><input type="number" min="0" class = "budgetAmt" name = "savingsAmt"></td>
				</tr>
				<tr>
					<td>Personal</td>
					<td><input type="number" min="0" class = "budgetAmt" name = "personalAmt"></td>
				</tr>
				<tr>
					<td>Recreation</td>
					<td><input type="number" min="0" class = "budgetAmt" name = "recAmt"></td>
				</tr>
				<tr>
					<td>Miscellaneous</td>
					<td><input type="number" min="0" class = "budgetAmt" name = "miscAmt"></td>
				</tr>
			</table>

			<br>

			<input type="submit" name="submitBudget" value="Submit Budget">
		

		</form>
	<script src="script.js"></script>
	</body>
</html>