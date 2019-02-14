<!DOCTYPE html>
<html lang="en">
	<head>
  <title>Service Hub</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   <style>
			.row{
				padding-bottom: 15px;			
			}
		</style>
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
			<div class="panel panel-default">
				<div class="panel-heading">Services You Can Get</div>
				<div class="panel-body">
					<div class="row">
					
					<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Service Type</th>
		                  <th>Search As You Wish</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT Service_ID,Service_Type FROM service_category ORDER BY Service_ID ASC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
						   		echo '<td>'. $row['Service_Type'] . '</td>';
							   	echo '<td width=500>';
							   	echo '<a class="btn btn-success" href="list.php?Service_ID='.$row['Service_ID'].'&Service_Type='.$row['Service_Type'].'">Normally</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="searchexp.php?Service_ID='.$row['Service_ID'].'&Service_Type='.$row['Service_Type'].'">More Experience</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="searchsal.php?Service_ID='.$row['Service_ID'].'&Service_Type='.$row['Service_Type'].'">Less Salary</a>';
							   	echo '&nbsp;';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
					
					</div>
					      
				</div>
			</div>
		</div>
	</body>
</html>