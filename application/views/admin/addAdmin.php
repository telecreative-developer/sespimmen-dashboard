<?php include"style/styleDashboard.php";?>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <nav class="navbar top-navbar bg-white box-shadow">
            	<div class="container-fluid">
                    <div class="row">
                        <?php include "partial/header.php";?>
                    </div>  
            	</div>  
            </nav>

            <div class="content-wrapper">
                <div class="content-container">

                    <div class="left-sidebar bg-primary box-shadow ">
                        <div class="sidebar-content">
                            <?php include "partial/navigation.php" ?>
                        </div>  
                    </div>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-12">
                                    <h2 class="title">Admin</h2>
                                </div>
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
            							              <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="<?php echo base_url();?>events">Admin</li></a>
                                        <li class="active">Add Admin</li>
            						            </ul>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Input Your Users</small></h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">

                                                <form method="POST" action="<?php echo base_url()?>insertAdmin" class="form-horizontal" enctype="multipart/form-data">
                                                	<div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">First Name</label>
                                                		<div class="col-sm-4">
                                                			<input type="text" name="first_name" class="form-control" id="firstname" placeholder="Firstname" required="ON">
                                                		</div>
                                                	</div>

                                                  <div class="form-group">
                                                    <label for="text1" class="col-sm-2 control-label">Last Name</label>
                                                		<div class="col-sm-4">
                                                			<input type="text" name="last_name" class="form-control" id="lastname" placeholder="Lastname" required="ON">
                                                		</div>
                                                  </div>

                                                  <div class="form-group">
                                                    <label for="text1" class="col-sm-2 control-label">Username</label>
                                                		<div class="col-sm-4">
                                                			<input type="text" name="username" class="form-control" id="username" placeholder="Lastname" required="ON">
                                                		</div>
                                                  </div>

                                                  <div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Password</label>
                                                		<div class="col-sm-4">
                                                			<input type="password" name="password" class="form-control" id="password" placeholder="Password" required="ON">
                                                		</div>
                                                	</div>

                                                  <div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Confirm Password</label>
                                                		<div class="col-sm-4">
                                                			<input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Confirm Password" required="ON">
                                                		</div>
                                                	</div>
                                                  <p id="demo" span style="color:red;"></p>
                                                	<div class="form-group">
                                                		<div class="col-sm-offset-5 col-sm-10">
                                                			<button type="submit" class="btn btn-primary">Submit</button>
                                                		</div>
                                                	</div>
                                                </form>  
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="col md-4">
                                    </div>
                                </div>  
                            </div>  
                        </section>  
                    </div>  
                </div>  
            </div>  

        </div>
<?php include "style/javascriptDashboard.php";?>