<?php 
session_start();
include('connect.php');
if (isset($_REQUEST['AdminID'])) 
{$AdminID=$_REQUEST['AdminID'];

     $delete="Delete From admin
          Where AdminID='$AdminID'";

          $ret=mysqli_query($connection,$delete);

          if ($ret){
               echo"<script>window.alert('Successfully deleted!')</script>";
               echo"<script>window.location='foodmenuregister.php'</script>";
          }
          else
          {
             echo "<p>Error in FoodMenu Delete : " . mysqli_error($connection) . "</p>";

          }

}


?>
