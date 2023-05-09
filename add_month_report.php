<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/sidebar.php'; ?>
<?php

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { 
 ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> cow Management > Add</b></h5>
  </header>
 
 <?php include 'inc/data.php'; ?>

 
 <div class="w3-container" style="padding-top:22px">
 <div class="w3-row">
 	<h2>Add Report</h2>

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
      	

      	$insert = $db->query("INSERT INTO financial_report(month,budget,cattle_food,cattle_medicine,plants,cattle_bought,cattle_sale)
VALUES('$month','$budget','$cattle_food','$cattle_medicine','$plants','$cattle_bought','$cattle_sale') ");

      	if($insert){?>
      	<div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Report successfully created <i class="fa fa-check"></i></strong>
        </div>
       <?php
      	}else{ ?>
          <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Error creatiing Report data. Please try again <i class="fa fa-times"></i></strong>
        </div>
      	<?php
      }
      
      }

     ?>
 		<form method="post" autocomplete="off" enctype="multipart/form-data">
 			<div class="form-group">
	 			<label class="control-label">Month</label>
	 			<input type="text" name="month" class="form-control" required  >
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label"> Budget</label>
	 			<input type="text" name="budget" class="form-control" required >
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Cattle Food</label>
	 			<input type="text" name="cattle_food" class="form-control" required >
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Cattle Medicine</label>
	 			<input type="text" name="cattle_medicine" class="form-control" required >
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Plants</label>
	 			<input type="text" name="plants" class="form-control" required >
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Cattle Bought</label>
	 			<input type="text" name="cattle_bought" class="form-control" required >
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Cattle Sale</label>
	 			<input type="text" class="form-control" required name="cattle_sale"></input>
	 		</div>

	 		<button name="submit" type="submit" name="submit" class="btn btn-sn btn-primary">Save</button>
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