<?php include "style/styleDashboard.php";?>
    <body class="top-navbar-fixed">
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
                                    <h2 class="title">Documents</h2>
                                </div>
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
            							              <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="<?php echo base_url();?>documents">Documents</li></a>
                                        <li class="active">Edit Documents</li>
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
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Edit Your Documents</small></h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                              <?php 
                                                foreach($documents as $result){
                                              ?>
                                                <form method="POST" action="<?php echo base_url()?>update_documents/<?php echo $result->document_id; ?>" class="form-horizontal" enctype="multipart/form-data">
                                                  <?php 
                                                    if($result->document_type == "standar-kompetensi"){
                                                    ?>
            
                                                      <div class="form-group">
                                                        <label for="text1" class="col-sm-2 control-label">File</label>
                                                        <div class="col-sm-10">
                                                          <input id="file" type="file" class="validate" name="file" >
                                                        </div>
                                                      </div>
                                                      
                                                      <div class="form-group">
                                                        <label for="text1" class="col-sm-2 control-label">Tipe</label>
                                                        <div class="col-sm-10">
                                                          <select name="tipe" class="form-control">
                                                            <option value="<?php echo $result->document_type;?>">Standar Kompetensi</option>
                                                          </select>
                                                        </div>
                                                      </div>
                                                    <?php 
                                                    }else if($result->document_type == "data-serdik"){
                                                    ?> 
                                                       
                                                      <div class="form-group">
                                                        <label for="text1" class="col-sm-2 control-label">Title</label>
                                                        <div class="col-sm-10">
                                                          <input type="text" name="title" class="form-control" id="title" placeholder="Input type title" value="<?php echo $result->document_title;?>" required="ON">
                                                        </div>
                                                      </div>
            
                                                      <div class="form-group">
                                                        <label for="text1" class="col-sm-2 control-label">File</label>
                                                        <div class="col-sm-10">
                                                          <input id="file" type="file" class="validate" name="file" >
                                                        </div>
                                                      </div>
                                                      
                                                      <div class="form-group">
                                                        <label for="text1" class="col-sm-2 control-label">Tipe</label>
                                                        <div class="col-sm-10">
                                                          <select name="tipe" class="form-control">
                                                            <option value="<?php echo $result->document_type;?>">Data Serdik</option>
                                                            <option value="handbook">Handbook</option>
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    <?php 
                                                    }else{
                                                    ?>
                                                       
                                                      <div class="form-group">
                                                        <label for="text1" class="col-sm-2 control-label">Title</label>
                                                        <div class="col-sm-10">
                                                          <input type="text" name="title" class="form-control" id="title" placeholder="Input type title" value="<?php echo $result->document_title;?>" required="ON">
                                                        </div>
                                                      </div>
            
                                                      <div class="form-group">
                                                        <label for="text1" class="col-sm-2 control-label">File</label>
                                                        <div class="col-sm-10">
                                                          <input id="file" type="file" class="validate" name="file" >
                                                        </div>
                                                      </div>
                                                      
                                                      <div class="form-group">
                                                        <label for="text1" class="col-sm-2 control-label">Tipe</label>
                                                        <div class="col-sm-10">
                                                          <select name="tipe" class="form-control">
                                                            <option value="<?php echo $result->document_type;?>">Handbook</option>
                                                            <option value="data-serdik">Data Serdik</option>
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    <?php 
                                                    }
                                                  ?>
                                                	<div class="form-group">
                                                		<div class="col-sm-offset-2 col-sm-10">
                                                			<button type="submit" class="btn btn-primary">Submit</button>
                                                		</div>
                                                	</div>
                                                </form>
                                              <?php
                                                }
                                              ?>  
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
<?php include "style/javascriptDashboard.php";?>
