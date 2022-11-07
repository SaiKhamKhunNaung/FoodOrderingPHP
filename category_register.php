<?php 
$connection=mysqli_connect('localhost','root','','food');
include('AutoID_Function.php');
include('Admin_Header.php');

if (isset($_POST['btnsave'])) 
{
    $CategoryID=$_POST['txtcategoryid'];
	$CategoryName=$_POST['txtcategoryname'];

    $insert="Insert into category(CategoryID,CategoryName)
         VALUE('$CategoryID','$CategoryName')";
$ret=mysqli_query($connection,$insert) or die(mysqli_error($connection));

if ($ret)
{
  echo "<script>
          window.alert('Register Successful!');
          window.location='category_register.php';
        </script>";
}



}


 ?>
<html>
<head>
	<script type="text/javascript" src="js/jquery-3.1.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script type="text/javascript" src="DataTables/datatables.min.js"></script> 

  <title>Category Registration</title>
</head>
<body>
	<script>
  $(document).ready( function () {
    $('#tableid').DataTable();
  } );
</script>
		
<h3 class="cursive-font">Enter Category Info</h3>

<form action="category_register.php" method="post" enctype="multipart/form-data">
	<div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    
												<label for="activities">CategoryID</label>
														<input type="text" name="txtcategoryid" readonly value="<?php  echo AutoID('category','CategoryID','CT-',6)?>" class="form-control" >
									
														<label for="activities">CategoryName</label>
														<input type="text" name="txtcategoryname" placeholder="Eg.Burger" class="form-control" required>


      												
														<input type="submit" class="btn btn-primary btn-block" name="btnsave" value="Save">
										     			<input type="reset" class="btn btn-primary btn-block" name="btnclear" value="Clear">
										     			</div>
</div>
		<br><br>
		<fieldset>
<legend>Category List </legend>

   	 <table align="center" cellspacing="3" cellpadding="5" id="table" class="table">
   	 	 <thead>
       <tr>
		 <th>CategoryID</th>
       	<th>CategoryName</th>
       <th>Option</th>
       
       </tr>
        <thead>
     
       <?php 

		   $select="select * from category";
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
         	
         	$CategoryID=$row['CategoryID'];
         	$CategoryName=$row['CategoryName'];
         	
         	
         	echo"<tr>";
         	echo "<td>$CategoryID</td>";
         	
         	echo "<td>$CategoryName</td>";
         	
         	echo"<td>
                  <a href='category_update.php?CategoryID=$CategoryID'>Edit</a>
                  <a href='category_delete.php?CategoryID=$CategoryName'>Delete</a>

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
	