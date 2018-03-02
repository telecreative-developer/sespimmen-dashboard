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
                                    <h2 class="title">Events</h2>
                                    <p class="sub-title">One stop solution for perfect admin dashboard!</p>
                                </div>
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
            							<li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="<?php echo base_url();?>events">Events</li></a>
                                        <li class="active">Add Events</li>
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
                                                    <h5>Input Your Event</small></h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">

                                                <form method="POST" action="<?php echo base_url()?>insertEvents" class="form-horizontal">
                                                	<div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Titile</label>
                                                		<div class="col-sm-10">
                                                			<input type="text" name="title" class="form-control" id="title" placeholder="Input type title" required="ON">
                                                		</div>
                                                	</div>
                                                    <div class="form-group">
                                                        <label for="text1" class="col-sm-2 control-label">Description</label>
                                                		<div class="col-sm-10">
                                                            <textarea class="form-control note-codable" name="description"  placeholder="Desc.." style="height: 300px;" required="ON"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                		<label for="date" class="col-sm-2 control-label">Date</label>
                                                		<div class="col-sm-10">
                                                			<input type="date" name="date"  class="form-control" id="date" required="ON">
                                                		</div>
                                                    </div>
                                                    <div class="form-group">
                                                		<label for="time" class="col-sm-2 control-label">Time</label>
                                                		<div class="col-sm-10">
                                                			<input type="time" name="time" class="form-control" id="time" required="ON">
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
