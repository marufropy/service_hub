<?php 
	
	require 'database.php';
	
	$Service_ID = null;
	$Provider_ID = null;
	
	if ( !empty($_GET['Service_ID'] || $_GET['Provider_ID'])) {
		$Service_ID = $_REQUEST['Service_ID'];
		$Provider_ID = $_REQUEST['Provider_ID'];
	}else{
		header("Location: Home.php");
	}

	if ( !empty($_POST)) {
		// keep track validation errors
		//$nameError = null;
		$NameError = null;
		$House_NoError = null;
		$StreetError = null;
		$AreaError = null;
		$Contact_NoError = null;
		$emailError = null;
		$DateError = null;
		$Customer_CommentError = null;
		$Provider_CommentError = null;
		$Completion_StatusError = null;
		$Payment_StatusError = null;
		$Item_NameError = null;
		$Item_DescriptionError = null;
		
		
		// keep track post values
		$Name = $_POST['Name'];
		$House_No = $_POST['House_No'];
		$Street = $_POST['Street'];
		$Area = $_POST['Area'];
		$Contact_No = $_POST['Contact_No'];
		$email = $_POST['email'];
		$Date = $_POST['Date'];
		$Customer_Comment = $_POST['Customer_Comment'];
		$Provider_Comment = $_POST['Provider_Comment'];
		$Completion_Status = $_POST['Completion_Status'];
		$Payment_Status = $_POST['Payment_Status'];
		$Item_Name = $_POST['Item_Name'];
		$Item_Description = $_POST['Item_Description'];
		
		
		// validate input
		$valid = true;
		if (empty($Name)) {
			$NameError = 'Please enter Name';
			$valid = false;
		}
		
		if (empty($House_No)) {
			$House_NoError = 'Please enter House No';
			$valid = false;
		} 
		
		if (empty($Street)) {
			$StreetError = 'Please enter Street';
			$valid = false;
		}
		if (empty($Area)) {
			$AreaError = 'Please enter Area';
			$valid = false;
		}
		
		if (empty($Contact_No)) {
			$Contact_NoError = 'Please enter Contact No';
			$valid = false;
		} 
		
		
		if (empty($email)) {
			$emailError = 'Please enter Email Address';
			$valid = false;
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$emailError = 'Please enter a valid Email Address';
			$valid = false;
		}
		if (empty($Date)) {
			$DateError = 'Please enter Date';
			$valid = false;
		}
		
		/*if (empty($Customer_Comment)) {
			$Customer_CommentError = 'Please enter Customer_Comment';
			$valid = false;
		} 
		
		if (empty($Provider_Comment)) {
			$Provider_CommentError = 'Please enter Provider_Comment';
			$valid = false;
		}
		if (empty($Completion_Status)) {
			$Completion_StatusError = 'Please enter Completion_Status';
			$valid = false;
		}
		
		if (empty($Payment_Status)) {
			$Payment_StatusError = 'Please enter Payment_Status';
			$valid = false;
		} 
		if (empty($Item_Name)) {
			$Item_NameError = 'Please enter Item_Name';
			$valid = false;
		}
		
		if (empty($Item_Description)) {
			$Item_DescriptionError = 'Please enter Item_Description';
			$valid = false;
		}*/
		
		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql = "INSERT INTO customer (Name,House_No,Street,Area,Contact_No,email) values(?, ?, ?, ?, ?, ? )";
			$q = $pdo->prepare($sql);
			$q->execute(array($Name,$House_No,$Street,$Area,$Contact_No,$email));
			$Customer_ID = $pdo->lastInsertId();
			
			
			$sql = "INSERT INTO history (Transaction_Date,Customer_Comment,Provider_Comment,ProviderProvider_ID,Completion_Status,Payment_Status,CustomerCustomer_ID,Service_CategoryService_ID) values(?, ?, ?, ?, ?, ?, ?, ? )";
			$q = $pdo->prepare($sql);
			$q->execute(array($Date,$Customer_Comment,$Provider_Comment,$Provider_ID,$Completion_Status,$Payment_Status,$Customer_ID,$Service_ID));
			$History_ID = $pdo->lastInsertId();
			
			$sql = "INSERT INTO materials (Item_Name,HistoryHistory_ID,Item_Description) values(?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($Item_Name,$History_ID,$Item_Description));
			
			
			Database::disconnect();
			header("Location: customers.php");
		}
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
		    			<h3>Provide Information</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="<?php echo "book.php?Service_ID=$Service_ID&Provider_ID=$Provider_ID" ?>" method="post">
					
					  <div class="control-group <?php echo !empty($NameError)?'error':'';?>">
					    <label class="control-label">Name</label>
					    <div class="controls">
					      	<input name="Name" type="text" placeholder="Name" value="<?php echo !empty($Name)?$Name:'';?>">
					      	<?php if (!empty($NameError)): ?>
					      		<span class="help-inline"><?php echo $NameError;?></span>
					      	<?php endif;?>
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
					      	<?php endif; ?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($AreaError)?'error':'';?>">
					    <label class="control-label">Area</label>
					    <div class="controls">
					      	<input name="Area" type="text" placeholder="Area" value="<?php echo !empty($Area)?$Area:'';?>">
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
					    <label class="control-label">Email ID</label>
					    <div class="controls">
					      	<input name="email" type="text" placeholder="Email ID" value="<?php echo !empty($email)?$email:'';?>">
					      	<?php if (!empty($emailError)): ?>
					      		<span class="help-inline"><?php echo $emailError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($DateError)?'error':'';?>">
					    <label class="control-label">Date</label>
					    <div class="controls">
					      	<input name="Date" type="text" placeholder="YYYY-MM-DD" value="<?php echo !empty($Date)?$Date:'';?>">
					      	<?php if (!empty($DateError)): ?>
					      		<span class="help-inline"><?php echo $DateError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($Customer_CommentError)?'error':'';?>">
					    <label class="control-label">Customer Opinion</label>
					    <div class="controls">
					      	<input name="Customer_Comment" type="text"  placeholder="Share your thought..." value="<?php echo !empty($Customer_Comment)?$Customer_Comment:'';?>">
					      	<?php if (!empty($Customer_CommentError)): ?>
					      		<span class="help-inline"><?php echo $Customer_CommentError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($Provider_CommentError)?'error':'';?>">
					    <label class="control-label">Evaluate Provider</label>
					    <div class="controls">
					      	<input name="Provider_Comment" type="text"  placeholder="How was the service?" value="<?php echo !empty($Provider_Comment)?$Provider_Comment:'';?>">
					      	<?php if (!empty($Provider_CommentError)): ?>
					      		<span class="help-inline"><?php echo $Provider_CommentError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($Completion_StatusError)?'error':'';?>">
					    <label class="control-label">Completion Status</label>
					    <div class="controls">
					      	<input name="Completion_Status" type="text" placeholder="Job done?" value="<?php echo !empty($Completion_Status)?$Completion_Status:'';?>">
					      	<?php if (!empty($Completion_StatusError)): ?>
					      		<span class="help-inline"><?php echo $Completion_StatusError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($Payment_StatusError)?'error':'';?>">
					    <label class="control-label">Payment Status</label>
					    <div class="controls">
					      	<input name="Payment_Status" type="text"  placeholder="Payment method or status" value="<?php echo !empty($Payment_Status)?$Payment_Status:'';?>">
					      	<?php if (!empty($Payment_StatusError)): ?>
					      		<span class="help-inline"><?php echo $Payment_StatusError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($Item_NameError)?'error':'';?>">
					    <label class="control-label">Material Needed</label>
					    <div class="controls">
					      	<input name="Item_Name" type="text" placeholder="Yes or No" value="<?php echo !empty($Item_Name)?$Item_Name:'';?>">
					      	<?php if (!empty($Item_NameError)): ?>
					      		<span class="help-inline"><?php echo $Item_NameError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($Item_DescriptionError)?'error':'';?>">
					    <label class="control-label">Material Description</label>
					    <div class="controls">
					      	<input name="Item_Description" type="text"  placeholder="Description of the Material" value="<?php echo !empty($Item_Description)?$Item_Description:'';?>">
					      	<?php if (!empty($Item_DescriptionError)): ?>
					      		<span class="help-inline"><?php echo $Item_DescriptionError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Continue</button>
						  <a class="btn btn-success" href="Home.php">Back</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>