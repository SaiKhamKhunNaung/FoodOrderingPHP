<?php 
session_start();
include('connect.php');
include('Admin_Header.php');
if (isset($_GET['AdminID']))
 {
 $AdminID=$_GET['AdminID'];

  $select="select *from admin
         where AdminID='$AdminID'";

         $ret=mysqli_query($connection,$select);
         $row=mysqli_fetch_array($ret);

         $AdminName=$row['AdminName'];
		 $AdminPassword=$row['AdminPassword'];
	     $AdminEmail=$row['AdminEmail'];
	     $AdminPhno=$row['AdminPhNo'];
}


         if(isset($_POST['btnUpdate']))
         {
          $U_AdminID=$_POST['txtAdminID'];
          $U_AdminName=$_POST['txtAdminName'];
	      $U_AdminPassword=$_POST['txtAdminPassword'];
          $U_AdminEmail=$_POST['txtAdminEmail'];
          $U_AdminPhNo=$_POST['txtAdminPhNo'];


          $update="UPDATE admin
                     Set  AdminName ='$U_AdminName',
					   AdminPassword ='$U_AdminPassword',
					   AdminPhNo='$U_AdminPhNo'
                      Where AdminID='$U_AdminID'";

                     $U_ret=mysqli_query($connection,$update);

                     if ($U_ret) 
                     {
                      echo"<script>window.alert('Succcessfully Update!')</script>";
                     echo"<script>window.location='admin_register.php'</script>";
                        }
                        else
                        {
                          echo"<p>".mysqli_error($connection)."</p>";
                        }
         }
 ?>
<html>
<head>
<title>Admin Update</title>
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
<form action="admin_update.php" method="post">
<fieldset>
<legend>Enter Admin Info:</legend>
<table cellpadding="5px">
  
<tr>
	<td>Admin ID</td>
	<td>
	<input type="text" name='txtAdminID' readonly value="<?php echo $AdminID;?>" >
	</td>
</tr>
	
	<tr>
	<td>AdminName</td>
	<td>
	<input type="text" name="txtAdminName" value="<?php echo $AdminName;?>"required />
	</td>
</tr>
<tr>
	<td>AdminPassword</td>
	<td>
	<input type="text" name="txtAdminPassword" value="<?php echo $AdminPassword;?>"required />
	</td>
</tr>
	<tr>
	<td>AdminEmail</td>
	<td>
	<input type="email" name="txtAdminEmail" value="<?php echo  $AdminEmail;?>"required />
		</td>
</tr>
	<tr>
	<td>AdminPhNumber</td>
	<td>
	<input type="text" name="txtAdminPhNo" value="<?php echo $AdminPhno;?>"required />
	</td>
</tr>
<tr>
	<td></td>
	<td>
		<input type="submit" name="btnUpdate" value="Update"/>
		<input type="reset" value="Clear"/>
	</td>
</tr>
</table>
</fieldset>
</form>
</body>
</html>

