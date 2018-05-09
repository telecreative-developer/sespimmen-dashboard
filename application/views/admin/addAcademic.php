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
                                    <h2 class="title">Nilai Akademik</h2>
                                </div>
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
                                        <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="<?php echo base_url();?>academic">Academic</li></a>
                                        <li class="active">Add Academic</li>
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

                                                <form method="POST" action="<?php echo base_url()?>insertacademic" class="form-horizontal" enctype="multipart/form-data">
                                                   
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-2 control-label">Title</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="title" class="form-control" id="title" placeholder="Title" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                      <div class="form-group">
                                                          <label for="text1" class="col-sm-2 control-label">Tipe</label>
                                                          <div class="col-sm-10">
                                                            <select name="tipe" class="form-control">
                                                              <?php 
                                                                foreach($academic_categories as $result){
                                                              ?>
                                                                <option value="<?php echo $result->academic_category_id;?>"><?php echo $result->academic_title;?></option>
                                                              <?php } ?>
                                                            </select>
                                                          </div>
                                                      </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-2 control-label">File</label>
                                                            <div class="col-sm-10">
                                                                <input type="file" name="akademik_file" class="form-control" id="file" placeholder="file" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                	<div class="form-group">
                                                		<div class="col-sm-offset-2 col-sm-8">
                                                			<button type="submit" class="btn btn-primary">Submit</button>
                                                		</div>
                                                	</div>
                                                </form>  
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
