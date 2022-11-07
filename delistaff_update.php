<?php 
session_start();
include('connect.php');
include('Admin_Header.php');
if (isset($_GET['DeliStaffID']))
 {
 $DeliStaffID=$_GET['DeliStaffID'];

  $select="select *from deliverystaff
         where DeliStaffID='$DeliStaffID'";

         $ret=mysqli_query($connection,$select);
         $row=mysqli_fetch_array($ret);

         $DeliStaffName=$row['DeliStaffName'];
		 $DeliStaffEmail=$row['DeliStaffEmail'];
	     $DeliStaffPhNo=$row['DeliStaffPhNo'];
	     

}


         if(isset($_POST['btnUpdate']))
         {
          $U_DeliStaffID=$_POST['txtdelistaffID'];
          $U_DeliStaffName=$_POST['txtdelistaffname'];
			 $U_DeliStaffEmail=$_POST['txtdelistaffemail'];
			 $U_DeliStaffPhNo=$_POST['txtdelistaffphno'];

          $update="Update deliverystaff
                     Set DeliStaffName='$U_DeliStaffName',
					 	 DeliStaffEmail='$U_DeliStaffEmail',
						 DeliStaffPhNo='$U_DeliStaffPhNo'
                      Where DeliStaffID='$U_DeliStaffID'";

                     $U_ret=mysqli_query($connection,$update);

                     if ($U_ret) 
                     {
                      echo"<script>window.alert('Succcessfully Update!')</script>";
                     echo"<script>window.location='delistaff_register.php'</script>";
                        }
                        else
                        {
                          echo"<p>".mysqli_error($connection)."</p>";
                        }
         }
 ?>

<html>
<head>
	<script type="text/javascript" src="js/jquery-3.1.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script type="text/javascript" src="DataTables/datatables.min.js"></script> 

  <title>Update DeliveryStaff Detail</title>
</head>
<body>
	<script>
  $(document).ready( function () {
    $('#tableid').DataTable();
  } );
</script>
		
<h3 class="cursive-font">Update DeliveryStaff Info</h3>

<form action="delistaff_update.php" method="post" enctype="multipart/form-data">
	<div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    
												<label for="activities">DeliveryStaffID</label>
														<input type="text" name="txtdelistaffID" readonly value="<?php echo  $DeliStaffID;?>" class="form-control" >
									
														<label for="activities">DeliveryStaffName</label>
														<input type="text" name="txtdelistaffname" value="<?php echo  $DeliStaffName;?>" class="form-control" required>

														<label for="activities">DeliveryStaffEmail</label>
														<input type="text" name="txtdelistaffemail" value="<?php echo  $DeliStaffEmail;?>" class="form-control" required>


									<label for="activities">DeliveryStaffPhNo</label>
														<input type="text" name="txtdelistaffphno" value="<?php echo  $DeliStaffPhNo;?>" class="form-control" required>


      												
														<input type="submit" class="btn btn-primary btn-block" name="btnUpdate" value="Update">
										     			<input type="reset" class="btn btn-primary btn-block" name="btnclear" value="Clear">
										     			</div>
</div>
		<br><br>
		

</div>
</div>
	</form>
	
	
	

</body>
</html>




