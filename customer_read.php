<?php 
	require 'database.php';
	$Name = null;
	if ( !empty($_GET['Name'])) {
		$Name = $_REQUEST['Name'];
	}
	
	if ( null==$Name ) {
		header("Location: customers.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT customer.Name AS CName,customer.House_No,customer.Street,customer.Area,customer.Contact_No AS CContact_No,customer.email,
		provider.Name AS PName,provider.Contact_No AS PContact_No,
		history.Transaction_Date,history.Customer_Comment,history.Provider_Comment,history.Completion_Status,history.Payment_Status,
		materials.Item_Name,materials.Item_Description
		FROM customer JOIN history ON customer.Customer_ID=history.CustomerCustomer_ID 
		JOIN provider ON history.ProviderProvider_ID=provider.Provider_ID
		JOIN materials ON history.History_ID=materials.HistoryHistory_ID
		WHERE customer.Name='$Name'";
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
		    			<h3>Details Information</h3>
		    		</div>
					  <table class="table table-bordered">
    
    <tbody>
      <tr>
        <td>Customer Name</td>
        <td><?php echo $data['CName'];?></td>
        
      </tr>
      <tr>
        <td>Customer House No</td>
        <td><?php echo $data['House_No'];?></td>
        
      </tr>
      <tr>
        <td>Customer Street</td>
        <td><?php echo $data['Street'];?></td>
        
      </tr>
      <tr>
        <td>Customer Area</td>
        <td><?php echo $data['Area'];?></td>
        
      </tr>
      <tr>
        <td>Customer Contact No</td>
        <td><?php echo $data['CContact_No'];?></td>
        
      </tr>
      <tr>
        <td>Customer Email ID</td>
        <td><?php echo $data['email'];?></td>
        
      </tr>
      <tr>
        <td>Provider Name</td>
        <td><?php echo $data['PName'];?></td>
       
      </tr>
      <tr>
        <td>Provider Contact No</td>
        <td><?php echo $data['PContact_No'];?></td>
        
      </tr>
       <tr>
        <td>Transaction Date</td>
        <td><?php echo $data['Transaction_Date'];?></td>
        
      </tr>
      <tr>
        <td>Customer Opinion</td>
        <td><?php echo $data['Customer_Comment'];?></td>
       
      </tr>
      <tr>
        <td>Provider Evaluation</td>
        <td><?php echo $data['Provider_Comment'];?></td>
        
      </tr>
      <tr>
        <td>Completion Status</td>
        <td><?php echo $data['Completion_Status'];?></td>
        
      </tr>
      
      <tr>
        <td>Payment Status</td>
        <td><?php echo $data['Payment_Status'];?></td>
        
      </tr>
       <tr>
        <td>Materials Needed</td>
        <td><?php echo $data['Item_Name'];?></td>
        
      </tr>
      
      <tr>
        <td>Materials Description</td>
        <td><?php echo $data['Item_Description'];?></td>
        
      </tr>
    </tbody>
  </table>
    
    <div class="row">
    					<a href="customers.php" class="btn btn-success">Back</a>
    				  </div>
    
    
    </div>
    
     

</body>
</html>
