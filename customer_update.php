<?php 
	
	require 'database.php';

	$CName = null;
	if ( !empty($_GET['Name'])) {
		$CName = $_REQUEST['Name'];
	}
	
	if ( null==$CName ) {
		header("Location: customers.php");
	}
	
	if ( !empty($_POST)) {
		// keep track validation errors
		$NameError = null;
		$House_NoError = null;
		$StreetError = null;
		$AreaError = null;
		$Contact_NoError = null;
		$emailError = null;
		
		// keep track post values
		$Name = $_POST['Name'];
		$House_No = $_POST['House_No'];
		$Street = $_POST['Street'];
		$Area = $_POST['Area'];
		$Contact_No = $_POST['Contact_No'];
		$email = $_POST['email'];
		
		// validate input
		$valid = true;
		if (empty($Name)) {
			$NameError = 'Please enter Name';
			$valid = false;
		}
		
		if (empty($House_No)) {
			$House_NoError = 'Please enter House_No';
			$valid = false;
		}
		
		if (empty($Street)) {
			$Street = 'Please enter Street';
			$valid = false;
		}
		
		if (empty($Area)) {
			$nameError = 'Please enter Area';
			$valid = false;
		}
		
		if (empty($Contact_No)) {
			$nameError = 'Please enter Contact_No';
			$valid = false;
		}
		
		if (empty($email)) {
			$emailError = 'Please enter Email Address';
			$valid = false;
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$emailError = 'Please enter a valid Email Address';
			$valid = false;
		}
		
		
		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE customer  SET Name = ?, House_No = ?, Street = ?, Area = ?, Contact_No = ?, email = ? WHERE Name = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($Name,$House_No,$Street,$Area,$Contact_No,$email,$CName));
			Database::disconnect();
			header("Location: customers.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT Name,House_No,Street,Area,Contact_No,email FROM customer where Name = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($CName));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$Name = $data['Name'];
		$House_No = $data['House_No'];
		$Street = $data['Street'];
		$Area = $data['Area'];
		$Contact_No = $data['Contact_No'];
		$email = $data['email'];
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
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Update Customer Information</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="customer_update.php?Name=<?php echo $CName?>" method="post">
					  
					  <div class="control-group <?php echo !empty($NameError)?'error':'';?>">
					    <label class="control-label">Name</label>
					    <div class="controls">
					      	<input name="Name" type="text"  placeholder="Name" value="<?php echo !empty($Name)?$Name:'';?>">
					      	<?php if (!empty($NameError)): ?>
					      		<span class="help-inline"><?php echo $NameError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($House_NoError)?'error':'';?>">
					    <label class="control-label">House No</label>
					    <div class="controls">
					      	<input name="House_No" type="text"  placeholder="House No" value="<?php echo !empty($House_No)?$House_No:'';?>">
					      	<?php if (!empty($House_NoError)): ?>
					      		<span class="help-inline"><?php echo $House_NoError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($StreetError)?'error':'';?>">
					    <label class="control-label">Street</label>
					    <div class="controls">
					      	<input name="Street" type="text"  placeholder="Street" value="<?php echo !empty($Street)?$Street:'';?>">
					      	<?php if (!empty($StreetError)): ?>
					      		<span class="help-inline"><?php echo $StreetError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($AreaError)?'error':'';?>">
					    <label class="control-label">Area</label>
					    <div class="controls">
					      	<input name="Area" type="text"  placeholder="Area" value="<?php echo !empty($Area)?$Area:'';?>">
					      	<?php if (!empty($AreaError)): ?>
					      		<span class="help-inline"><?php echo $AreaError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($Contact_NoError)?'error':'';?>">
					    <label class="control-label">Contact No</label>
					    <div class="controls">
					      	<input name="Contact_No" type="text"  placeholder="Contact No" value="<?php echo !empty($Contact_No)?$Contact_No:'';?>">
					      	<?php if (!empty($Contact_NoError)): ?>
					      		<span class="help-inline"><?php echo $Contact_NoError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
					    <label class="control-label">Email Address</label>
					    <div class="controls">
					      	<input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
					      	<?php if (!empty($emailError)): ?>
					      		<span class="help-inline"><?php echo $emailError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					  
					  
					 <div class="form-actions">
						  <button type="submit" class="btn btn-success">Update</button>
						  <a class="btn btn-success" href="customers.php">Back</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>