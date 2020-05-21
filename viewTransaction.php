<!Doctype html>
<html lang - "en">
	<head>
		<meta charset="utf-8">
			<link rel="stylesheet" href="stylesheet.css">
				<title>Transactions</title>
	</head>

	<body>
		<div class = "header">
			<h1>Transactions</h1>
			<div class="navBar" align="center">
				<a href="index.php">Home</a>
				<a href="viewCreateBudget.php">Manage Budget</a>
				<a class="active" href="viewTransaction.html">Transactions</a>
				<a href="logout.php">Logout</a>
			</div>
		</div>

	<br><br> 

	<h3>Your Recent Transactions</h3>
	<br>
	<?php
	$connection = new mysqli("localhost", "root", "",
                         "budget");
						 
		$sql = "SELECT * FROM budgetTransaction WHERE transaction_id = '1'";
		if($result = mysqli_query($connection, $sql)){
			if(mysqli_num_rows($result) > 0){
				echo "<table class = 'viewTable'>";
					echo "<tr>";
						echo "<th>Date</th>";
						echo "<th>Category</th>";
						echo "<th>Amount</th>";
						echo "<th>Description</th>";
					echo "</tr>";
					while($row = mysqli_fetch_array($result)){
					echo"<tr>";
						echo "<td>" . $row['t_date'] . "</td>";
						echo "<td>" . $row['category_name'] . "</td>";
						echo "<td>" . $row['t_amount'] . "</td>";
						echo "<td>" . $row['description'] . "</td>";
					}
					echo"</tr>";
				echo"</table>";
			}
		}
	?>
</html>
