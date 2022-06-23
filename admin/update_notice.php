<?php 
extract($_POST);
if(isset($update))
{
mysqli_query($conn,"update notice set subject='$sub',image='$npic',
							sem='$sem' where notice_id='".$_GET['notice_id']."'");
header('location:index.php?page=notification');
$err="<font color='blue'>Notice updated </font>";

}

//select old notice 

$q=mysqli_query($conn,"select * from notice where notice_id='".$_GET['notice_id']."'");
$res=mysqli_fetch_array($q);

?>
<h2>Update Notice</h2>
<form method="post">
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	
	
	<div class="row">
		<div class="col-sm-4">Enter Subject</div>
		<div class="col-sm-5">
		<input type="text" name="sub" value="<?php echo $res['subject']; ?>" class="form-control"/></div>
	</div>
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
	</div>	
	
		<div class="row"><br>
		<div class="col-sm-4">Choose Notification File</div>
		<div class="col-sm-5">
        <input type="file"  name="npic" ></div>
                                  
	</div>
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
	</div>	
	
	
    <div class="row">
		<div class="col-sm-4"><br>Select Semester</div>
		<div class="col-sm-5"><br>
		 <select  name="sem" style="width:450px; height:35px;">
                         <option><?php echo $res['sem'] ?></option>
                         <option>1st Semester</option>
                         <option>2nd Semester</option>
                         <option>3rd Semester</option>
                         <option>4th Semester</option>
                         <option>5th Semester</option>
                         <option>6th Semester</option>
                         </select>
                
		</div>
	</div>
    
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
	</div>	
		
		<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-4">
		<input type="submit" value="Update Notice" name="update" class="btn btn-success"/>
		<input type="reset" class="btn btn-success"/>
		</div>
	</div>
</form>	