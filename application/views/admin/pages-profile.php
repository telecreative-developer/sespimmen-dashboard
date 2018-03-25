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

                                                        <tr>
                                                            <th width="0%">NAK <span style="float:right;"> : </span> </th>
                                                            <td width="60%">
                                                                <?php 
                                                                    if($result->status == '0'){
                                                                    ?>
                                                                        <p style="word-break:break-all; margin-bottom:0px; color:#28af5f; font-weight:bold;">
                                                                            <?php 
                                                                                $x = $result->nilai_murni_narasumber_1_nr1;
                                                                                $y = $result->nilai_murni_narasumber_1_nr2;
                                                                                $z = ($x + $y) / 2;
                                                                                echo $z;
                                                                            ?>
                                                                        </p>

                                                                    <?php
                                                                    }else{
                                                                    ?>
                                                                        <p style="word-break:break-all; margin-bottom:0px; color:#28af5f; font-weight:bold;">
                                                                            <?php 
                                                                                echo $result->nilai_murni_narasumber_1_nr1;
                                                                            ?>
                                                                        </p>
                                                                    <?php
                                                                    }
                                                                ?>
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
                                <p> Penilaian Narasumber 1 <br/> <?php echo $result->full_name;?></p>
                                    <div class="row mb-30">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <a class="dashboard-stat-2" style="background:#27ae5f; color:#fff;" href="#">
                                                <div class="stat-content">
                                                    <span class="number counter"><?php echo $result->penulisan_bobot_1_nr1;?></span>
                                                    <span class="name">Penulisan Bobot 1 <br/>
                                                </div>
                                            </a>
                                            <!-- /.dashboard-stat-2 -->
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <a class="dashboard-stat-2" style="background:#27ae5f; color:#fff;" href="#">
                                                <div class="stat-content">
                                                    <span class="number counter"><?php echo $result->pembahasan_bobot_5_nr1;?></span>
                                                    <span class="name">Penulisan Bobot 5 <br/>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <a class="dashboard-stat-2" style="background:#27ae5f; color:#fff;" href="#">
                                                <div class="stat-content">
                                                    <span class="number counter"><?php echo $result->manfaat_bobot_3_nr1;?></span>
                                                    <span class="name">Manfaat Bobot 3 <br/>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <a class="dashboard-stat-2" style="background:#27ae5f; color:#fff;"href="#">
                                                <div class="stat-content">
                                                    <span class="number counter"><?php echo $result->teknisi_bobot_3_nr1;?></span>
                                                    <span class="name">Teknisi Bobot 5 <br/>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <a class="dashboard-stat-2" style="background:#27ae5f; color:#fff;" href="#">
                                                <div class="stat-content">
                                                    <span class="number counter"><?php echo $result->manfaat_bobot_3_nr1;?></span>
                                                    <span class="name">Nilai Murni <br/>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <?php 
                                    if($result->status == "0"){
                                    ?>
                                        <div class="col-md-7">
                                            <br/>
                                            <p> Penilaian Narasumber 2 <br/> 
                                                <?php 
                                                $narasumber2 = $result->interviewee_nr2_id;
                                                $query = $this->db->query("SELECT * FROM interviewees WHERE interviewee_id ='$narasumber2'");
                                                foreach ($query->result_array() as $row)
                                                {
                                                    echo $row['full_name'];
                                                }
                                                ?>
                                            </p>
                                            <div class="row mb-30">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <a class="dashboard-stat-2" style="background:#675c5a; color:#fff;" href="#">
                                                        <div class="stat-content">
                                                            <span class="number counter"><?php echo $result->penulisan_bobot_1_nr2;?></span>
                                                            <span class="name">Penulisan Bobot 1 <br/>
                                                        </div>
                                                    </a>
                                                    <!-- /.dashboard-stat-2 -->
                                                </div>
                                                <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <a class="dashboard-stat-2" style="background:#675c5a; color:#fff;" href="#">
                                                        <div class="stat-content">
                                                            <span class="number counter"><?php echo $result->pembahasan_bobot_5_nr2;?></span>
                                                            <span class="name">Penulisan Bobot 5 <br/>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <a class="dashboard-stat-2" style="background:#675c5a; color:#fff;" href="#">
                                                        <div class="stat-content">
                                                            <span class="number counter"><?php echo $result->manfaat_bobot_3_nr2;?></span>
                                                            <span class="name">Manfaat Bobot 3 <br/>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <a class="dashboard-stat-2" style="background:#675c5a; color:#fff;"href="#">
                                                        <div class="stat-content">
                                                            <span class="number counter"><?php echo $result->teknisi_bobot_3_nr2;?></span>
                                                            <span class="name">Teknisi Bobot 5 <br/>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <a class="dashboard-stat-2" style="background:#675c5a; color:#fff;" href="#">
                                                        <div class="stat-content">
                                                            <span class="number counter"><?php echo $result->manfaat_bobot_3_nr2;?></span>
                                                            <span class="name">Nilai Murni <br/>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <br/>
                                        </div>
                                    <?php
                                    }else{
                                    ?>  
                                        <div class="col-md-7">
                                            <br/>
                                            <p span style="color:#d9534f;"> **) Hanya Diuji Oleh 1 Orang</p> 
                                        </div>
                                    <?php
                                    }
                                ?>
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