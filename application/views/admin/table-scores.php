<?php include "style/styleTable.php"?>
<style>
@media print {
    .header, .hide { visibility: hidden }
}
</style>
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
                                                    <!-- <button type="button" class="btn btn-default btn-xs btn-labeled" onclick="javascript:printDiv('printablediv')">Print Screen <i class="fa fa-print"></i></button> -->
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">
                                                <table id="example" class="display table-responsive table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%;">No</th>
                                                            <th>Title</th>
                                                            <th>Akademik</th>
                                                            <th>Kepribadian</th>
                                                            <th>Kesehatan</th>
                                                            <th width="3%">Status</th>
                                                            <th width="15%">Action Publish</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                        <?php
                                                            $no = 1; 
                                                            foreach ($scores as $result) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no;?></td>
                                                            <td><?php echo $result->title;?></a></td>                                                           
                                                            <td><a span style="color:blue;" href="<?php echo $result->akademik_url;?>"><?php echo $result->akademik_loc;?></a></td>      
                                                            <td><a span style="color:blue;" href="<?php echo $result->kepribadian_url;?>"><?php echo $result->kepribadian_loc;?></a></td>   
                                                            <td><a span style="color:blue;" href="<?php echo $result->kesehatan_url;?>"><?php echo $result->kesehatan_loc;?></a></td>   
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
                                                                        <a href="<?php echo base_url();?>publish_scores/<?php echo $result->score_id;?>"><button type="button" class="btn btn-primary btn-xs btn-labeled"><i class="fa fa-check"></i> Publish</button></a>
                                                                    <?php 
                                                                    }else{
                                                                    ?>
                                                                        <a href="<?php echo base_url();?>unpublish_scores/<?php echo $result->score_id;?>"><button type="button" class="btn btn-danger btn-xs btn-labeled"><i class="fa fa-close"></i> Batal Publish</button></a>
                                                                    <?php 
                                                                    }
                                                                ?>
                                                            </td>
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

<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = 
            "<html><head><title></title></head><body>" + 
            divElements + "</body>";

        //Print Page
        window.print();

        //Restore orignal HTML
        document.body.innerHTML = oldPage;
    }
</script>
