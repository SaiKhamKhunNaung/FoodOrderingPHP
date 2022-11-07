<?php  
$connection=mysqli_connect('localhost','root','','food');
include('Admin_Header.php');
include('AutoID_Function.php');

if(isset($_POST['btnSave'])) 
{
	$DSID=$_POST['txtID'];
	$DSName=$_POST['txtdsname'];
	$DSEmail=$_POST['txtdsemail'];
	$DSPhNo=$_POST['txtdsphno'];
	



	$query="INSERT INTO `deliverystaff`
			(`DeliStaffID`, `DeliStaffName`, `DeliStaffEmail`, `DeliStaffPhNo`) 
			VALUES
			('$DSID','$DSName','$DSEmail','$DSPhNo')
			";
	$result=mysqli_query($connection,$query) or die(mysqli_error($connection));

if ($result) 
{
	echo"<script>window.alert('Register Complete')</script>";
	
}
	
}

?>
<html>
<head>
<title>Menu Entry</title>
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
	
<h3 class="cursive-font">Enter FoodDelivery Staff</h3>

<form action="delistaff_register.php" method="post" enctype="multipart/form-data">
	<div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    
												<label for="activities">DeliveryStaffID</label>
														<input type="text" name="txtID" readodsnly value="<?php  echo AutoID('deliverystaff','DeliStaffID','DS-',6)?>" class="form-control" >
									
														<label for="activities">StaffName</label>
														<input type="text" name="txtdsname" placeholder="Eg.Mike" class="form-control" required>
													
												
														<label for="activities">StaffEmail</label>
														<input type="email" name="txtdsemail" placeholder="Eg.***@gmail.com" class="form-control" required>
												
														<label for="activities">StaffPhNo</label>
														<input type="text" name="txtdsphno" placeholder="XXXXXXXXXXXX" class="form-control" required>
												
														
								
                                           
													
														
												
														<input type="submit" class="btn btn-primary btn-block" name="btnSave" value="Save">
										     			<input type="reset" class="btn btn-primary btn-block" name="btnclear" value="Clear">
										     			</div>
									
									
</div>
								<br><br>
								<fieldset>
<legend>Delivery Staffs </legend>

   	 <table align="center" cellspacing="3" cellpadding="5" id="table" class="table">
   	 	 <thead>
       <tr>
		
       	<th>Name</th>
       	<th>Email</th>
       	<th>PhoneNumber</th>
		  <th>Option</th>
       
       </tr>
        <thead>
     
       <?php 

		   $select="select * from deliverystaff";
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
         	
         	$DeliStaffID=$row['DeliStaffID'];
         	$DeliStaffName=$row['DeliStaffName'];
         	$DeliStaffEmail=$row['DeliStaffEmail'];
         	$DeliStaffPhNo=$row['DeliStaffPhNo'];
         	
         	echo"<tr>";

         	
         	echo "<td>$DeliStaffName</td>";
         	echo "<td>$DeliStaffEmail</td>";
         	echo "<td>$DeliStaffPhNo</td>";
         	
         	echo"<td>
                  <a href='delistaff_update.php?DeliStaffID=$DeliStaffID'>Edit</a>
                  <a href='delete_delistaff.php?DeliStaffID=$DeliStaffID'>Delete</a>

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

