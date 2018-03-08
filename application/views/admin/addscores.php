<?php include"style/styleDashboard.php";?>
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
                                        <li class="active">Add Scores</li>
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
                                                    <h5>Input Your Scores</small></h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">

                                                <form method="POST" action="<?php echo base_url()?>insertscores" class="form-horizontal">
                                                  
                                                  <div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Score1</label>
                                                		<div class="col-sm-10">
                                                			<input type="number" name="score" class="form-control" id="score1" placeholder="Score 1" required="ON" maxlength="2">
                                                		</div>
                                                  </div>
                                                  
                                                  <div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Score2</label>
                                                		<div class="col-sm-10">
                                                			<input type="number" name="score2" class="form-control" id="score2" placeholder="Score 2" required="ON" maxlength="2">
                                                		</div>
                                                  </div>
                                                  
                                                  <div class="form-group">
                                                    <label for="text1" class="col-sm-2 control-label">User</label>
                                                		<div class="col-sm-10">
                                                      <select name="users" class="form-control" required="ON">
                                                        <option value="">Default Select</option>
                                                        <?php 
                                                          foreach($users as $results){
                                                          
                                                          ?>
                                                          
                                                          <option value="<?php echo $results->id;?>"><?php echo $results->name;?></option>
                                                          
                                                          <?php
                                                            }
                                                          ?>
                                                      </select>
                                                    </div>
                                                  </div>

                                                	<div class="form-group">
                                                		<div class="col-sm-offset-2 col-sm-10">
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
