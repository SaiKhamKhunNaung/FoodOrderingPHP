<?php  
include('Admin_Header.php'); 
$connection=mysqli_connect('localhost','root','','food');
include('AutoID_Function.php');
if(isset($_POST['btnSave'])) 
{
	$txtAdminID=$_POST['txtAdminID'];
	$txtAdminName=$_POST['txtAdminName'];
	$txtEmail=$_POST['txtEmail'];
	$txtPassword=$_POST['txtPassword'];
	$txtPhone=$_POST['txtPhone'];
	


	$checkEmail="Select AdminEmail from admin
	            Where AdminEmail ='$txtEmail'";

	 $ret=mysqli_query($connection,$checkEmail);
	 $count=mysqli_num_rows($ret);
	 if($count>0)

	 {
        echo "<script>window.alert('Your email is already exist.')</script>";
		echo "<script>window.location='admin_register.php'</script>";
	 }


	$query="INSERT INTO `admin`
			(`AdminID`,`AdminName`, `AdminPassword`, `AdminEmail`, `AdminPhNo`) 
			VALUES
			('$txtAdminID','$txtAdminName','$txtPassword','$txtEmail','$txtPhone')
			";
	$result=mysqli_query($connection,$query);

	if($result) //Check Condition True 
	{
		echo "<script>window.alert('Admin Registration Completed.')</script>";
		echo "<script>window.location='admin_register.php'</script>";
	}
	else
	{
		echo "<p>Error in Admin Register : " . mysqli_error($connection) . "</p>";
	}
}

?>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery-3.1.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script type="text/javascript" src="DataTables/datatables.min.js"></script> 

</head>
<body>
	<script>
  $(document).ready( function () {
    $('#tableid').DataTable();
  } );
</script>

											<h3 class="cursive-font">Enter Admin Info</h3>

<form action="admin_register.php" method="post" enctype="multipart/form-data">
	<div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    
												<label for="activities">AdminID</label>
														<input type="text" name="txtAdminID" readonly value="<?php  echo AutoID('admin','AdminID','A-',6)?>" class="form-control" >
									
														<label for="activities">AdminName</label>
														<input type="text" name="txtAdminName" placeholder="Eg.Charles" class="form-control" required>
													
												
														<label for="activities">Email</label>
														<input type="email" name="txtEmail" placeholder="Eg.example@email.com" class="form-control" required>
												
														<label for="activities">Password</label>
														<input type="password" name="txtPassword" placeholder="XXXXXXXXXXXX" class="form-control" required>
												
														<label for="activities">Phone</label>
														<input type="text" name="txtPhone" placeholder="Eg. +95---------" class="form-control" required>
													
														
												
														<input type="submit" class="btn btn-primary btn-block" name="btnSave" value="Save">
										     			<input type="reset" class="btn btn-primary btn-block" value="Clear">
										     			</div>
</div>
		<br><br>
		<fieldset>
<legend>Admin Listing </legend>

   	 <table align="center" cellspacing="3" cellpadding="5" id="table" class="table">
   	 	 <thead>
       <tr>
		
       	<th>AdminName</th>
       	<th>Email</th>
       	<th>Phone</th>
       <th>Option</th>
       </tr>
        <thead>
     
       <?php 

		   $select="select * from admin";
		   $ret=mysqli_query($connection,$select);
		   $count=mysqli_num_rows($ret);

		   // if($count==0)
		   // 	{
		   // 		echo"<p>No Record Found!</p>";
		   // 		exit();
		   // 	}
         for ($i=0; $i <$count ; $i++) 
         { 
         	$row=mysqli_fetch_array($ret);
         	
         	$AdminID=$row['AdminID'];
         	$AdminName=$row['AdminName'];
         	$Email=$row['AdminEmail'];
         	$Phone=$row['AdminPhNo'];
         	
         	echo"<tr>";
         	
         	
         	echo "<td>$AdminName</td>";
         	echo "<td>$Email</td>";
         	echo "<td>$Phone</td>";
         	
         	echo"<td>
                  <a href='admin_update.php?AdminID=$AdminID'>Edit</a>
                  <a href='admin_delete.php?AdminID=$AdminID'>Delete</a>

         	   </td>";
         	   echo"</tr>";

         }
        ?>
    
   	 </table>
</fieldset>

</div>
</div>
	</form>


</body>
</html>



