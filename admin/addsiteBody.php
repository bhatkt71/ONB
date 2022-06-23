<?php
require_once (ADMIN_MODEL.'sitemodel.php');
    $model=new siteModel();
require_once (ADMIN_CONTROLLER.'siteController.php');
    $controller=new SiteManage();
require_once (ADMIN_CONTROLLER.'agentcontroller.php');
    $agent=new AgentManage();
    $response;
if($_SERVER["REQUEST_METHOD"]=="POST")
{

	if (isset($_POST['site_create_btn'])  && ($_POST['randCheck']==$_SESSION['rand']))
	{
		//Upload File
		if($_FILES["SitePhoto"]["name"] != ''){
		  //print_r($_FILES);
		  $test = explode('.', $_FILES["SitePhoto"]["name"]);
		  $ext = end($test);
		  $name = rand(100, 999) . '.' . $ext;
		  $location = /*WEBPATH.*/'Admin/assets/userpicture/'. $name;
		  move_uploaded_file($_FILES["SitePhoto"]["tmp_name"], $location);
		  //echo '<img src="'.$location.'" height="150" width="225" class="img-thumbnail" />';
		}
		$model->setSitePic(isset($location)?$location:'');
		$model->setSitename($_POST['siteName']);
		$model->setLocation($_POST['siteLocation']);
		$model->setGeoLocation($_POST['geoLocation']);
		$model->setMapLink($_POST['mapLink']);
		$model->setDistrict($_POST['district']);
		if ($controller->InsertSiteDetails($model))
		{
		$model->setresponse("Site Added Successfully...");
		}else
		{
			$model->setresponse("Site Failed To Add...");
		}
		$response=$model->getresponse();
		?>
			<script type="text/javascript">
				alert("<?php echo $response;?>");
			</script>
		<?php
	}


	if (isset($_POST['site_update_btn'])  && ($_POST['randCheck1']==$_SESSION['rand1']))
	{
		$model->setSiteID($_POST['updt_hdn_value']);
		$model->setSitename($_POST['UpsiteName']);
		$model->setLocation($_POST['UpsiteLocation']);
		$model->setGeoLocation($_POST['UpgeoLocation']);
		$model->setMapLink($_POST['UpmapLink']);
		$model->setDistrict($_POST['Updistrict']);
		if ($controller->UpdateSiteDetails($model))
		{
		$model->setresponse("Site Updated Successfully...");
		}
		$response=$model->getresponse();
		?>
			<script type="text/javascript">
				alert("<?php echo $response;?>");
			</script>
		<?php
	}
}
?>

<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Add Site</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo WEBPATH.'dashboard?status=success&&user=Admin'; ?>">
                                            Dashboard
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                     Add Site
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

    <div class="container-fluid">
        <!-- View Plots Of Particular Site-->
        <div class="card">
            <?php if (isset($response)){?>
                <div class="col-sm-12 alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Status!</strong> <?php print_r($response); ?>
                </div><?php
            }?>
            <div class="card-body" style="text-align: center;">
                <a class="" href="<?php echo WEBPATH.'SiteManage'; ?>">
                    <button class="btn btn-primary">
                        <i class="mdi mdi-blur-linear"></i>
                        <span class=""> View Site</span>
                    </button>
                </a>
				&nbsp;&nbsp;&nbsp;
				<a href="<?php echo WEBPATH.'Plot-View'; ?>">
					<button class="btn btn-primary">
						<i class="mdi mdi-blur-linear"></i>
						<span class=""> View Plots</span>
					</button>
				</a>
				&nbsp;&nbsp;&nbsp;
				<a href="<?php echo WEBPATH.'Plot-Addition'; ?>">
					<button class="btn btn-primary">
						<i class="mdi mdi-blur-linear"></i>
						<span class=""> Add New Plot</span>
					</button>
				</a>
                <!-- Add  Site-->
                <!-- Row Start-->
                <div class="row" style="margin-top: 10px;">
                            <div class="col-md-12">
                                <div class="card">
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <!-- Logic Checking For Resubmission On Reload START-->
                                            <?php
                                                //At Submit Page Code [if (isset($_POST['agent_create_btn']) && ($_POST['randCheck']==$_SESSION['rand']))]
                                                // Check Resubmission On Reload
                                                $rand=rand();
                                                //if(!isset($_SESSION['rand']))
                                                    $_SESSION['rand']=$rand;

                                                //unset($_SESSION['rand']);
                                            ?>
                                            <input type="text" name="randCheck" value="<?php echo $rand?>" hidden="true">
                                            <!-- Logic Checking For Resubmission On Reload END-->

                                            <div class="form-group row">
                                                <label for="siteName" class="col-sm-3 text-right control-label col-form-label">Title</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="siteName" id="siteName" placeholder="Site Name" required="true">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="siteLocation" class="col-sm-3 text-right control-label col-form-label">Location</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="siteLocation" class="form-control" id="siteLocation" placeholder="Site Location" required="true">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="geoLocation" class="col-sm-3 text-right control-label col-form-label">Google Coordinates(DD)</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="geoLocation" class="form-control" id="geoLocation" placeholder="41.40338, 2.17403" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="mapLink" class="col-sm-3 text-right control-label col-form-label">Google Map Link</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="mapLink" class="form-control" id="mapLink" placeholder="https://goo.gl/maps/6n9iGf8LEYrSybtc6" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="district" class="col-sm-3 text-right control-label col-form-label">District</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" name="district" required>
                                                        <?php include(ADMIN_VIEWS."district.php");?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="SitePhoto" class="col-sm-3 text-right control-label col-form-label">Picture</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="file" name="SitePhoto" >
                                                </div>
                                            </div>
                                            <!-- Images And Layout Fields Will Be Done Later-->
                                            <div class="form-group row">
                                                <span class="col-sm-8"></span>
                                                <button type="reset"  class="col-sm-2 btn btn-danger" >Reset</button>
                                                <button type="submit" class="col-sm-2 btn btn-primary" name="site_create_btn">Add</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                </div>

                <!-- Row Start End-->
            </div>
            <!-- Card Body End -->
        </div>
        <!-- CardEnd -->
    </div>
    <!-- container-fluid End -->
    <?php include(ADMIN_VIEWS."copyright.php");?>

</div>
<style type="text/css">
	.to-right
	{
		float: right;
	}
</style>
<script src="Admin/assets/libs/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //$('#plotTable').DataTable();
        $('.datatable').DataTable({
            responsive: true,
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            buttons: [
                {extend: 'copy', className: 'btn-sm'},
                {extend: 'csv', title: 'ExampleFile', className: 'btn-sm'},
                {extend: 'excel', title: 'ExampleFile', className: 'btn-sm', title: 'exportTitle'},
                {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                {extend: 'print', className: 'btn-sm'}
            ]
        });

        $("#siteId123").change(function(){
            var siteid1 = $(this).val();
            console.log("addPlotBody[ siteid1 ]: "+siteid1);
            //alert(siteid1);
            $('#plotTable').DataTable().destroy();
            $.ajax({
                url: 'Admin/views/getPlots.php',
                type: 'post',
                data: {siteid1:siteid1},
                dataType: 'json',
                success:function(response){
                    console.log(response);
                    $("#plotTableBody").empty();
                    /*$("#plotid").append("<option value='0'>--- Select Plot----</option>");*/
                    $("#plotTableBody").append(response.data);
                    //$('#plotTable').DataTable();
                    var d = new Date();
                    $('#plotTable').append('<caption style="caption-side: bottom"><br> Dated: '+d+'</caption>');
                    $('#plotTable').DataTable( {
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    } );
                },
                error:function(){
                    console.log("No response");
                }
            });
            //Ajax End
        });
        //$('#plotTable').DataTable();
        $("#site1").change(function(){
            var siteid1 = $(this).val();
            console.log("addPlotBody[ siteid1 ]: "+siteid1);
            //alert(siteid1);
            $.ajax({
                url: 'Admin/views/getPlots.php',
                type: 'post',
                data: {siteid1:siteid1},
                dataType: 'json',
                success:function(response){
                    console.log(response.Rows);
                    $('#plotTable caption').html("");
                    $("#plotTableBody").empty();
                    /*$("#plotid").append("<option value='0'>--- Select Plot----</option>");*/
                    $("#plotTableBody").append(response.data);
                    $("#PlotsTableData").html(response.output);
                    //$('#plotTable').DataTable();

                    //$('#plotTable').DataTable().fnDestroy();
                    var currentDate = new Date();

                    var date = currentDate.getDate();
                    var month = currentDate.getMonth(); //Be careful! January is 0 not 1
                    var year = currentDate.getFullYear();

                    var dateString = date + "-" +(month + 1) + "-" + year;
                    var siteText=$("#site1 option:selected").html();
                    $('#plotTable caption').html('<h4><center style="color: black;">All Plots Of ['+siteText+'] <br> Dated: '+dateString+'</center></h4>');
                    //<caption style="caption-side: top"></caption>

                    /*if($.fn.DataTable.isDataTable("#plotTable")){
                        $('#plotTable').DataTable().clear().destroy();
                    }
                    $('#plotTable').DataTable( {
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    } );*/

                },
                error:function(){
                    console.log("No response");
                }
            });
            //Ajax End
        });
                   /* var d = new Date();
                    $('#plotTable').append('<caption style="caption-side: bottom"><br> Dated: '+d+'</caption>');
                    $('#plotTable').DataTable( {
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    } );*/

    });
</script>
