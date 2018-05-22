<div class="navbar-header no-padding">
  <a class="navbar-brand" href="index.html">
    <img src="<?php echo base_url()?>assets/images/favicon/sispammen-right.jpg" alt="Logo" class="logo">  
  </a> 
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <i class="fa fa-ellipsis-v"></i>
  </button>
    <button type="button" class="navbar-toggle mobile-nav-toggle" >
    <i class="fa fa-bars"></i>
    
  </button>
</div>

<div class="collapse navbar-collapse" id="navbar-collapse-1">
  <ul class="nav navbar-nav" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
    <li class="hidden-sm hidden-xs"><a href="#" class="full-screen-handle"><i class="fa fa-arrows-alt"></i></a></li>
  </ul>

  <div id="main-wrapper">
    <main class="main" role="main" id="main-content" style="margin-top:20px">
      <div id="main-top-bar">

        <div class="user-menu">
          <div class="user-menu-item">
            <div class="user-name-wrapper" style="margin-top:12px;">
              <?php 
              $admin_id = $this->session->userdata('admin_id');
              $query = $this->db->query("SELECT * FROM admin WHERE admin_id = '$admin_id'");
              $row = $query->row();
              ?>
              <?php echo ucfirst($row->username);?><i class="fa fa-caret-down"></i>
            </div>
          </div>
          <div class="user-dropdown">
            <a href="<?php echo base_url()?>logout" class="dropdown-item"><span class="mr-3"><i class="fa fa-power-off"></i></span> Logout</a>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>