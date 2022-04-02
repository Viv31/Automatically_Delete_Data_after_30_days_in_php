<?php 
include_once('config.php');
if(isset($_POST['insert'])){
	$username = $_POST['username'];
	$created_date = date("Y-m-d");
	$due_date = date('Y-m-d', strtotime($created_date. ' +30 days'));

	$insert_user = "INSERT INTO users(username,created_date,due_date) VALUES('".$username."','".$created_date."','".$due_date."')";
		$res = mysqli_query($conn,$insert_user);
		if($res){
			header("location:index.php");
		}else{
			echo "Failed to insert data";
		}

}
?>