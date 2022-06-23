<?php 
include('../connection.php');
$nid=$_GET['id'];

$q=mysqli_query($conn,"delete from admin where admin_id='$nid'");

header('location:index.php?page=manage_admin');

?>