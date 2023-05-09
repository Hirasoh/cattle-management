<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/sidebar.php'; ?>
<?php

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { 
 ?>

<?php 
 if(!$_GET['id'] OR empty($_GET['id']) OR $_GET['id'] == '')
 {
 	header('location: manage-cow.php');

 }else{
 	
 	$cowno = $weight = $gender = $remark = $arr = $bname = $b_id = $health = $img = "";
 	$id = (int)$_GET['id'];
 	$query = $db->query("SELECT * FROM cows WHERE id = '$id' ");
 	$fetchObj = $query->fetchAll(PDO::FETCH_OBJ);

 	foreach($fetchObj as $obj){
       $cowno = $obj->cowno;
       $weight = $obj->weight;
	   $gender = $obj->gender;
	   $remark = $obj->remark;
	   $arr = $obj->arrived;
	   $b_id = $obj->breed_id;
	   $health = $obj->health_status;
	   $location = $obj->location;
	   $location_status = $obj->location_status;
	   $img = $obj->img;

	     $k = $db->query("SELECT * FROM breed WHERE id = '$b_id' ");
       	 $ks = $k->fetchAll(PDO::FETCH_OBJ);
       	 foreach ($ks as $r) {
       	 	$bname = $r->name;
       	 }
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
      	$n_cowno = $_POST['cowno'];
      	$n_weight = $_POST['weight'];
      	$n_arrived = $_POST['arrived'];
      	$n_breed = $_POST['breed'];
      	$n_remark = $_POST['remark'];
      	$n_status = $_POST['status'];
      	$n_location = $_POST['location'];
      	$n_location_status = $_POST['location_status'];

      	$n_id = $_GET['id'];

      	$update_query = $db->query("UPDATE cows SET cowno = '$n_cowno',weight = '$n_weight',arrived = '$n_arrived', breed_id = '$n_breed', remark = '$n_remark',health_status = '$n_status',location = '$n_location',location_status = '$n_location_status' WHERE id = '$n_id' ");

      	if($update_query){?>
      	<div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>cow details successfully update <i class="fa fa-check"></i></strong>
        </div>
       <?php
      	}else{ ?>
          <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Error updating cow data. Please try again <i class="fa fa-times"></i></strong>
        </div>
      	<?php
      }

      }

     ?>




 		<h2>Edit cow</h2>
	 	<form method="post">
	 		<div class="form-group">
	 			<label class="control-label">cow No.</label>
	 			<input type="text" name="cowno" class="form-control" value="<?php echo $cowno; ?>">
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">cow Weight</label>
	 			<input type="text" name="weight" class="form-control" value="<?php echo $weight; ?>">
	 		</div>

	 		<div class="form-group date" data-provide="datepicker">
	 			<label class="control-label">Arrival date</label>
	 			<input type="text" name="arrived" class="form-control" value="<?php echo $arr; ?>">
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Health Status</label>
	 			<input type="text" name="status" class="form-control" value="<?php echo $health; ?>">
	 		</div>

	 		<div class="form-group date" >
	 			<label class="control-label">Location</label>
	 			<input type="text" name="location" class="form-control" value="<?php echo $location; ?>">
	 		</div>


	 		<div class="form-group date" >
	 			<label class="control-label">Location Status</label>
	 			<input type="text" name="location_status" class="form-control" value="<?php echo $location_status; ?>">
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Breed</label>
	 			<select name="breed" class="form-control">
	 				<option value="<?php echo $b_id; ?>" selected><?php echo $bname; ?></option>
	 				<?php
	                   $getBreed = $db->query("SELECT * FROM breed");
	                   $res = $getBreed->fetchAll(PDO::FETCH_OBJ);
	                   foreach($res as $r){ ?>
	                     <option value="<?php echo $r->id; ?>"><?php echo $r->name; ?></option>   
	                   <?php
	                   }
	 				?>
	 			</select>
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Description</label>
	 			<textarea class="form-control" name="remark"><?php echo $remark; ?></textarea>
	 		</div>

	 		<button name="submit" type="submit" name="submit" class="btn btn-sn btn-success">Update</button>
	 	</form>
 </div>
 <div class="col-md-4 col-md-offset-2">
 	<h2>cow Photo</h2>
 	<img src="<?php echo $img; ?>" width="130" height="120" class="thumbnail img img-responsive">
 	<p class="text-justify text-center">
 		<?php echo $remark; ?>
 	</p>
 	<a class="btn btn-danger btn-md" onclick="return confirm('Continue delete cow ?')" href="delete.php?id=<?php echo $id ?>"><i class="fa fa-trash"></i> Delete cow</a>
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