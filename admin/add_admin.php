<?php 
require('../connection.php');
extract($_POST);
if(isset($save))
{
//check user alereay exists or not
$sql=mysqli_query($conn,"select * from admin where name='$n'");

$r=mysqli_num_rows($sql);

if($r==true)
{
$err= "<font color='red'>This Department is already exists</font>";
}
else
{

$query="insert into admin values('','$n','$e','$mob','$pass')";
mysqli_query($conn,$query);

$err="<font color='blue'>Registration successfull !!</font>";
header('location:index.php?page=manage_admin');

}
}




?>
<h2>Register department</h2>
		<form method="post" enctype="multipart/form-data">
			<table class="table table-bordered">
	<Tr>
		<Td colspan="2"><?php echo @$err;?></Td>
	</Tr>
				
				<tr>
					<td>Enter Manager name</td>
					<Td><input  type="text"  class="form-control" name="n" required/></td>
				</tr>
             
                <tr>
					<td>Enter Manager email </td>
					<Td><input type="email"  class="form-control" name="e" required/></td>
				</tr>
				
				<tr>
					<td>Enter Manager Mobile </td>
					<Td><input  type="number" class="form-control"  name="mob" required/></td>
				</tr>
				
                <tr>
					<td>Enter password </td>
					<Td><input  type="password" class="form-control"  name="pass" required/></td>
				</tr>
				
				<tr>	
					<Td colspan="2" align="center">
						<input type="submit" class="btn btn-success" value="Save" name="save"/>
						<input type="reset" class="btn btn-success" value="Reset"/>
					</td>
				</tr>
			</table>
		</form>
