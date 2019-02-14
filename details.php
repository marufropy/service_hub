<?php 
	require 'database.php';
	
	$Name = null;
	$Service_ID = null;
	$Provider_ID = null;
	
	if ( !empty($_GET['Name'] || $_GET['Service_ID'] || $_GET['Provider_ID'])) {
		$Name = $_REQUEST['Name'];
		$Service_ID = $_REQUEST['Service_ID'];
		$Provider_ID = $_REQUEST['Provider_ID'];
	}
	
	if ( null==$Name || null==$Service_ID || null==$Provider_ID ) {
		header("Location: Home.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT service_category.Service_ID,provider.Provider_ID,provider.Name,provider.Age,provider.Salary_Per_Hour,provider.Working_Since,provider.Contact_No,provider.email,location.Street,location.Area,location.City
		FROM provider INNER JOIN location ON provider.LocationLocation_ID=location.Location_ID
		INNER JOIN service_category ON provider.Service_CategoryService_ID=service_category.Service_ID 
		where Provider_ID = '$Provider_ID'";
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
					  <div class="row">
		    			<h3>Provider's Detail Information</h3>
		    		</div>
					  <table class="table table-bordered">
    
    <tbody>
      <tr>
        <td>Name</td>
        <td><?php echo $data['Name'];?></td>
        
      </tr>
      <tr>
        <td>Age</td>
        <td><?php echo $data['Age'];?></td>
       
      </tr>
      <tr>
        <td>Salary Per Hour</td>
        <td><?php echo $data['Salary_Per_Hour'];?></td>
        
      </tr>
       <tr>
        <td>Working Since</td>
        <td><?php echo $data['Working_Since'];?></td>
        
      </tr>
      <tr>
        <td>Contact No</td>
        <td><?php echo $data['Contact_No'];?></td>
       
      </tr>
      <tr>
        <td>Email ID</td>
        <td><?php echo $data['email'];?></td>
        
      </tr>
      <tr>
        <td>Street</td>
        <td><?php echo $data['Street'];?></td>
        
      </tr>
      <tr>
        <td>Area</td>
        <td><?php echo $data['Area'];?></td>
        
      </tr>
      <tr>
        <td>City</td>
        <td><?php echo $data['City'];?></td>
        
      </tr>
    </tbody>
  </table>
					
		   			<?php 
	 				   foreach ($pdo->query($sql) as $row) {
					   		echo '<a class="btn btn-success" href="book.php?Name='.$row['Name'].'&Service_ID='.$row['Service_ID'].'&Provider_ID='.$row['Provider_ID'].'">Book</a>';
						   	echo '&nbsp;';
					   }
					   Database::disconnect();
					  ?>	
				
    </div>

</body>
</html>
