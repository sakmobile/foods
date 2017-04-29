<?php include 'admin_header.php'; ?>
<?php include 'admin_sidebar.php'; ?>
<?php if(isset($_GET['admin_user_error'])){?>
         
        <script>
           var error = "<?php echo $_GET['admin_user_error'];?>";
           swal("Error",error, "error");
        </script>              
<?php  }?>
<?php if(isset($_GET['admin_user_success'])){?>
        <script>
           var success  = "<?php echo $_GET['admin_user_success'];?>";
           swal("Data complete",success,"success");
        </script>              
<?php  }?>
<?php if(isset($_GET['admin_user_delete'])){?>
        <script>
           var  delete_data = "<?php echo $_GET['admin_user_delete'];?>";
           swal("Delete complete",delete_data,"success");
        </script>              
<?php  }?>
<section class="content-header">
    <h1>
        จัดการพนักงาน
    </h1>
</section> 
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">จัดการพนักงาน</h3>
                </div>
                <div class="box-body">
                    <div class="col-sm-10"> 
                        <form class="form-horizontal" id="form" action="controller/user_check.php" name="add_user" method="POST" enctype="multipart/form-data">
                            <?php if(!isset($_GET['edit_user'])){?>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">ชื่อ</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="uaer_name">
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">Email</label>
                                <div class="col-sm-4">
                                    <input type="email" class="form-control" name="email">
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">ที่อยู่</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="address">
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">เบอร์โทร</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="phone">
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">รหัสผ่าน</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" name="pass" >
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">ยืนยันรหัสผ่าน</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" name="con_pass" >
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">รูปพนักงาน</label>
                                <div class="col-sm-4">
                                    <input type="file"  name="user_img">
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label"></label>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-info" name="add_user" >เพิ่ม</button>
                                    
                                    <button type="reset" class="btn btn-danger" >Clear</button>
                                </div> 
                            </div>        
                               <!--form edit data -->
                            <?php }elseif (isset($_GET['edit_user'])){
                                include '../config/db_connect.php';
                                $id_edit = $_GET['edit_user'];
                                $tb_user = "SELECT * FROM tb_employe WHERE emp_id=$id_edit"; 
                                $query_user = $conn->query($tb_user);
                                $row_user = $query_user->fetch_assoc();
                                ?>
                               <input type="hidden" value="<?php echo $id_edit; ?>" name="id_edit_user">
                               <div class="form-group">
                                <label class="col-sm-5 control-label">ชื่อ</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?php echo $row_user['emp_name']; ?>" name="edit_uaer_name">
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">Email</label>
                                <div class="col-sm-4">
                                    <input type="email" class="form-control" value="<?php echo $row_user['emp_email']; ?>" name="edit_email">
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">ที่อยู่</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?php echo $row_user['emp_add']; ?>" name="edit_address">
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">เบอร์โทร</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="<?php echo $row_user['emp_tel']; ?>" name="edit_phone">
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">รหัสผ่าน</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" value="<?php echo $row_user['emp_code']; ?>" name="edit_pass">
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">ยืนยันรหัสผ่าน</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" value="<?php echo $row_user['emp_code']; ?>" name="edit_con_pass">
                                    
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">รูปพนักงาน</label>
                                <div class="col-sm-4">
                                    <input type="file"  name="edit_user_img">
                                    <img class="img-rounded" style="width: 130px; height: 150px;" src="../uploads/user/<?php echo $row_user['emp_img']; ?>" />
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label"></label>
                                <div class="col-sm-3">
                                    
                                    <button type="submit" class="btn btn-warning" name="edit_user" >แก้ไข</button>
                                    
                                </div> 
                            </div>
               <?php }?>         
                        </form>
                    </div> 
                </div>
             
                <!-- ดึงข้อมูลพนักงานออกมาแสดง  -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 table-responsive">

                            <table class="table table-striped">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>ชื่อ</th>
                                    <th >Email</th>
                                    <th >ที่อยู่</th>
                                    <th>เบอร์โทร</th>
                                    <th>Actions</th>
                                </tr>
                                <?php
                                  include '../config/db_connect.php';
                                  $sql_select_user = "SELECT * FROM tb_employe ";
                                  $result = $conn->query($sql_select_user);

                                 if ($result->num_rows > 0) {
                                   $i=1;
                                    while ($row = $result->fetch_assoc()) {
                                       ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['emp_name']; ?></td>
                                    <td><?php echo $row['emp_email']; ?></td>
                                    <td><?php echo $row['emp_add']; ?></td>
                                    <td><?php echo $row['emp_tel']; ?></td>
                                    <td>
                                        <a href="admin_user.php?edit_user=<?php echo $row['emp_id']; ?>" class=""><i class="fa fa-edit"></i></a>
                                        <a href="controller/user_check.php?user_delete=<?php echo $row['emp_id']; ?>" class=""><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php  $i++;} } else { }?>
                               
                            </table>
                        </div> 
            </div>

        </div>
    </div>
</section>


<?php include 'admin_footer.php'; ?>

