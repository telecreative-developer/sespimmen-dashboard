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
                                                    <h5>Total Nilai Terbesar <small> Peringkat 10 Sespim Terbaik </small></h5>
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">
                                                <div class="tab-content bg-white p-15">
                                                    <div class="row">
                                                    <?php 
                                                        foreach($users as $result){
                                                    ?>
                                                        <div class="col-lg-2">
                                                            <div class="outline-product" style="background: url('<?php echo $result->avatar_url;?>')center no-repeat; background-size:cover; width:150px; border-radius:150%; height:150px; margin-top:20px;">          
                                                            </div>
                                                        </div>   
                                                        <div class="col-lg-4">
                                                            <div style="background:#f8f8f8; padding:20px; margin-top:40px;">
                                                                <p style="overflow-wrap: break-word;">
                                                                    <small>
                                                                        <b><?php echo $result->first_name;?> <?php echo $result->last_name;?></b> 
                                                                        <br> <a href="<?php echo base_url();?>pagesprofile/<?php echo $result->id;?>" style="color:blue;"><?php echo $result->email;?></a>
                                                                        <br>Total Nilai : 
                                                                        <?php if ($result->total <= 60 ){?>
                                                                            <span class="color-danger"><?php echo substr($result->total,0,2);?></span>    
                                                                        <?php 
                                                                        }else{
                                                                        ?><?php echo substr($result->total,0,2);?>        
                                                                        <?php 
                                                                        }?>
                                                                    </small>
                                                                </p>
                                                            </div>
                                                        </div>     
                                                        <?php } ?>  
                                                    </div>
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