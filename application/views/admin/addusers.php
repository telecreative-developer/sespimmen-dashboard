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
                                    <h2 class="title">Users</h2>
                                    <p class="sub-title">One stop solution for perfect admin dashboard!</p>
                                </div>
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-12">
                                    <ul class="breadcrumb">
            							              <li><a href="<?php echo base_url();?>dashboard"><i class="fa fa-home"></i> Home</a></li>
                                        <li><a href="<?php echo base_url();?>events">Users</li></a>
                                        <li class="active">Add Users</li>
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
                                                    <h5>Input Your Users</small></h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">

                                                <form method="POST" id="Formaddusers" class="form-horizontal">
                                                	<div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">First Name</label>
                                                		<div class="col-sm-4">
                                                			<input type="text" name="first_name" class="form-control" id="firstname" placeholder="Firstname" required="ON">
                                                		</div>
                                                	</div>

                                                  <div class="form-group">
                                                    <label for="text1" class="col-sm-2 control-label">Last Name</label>
                                                		<div class="col-sm-4">
                                                			<input type="text" name="last_name" class="form-control" id="lastname" placeholder="Lastname" required="ON">
                                                		</div>
                                                  </div>
        
                                                  <div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Email</label>
                                                		<div class="col-sm-4">
                                                			<input type="text" name="email" class="form-control" id="email" placeholder="Email" required="ON">
                                                		</div>
                                                	</div>

                                                  <div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Force Of</label>
                                                		<div class="col-sm-4">
                                                			<input type="number" name="force_of" class="form-control" id="force_of" placeholder="Force Of" required="ON">
                                                		</div>
                                                	</div>

                                                  <div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Password</label>
                                                		<div class="col-sm-4">
                                                			<input type="password" name="password" class="form-control" id="password" placeholder="Password" required="ON">
                                                		</div>
                                                	</div>

                                                  <div class="form-group">
                                                		<label for="text1" class="col-sm-2 control-label">Confirm Password</label>
                                                		<div class="col-sm-4">
                                                			<input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Confirm Password" required="ON">
                                                		</div>
                                                	</div>
                                                  <p id="demo" span style="color:red;"></p>
                                                	<div class="form-group">
                                                		<div class="col-sm-offset-5 col-sm-10">
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
<?php include "style/javascriptDashboard.php";?>
<script>

$(function () {
  $('form').on('submit', function (e) {
    var password = document.getElementById("password").value;
    var cpassword = document.getElementById("cpassword").value;
    if(password == cpassword){
      e.preventDefault();
      $.ajax({
        type: 'POST',
        url: 'https://0fb2b415.ngrok.io/users',
        data: $('form').serialize(),
        statusCode: {
          201: function () {
            alert("Success add Users");
            document.getElementById("Formaddusers").reset();
            window.location.href = "users";
          },
          400: function () {
           alert("username or password already in use");
          }
        }
      }
      );

    }else{
      e.preventDefault();
      document.getElementById("demo").innerHTML = "Password anda tidak sama";
    }
  });
});

</script>
