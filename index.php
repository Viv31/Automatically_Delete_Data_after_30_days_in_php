<?php
include_once ('config.php');
$todays_date = date("Y-m-d");
//$todays_date = date("2022-05-03");
//echo $todays_date;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>User List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  
  <a href="add_users.php" class="btn btn-primary pull-right">Add User</a>         
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Sno</th>
        <th>Username</th>
        <th>Created Date</th>
        <th>Due Date(After 30 days)</th>
        <th>Days Left</th>
      </tr>
    </thead>
    <tbody>
    	<?php
$get_users = "SELECT * FROM users";
$res = mysqli_query($conn, $get_users);
if (mysqli_num_rows($res) > 0)
{
    $sno = 1;
    while ($row = mysqli_fetch_assoc($res))
    { ?>
    			<tr>
			        <td><?php echo $sno++; ?></td>
			        <td><?php echo $row['username']; ?></td>
			        <td><?php echo $row['created_date']; ?></td>
			        <td><?php echo $row['due_date'];
        if ($todays_date > $row['due_date'])
        {
            echo "Subscription expired"; ?></td><?php
        } ?>
			        	<td>
			        		<?php
        //1) converting dates to timestamps
        $created_dateSeconds = strtotime($row['created_date']);
        $due_dateSeconds = strtotime($row['due_date']);

        //2) Calculating the difference in timestamps
        $diffSeconds = $created_dateSeconds - $due_dateSeconds;

        //3) converting timestamps to days
        $days = round($diffSeconds / 86400);
        //echo abs($days);
        
?>
			        		 <span>(
			        		 	<?php
        $noofDays = abs($days);
        if ($noofDays == '0')
        {
            //echo "Delete Data";
            $delete_record = "DELETE FROM users WHERE username = '" . $row['username'] . "'";
            $res = mysqli_query($conn, $delete_record);
            if ($res)
            {
                header("location:index.php");
            }

        }
        elseif ($noofDays > 5)
        {
            echo $noofDays . " Days left to delete your data please take backup";
        }
        else
        {
            echo "Sorry your data is deleted";
        } ?>)</span>
			        	</td>

			        
      			</tr>
    		<?php
    }
}
else
{ ?>
    			<tr>
    				<td colspan="4">No Record Found</td>
    			</tr>
    		<?php
} ?>
      
      
    </tbody>
  </table>
</div>

</body>
</html>
