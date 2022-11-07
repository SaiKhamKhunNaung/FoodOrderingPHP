<?php 
session_start();
include('connect.php');
if (isset($_REQUEST['CategoryID'])) 
{$CategoryID=$_REQUEST['CategoryID'];

     $delete="Delete From category
          Where CategoryID='$CategoryID'";

          $ret=mysqli_query($connection,$delete);

          if ($ret){
               echo"<script>window.alert('Successfully deleted!')</script>";
               echo"<script>window.location='category.php'</script>";
          }
          else
          {
             echo "<p>Error in Category Delete : " . mysqli_error($connection) . "</p>";

          }

}


 ?>