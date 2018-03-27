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
                                    <h2 class="title">Tabel Users</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
                                      <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                      <li class="active">Administrator</li>
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
                                                    <h5>Administrator </h5>
                                                    <a href="<?php echo base_url()?>addAdmin"><button type="button" class="btn btn-primary btn-xs btn-labeled">Add Admin <i class="fa fa-plus"></i></button></a>
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">
                                                <table id="example" class="display table-responsive table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="3%">No</th>
                                                            <th>Name</th>
                                                            <th>Username</th>
                                                            <th width="3%">Action</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                        <?php
                                                            $no = 1; 
                                                            foreach ($admin as $result) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no;?></td>
                                                            <td><?php echo $result->first_name;?> <?php echo $result->last_name;?></td>
                                                            <td><?php echo $result->username;?></td>
                                                            <?php 
                                                              $admin_id = $this->session->userdata('admin_id');
                                                              $query = $this->db->query("SELECT * FROM admin WHERE admin_id = '$admin_id'");
                                                              $row = $query->row();
                                                              if($row->admin_id == $result->admin_id){
                                                                echo "<td> </td>";
                                                              }else
                                                              {
                                                                ?>
                                                                  <td>
                                                                    <center>
                                                                      <a onclick="javascript:return confirm('Delete ?')" href="<?php echo base_url();?>deleteAdmin/<?php echo $result->admin_id;?>"><button type="button" class="btn btn-danger btn-xs btn-labeled"><i class="fa fa-remove"></i></button></a>
                                                                    </center>
                                                                  </td>
                                                                <?php 
                                                              }
                                                            ?>
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