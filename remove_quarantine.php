<?php

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { 
 ?>
<?php 
include 'setting/system.php';

if(isset($_POST['remove'])){
	$id=$_POST['selector'];
    $N = count($id);
	for($i=0; $i < $N; $i++)
	{
		 $query = $db->query("DELETE FROM quarantine where id ='$id[$i]'");
	}
    header("location: manage-quarantine.php");
}

}
	else
	{
		header("Location: index.php");
     exit();
	}
?>
