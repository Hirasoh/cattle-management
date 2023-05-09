<?php include 'setting/system.php'; ?>
<?php

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { 
 ?>
<?php

if(!$_GET['id'] OR empty($_GET['id']))
{
	header('location: manage-cow.php');
}else
{
	$id = (int)$_GET['id'];
	$query = $db->query("DELETE FROM cows WHERE id = $id ");
	if($query){
		header('location: manage-cow.php');
	}
}

	}
	else
	{
		header("Location: index.php");
     exit();
	}