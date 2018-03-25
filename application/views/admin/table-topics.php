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
                                    <h2 class="title">Tabel Topic</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
                                      <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                      <li class="active">Topic</li>
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
                                                    <h5>Topic</h5>
                                                    <?php 
                                                    $query = $this->db->query("SELECT * FROM topics");
                                                    $buttonDisable = $query->num_rows();
                                                
                                                        if($buttonDisable == 0){
                                                        ?>
                                                            <a href="<?php echo base_url()?>insertTopics"><button type="button" class="btn btn-primary btn-xs btn-labeled">Random Topic <i class="fa fa-plus"></i></button></a>
                                                            <button type="button" class="btn btn-default btn-xs btn-labeled" disabled>Hapus Topic <i class="fa fa-minus"></i></button>
                                                        <?php
                                                        }else{
                                                            echo "<button type='button' class='btn btn-default btn-xs btn-labeled' disabled>Random Topic <i class='fa fa-plus'></i></button>";
                                                        ?>
                                                            <a href="<?php echo base_url()?>deleteTopics/all" onclick="javascript:return confirm('Are you sure want to delete ?')" ><button type="button" class="btn btn-danger btn-xs btn-labeled">Hapus Topic <i class="fa fa-minus"></i></button></a>
                                                        <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">

                                                <table id="example" class="display table-responsive table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="3%">No</th>
                                                            <th>No Serdik</th>
                                                            <th>Nama</th>
                                                            <th>Topic</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                        <?php
                                                            $no = 1; 
                                                            foreach ($topics as $result) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no;?></td>
                                                            <td><?php echo $result->no_serdik;?></td>
                                                            <td><?php echo $result->first_name;?> <?php echo $result->last_name;?></td>
                                                            <td>Topic <?php echo $result->topic;?></td>
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