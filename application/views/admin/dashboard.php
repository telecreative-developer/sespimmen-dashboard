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
                                <div class="col-sm-12">
                                    <h2 class="title">Dashboard</h2>
                                    <p class="sub-title">One stop solution for perfect admin dashboard!</p>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-sm-12">
                                    <ul class="breadcrumb">
            							<li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
            							<li class="active">Dashboard</li>
            						</ul>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="#">
                                            <?php $query = $this->db->query("SELECT * FROM posts"); ?>
                                            <span class="number"><?php echo $query->num_rows();?></span>
                                            <span class="name">Articles</span>
                                            <span class="bg-icon"><i class="fa fa-newspaper-o"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="#">
                                            <span class="number counter">1,411</span>
                                            <span class="name">Comments</span>
                                            <span class="bg-icon"><i class="fa fa-comments"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="#">
                                            <span class="number counter">1,411</span>
                                            <span class="name">Comments</span>
                                            <span class="bg-icon"><i class="fa fa-comments"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="#">
                                            <span class="number counter">1,411</span>
                                            <span class="name">Comments</span>
                                            <span class="bg-icon"><i class="fa fa-comments"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->
                        
                    </div>
                    <!-- /.main-page -->
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
<?php include "style/javascriptDashboard.php"; ?>