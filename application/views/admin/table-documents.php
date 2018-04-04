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
                                    <h2 class="title">Tabel Documents</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
                                      <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                      <li class="active">Documents</li>
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
                                                    <h5>Documents </h5>
                                                    <a href="<?php echo base_url()?>add_documents"><button type="button" class="btn btn-primary btn-xs btn-labeled">Add Documents <i class="fa fa-plus"></i></button></a>
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">

                                                <table id="example" class="display table-responsive table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="3%">No</th>
                                                            <th width="20%">Title</th>
                                                            <th width="20%">Type</th>
                                                            <th>File</th>
                                                            <th width="3%">Action</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                        <?php
                                                            $no = 1; 
                                                            foreach ($documents as $result) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no;?></td>
                                                            <td><?php echo $result->document_title;?></td>
                                                            <td>
                                                                <?php 
                                                                    if($result->document_type == "standar-kompetensi"){
                                                                        echo "Standar Kompetensi";
                                                                    }else if($result->document_type == "data-serdik"){
                                                                        echo "Data Serdik";
                                                                    }else if($result->document_type == "handbook"){
                                                                        echo "Handbook";
                                                                    }else if($result->document_type == "info-sespimmen"){
                                                                        echo "Info Sespimmen";
                                                                    }
                                                                    else{
                                                                        echo "";
                                                                    }
                                                                ?>
                                                            </td>
                                                            <td><a href="<?php echo $result->document_url;?>"><i class="fa fa-file-pdf-o"></i> <?php echo substr($result->document_loc,10);?></a> </td>
                                                            <td>
                                                                <?php 
                                                                    if($result->document_type == 'standar-kompetensi'){
                                                                ?>
                                                                    <a href="<?php echo base_url();?>edit_documents/<?php echo $result->document_id;?>"><button type="button" class="btn btn-primary btn-xs btn-labeled"><i class="fa fa-pencil"></i></button></a>
                                                                <?php 
                                                                    }else if($result->document_type == 'info-sespimmen'){
                                                                ?>
                                                                    <a href="<?php echo base_url();?>edit_documents/<?php echo $result->document_id;?>"><button type="button" class="btn btn-primary btn-xs btn-labeled"><i class="fa fa-pencil"></i></button></a>
                                                                <?php
                                                                    }
                                                                    else{
                                                                ?>
                                                                    <a href="<?php echo base_url();?>edit_documents/<?php echo $result->document_id;?>"><button type="button" class="btn btn-primary btn-xs btn-labeled"><i class="fa fa-pencil"></i></button></a>
                                                                    <a onclick="javascript:return confirm('Delete ?')" href="<?php echo base_url();?>delete_documents/<?php echo $result->document_id;?>"><button type="button" class="btn btn-danger btn-xs btn-labeled"><i class="fa fa-remove"></i></button></a>
                                                                <?php 
                                                                    }
                                                                ?>
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
