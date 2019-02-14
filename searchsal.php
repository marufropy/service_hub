<?php 
	require 'database.php';
	
	$Service_ID = null;
	$Service_Type = null;
	
	if ( !empty($_GET['Service_ID'] || $_GET['Service_Type'])) {
		$Service_ID = $_REQUEST['Service_ID'];
		$Service_Type = $_REQUEST['Service_Type'];
	}
	
	if ( null==$Service_ID || null==$Service_Type ) {
		header("Location: Home.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT service_category.Service_ID,provider.Provider_ID,provider.Name,provider.Salary_Per_Hour
				FROM provider INNER JOIN service_category ON provider.Service_CategoryService_ID=service_category.Service_ID
				WHERE Service_ID = '$Service_ID'
				ORDER BY provider.Salary_Per_Hour ASC";
		$q = $pdo->prepare($sql);
		$q->execute();
		
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
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
      
    </div>
  </div>
</nav>

<div class="container">
  
<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Name</th>
		                  <th>Per Hour Salary</th>
		                  <th>Go For</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['Name'] . '</td>';
							   	echo '<td>'. $row['Salary_Per_Hour'] . '</td>';
							   	echo '<td width=250>';
							   	echo '<a class="btn btn-success" href="details.php?Name='.$row['Name'].'&Service_ID='.$row['Service_ID'].'&Provider_ID='.$row['Provider_ID'].'">Details</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="book.php?Name='.$row['Name'].'&Service_ID='.$row['Service_ID'].'&Provider_ID='.$row['Provider_ID'].'">Book</a>';
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
