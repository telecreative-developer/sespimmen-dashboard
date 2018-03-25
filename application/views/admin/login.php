<?php 
    include "style/styleLogin.php";
?>
    <body class="">
        <div class="main-wrapper">
            <div class="login-bg-color">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel login-box">
                            <div class="panel-heading">
                                <div class="panel-title text-center">
                                    <img src="<?php echo base_url();?>assets/images/logo_sispammen.jpg" width="100%"/>
                                </div>
                            </div>
                            <div class="panel-body p-20">
                                <form method="POST" action="<?php echo base_url()?>login">
                                	<div class="form-group">
                                		<label for="exampleInputEmail1">Username</label>
                                        <input type="username" name="username" class="form-control" placeholder="Username" required="ON">
                                	</div>
                                	<div class="form-group">
                                		<label for="exampleInputPassword1">Password</label>
                                		<input type="password" name="password" class="form-control" placeholder="Password" required="ON">
                                	</div>
                                    <div class="form-group mt-20">
                                        <div class="">
                                            <button type="submit" class="btn btn-success btn-labeled pull-right">Sign in<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php 
    include "style/javascriptLogin.php";
?>
  