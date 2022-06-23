<script>
	function DeleteAdmin(id)
	{
		if(confirm("You want to delete this record ?"))
		{
		window.location.href="delete_admin.php?id="+id;
		}
	}
</script>
<?php 
$q=mysqli_query($conn,"select * from admin ");
$rr=mysqli_num_rows($q);
?>
<h2 style="color:#00FFCC">Existing Managers</h2>

<table class="table table-bordered">

	<tr>
		<th colspan="7"><a href="index.php?page=add_admin">Add New Manager</a></th>
	</tr>
    <Tr class="success">
		<th>Sr.No</th>
		<th>Manager Name</th>
        <th>Manager Email</th>
		<th>Manager Mobile No.</th>
        <th>Password</th>
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
echo "<td>".$row['pass']."</td>";
?>

<Td><a href="javascript:DeleteAdmin('<?php echo $row['admin_id']; ?>')" 
				style='color:Red'><span class='glyphicon glyphicon-trash'></span></a></td>

<?php 

echo "</Tr>";
$i++;
}
		?>
		
</table>