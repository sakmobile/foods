  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            <img src="uploads/user/<?php echo $row_img['emp_img']; ?>" class="img-circle" alt="User Image">
        </div>  
        <div class="pull-left info">
            <p style="margin: 11px;"><?php echo $_SESSION['user_name']; ?></p>
          
        </div>
      </div>
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class=" treeview">
            <a href="homepage.php?id_table=<?php echo $id_table; ?>">
            <i class="fa fa-th"></i> <span>เลือกโต๊ะ</span>
          </a>  
        </li>
        <li class="treeview"> 
             
            <a href="foods.php?id_table=<?php echo $id_table; ?>">
            <i class="fa fa-files-o"></i>
            <span>เลื่อกอาหาร</span>
          </a>
          
        </li>
        <li>
            <a href="order.php?id_table=<?php echo $id_table; ?>">
            <i class="fa fa-edit"></i> <span>ตรวจสอบรายการ</span>
           
          </a>
        </li>
        <li class="treeview">
            <a href="payment.php?id_table=<?php echo $id_table; ?>">
            <i class="fa fa-credit-card"></i>
            <span>ชำระเงิน</span>
           
          </a>
          
        </li>
        <li class="treeview">
            <a href="controllers/logout.php">
            <i class="fa fa-sign-out"></i>
            <span>ออกจากระบบ</span>
           
          </a>
          
        </li>
        
       
       
       
    </section>
    <!-- /.sidebar -->
  </aside>
<div class="content-wrapper">
     