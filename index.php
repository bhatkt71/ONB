<?php 
include('connection.php');
session_start();
 ?>
<html>
	<head>
		<title>Online Notice Board</title>
		<link rel="stylesheet" href="css/bootstrap.css"/>
		<script src="js/jquery_library.js"></script>
<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
			<nav class="navbar navbar-default navbar-fixed-top" style="background:pink">
  <div class="container">
  
  <ul class="nav navbar-nav navbar-left">
    <li><a href="index.php"><strong>Online Notice Board</strong></a></li>
      
	  
	  <li><a href="index.php?option=about"><span class="glyphicon glyphicon-user"></span> About</a></li>
   
   
	
	<li><a href="index.php?option=contact"><span class="glyphicon glyphicon-phone"></span>Contact</a></li>
	
	</ul>


<ul class="nav navbar-nav navbar-right">
   <!--   <li><a href="index.php?option=New_user"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>   -->
      <li><a href="index.php?option=login"><span class="glyphicon glyphicon-log-in"></span>Admin Login</a></li>
    </ul>



</div>
</nav>	

<div class="container-fluid">
	<!-- slider -->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/GDC_GBL.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="images/images.jpeg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
	
	 <div class="item">
      <img src="images/Penguins.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    ...
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- slider end-->
</div>


<div class="container" >
	<div class="row">
	<!-- container -->
		<div class="col-sm-8">
    
		<?php 
		@$opt=$_GET['option'];
		
		if($opt!="")
		{
			if($opt=="about")
			{
			include('about.php');
			}
			else if($opt=="contact")
			{
			include('contact.php');
			}
			else if($opt=="diaplay")
			{
			include('display_notice.php');
			}	
			else if($opt=="login")
			{
			include('login.php');
			}
		}
		else
		{
		?>
     
		<div style="width:1150px;">
			<div class="panel panel-default" >
  				<div class="panel-heading"><h3> All Notifications</h3></div>
              
                	<?php 
						$q=mysqli_query($conn,"select * from notice ");
						$rr=mysqli_num_rows($q);
					?>
			

					<table class="table table-bordered" >
                    <tr class="success">
							<th>Sr.No</th>
							<th>Date</th>
							<th>Department Name</th>
                            <th>Subject</th>
        					<th>Semester</th>
							<th>View Notice</th>
						</Tr>	
                                  
          	

		<?php 
			$i=1;
			while($row=mysqli_fetch_assoc($q))
			{
				
	
				echo "<Tr>";
				echo "<td>".$i."</td>";
				echo "<td>".$row['Date']."</td>";
				echo "<td>".$row['dept']."</td>";
				echo "<td>".$row['subject']."</td>";
				echo "<td>".$row['sem']."</td>";
				
				 
				echo "<Td><a href='admin/display_notice.php' style='color:green'>View</a></td>";
				echo "</Tr>";
				$i++;
			
			}
			?>
        
		
		</table>

            	</div>
			</div>
		</div>
	<!-- container -->
	<?php /*	
		<div class="col-sm-4">
			<div class="panel panel-default" >
  				<div class="panel-heading">Latest Notifications</div>
                        <?php 
							$q=mysqli_query($conn,"select * from notice ");
							$rr=mysqli_num_rows($q);
						?>
  							<table class="table table-bordered">
    							<Tr class="success">
									<th><h6>Sr.No</h6></th>
									<th><h6>Department Name</h6></th>
        							<th><h6>Semester</h6></th>
									<th><h6>View Notice</h6></th>
								</Tr>
    	
						<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($q))
							{

								echo "<Tr>";
									echo "<td>".$i."</td>";
									echo "<td>".$row['dept']."</td>";
									echo "<td>".$row['sem']."</td>";
						?>

						<?php 
							echo "<Td><a href='admin/display_notice.php' style='color:green'> View</a></td>";
							echo "</Tr>";
							$i++;
							}
						?>
					</table>
  					
				</div>
			</div>
		*/ ?>  
        
        </div>
      </div>
 
<?php } ?>




<br/>
<br/>
<br/>
<br/>

<!-- footer-->

<nav class="navbar navbar-default navbar-bottom" style="background:pink">
  <div class="container">
  
  <ul class="nav navbar-nav navbar-left">
    <li> <a><marquee>Developed by  tawseef bashir </marquee></a></li>
      
	</ul>




</div>
</nav>

<!-- footer-->

	</body>
</html>