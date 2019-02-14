<?php 
	
	require 'database.php';

	$Material_ID = null;
	if ( !empty($_GET['Material_ID'])) {
		$Material_ID = $_REQUEST['Material_ID'];
	}
	
	if ( null==$Material_ID ) {
		header("Location: customers.php");
	}
	
	if ( !empty($_POST)) {
		// keep track validation errors
		$Item_NameError = null;
		$Item_DescriptionError = null;
		
		
		// keep track post values
		$Item_Name = $_POST['Item_Name'];
		$Item_Description = $_POST['Item_Description'];
		
		
		// validate input
		$valid = true;
		/*if (empty($Item_Name)) {
			$Item_NameError = 'Please enter Item_Name';
			$valid = false;
		}*/
		

		
		
		
		
		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE materials SET Item_Name = ?, Item_Description = ? WHERE Material_ID = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($Item_Name,$Item_Description,$Material_ID));
			Database::disconnect();
			header("Location: customers.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT Item_Name,Item_Description FROM materials where Material_ID = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($Material_ID));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$Item_Name = $data['Item_Name'];
		$Item_Description = $data['Item_Description'];

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
		    			<h3>Update Materials Information</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="materials_update.php?Material_ID=<?php echo "$Material_ID";?>" method="post">
					  
					  <div class="control-group <?php echo !empty($Item_NameError)?'error':'';?>">
					    <label class="control-label">Materials Needed</label>
					    <div class="controls">
					      	<input name="Item_Name" type="text"  placeholder="Yes or No" value="<?php echo !empty($Item_Name)?$Item_Name:'';?>">
					      	<?php if (!empty($Item_NameError)): ?>
					      		<span class="help-inline"><?php echo $Item_NameError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($Item_DescriptionError)?'error':'';?>">
					    <label class="control-label">Materials Description</label>
					    <div class="controls">
					      	<input name="Item_Description" type="text"  placeholder="Description of the materials" value="<?php echo !empty($Item_Description)?$Item_Description:'';?>">
					      	<?php if (!empty($Item_DescriptionError)): ?>
					      		<span class="help-inline"><?php echo $Item_DescriptionError;?></span>
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