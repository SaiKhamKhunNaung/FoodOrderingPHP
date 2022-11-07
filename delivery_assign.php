<?php 
session_start();
$connection=mysqli_connect('localhost','root','','food');
include('Admin_Header.php');
include('AutoID_Function.php');
      
if (isset($_GET['OrderID']))
 {
 $OrderID=$_GET['OrderID'];

  $select="select *from qry_order
         where OrderID='$OrderID'";

         $ret=mysqli_query($connection,$select);
         $row=mysqli_fetch_array($ret);
			
	
	     $OrderID=$row['OrderID'];
		 $CustomerID=$row['CustomerID'];
		 $OrderDate=$row['OrderDate'];
		 $OrderTime=$row['OrderTime'];
		 $TotalPrice=$row['TotalPrice'];
		 $FoodName=$row['FoodName'];
		 $FoodPrice=$row['FoodPrice'];
	  	 $CusName=$row['CusName'];
	 	 $CusAddress=$row['CusAddress'];
		 $CusPhNo=$row['CusPhNo'];
         $CategoryName=$row['CategoryName'];
		 $OrderStatus=$row['OrderStatus'];
		 

}

if(isset($_POST['btnassign'])) 
{
	$DID=$_POST['txtDID'];
	$OrderDate=$_POST['txtod'];
	$OrderTime=$_POST['txtot'];
	$OrderID=$_POST['txtoid'];
	$DeliStaff=$_POST['txtds'];
	

	$query="INSERT INTO `delivery`
			(`DeliveryID`, `DeliveryDate`, `DeliveryTime`, `Status`,`OrderID`,`DeliStaffID`) 
			VALUES
			('$DID','$OrderDate','$OrderTime','Delivered','$OrderID','$DeliStaff')
			";
	$result=mysqli_query($connection,$query) or die(mysqli_error($connection));
$update="Update tblorder
                     Set OrderStatus='Delivered'
                      Where OrderID='$OrderID'";

                     $U_ret=mysqli_query($connection,$update);

if ($result) 
{
	echo "<script>
          alert('Delivery Assigned');
          window.location='order_list.php';

        </script>";
}
	
}

?>




<html>
<head>
	<script type="text/javascript" src="js/jquery-3.1.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script type="text/javascript" src="DataTables/datatables.min.js"></script> 

  <title>Assign Delivery</title>
</head>
<body>
	<script>
  $(document).ready( function () {
    $('#tableid').DataTable();
  } );
</script>
		
<h3 class="cursive-font">Assign Order</h3>

<form action="delivery_assign.php" method="post" enctype="multipart/form-data">
	<div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
									
									<label for="activities">DeliveryID</label>
														<input type="text" name="txtDID" readonly value="<?php  echo AutoID('delivery','DeliveryID','D-',6)?>" class="form-control" readonly>
									
									<label for="activities">Delivery Date</label>
														<input type="text" name="txtod" readodsnly value="<?php  echo $OrderDate;?>" class="form-control" readonly>
												
												<label for="activities">Delivery Time</label>
														<input type="text" name="txtot" readodsnly value="<?php  echo $OrderTime;?>" class="form-control" readonly>
									<label for="activities">OrderID</label>
														<input type="text" name="txtoid" readodsnly value="<?php echo $OrderID; ?>" class="form-control" readonly>
			
									
									
 									<label for="activities">DeliveryStaffs</label>
                                            <select name="txtds" class="form-control">
                                                <option>-Select DeliveryStaff-</option>
                                                <?php 
              
              $c="SELECT * FROM deliverystaff";
              $ret=mysqli_query($connection,$c);
              echo $count=mysqli_num_rows($ret);

              for ($i=0;$i<$count;$i++)
              {
                $row=mysqli_fetch_array($ret);
                $RID=$row['DeliStaffID'];
                $RName=$row['DeliStaffName'];
                
                echo "<option value='$RID'> $RID $RName</option>";
    
              }
             ?>
												
												

										<input type="submit" class="btn btn-primary btn-block" name="btnassign" value="Assign">
										</div>
</div>
		<br><br>
		<fieldset>
<legend>Delivery List </legend>

   	 <table align="center" cellspacing="3" cellpadding="5" id="table" class="table">
   	 	 <thead>
       <tr>
		<th>OrderID</th>
		<th>CustomerID</th>
		
		<th>FoodName</th>
		<th>FoodPrice</th>
		
	
       
       
       </tr>
        <thead>
      <?php 

		   $select="select * from qry_order 
		           where OrderId='$OrderID'";
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
         	
         	$OrderID=$row['OrderID'];
         	$CustomerID=$row['CustomerID'];
         	
         	$FoodName=$row['FoodName'];
         	$FoodPrice=$row['FoodPrice'];
			 
			 
         	echo"<tr>";
         	echo "<td>$OrderID</td>";
         	
         	echo "<td>$CustomerID</td>";
         
         	echo "<td>$FoodName</td>";
         	echo "<td>$FoodPrice</td>";
			
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