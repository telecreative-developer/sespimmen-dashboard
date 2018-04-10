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
                        foreach($users as $result){
                    ?>
                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h4 class="title"><?php echo ucfirst($result->first_name); ?> <?php echo ucfirst($result->last_name);?> <small class="ml-10">My Profile</small></h4>
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
                                <div class="col-md-5">
                                    <div class="panel border-primary no-border border-3-top">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5>Profile Picture</h5>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2">
                                                <?php 
                                                    if($result->avatar_url == ""){
                                                       ?>  
                                                          <center>
                                                            <div class="outline-product" style="background: url('<?php echo base_url();?>assets/images/favicon/default.jpg')center no-repeat; background-size:cover; width:200px; border-radius:100%; height:200px;">
                                                            </div>  
                                                          </center>
                                                    <?php
                                                      }else{  
                                                      ?> 
                                                      <center>
                                                        <div class="outline-product" style="background: url('<?php echo $result->avatar_url;?>')center no-repeat; background-size:cover; width:200px; border-radius:100%; height:200px;">
                                                        </div>  
                                                      </center>
                                                    
                                                    <?php
                                                    }
                                                    ?>
                                                    <!-- <div class="text-center">
                                                        <button type="button" class="btn btn-primary btn-xs btn-labeled mt-10">Edit Picture<span class="btn-label btn-label-right"><i class="fa fa-pencil"></i></span></button>
                                                    </div> -->
                                                    <br/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.panel -->

                                    <div class="panel border-primary no-border border-3-top">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5>About</h5>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <table class="table table-striped">
                                                	<tbody>
                                                        <tr>
                                                            <th width="0%">Name <span style="float:right;"> : </span> </th>
                                                            <td width="60%">
                                                                <p style="word-break:break-all; margin-bottom:0px;"><?php echo ucfirst($result->first_name);?> <?php echo ucfirst($result->last_name);?></p>
                                                            </td>
                                                        </tr>

                                                		<tr>
                                                            <th width="0%">Email <span style="float:right;"> : </span> </th>
                                                            <td width="60%">
                                                                <p style="word-break:break-all; margin-bottom:0px;"><?php echo $result->email;?></p>
                                                            </td>
                                                        </tr>

                                                		<tr>
                                                            <th width="0%">Phone <span style="float:right;"> : </span> </th>
                                                            <td width="60%">
                                                                <p style="word-break:break-all; margin-bottom:0px;"><?php echo $result->phone;?></p>
                                                            </td>
                                                        </tr>
                                                	</tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-md-3 -->

                                <div class="col-md-7">
                                    <div class="row mb-30">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <a class="dashboard-stat-2" style="background:#27ae5f; color:#fff;" href="#">
                                                <div class="stat-content">
                                                    <span class="number counter"><?php echo $result->academic_score;?></span>
                                                    <span class="name">Penulisan Bobot 1 <br/>
                                                </div>
                                            </a>
                                            <!-- /.dashboard-stat-2 -->
                                        </div>
                                    </div>
                                    <div class="row mb-30">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <a class="dashboard-stat-2" style="background:#27ae5f; color:#fff;" href="#">
                                                <div class="stat-content">
                                                    <span class="number counter"><?php echo $result->personality_score;?></span>
                                                    <span class="name">Penulisan Bobot 5 <br/>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <a class="dashboard-stat-2" style="background:#27ae5f; color:#fff;" href="#">
                                                <div class="stat-content">
                                                    <span class="number counter"><?php echo $result->health_score;?></span>
                                                    <span class="name">Manfaat Bobot 3 <br/>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>                            
                            <!-- /.row -->
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