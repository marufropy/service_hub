<?php 
	
	require 'database.php';

	$Date = null;
	if ( !empty($_GET['Transaction_Date'])) {
		$Date = $_REQUEST['Transaction_Date'];
	}
	
	if ( null==$Date ) {
		header("Location: customers.php");
	}
	
	if ( !empty($_POST)) {
		// keep track validation errors
		$Transaction_DateError = null;
		$Customer_CommentError = null;
		$Provider_CommentError = null;
		$Completion_StatusError = null;
		$Payment_StatusError = null;
		
		
		// keep track post values
		$Transaction_Date = $_POST['Transaction_Date'];
		$Customer_Comment = $_POST['Customer_Comment'];
		$Provider_Comment = $_POST['Provider_Comment'];
		$Completion_Status = $_POST['Completion_Status'];
		$Payment_Status = $_POST['Payment_Status'];
		
		
		// validate input
		$valid = true;
		if (empty($Transaction_Date)) {
			$Transaction_DateError = 'Please enter Transaction_Date';
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
			$Completion_Status = 'Please enter Completion_Status';
			$valid = false;
		}
		
		if (empty($Payment_Status)) {
			$Payment_Status = 'Please enter Payment_Status';
			$valid = false;
		}*/
		
		
		
		
		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE history SET Transaction_Date = ?, Customer_Comment = ?, Provider_Comment = ?, Completion_Status = ?, Payment_Status = ? WHERE Transaction_Date = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($Transaction_Date,$Customer_Comment,$Provider_Comment,$Completion_Status,$Payment_Status,$Date));
			Database::disconnect();
			header("Location: customers.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT Transaction_Date,Customer_Comment,Provider_Comment,Completion_Status,Payment_Status FROM history where Transaction_Date = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($Date));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$Transaction_Date = $data['Transaction_Date'];
		$Customer_Comment = $data['Customer_Comment'];
		$Provider_Comment = $data['Provider_Comment'];
		$Completion_Status = $data['Completion_Status'];
		$Payment_Status = $data['Payment_Status'];

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
		    			<h3>Update History Information</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="history_update.php?Transaction_Date=<?php echo $Date?>" method="post">
					  
					  <div class="control-group <?php echo !empty($Transaction_DateError)?'error':'';?>">
					    <label class="control-label">Transaction Date</label>
					    <div class="controls">
					      	<input name="Transaction_Date" type="text"  placeholder="YYYY-MM-DD" value="<?php echo !empty($Transaction_Date)?$Transaction_Date:'';?>">
					      	<?php if (!empty($Transaction_DateError)): ?>
					      		<span class="help-inline"><?php echo $Transaction_DateError;?></span>
					      	<?php endif; ?>
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
					      	<input name="Provider_Comment" type="text"  placeholder="How was the provider?" value="<?php echo !empty($Provider_Comment)?$Provider_Comment:'';?>">
					      	<?php if (!empty($Provider_CommentError)): ?>
					      		<span class="help-inline"><?php echo $Provider_CommentError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($Completion_StatusError)?'error':'';?>">
					    <label class="control-label">Completion Status</label>
					    <div class="controls">
					      	<input name="Completion_Status" type="text"  placeholder="Job done?" value="<?php echo !empty($Completion_Status)?$Completion_Status:'';?>">
					      	<?php if (!empty($Completion_StatusError)): ?>
					      		<span class="help-inline"><?php echo $Completion_StatusError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($Payment_StatusError)?'error':'';?>">
					    <label class="control-label">Payment Status</label>
					    <div class="controls">
					      	<input name="Payment_Status" type="text"  placeholder="Payment Method or Status" value="<?php echo !empty($Payment_Status)?$Payment_Status:'';?>">
					      	<?php if (!empty($Payment_StatusError)): ?>
					      		<span class="help-inline"><?php echo $Payment_StatusError;?></span>
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