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
                                      <li class="active">Users</li>
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
                                                    <h5>Users </h5>
                                                    <a href="<?php echo base_url()?>addusers"><button type="button" class="btn btn-primary btn-xs btn-labeled">Add Users <i class="fa fa-plus"></i></button></a>
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">
                                                <table id="example" class="display table-responsive table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="3%">No</th>
                                                            <th>Nomor Serdik</th>
                                                            <th>NRP</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Angkatan</th>
                                                            <th>Verify</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                        <?php
                                                            $no = 1; 
                                                            foreach ($users as $result) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no;?></td>
                                                            <td><?php echo $result->no_serdik;?></td>
                                                            <td><?php echo $result->nrp;?></td>
                                                            <td><?php echo ucfirst($result->first_name);?> <?php echo ucfirst($result->last_name);?></td>
                                                            <td><?php echo $result->email;?></td>
                                                            <td><?php echo $result->phone;?></td>
                                                            <td><?php echo $result->force_of;?></td>
                                                            <td>
                                                                <?php 
                                                                    if($result->verified == '0'){
                                                                    ?>
                                                                        <button type="button" class="btn btn-danger btn-xs btn-labeled">Belum Terverifikasi</button>
                                                                    <?php 
                                                                    }else{
                                                                    ?>
                                                                        <button type="button" class="btn btn-success btn-xs btn-labeled">Sudah Terverifikasi</button>  
                                                                    <?php
                                                                    }
                                                                ?>
                                                            </td>
                                                                
                                                            <td>
                                                                <?php 
                                                                    if($result->verified == '0'){
                                                                ?>
                                                                
                                                                    <a onclick="javascript:return confirm('Verifikasi ?')" href="<?php echo base_url();?>verifyUsers/<?php echo $result->id;?>"><button type="button" class="btn btn-success btn-xs btn-labeled"><i class="fa fa-check"></i></button></a>
                                                                
                                                                <?php 
                                                                    }else{
                                                                        
                                                                    }
                                                                ?>
                                                                <a onclick="javascript:return confirm('Delete ?')" href="<?php echo base_url();?>deleteUsers/<?php echo $result->id;?>"><button type="button" class="btn btn-danger btn-xs btn-labeled"><i class="fa fa-remove"></i></button></a>
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