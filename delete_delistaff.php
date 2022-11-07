<?php 
session_start();
include('connect.php');
if (isset($_REQUEST['DeliStaffID'])) 
{$DeliStaffID=$_REQUEST['DeliStaffID'];

     $delete="Delete From deliverystaff
          Where DeliStaffID='$DeliStaffID'";

          $ret=mysqli_query($connection,$delete);

          if ($ret){
               echo"<script>window.alert('Successfully deleted!')</script>";
               echo"<script>window.location='delistaff_register.php'</script>";
          }
          else
          {
             echo "<p>Error in DeliveryStaff Delete : " . mysqli_error($connection) . "</p>";

          }

}


 ?>