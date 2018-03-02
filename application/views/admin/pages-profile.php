<?php include "style/styleDashboard.php"; ?>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <nav class="navbar top-navbar bg-white box-shadow">
            	<div class="container-fluid">
                    <div class="row">
                        <?php include "partial/header.php";?>
                    </div>
            	</div>
            </nav>

            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                    <div class="left-sidebar fixed-sidebar bg-primary box-shadow tour-three">
                        <div class="sidebar-content">
                            <?php include "partial/navigation.php" ?>
                        </div>
                    </div>

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h4 class="title">John Doe <small class="ml-10">My Profile</small></h4>
                                    <p class="sub-title">One stop solution for perfect admin dashboard!</p>
                                </div>
                                <!-- /.col-md-6 -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                      <li><a href="<?php echo base_url()?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                      <li class="active">Profile</li>
                                    </ul>
                                </div>
                                
                            </div>
                            <!-- /.row -->

                            <div class="row mt-30">
                                <div class="col-md-4">
                                    <div class="panel border-primary no-border border-3-top">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5>Profile Picture</h5>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2">
                                                    <img src="images/avatar-1.svg" alt="User Avatar" class="img-responsive">
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-primary btn-xs btn-labeled mt-10">Edit Picture<span class="btn-label btn-label-right"><i class="fa fa-pencil"></i></span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.panel -->

                                    <div class="panel border-primary no-border border-3-top">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5>User Stats</h5>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <table class="table table-striped">
                                                	<tbody>
                                                		<tr>
                                                			<th>Posts</th>
                                                			<td>
                                                          100<br>
                                                      </td>
                                                		</tr>
                                                		<tr>
                                                			<th>Comments</th>
                                                			<td>
                                                          511<br>
                                                      </td>
                                                		</tr>
                                                		<tr>
                                                			<th>Last Login</th>
                                                			<td>
                                                          12-Mar-2017<br>
                                                      </td>
                                                		</tr>
                                                	</tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.panel -->
                                </div>
                                <!-- /.col-md-3 -->

                                <div class="col-md-8">

                                    <div class="row mb-30">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <a class="dashboard-stat-2 bg-primary" href="#">
                                                <div class="stat-content">
                                                    <span class="number counter">1,411</span>
                                                    <span class="name">Comments</span>
                                                </div>
                                                <span class="stat-footer"><i class="fa fa-arrow-up color-success"></i> 5% growth in 3 hours</span>
                                            </a>
                                            <!-- /.dashboard-stat-2 -->
                                        </div>
                                        <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <a class="dashboard-stat-2 bg-danger" href="#">
                                                <div class="stat-content">
                                                    <span class="number counter">322</span>
                                                    <span class="name">Total Tickets</span>
                                                </div>
                                                <span class="stat-footer"><i class="fa fa-arrow-down color-success"></i> 3% decrease in 3 hours</span>
                                            </a>
                                            <!-- /.dashboard-stat-2 -->
                                        </div>
                                        <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <a class="dashboard-stat-2 bg-warning" href="#">
                                                <div class="stat-content">
                                                    <span class="number counter">5,551</span>
                                                    <span class="name">Bank Credits</span>
                                                </div>
                                                <span class="stat-footer"><i class="fa fa-arrow-up color-success"></i> 7% increase in 3 hours</span>
                                            </a>
                                            <!-- /.dashboard-stat-2 -->
                                        </div>
                                        <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <a class="dashboard-stat-2 bg-success" href="#">
                                                <div class="stat-content">
                                                    <span class="number counter">16,710</span>
                                                    <span class="name">Bank Credits</span>
                                                </div>
                                                <span class="stat-footer"><i class="fa fa-arrow-down color-danger"></i> 2% decrese in 3 hours</span>
                                            </a>
                                            <!-- /.dashboard-stat-2 -->
                                        </div>
                                        <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    </div>
                                    <!-- /.row -->
                                    <br/>
                                    <div class="tab-content bg-white p-15">
                                		<div role="tabpanel" class="tab-pane active" id="home2">
                                		    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                		</div>
                                </div>
                                <!-- /.col-md-9 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->


                    </div>
                    <!-- /.main-page -->

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->
<?php include "style/javascriptDashboard.php"; ?>