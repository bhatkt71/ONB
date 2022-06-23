<?php 
$q=mysqli_query($conn,"select * from n_dept ");
$rr=mysqli_num_rows($q);
?>
<script>
	function DeleteUser(id)
	{
		if(confirm("You want to delete this record ?"))
		{
		window.location.href="delete_department.php?id="+id;
		}
	}
</script>
<h2 style="color:#00FFCC">All Derpartment</h2>

<table class="table table-bordered">

	<tr>
		<th colspan="7"><a href="index.php?page=add_department">Add New Department</a></th>
	</tr>
    <Tr class="success">
		<th>Sr.No</th>
		<th>Department Name</th>
        <th>Department Email</th>
		<th>Department Mobile No.</th>
		<th>Delete</th>
	</Tr>

		<?php 


$i=1;
while($row=mysqli_fetch_assoc($q))
{

echo "<Tr>";
echo "<td>".$i."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['mob']."</td>";
?>

<Td><a href="javascript:DeleteUser('<?php echo $row['id']; ?>')" style='color:Red'><span class='glyphicon glyphicon-trash'></span></a></td><?php 

echo "</Tr>";
$i++;
}
		?>
		
</table>