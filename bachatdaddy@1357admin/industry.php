<?php 
    if (!isset($_SESSION)) {
        session_start();
    }
    require '../config/config.php'; 
    require 'functions/authentication.php';
    require 'functions/bachatdaddyfunction.php';

    $industry =new Industry();
    $auth = new Authentication();
    $auth->checkSession();

    $Id =  isset($_REQUEST['id']) ? base64_decode($_REQUEST['id']) : NULL;

    if(isset($Id)){
        $editdata=$industry->getIdustry($Id);
    }

    $industrydata = $industry->getAllIdustry();

    if (isset($_POST['submit']) && $_POST['submit'] == 'Submit') {
        $name=$_POST['name'];
        $result = $industry->addindutry($name);
        

		if ($result === true) {
		    header('Location: industry.php');
			exit();
		} else {
			$_SESSION['errmsg'] = 'Some error accured';
			// header('Location: index.php');
		exit();
		}
    }

    // -------------------------------------update industry----------------------------
    if (isset($_POST['update']) && $_POST['update'] == 'Update') {

        $name=$_POST['name'];
        $id = $_REQUEST['eId'];
        $result = $industry->updateindutry($name,$id);
        if($result){
            $_SESSION['msg']="industry updated";
        }else{
            $_SESSION['err']="some problem in updating industry try again";
        }
        header("Location: industry.php");

    }
// // ------------------------------ the visibility functionality--------------------------//
    if (isset($_REQUEST['visible'])) {
        $id = base64_decode($_GET['id']);
        $vis = $_GET['visible'];
        $industry->visibility($id,$vis);
        header('Location: industry.php');
      }
// --------------------------------------delete the single industry---------------------------
    if (isset($_REQUEST['delete']) && $_REQUEST['delete'] == 'y') {
        $id = base64_decode($_GET['eid']);

        try {
            $result = $industry->delete($id);
        } catch (Exception $e) {
            error_log($e->getMessage()); // Log the error message to the server log
            echo "<script>alert('Remove all vendor categories associated with this industry first');</script>";
        }
        
        echo "<script>window.location.href = 'industry.php';</script>";

        // header("Location: industry.php");
      
      }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignLab">
	<meta name="robots" content="">
	<meta name="format-detection" content="telephone=no">
	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Page Title Here -->
	<title>BACHATDADDY</title>
<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/logo/favicon.png">
	<link href="vendor/wow-master/css/libs/animate.css" rel="stylesheet">
	<link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link rel="stylesheet" href="vendor/bootstrap-select-country/css/bootstrap-select-country.min.css">
	<link rel="stylesheet" href="vendor/jquery-nice-select/css/nice-select.css">
	<link href="vendor/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
	
	<link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--swiper-slider-->
	<link rel="stylesheet" href="vendor/swiper/css/swiper-bundle.min.css">
	<!-- Style css -->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	
</head>

<body>

   


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

    <!--**********************************
        Header start ti-comment-alt
    ***********************************-->
    <?php require ('include/header.php'); ?>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->
    <!--**********************************
        Sidebar start
    ***********************************-->
    <?php require ('include/sidebar.php'); ?>
    <!--**********************************
        Sidebar end
    ***********************************-->
    <!--**********************************
        Content body start
    ***********************************-->
		<div class="content-body">
            <!-- container starts -->
            <div class="container-fluid">
                
                <!-- row -->
                <div class="">
                    <div class="">
                        <div class="container-fluid pt-0 ps-0 pe-lg-4 pe-0">
                            <div class="row">
                                <!-- Column starts -->
                            </div>
                            <!-- Column ends -->
                            
                            <!-- Column starts -->
                            <div class="col-xl-12">
                            <?php if($Id == NULL): ?>
                                <div class="card" id="bootstrap-table2">
                                    <div class="card-header flex-wrap d-flex justify-content-between border-0 px-3">
                                        <div>
                                            <h2>Add New Industry</h2>
                                        </div>
                                    </div>
                                    <div class="row m-2">
                                        <!-- Start Date Heading and Input -->
                                        <!-- <form method="post" >
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Industry Name</label>
                                              <input type="text" name="name" class="form-control w-50" id="industryname" aria-describedby="emailHelp" placeholder="Industry Name">
                                            </div>
                                            <button type="submit" value="Submit" name="submit" class="btn btn-primary mt-3 mb-3 industrynamebtn">Submit</button>
                                        </form> -->
                                        <form method="post" id="industryForm">
                                            <div class="form-group">
                                                <label for="industryname">Industry Name</label>
                                                <input type="text" name="name" class="form-control w-50" id="industryname" aria-describedby="emailHelp" placeholder="Industry Name">
                                            </div>
                                            <button type="submit" value="Submit" name="submit" class="btn btn-primary mt-3 mb-3 industrynamebtn">Submit</button>
                                        </form>
                                    </div>
                                    <!-- /tab-content -->
                                </div>
                                
                                
                                <?php else: ?>
                                    <div class="card" id="bootstrap-table2">
                                    <div class="card-header flex-wrap d-flex justify-content-between border-0 px-3">
                                        <div>
                                            <h2>Update Industry</h2>
                                        </div>
                                    </div>
                                    <div class="row m-2">
                                       
                                        <form method="post" id="industryForm" >
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Industry Name</label>
                                              <input type="hidden" name="eId" value="<?php echo $editdata['id']; ?>">
                                              <input type="text" name="name" value="<?php echo $editdata['name'];?>" class="form-control w-50" id="industryname" aria-describedby="emailHelp" placeholder="Update Industry Name">
                                            </div>
                                            <button type="submit" value="Update" name="update" class="btn btn-primary mt-3 mb-3 industrynamebtn">Update</button>
                                        </form>
                                    </div>
                                    <!-- /tab-content -->
                                </div>

                                <?php endif; ?>

                                 <!-- tab-content -->
                                 <div class="card" id="bootstrap-table2">
                                 <div class="tab-content" id="myTabContent-1">
                                    <div class="tab-pane fade show active" id="bordered" role="tabpanel" aria-labelledby="home-tab-1">
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <div>
                                                    <h2 class="ms-3 mt-4">View/Manage Industries</h2>
                                                </div>
                                                <table class="table table-responsive-md">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:50px;">
                                                                <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                                    <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                                                    <label class="form-check-label" for="checkAll"></label>
                                                                </div>
                                                            </th>
                                                            <th>S NO.</th>
                                                            
                                                            <th>Industry Name</th>
                                                            <th>Action</th>
                                                            <th>Active</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $i=1;
                                                            foreach($industrydata as $row):
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                                    <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                                                                    <label class="form-check-label" for="customCheckBox2"></label>
                                                                </div>
                                                            </td>
                                                            <td><strong><?php echo $i++; ?></strong></td>
                                                            <td><?php echo $row['name']; ?></td>
                                                            
                                                            <td>
                                                                <div class="d-flex">
                                                                    
                                                                    <a href="industry.php?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-primary shadow btn-xs sharp me-3"><i class="fa fa-edit"></i></a>
                                                                    <a onClick="return confirm('Are you sure !! Data will be delete Parmanently..')" href="?eid=<?php  echo base64_encode($row['id']); ?>&delete=y" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex">
                                                                <?php if ($row['active'] == 1) { ?>
                                                                        <a class="btn btn-danger shadow btn-xs sharp" href="?visible=0&id=<?php echo base64_encode($row['id']); ?>"><i class="fa fa-check"></i></a>
                                                                <?php } else { ?>
                                                                        <a class="btn btn-danger shadow btn-xs sharp" href="?visible=1&id=<?php  echo base64_encode($row['id']); ?>"><i  class="fa fa-uncheck"></i></a>
                                                                <?php } ?>
                                                                    
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php 
                                                            endforeach;
                                                        ?>
                                
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- container ends -->
        </div>
        
						
       
        <!--**********************************
            Content body end
        ***********************************-->
		
		<!--**********************************
			Footer start
		***********************************-->
		
		<!--**********************************
			Footer end
		***********************************-->
        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

	
	<!-- code-highlight -->
	<script src="js/highlight.min.js"></script>
	<script>hljs.highlightAll();
		hljs.configure({ ignoreUnescapedHTML: true })
		
	</script>

	<script>
		document.addEventListener('DOMContentLoaded', (event) => {
			document.querySelectorAll('pre code').forEach((el) => {
				hljs.highlightElement(el);
			});
			});
		
        $(document).ready(function() {
            
            $("#industryForm").validate({
                rules: {
                    name: {
                        required: true,
                        minlength:3
                    }
                },
                messages: {
                    name: {
                        required: "Please enter an Industry Name",
                        minlength: "Industry name should be atleast 3 characters" 
                    }
                },
                submitHandler: function(form) {
                    
                    form.submit();
                }
            });
        });

	
			
	</script>
    
    <script>
        // Function to change the logo image source
        function changeLogo() {
            var logo = document.getElementById('logoImg');  // Get the image element by its ID
            // Change the image source to the new one
            if (logo.src.indexOf('logo.jpg') > -1) {
                logo.src = 'images/logo/favicon.png';  // Replace with your new image path
            } else {
                logo.src = 'images/logo/logo.jpg';  // Revert to the original image
            }
        }
    </script>
</body>
</html>