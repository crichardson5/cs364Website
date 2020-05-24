<?php
  //echo "<script type='text/javascript'>alert('good');</script>";
  include('authenticate.php');
			 
  // create database connection ($connection)
  $connection = new mysqli("localhost", "student", "CompSci364",
                         "budget");
					 
  if (isset($_POST['deleteTransaction'])){
  
    //gets the current user's ID num
	  $queryUserID = "SELECT * FROM systemUser WHERE login = TRUE";
	  $user_id;
	  if($result = mysqli_query($connection, $queryUserID)){
		  if(mysqli_num_rows($result) > 0){
			  while($row = mysqli_fetch_array($result)){
				  $user_id = intval($row['id']);
			  }
		  }
	  }
	  
	  //gets variables
	  $transID = $_POST['transID'];
	  $t_amount;
	  $t_date;
	  $category_name;
	  
	  //gets transaction
	  $queryGetTransaction = "SELECT * FROM budgetTransaction WHERE transaction_id = '$transID' AND user_id = '$user_id'";
	  if($result = mysqli_query($connection, $queryGetTransaction)){
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_array($result)){
					$t_amount = intval($row['t_amount']);
					$t_date = $row['t_date'];
					$category_name = $row['category_name'];
					
					//gets current budget
	        $newDate = substr($t_date,0,-2);
	        $newDate .= "01";
	        $queryGetBudgetCategory = "SELECT * FROM userBudget WHERE user_id = $user_id AND budget_date = '$newDate';";
	        if($result = mysqli_query($connection, $queryGetBudgetCategory)){
				      if(mysqli_num_rows($result) > 0){
					      while($row = mysqli_fetch_array($result)){
						      $budget_id = intval($row['budget_id']);
					      }
			      }
		      }
		      
		      //updates budget
		      $queryUpdate;
		      if($t_amount < 0){
	          $queryUpdate = "UPDATE budgetCategory SET amount_spent = amount_spent + $t_amount WHERE budget_id = $budget_id AND name = '$category_name';";
	        } else {
	          $queryUpdate = "UPDATE budgetCategory SET amount_allocated = amount_allocated - $t_amount WHERE budget_id = $budget_id AND name = '$category_name';";
	        }
		      if($statement = $connection->prepare($queryUpdate)){
			      $statement->execute();
			      $statement->close();
	        }
	        
	        //removes transaction
	        $queryDelete = "DELETE FROM budgetTransaction WHERE transaction_id = '$transID' AND user_id = '$user_id'";
	        if($statement = $connection->prepare($queryDelete)){
			      $statement->execute();
			      $statement->close();
	        }
				}
			} else {
			  $errorMessage = "ERROR: Transaction ID ";
			  $errorMessage .= $transID;
			  $errorMessage .= " not found";
			  echo "<script type='text/javascript'>alert('$errorMessage');</script>";
			}
		}
  }
?>

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
				<a class="active" href="viewTransaction.php">Transactions</a>
				<a href="logout.php">Logout</a>
			</div>
		</div>

	<br><br> 

	<h3>Your Recent Transactions</h3>
	<br>
	<?php
	$connection = new mysqli("localhost", "student", "CompSci364",
                         "budget");
						 
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
	
						 
		$sql = "SELECT * FROM budgetTransaction WHERE user_id = '$idNum'";
		if($result = mysqli_query($connection, $sql)){
			if(mysqli_num_rows($result) > 0){
				echo "<table class = 'viewTable'>";
					echo "<tr>";
					  echo "<th>ID</th>";
						echo "<th>Date</th>";
						echo "<th>Category</th>";
						echo "<th>Amount</th>";
						echo "<th>Description</th>";
					echo "</tr>";
					while($row = mysqli_fetch_array($result)){
					echo"<tr>";
					  echo "<td>" . $row['transaction_id'] . "</td>";
						echo "<td>" . $row['t_date'] . "</td>";
						echo "<td>" . $row['category_name'] . "</td>";
						echo "<td>$" . $row['t_amount'] . "</td>";
						echo "<td>" . $row['description'] . "</td>";
						echo"</tr>";
					}
					
				echo"</table>";
			}
		}
	?>
	
	<br>
			<h3>Delete A Transaction</h3>
			<form id="addTransForm" class="form-vertical" method="POST">
				<label for="transID">Transaction ID</label>
				<input type="number" min="0" id="transID" name="transID">
		<br><br>
				<input type="submit" name="deleteTransaction" id="deleteTransaction" value="Delete Transaction">
		<br><br>
</html>
