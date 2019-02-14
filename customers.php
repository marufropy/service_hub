<?php
	$Customer_Name = "";
	
	if ( !empty($_GET['Search'])) {
		$Customer_Name = $_REQUEST['Search'];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Service Hub</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
	<h5 style="color:crimson;"align="right">www.serviceHub.com</h5> 
    <img src="servicehub.jpg" class="img-rounded" alt="Service Hub" width="200" height="100" align="right">
    <h3 style="color:darkseagreen;"align="left">Get Your Services Here!</h3> 
</div>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
     <a class="navbar-brand" href="#">Service Hub</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li><a href="Home.php">Home</a></li>
        <li><a href="customers.php">Users</a></li>
        <li><a href="About Us.php">About Us</a></li>
        <li><a href="FAQ.php">FAQ</a></li>
      </ul>
      <form class="navbar-form navbar-right" >
        <div class="form-group">
          <input name="Search" type="text" class="form-control" placeholder="Search Your Name">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
  </div>
</nav>

<div class="container">

				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Customer Name</th>
		                  <th>Provider Name</th>
		                  <th>Transaction Date</th>
		                  <th>Customer Opinion</th>
		                  <th>Provider Evaluation</th>
		                  <th>Completion Status</th>
		                  <th>Payment Status</th>
		                  <th>Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   
					   $sql = "SELECT customer.Name AS CName,
					   provider.Name AS PName,
					   history.Transaction_Date,history.Customer_Comment,history.Provider_Comment,history.Completion_Status,history.Payment_Status,
					   materials.Material_ID
					   FROM customer JOIN history ON customer.Customer_ID=history.CustomerCustomer_ID 
		               JOIN provider ON history.ProviderProvider_ID=provider.Provider_ID
		               JOIN materials ON history.History_ID=materials.HistoryHistory_ID
		               WHERE customer.Name LIKE '%$Customer_Name%'";
		               
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['CName'] . '</td>';
							   	echo '<td>'. $row['PName'] . '</td>';
							   	echo '<td>'. $row['Transaction_Date'] . '</td>';
							   	echo '<td>'. $row['Customer_Comment'] . '</td>';
							   	echo '<td>'. $row['Provider_Comment'] . '</td>';
							   	echo '<td>'. $row['Completion_Status'] . '</td>';
							   	echo '<td>'. $row['Payment_Status'] . '</td>';
							   	echo '<td width=505>';
							   	echo '<a class="btn btn-success" href="customer_read.php?Name='.$row['CName'].'">Read</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="customer_update.php?Name='.$row['CName'].'">Update Customer Info</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="history_update.php?Transaction_Date='.$row['Transaction_Date'].'">Update History</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="materials_update.php?Material_ID='.$row['Material_ID'].'">Update Materials</a>';
							   	echo '&nbsp;';
							   	
							   	
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>

 
</div>
		
		
</body>
</html>