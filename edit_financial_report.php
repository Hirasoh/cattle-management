<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/sidebar.php'; ?>
<?php

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { 
 ?>

<?php 
 if(!$_GET['id'] OR empty($_GET['id']) OR $_GET['id'] == '')
 {
 	header('location: financial_report.php');

 }else{
 	
 	// $month = $budget = $cattle_food = $cattle_medicine = $arr = $bname = $b_id = $health = $img = "";
 	$id = (int)$_GET['id'];
 	$query = $db->query("SELECT * FROM financial_report WHERE id = '$id' ");
 	$fetchObj = $query->fetchAll(PDO::FETCH_OBJ);

 	foreach($fetchObj as $obj){

      $month = $obj->month;
      $budget = $obj->budget;
      $cattle_food = $obj->cattle_food;
      $cattle_medicine = $obj->cattle_medicine;
      $plants = $obj->plants;
      $cattle_bought = $obj->cattle_bought;
      $cattle_sale = $obj->cattle_sale;

 	}
 }

?>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>
 
 <?php include 'inc/data.php'; ?>

 
<div class="w3-container" style="padding-top:22px">
 <div class="w3-row">
  
 	<div class="col-md-6">

     <?php
      if(isset($_POST['submit']))
      {
      	$month = $_POST['month'];
      	$budget = $_POST['budget'];
      	$cattle_food = $_POST['cattle_food'];
      	$cattle_medicine = $_POST['cattle_medicine'];
      	$plants = $_POST['plants'];
      	$cattle_bought = $_POST['cattle_bought'];
      	$cattle_sale = $_POST['cattle_sale'];

      	$id = $_GET['id'];

      	$update_query = $db->query("UPDATE financial_report SET month = '$month',budget = '$budget',cattle_food = '$cattle_food', cattle_medicine = '$cattle_medicine', plants = '$plants',cattle_bought = '$cattle_bought',cattle_sale = '$cattle_sale' WHERE id = '$id' ");

      	if($update_query){?>
      	<div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Report details successfully update <i class="fa fa-check"></i></strong>
        </div>
       <?php
      	}else{ ?>
          <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Error updating Report data. Please try again <i class="fa fa-times"></i></strong>
        </div>
      	<?php
      }

      }

     ?>




 		<h2>Edit Report</h2>
	 	<form method="post" autocomplete="off" enctype="multipart/form-data">
 			<div class="form-group">
 				<input type="hidden" name="id" value="<?php echo $id; ?>" readonly>
	 			<label class="control-label">Month</label>
	 			<input type="text" value="<?php echo $month; ?>" name="month" class="form-control"  >
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label"> Budget</label>
	 			<input type="text" value="<?php echo $budget; ?>" name="budget" class="form-control" >
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Cattle Food</label>
	 			<input type="text" value="<?php echo $cattle_food; ?>" name="cattle_food" class="form-control" >
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Cattle Medicine</label>
	 			<input type="text" value="<?php echo $cattle_medicine; ?>" name="cattle_medicine" class="form-control" >
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Plants</label>
	 			<input type="text" value="<?php echo $plants; ?>" name="plants" class="form-control" >
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Cattle Bought</label>
	 			<input type="text" value="<?php echo $cattle_bought; ?>" name="cattle_bought" class="form-control" >
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Cattle Sale</label>
	 			<input type="text" value="<?php echo $cattle_sale; ?>" class="form-control" name="cattle_sale"></input>
	 		</div>

	 		<button name="submit" type="submit" name="submit" class="btn btn-sn btn-primary">Update</button>
 		</form>
 </div>
</div>
</div>
</div>


<?php 
	}
	else
	{
		header("Location: index.php");
     exit();
	}
	include 'theme/foot.php'; ?>