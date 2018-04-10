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
                                    <h2 class="title">Scores</h2>
                                    <p class="sub-title">One stop solution for perfect admin dashboard!</p>
                                </div>
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
                                        <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="<?php echo base_url();?>scores">Scores</li></a>
                                        <li class="active">Edit Scores</li>
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
                                                    <h5>Edit Your Scores</small></h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                              <?php foreach($scores as $result){?>
                                                <form method="POST" action="<?php echo base_url()?>updateScores/<?php echo $result->score_id;?>" class="form-horizontal" enctype="multipart/form-data">
                                                <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-2 control-label">User</label>
                                                            <div class="col-sm-10">
                                                                <select name="users" class="form-control" required="ON">
                                                                    <option value="<?php echo $result->id;?>"><?php echo ucfirst($result->first_name);?> <?php echo ucfirst($result->last_name);?></option>
                                                                    <?php 
                                                                        foreach($users as $results){    
                                                                    ?>
                                                                    <option value="<?php echo $results->id;?>"><?php echo ucfirst($results->first_name);?> <?php echo ucfirst($results->last_name);?></option>
                                                                        <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>   
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-2 control-label">Nilai Akademik</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="akademik" class="form-control" id="akademik" placeholder="Nilai Akademik" value="<?php echo $result->academic_score;?>"/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-2 control-label">Nilai Kepribadian</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="kepribadian" class="form-control" id="kepribadian" placeholder="Nilai Kepribadian" value="<?php echo $result->personality_score;?>"/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-2 control-label">Nilai Kesehatan Jasmani</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="kesehatan" class="form-control" id="kesehatan" placeholder="Nilai Kesehatan" value="<?php echo $result->health_score;?>"/>
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
