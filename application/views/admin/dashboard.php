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
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <a class="dashboard-stat" style="background:#27ae60;" href="#">
                                            <?php $query = $this->db->query("SELECT * FROM events"); ?>
                                            <span class="number" style="color:#fff;"><?php echo $query->num_rows();?></span>
                                            <span class="name" style="color:#fff;">Events</span>
                                            <span class="bg-icon"><i class="fa fa-calendar-check-o"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <a class="dashboard-stat" style="background:#27ae60;" href="#">
                                            <?php $query = $this->db->query("SELECT * FROM posts"); ?>
                                            <span class="number" style="color:#fff;"><?php echo $query->num_rows();?></span>
                                            <span class="name" style="color:#fff;">Articles</span>
                                            <span class="bg-icon"><i class="fa fa-newspaper-o"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <a class="dashboard-stat" style="background:#27ae60;" href="#">
                                            <?php $query = $this->db->query("SELECT * FROM users"); ?>
                                            <span class="number" style="color:#fff;"><?php echo $query->num_rows();?></span>
                                            <span class="name" style="color:#fff;">User</span>
                                            <span class="bg-icon"><i class="fa fa-user"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->


                        <section class="section pt-n">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel border-primary no-border border-3-top">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Nilai NAK Terbesar <small> Peringkat 10 Sespim Terbaik </small></h5>
                                                </div>
                                            </div>
                                        </div>
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