<?php 
require('../connection.php');
extract($_POST);
if(isset($save))
{
//check user alereay exists or not
$sql=mysqli_query($conn,"select * from n_dept where name='$n'");

$r=mysqli_num_rows($sql);

if($r==true)
{
$err= "<font color='red'>This Department is already exists</font>";
}
else
{

$query="insert into n_dept values('','$n','$e','$mob')";
mysqli_query($conn,$query);

$err="<font color='blue'>Registration successfull !!</font>";
header('location:index.php?page=manage_department');

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
					<td>Enter Department name</td>
					<Td><input  type="text"  class="form-control" name="n" required/></td>
				</tr>
             
                <tr>
					<td>Enter Department email </td>
					<Td><input type="email"  class="form-control" name="e" required/></td>
				</tr>
				
				<tr>
					<td>Enter Department Mobile </td>
					<Td><input  type="number" class="form-control"  name="mob" required/></td>
				</tr>

				
				<tr>	
					<Td colspan="2" align="center">
						<input type="submit" class="btn btn-success" value="Save" name="save"/>
						<input type="reset" class="btn btn-success" value="Reset"/>
					</td>
				</tr>
			</table>
		</form>
