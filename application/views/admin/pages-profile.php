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

                            <?php 
                                foreach($users as $result){
                            ?>
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
                                                <?php 
                                                      if($result->avatar_url == ""){
                                                        if($result->gender == '1'){
                                                        ?>    
                                                          <center>
                                                            <div class="outline-product" style="background: url('http://www.tlcteignmouth.co.uk/wp-content/uploads/2015/06/default-avatar_man.png')center no-repeat; background-size:cover; width:200px; border-radius:100%; height:200px;">
                                                            </div>  
                                                          </center>
                                                        <?php 
                                                          }else{
                                                            ?>
                                                            <center>
                                                              <div class="outline-product" style="background: url('http://usvirtualcareers.com/wp-content/uploads/2016/06/default-avatar_women.png')center no-repeat; background-size:cover; width:200px; border-radius:100%; height:200px;">
                                                              </div>  
                                                            </center>
                                                        <?php  
                                                        }

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
                                                                <p style="word-break:break-all; margin-bottom:0px;"><?php echo $result->first_name;?> <?php echo $result->last_name;?></p>
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
                                    <!-- /.panel -->
                                </div>
                                <!-- /.col-md-3 -->

                                <div class="col-md-8">

                                    <div class="row mb-30">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <a class="dashboard-stat-2" style="background:#27ae5f; color:#fff;" href="#">
                                                <div class="stat-content">
                                                    <span class="number counter"><?php echo $result->score;?></span>
                                                    <span class="name">Skor 1</span>
                                                </div>
                                            </a>
                                            <!-- /.dashboard-stat-2 -->
                                        </div>
                                        <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <a class="dashboard-stat-2" style="background:#27ae5f; color:#fff;" href="#">
                                                <div class="stat-content">
                                                    <span class="number counter"><?php echo $result->score2;?></span>
                                                    <span class="name">Skor 2</span>
                                                </div>
                                            </a>
                                            <!-- /.dashboard-stat-2 -->
                                        </div>
                                        <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <a class="dashboard-stat-2" style="background:#27ae5f; color:#fff;"href="#">
                                                <div class="stat-content">
                                                    <span class="number counter">5,551</span>
                                                    <span class="name">Bank Credits</span>
                                                </div>
                                            </a>
                                            <!-- /.dashboard-stat-2 -->
                                        </div>
                                        <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <a class="dashboard-stat-2" style="background:#27ae5f; color:#fff;" href="#">
                                                <div class="stat-content">
                                                    <span class="number counter">16,710</span>
                                                    <span class="name">Bank Credits</span>
                                                </div>
                                            </a>
                                            <!-- /.dashboard-stat-2 -->
                                        </div>
                                        <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    </div>

                                    <div class="row" style="margin-top:20px;">
                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <?php 
                                            if($result->total <= 60 ){
                                            ?>
                                                <a class="dashboard-stat-2 bg-danger" style="background:#e84b3b;"href="#">
                                                    <div class="stat-content">
                                                        <span class="number counter"><?php echo substr($result->total,0,2);?></span>
                                                        <span class="name">Total Skor</span>
                                                    </div>
                                                </a>
                                                
                                            <?php 
                                            }else{
                                            ?>   
                                                <a class="dashboard-stat-2 bg-black" href="#">
                                                    <div class="stat-content">
                                                        <span class="number counter"><?php echo substr($result->total,0,2);?></span>
                                                        <span class="name">Total Skor</span>
                                                    </div>
                                                </a>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    </div>
                                    <!-- /.row -->
                                    <br/>
                                    <div class="tab-content bg-white p-15">
                                		<div role="tabpanel" class="tab-pane active" id="home2">
                                        Catatan : 
                                        <br/><br/>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                		</div>
                                </div>
                                <!-- /.col-md-9 -->
                            </div>

                            <?php 
                                }
                            ?>
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