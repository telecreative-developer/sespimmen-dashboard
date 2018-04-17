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
                                    <h2 class="title">Tabel Ujian</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
                                      <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                      <li class="active">Ujian</li>
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
                                                    <h5>Ujian</h5>
                                                    <!-- <?php 
                                                    $query = $this->db->query("SELECT * FROM pok_uji");
                                                    $buttonDisable = $query->num_rows();
                                                
                                                        if($buttonDisable == 0){
                                                        ?>
                                                            <a href="<?php echo base_url()?>insertPok_uji"><button type="button" class="btn btn-primary btn-xs btn-labeled">Random Pok Uji <i class="fa fa-plus"></i></button></a>
                                                            <button type="button" class="btn btn-default btn-xs btn-labeled" disabled>Delete Pok Uji <i class="fa fa-minus"></i></button>
                                                        <?php
                                                        }else{
                                                            echo "<button type='button' class='btn btn-default btn-xs btn-labeled' disabled>Random Pok Uji <i class='fa fa-plus'></i></button>";
                                                        ?>
                                                            <a href="<?php echo base_url()?>deletePok_uji/all" onclick="javascript:return confirm('Are you sure want to delete ?')" ><button type="button" class="btn btn-danger btn-xs btn-labeled">Delete Pok Uji <i class="fa fa-minus"></i></button></a>
                                                        <?php 
                                                        }
                                                    ?> -->
                                                    <a href="<?php echo base_url()?>add_exam"><button type="button" class="btn btn-primary btn-xs btn-labeled">Add Ujian <i class="fa fa-plus"></i></button></a>
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">

                                                <table id="example" class="display table-responsive table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="3%">No</th>
                                                            <th>Title</th>
                                                            <th>File</th>
                                                            <th width="3%">Status</th>
                                                            <th width="15%">Action Publish</th>
                                                            <th width="10%">Action</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                        <?php
                                                            $no = 1; 
                                                            foreach ($pok_uji as $result) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no;?></td>
                                                            <td><?php echo $result->document_title;?></td>
                                                            <td><a href="<?php echo $result->document_url;?>" style="color:blue;"><?php echo $result->document_loc;?></a></td>
                                                            <td>
                                                                <?php
                                                                    if($result->status == "0"){
                                                                        echo "<button type='button' class='btn btn-default btn-xs btn-labeled' disabled>Belum dipublish</button>";
                                                                    }else{
                                                                        echo "<button type='button' class='btn btn-primary btn-xs btn-labeled'>Sudah dipublish</button>";
                                                                    }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                    if($result->status == "0"){
                                                                    ?>
                                                                        <a href="<?php echo base_url();?>publish_exam/<?php echo $result->pokuji_document_id;?>"><button type="button" class="btn btn-primary btn-xs btn-labeled"><i class="fa fa-check"></i> Publish</button></a>
                                                                    <?php 
                                                                    }else{
                                                                    ?>
                                                                        <a href="<?php echo base_url();?>unpublish_exam/<?php echo $result->pokuji_document_id;?>"><button type="button" class="btn btn-danger btn-xs btn-labeled"><i class="fa fa-close"></i> Batal Publish</button></a>
                                                                    <?php 
                                                                    }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo base_url();?>edit_exam/<?php echo $result->pokuji_document_id;?>"><button type="button" class="btn btn-primary btn-xs btn-labeled"><i class="fa fa-pencil"></i></button></a>
                                                                <a onclick="javascript:return confirm('Delete ?')" href="<?php echo base_url();?>delete_exam/<?php echo $result->pokuji_document_id;?>"><button type="button" class="btn btn-danger btn-xs btn-labeled"><i class="fa fa-remove"></i></button></a>
                                                            </td>
                                                        </tr>
                                                        <?php 
                                                            $no++;
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <?php 
                                                
                                                    
                                                ?>

                                                
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