<?php include "style/styleDashboard.php";?>
    <body class="top-navbar-fixed" ng-app="">
        <div class="main-wrapper">

            <nav class="navbar top-navbar bg-white box-shadow">
            	<div class="container-fluid">
                    <div class="row">
                        <?php include "partial/header.php";?>
                    </div>  
            	</div>  
            </nav>

            <div class="content-wrapper">
                <div class="content-container">

                    <div class="left-sidebar bg-primary box-shadow ">
                        <div class="sidebar-content">
                            <?php include "partial/navigation.php" ?>
                        </div>  
                    </div>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-12">
                                    <h2 class="title">Nilai Kegiatan Khusus</h2>
                                </div>
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
                                        <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="<?php echo base_url();?>kegiatan_khusus">Activities</li></a>
                                        <li class="active">Edit Activities</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                          <div class="panel-heading"></div>
                                            <div class="panel-body">
                                                <?php foreach($kegiatan as $result){?>
                                                    <form method="POST" action="<?php echo base_url()?>update_kegiatan_khusus/<?php echo $result->activities_id;?>" class="form-horizontal" enctype="multipart/form-data">
                                                       
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="text1" class="col-sm-2 control-label">Title</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="<?php echo $result->title;?>" />
                                                                </div>
                                                            </div>
                                                        </div> 

                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="text1" class="col-sm-2 control-label">Kegiatan Khusus</label>
                                                                <div class="col-sm-10">
                                                                    <input type="file" name="file" class="form-control" id="file" placeholder="file" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-sm-offset-2 col-sm-8">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>  
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="col md-4">
                                    </div>
                                </div>  
                            </div>  
                        </section>  
                    </div>  
                </div>  
            </div>  

        </div>
<?php include"style/javascriptDashboard.php";?>
