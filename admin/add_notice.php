<?php 
extract($_POST);

if(isset($add))
{

	/*if($npic=="" || $sub=="" || $dept1=="" || $sem=="")
	{
	$err="<font color='red'>fill all the fileds first</font>";	
	}
	else*/
	{
		if($_FILES["npic"]["name"] != ''){
		  //print_r($_FILES);
		  $test = explode('.', $_FILES["npic"]["name"]);
		  $ext = end($test);
		  $name = rand(100, 999) . '.' . $ext;
		  $location = /*WEBPATH.*/'images/'. $name;
		  move_uploaded_file($_FILES["npic"]["tmp_name"], $location);
		  //echo '<img src="'.$location.'" height="150" width="225" class="img-thumbnail" />';
		}
		foreach($dept1 as $v )
		{
			
			mysqli_query($conn,"insert into notice values('','$v','$sem','$sub','$location',now())");
				
		}
		
		
		header('location:index.php?page=notification');
		$err="<font color='green'>Notice added Successfully</font>";	
	}
}

?>
<h2>Add New Notice</h2>
<form method="post" enctype="multipart/form-data">
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	
	
	<div class="row">
		<div class="col-sm-4">Enter Subject</div>
		<div class="col-sm-5">
		<input type="text" name="sub" class="form-control"/></div>
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
	
	<div class="row"><br>
		<div class="col-sm-4">Select Department</div>
		<div class="col-sm-5">
		<select name="dept1[]" multiple="multiple" class="form-control">
			<?php 
	$sql=mysqli_query($conn,"select name,email from n_dept");
	while($r=mysqli_fetch_array($sql))
	{
		echo "<option value='".$r['name']."'>".$r['name']."</option>";
	}
			?>
		</select>
		</div>
	</div>
    
    
    <div class="row">
		<div class="col-sm-4"><br>Select Semester</div>
		<div class="col-sm-5"><br>
		 <select  name="sem" style="width:450px; height:35px;">
                         <option>---------------------------- Select  Semester----------------------------</option>
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
		<input type="submit" value="Add New Notice" name="add" class="btn btn-success"/>
		<input type="reset" class="btn btn-success"/>
		</div>
	</div>
</form>	