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
                                    <h2 class="title">Tabel Nilai</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
                                      <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                      <li class="active">Scores</li>
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
                                                    <h5>Scores </h5>
                                                    <a href="<?php echo base_url()?>addscores"><button type="button" class="btn btn-primary btn-xs btn-labeled">Data Nilai <i class="fa fa-plus"></i></button></a>
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">

                                                <table id="example" class="display table-responsive table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Nilai Akademik </th>
                                                            <th>Nilai Kepribadian </th>
                                                            <th>Nilai Kesehatan Jasmani </th>
                                                            <th width="3%">Action</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                        <?php
                                                            $no = 1; 
                                                            foreach ($scores as $result) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no;?></td>
                                                            <td><a href="pagesprofile/<?php echo $result->no_serdik?>" span style="color:blue;"><?php echo ucfirst($result->first_name);?> <?php echo ucfirst($result->last_name);?></a></td>                                                           
                                                            <td><?php echo $result->academic_score;?></a></td>                                                           
                                                            <td><?php echo $result->personality_score;?></a></td>   
                                                            <td><?php echo $result->health_score;?></a></td>   
                                                            <td>
                                                                <a href="<?php echo base_url();?>editscores/<?php echo $result->score_id;?>"><button type="button" class="btn btn-primary btn-xs btn-labeled"><i class="fa fa-pencil"></i></button></a>
                                                                <a onclick="javascript:return confirm('Delete ?')" href="<?php echo base_url();?>deleteScores/<?php echo $result->score_id;?>"><button type="button" class="btn btn-danger btn-xs btn-labeled"><i class="fa fa-remove"></i></button></a>
                                                            </td>
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