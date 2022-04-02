<?php 
$db_host = "localhost";
$db_user = "root";
$db_pwd = "";
$db_name ="automatically_delete_data_after_30_days_in_php";
$conn = mysqli_connect($db_host,$db_user,$db_pwd,$db_name);
if($conn){
	//echo "Connected";
}else{
	echo "Failed to connect";
}
?>