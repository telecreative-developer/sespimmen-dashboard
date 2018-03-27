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
                                                                    <option value="<?php echo $result->id;?>"><?php echo $result->first_name;?> <?php echo $result->last_name;?></option>
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
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-4 control-label" span style="color:#126538;">Narasumber 1</label>
                                                            <hr/>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-4 control-label">Narasumber</label>
                                                            <div class="col-sm-8">
                                                                <select name="narasumber1" class="form-control">
                                                                    <?php 
                                                                        $getnarasumber = $result->interviewee_nr1_id;
                                                                        $query = $this->db->query("SELECT * FROM interviewees WHERE interviewee_id ='$getnarasumber'");
                                                                        foreach ($query->result_array() as $getrow)
                                                                        {
                                                                        ?>    
                                                                            <option value="<?php echo $getrow['interviewee_id'];?>"><?php echo $getrow['full_name'];?></option>
                                                                        <?php 
                                                                        }
                                                                    ?>
                                                                    
                                                                    <?php 
                                                                        $fetchnarasumber1 = $result->interviewee_nr1_id;
                                                                        $query = $this->db->query("SELECT * FROM interviewees WHERE interviewee_id !='$fetchnarasumber1'");
                                                                        foreach ($query->result_array() as $row)
                                                                        {
                                                                        ?>    
                                                                            <option value="<?php echo $row['interviewee_id'];?>"><?php echo $row['full_name'];?></option>
                                                                        <?php 
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-4 control-label">Penulisan Bobot 1</label>
                                                            <div class="col-sm-8">
                                                                <input type="number" name="bobot_1_nr1" class="form-control" id="kode_naskah" placeholder="Penulisan Bobot 1" value="<?php echo $result->penulisan_bobot_1_nr1;?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-4 control-label">Penulisan Bobot 5</label>
                                                            <div class="col-sm-8">
                                                                <input type="number" name="bobot_5_nr1" class="form-control" id="kode_naskah" placeholder="Penulisan Bobot 5" value="<?php echo $result->pembahasan_bobot_5_nr1;?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-4 control-label">Kegunaan & Manfaat Bobot 3</label>
                                                            <div class="col-sm-8">
                                                                <input type="number" name="manfaat_bobot_3_nr1" class="form-control" id="kode_naskah" placeholder="Kegunaan & Manfaat Bobot 3" value="<?php echo $result->manfaat_bobot_3_nr1;?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-4 control-label">Teknisi Penulisan Bobot 3</label>
                                                            <div class="col-sm-8">
                                                                <input type="number" name="teknisi_bobot_3_nr1" class="form-control" id="kode_naskah" placeholder="Teknisi Penulisan Bobot 3" value="<?php echo $result->teknisi_bobot_3_nr1;?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php 
                                                        if($result->status == '0'){
                                                        ?>   
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="text1" class="col-sm-4 control-label" span style="color:#126538;">Narasumber 2</label>
                                                                    <hr/>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="text1" class="col-sm-4 control-label">Narasumber</label>
                                                                    <div class="col-sm-8">
                                                                        <select name="narasumber2" class="form-control">
                                                                        <?php 
                                                                                $getnarasumber2 = $result->interviewee_nr2_id;
                                                                                $query2 = $this->db->query("SELECT * FROM interviewees WHERE interviewee_id ='$getnarasumber2'");
                                                                                foreach ($query2->result_array() as $getrow2)
                                                                                {
                                                                                ?>    
                                                                                    <option value="<?php echo $getrow2['interviewee_id'];?>"><?php echo $getrow2['full_name'];?></option>
                                                                                <?php 
                                                                                }
                                                                            ?>
                                                                            
                                                                            <?php 
                                                                                $fetchnarasumber2 = $result->interviewee_nr2_id;
                                                                                $query2 = $this->db->query("SELECT * FROM interviewees WHERE interviewee_id !='$fetchnarasumber2'");
                                                                                foreach ($query2->result_array() as $row2)
                                                                                {
                                                                                ?>    
                                                                                    <option value="<?php echo $row2['interviewee_id'];?>"><?php echo $row2['full_name'];?></option>
                                                                                <?php 
                                                                                }
                                                                            ?>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label for="text1" class="col-sm-4 control-label">Penulisan Bobot 1</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="number" name="bobot_1_nr2" class="form-control" id="kode_naskah" placeholder="Penulisan Bobot 1" value="<?php echo $result->penulisan_bobot_1_nr2;?>">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="text1" class="col-sm-4 control-label">Penulisan Bobot 5</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="number" name="bobot_5_nr2" class="form-control" id="kode_naskah" placeholder="Penulisan Bobot 5" value="<?php echo $result->pembahasan_bobot_5_nr2;?>">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="text1" class="col-sm-4 control-label">Kegunaan & Manfaat Bobot 3</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="number" name="manfaat_bobot_3_nr2" class="form-control" id="kode_naskah" placeholder="Kegunaan & Manfaat Bobot 3" value="<?php echo $result->manfaat_bobot_3_nr2;?>">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="text1" class="col-sm-4 control-label">Teknisi Penulisan Bobot 3</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="number" name="teknisi_bobot_3_nr2" class="form-control" id="kode_naskah" placeholder="Teknisi Penulisan Bobot 3" value="<?php echo $result->teknisi_bobot_3_nr2;?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php 
                                                        }else{
                                                        ?>
                                                            Klik disini apabila 2 penguji: <input type="checkbox" checked ng-model="all"><br> 
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="text1" class="col-sm-4 control-label" span style="color:#126538;" ng-disabled="!all">Narasumber 2</label>
                                                                    <hr/>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="text1" class="col-sm-4 control-label">Narasumber</label>
                                                                    <div class="col-sm-8">
                                                                        <select name="narasumber2" class="form-control" ng-disabled="!all" required="ON">
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
                                                                        <input type="number" name="bobot_1_nr2" class="form-control" id="kode_naskah" placeholder="Penulisan Bobot 1" ng-disabled="!all">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="text1" class="col-sm-4 control-label">Penulisan Bobot 5</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="number" name="bobot_5_nr2" class="form-control" id="kode_naskah" placeholder="Penulisan Bobot 5" ng-disabled="!all">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="text1" class="col-sm-4 control-label">Kegunaan & Manfaat Bobot 3</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="number" name="manfaat_bobot_3_nr2" class="form-control" id="kode_naskah" placeholder="Kegunaan & Manfaat Bobot 3" ng-disabled="!all">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="text1" class="col-sm-4 control-label">Teknisi Penulisan Bobot 3</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="number" name="teknisi_bobot_3_nr2" class="form-control" id="kode_naskah" placeholder="Teknisi Penulisan Bobot 3" ng-disabled="!all">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <?php    
                                                        }
                                                    ?>
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="text1" class="col-sm-2 control-label">Keterangan</label>
                                                            <div class="col-sm-10">
                                                                <textarea class="form-control note-codable" name="keterangan" placeholder="Keterangan.." style="height: 120px;"><?php echo $result->ket;?></textarea>
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
