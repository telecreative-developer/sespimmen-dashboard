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
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-2 control-label">User</label>
                                                            <div class="col-sm-10">
                                                                <select name="users" class="form-control" required="ON">
                                                                    <option value="">Default Select</option>
                                                                    <?php 
                                                                        foreach($users as $results){    
                                                                    ?>
                                                                    <option value="<?php echo $results->id;?>"><?php echo $results->first_name;?> <?php echo $results->last_name;?></option>
                                                                        <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>   
                                                        
                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-2 control-label">Kode Naskah</label>
                                                            <div class="col-sm-10">
                                                                <input type="number" name="kode_naskah" class="form-control" id="kode_naskah" placeholder="Kode Naskah">
                                                            </div>
                                                        </div> 
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-4 control-label" span style="color:#126538;">Narasumber 1</label>
                                                            <hr/>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-4 control-label">Narasumber</label>
                                                            <div class="col-sm-8">
                                                                <select name="narasumber1" class="form-control" required="ON">
                                                                    <option value="">Default Select</option>
                                                                    <?php 
                                                                        foreach($interviewees as $fetch){    
                                                                    ?>
                                                                    <option value="<?php echo $fetch->interviewee_id;?>"><?php echo $fetch->full_name;?></option>
                                                                        <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-4 control-label">Penulisan Bobot 1</label>
                                                            <div class="col-sm-8">
                                                                <input type="number" name="bobot_1_nr1" class="form-control" id="kode_naskah" placeholder="Penulisan Bobot 1">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-4 control-label">Penulisan Bobot 5</label>
                                                            <div class="col-sm-8">
                                                                <input type="number" name="bobot_5_nr1" class="form-control" id="kode_naskah" placeholder="Penulisan Bobot 5">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-4 control-label">Kegunaan & Manfaat Bobot 3</label>
                                                            <div class="col-sm-8">
                                                                <input type="number" name="manfaat_bobot_3_nr1" class="form-control" id="kode_naskah" placeholder="Kegunaan & Manfaat Bobot 3">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-4 control-label">Teknisi Penulisan Bobot 3</label>
                                                            <div class="col-sm-8">
                                                                <input type="number" name="teknisi_bobot_3_nr1" class="form-control" id="kode_naskah" placeholder="Teknisi Penulisan Bobot 3">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                        
                                                    Klik disini apabila hanya 1 penguji: <input type="checkbox" ng-model="all"><br>                                                    
                                                    
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-4 control-label" span style="color:#126538;" ng-disabled="all">Narasumber 2</label>
                                                            <hr/>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-4 control-label">Narasumber</label>
                                                            <div class="col-sm-8">
                                                                <select name="narasumber2" class="form-control" ng-disabled="all" required="ON">
                                                                    <option value="">Default Select</option>
                                                                    <?php 
                                                                        foreach($interviewees as $fetch){    
                                                                    ?>
                                                                    <option value="<?php echo $fetch->interviewee_id;?>"><?php echo $fetch->full_name;?></option>
                                                                        <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-4 control-label">Penulisan Bobot 1</label>
                                                            <div class="col-sm-8">
                                                                <input type="number" name="bobot_1_nr2" class="form-control" id="kode_naskah" placeholder="Penulisan Bobot 1" ng-disabled="all">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-4 control-label">Penulisan Bobot 5</label>
                                                            <div class="col-sm-8">
                                                                <input type="number" name="bobot_5_nr2" class="form-control" id="kode_naskah" placeholder="Penulisan Bobot 5" ng-disabled="all">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-4 control-label">Kegunaan & Manfaat Bobot 3</label>
                                                            <div class="col-sm-8">
                                                                <input type="number" name="manfaat_bobot_3_nr2" class="form-control" id="kode_naskah" placeholder="Kegunaan & Manfaat Bobot 3" ng-disabled="all">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-4 control-label">Teknisi Penulisan Bobot 3</label>
                                                            <div class="col-sm-8">
                                                                <input type="number" name="teknisi_bobot_3_nr2" class="form-control" id="kode_naskah" placeholder="Teknisi Penulisan Bobot 3" ng-disabled="all">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-2 control-label">Keterangan</label>
                                                            <div class="col-sm-10">
                                                                <textarea class="form-control note-codable" name="keterangan" placeholder="Keterangan.." style="height: 120px;"></textarea>
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
