  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p style="margin: 11px;"><?php echo $_SESSION['admin_name']; ?></p>
          
        </div>
      </div>
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class=" treeview">
            <a href="admin_add_table.php">
            <i class="fa fa-th"></i> <span>จัดการโต๊ะ</span>
          </a>  
        </li>
        <li class="treeview">
            <a href="admin_food.php">
            <i class="fa  fa-cutlery"></i>
            <span>จัดการอาหาร</span>
          </a>
          
        </li>
        <li>
            <a href="admin_user.php">
            <i class="fa  fa-users"></i> <span>จัดการพนักงาน</span>
           
          </a>
        </li>
 
        <li class="treeview">
            <a href="../controllers/logout.php">
            <i class="fa fa-sign-out"></i>
            <span>ออกจากระบบ</span>
           
          </a>
          
        </li>
       
       
       
       
    </section>
    <!-- /.sidebar -->
  </aside>
<div class="content-wrapper">
     