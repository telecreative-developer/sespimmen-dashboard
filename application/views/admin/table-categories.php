<?php include "style/styleTable.php"?>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <nav class="navbar top-navbar bg-white box-shadow">
            	<div class="container-fluid">
                    <div class="row">
                        <?php include "partial/header.php";?>
                    </div>
                    <!-- /.row -->
            	</div>
            	<!-- /.container-fluid -->
            </nav>

            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    
                    <div class="left-sidebar fixed-sidebar bg-primary box-shadow tour-three">
                        <div class="sidebar-content">
                            <?php include "partial/navigation.php" ?>
                        </div>
                    </div>

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-12">
                                    <h2 class="title">Tables - DataTables</h2>
                                    <p class="sub-title">One stop solution for perfect admin dashboard!</p>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
                                      <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                      <li class="active">Categories</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Categories</h5>
                                                    <!-- <a href="<?php echo base_url()?>addscores"><button type="button" class="btn btn-primary btn-xs btn-labeled">Add Scores <i class="fa fa-plus"></i></button></a> -->
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">

                                                <table id="example" class="display table-responsive table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="3%">No</th>
                                                            <th width="5%">Icon</th>
                                                            <th>Category</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                        <?php
                                                            $no = 1; 
                                                            foreach ($categories as $result) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no;?></td>
                                                            <td><img src="<?php echo $result->icon_url;?>" width="100%"/></td>
                                                            <td><?php echo $result->title;?></td>
                                                        </tr>
                                                        <?php 
                                                            $no++;
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>

                                                
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

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
<?php include "style/javascriptTable.php"; ?>