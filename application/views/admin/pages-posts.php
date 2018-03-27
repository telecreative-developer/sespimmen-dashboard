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
                    <?php 
                        foreach($posts as $result){
                    ?>
                    <div class="main-page">
                        <div class="container-fluid">                        
                            <div class="row mt-30">
                                <div class="col-md-12">
                                    <div class="panel border-primary no-border border-3-top">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5>Kegiatan - <?php echo $result->first_name;?> <?php echo $result->last_name;?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>                    
                        <div class="panel-body" style="box-shadow:0 0 10px #ccc;">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <p><?php echo $result->post;?></p>
                                    <?php 
                                        $x = $result->post_id;
                                        $query = $this->db->query("SELECT * FROM thumbnails WHERE post_id = '$x'");
                                    ?>
                                    <div class="row">
                                    <?php 
                                        foreach ($query->result_array() as $row)
                                        {
                                        ?>
                                            <div class="col-lg-4">
                                                <img src="<?php echo $row['thumbnail_url'];?>" width="100%;"/>
                                            </div>
                                        <?php 
                                        }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.container-fluid -->


                    </div>
                    <?php 
                        }
                    ?>
                    <!-- /.main-page -->

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->
<?php include "style/javascriptDashboard.php"; ?>