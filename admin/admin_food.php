<?php include 'admin_header.php'; ?>
<?php include 'admin_sidebar.php'; ?>
<?php if(isset($_GET['admin_food_error'])){?>
         
        <script>
           var error = "<?php echo $_GET['admin_food_error'];?>";
           swal("Error",error, "error");
        </script>              
<?php  }?>
<?php if(isset($_GET['admin_food_success'])){?>
        <script>
           var success  = "<?php echo $_GET['admin_food_success'];?>";
           swal("Data complete",success,"success");
        </script>              
<?php  }?>
<?php if(isset($_GET['admin_food_delete'])){?>
        <script>
           var  delete_data = "<?php echo $_GET['admin_food_delete'];?>";
           swal("Delete complete",delete_data,"success");
        </script>              
<?php  }?>
<section class="content-header">
    <h1>
        จัดการอาหาร
    </h1>
</section> 
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">จัดการอาหาร</h3>
                </div>
                <div class="box-body">
                    <div class="col-sm-10"> 
                        <form class="form-horizontal" action="controller/food_check.php" method="POST" enctype="multipart/form-data">
                          
                         <!-- form edit food  -->
                             <?php if(isset($_GET['edit_food'])){
                                 include '../config/db_connect.php';
                                 $idfood =$_GET['edit_food'];
                                 $sql_select_edit_food = "SELECT * FROM tb_foods WHERE fd_id=$idfood";
                                 $result_food = $conn->query($sql_select_edit_food);
                                 $row_food = $result_food->fetch_assoc();
                                 $idtype   = $row_food['type_id'];
                             
                                 ?>
                               
                         
                               <div class="form-group">
                                <label class="col-sm-5 control-label">เลือกประเภทอาหาร</label>
                                <div class="col-sm-3">
                                    <input type="hidden" value="<?php echo $idfood; ?>" name="id_edit_food">
                                    <select class="form-control" name="type_edit_food">
                                      <?php 
                                       $sql_type_food =  "SELECT * FROM type_foods" ;
                                       $result_type = $conn->query($sql_type_food);
                                      while ($row_type = $result_type->fetch_assoc()) {
                                          if($idtype == $row_type['type_id'])
                                            {
                                                $sel = "selected";
                                            }
                                            else
                                            {
                                                $sel = "";
                                            }?>
                                          <option value="<?php echo $row_type['type_id'] ;?>"  <?php echo $sel;?>  > <?php echo $row_type['type_detail'] ;?></option>
                                     <?php } ?>
                                       
                                    </select>
                                </div> 
                            </div>

                            <div class="form-group">
                                <label class="col-sm-5 control-label">ชื่ออาหาร</label>
                                <div class="col-sm-4">
                                    <input type="text"name="edit_name_food" value="<?php echo $row_food['fd_name']; ?>" class="form-control" >
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">ราคา</label>
                                <div class="col-sm-4">
                                    <input type="text" name="edit_cost_food" value="<?php echo $row_food['fd_cost']; ?>" class="form-control" >
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">ภาพอาหาร</label>
                                <div class="col-sm-4">
                                    <input type="file" value="<?php echo $row_food['fd_img'];?>" name="edit_img_food"> <br>
                                      <img class="img-rounded" style="width: 228px; height: 130px;" src="../uploads/<?php echo $row_food['fd_img']; ?>" />
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label"></label>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-warning" name="edit_food" >แก้ไข</button>
                                    
                                </div> 
                            </div>
                          <?php }?>
                         <!-- form insert food  -->
                            <?php if(!isset($_GET['edit_food'])){?>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">เลือกประเภทอาหาร</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="type_food">
                                        
                                        <option value="1">ต้ม</option>
                                        <option value="2">ทอด</option>
                                        <option value="3">นึ่ง</option>
                                        <option value="4">ผัด</option>
                                        <option value="5">ย่าง</option>
                                        <option value="7">ตำ</option>
                                        <option value="6">เครื่องดื่ม</option>
                                    </select>
                                </div> 
                            </div>

                            <div class="form-group">
                                <label class="col-sm-5 control-label">ชื่ออาหาร</label>
                                <div class="col-sm-4">
                                    <input type="text"name="name_food" class="form-control" >
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">ราคา</label>
                                <div class="col-sm-4">
                                    <input type="text" name="cost_food" class="form-control" >
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">ภาพอาหาร</label>
                                <div class="col-sm-4">
                                    <input type="file" name="img_food">
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label"></label>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-info" name="add_food" >เพิ่ม</button>
                                    <button type="reset" class="btn btn-danger" >Clear</button>
                                </div> 
                            </div> <?php }?>
                        </form>
                    </div> 
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 table-responsive">

                            <table class="table table-striped">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>รายการอาหาร</th>
                                    <th >ประเภทอาหาร</th>
                                    <th >ราคา</th>
                                    <th>path</th>
                                    <th>Actions</th>
                                </tr>
                                <?php
                                  include '../config/db_connect.php';
                                  $sql_select_tb = "SELECT * FROM tb_foods INNER JOIN type_foods ON tb_foods.type_id = type_foods.type_id";
                                  $result = $conn->query($sql_select_tb);

                                 if ($result->num_rows > 0) {
                                   $i=1;
                                    while ($row = $result->fetch_assoc()) {
                                       ?>
                                     <tr>
                                       <td><?php echo $i;?></td>
                                    <td><?php echo $row['fd_name'];?></td>
                                    <td> <?php echo $row['type_detail'];?> </td>
                                    <td><?php echo $row['fd_cost'];?></td>
                                    <td><?php echo $row['fd_img'];?></td>
                                    <td>
                                        <a href="admin_food.php?edit_food=<?php echo $row['fd_id'] ; ?>"  name="edit_food" class=""><i class="fa fa-edit"></i></a>
                                        <a href="controller/food_check.php?delete_food=<?php echo $row['fd_id'] ; ?>" name="delete_food" class=""><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                              
                        <?php  $i++;} } else { }?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

</section>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
         <div class="form-group">
                                <label class="col-sm-5 control-label">เลือกประเภทอาหาร</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="type_food">
                                        <option value="1">ต้ม</option>
                                        <option value="2">ทอด</option>
                                        <option value="3">นึ่ง</option>
                                        <option value="4">ผัด</option>
                                        <option value="5">ย่าง</option>
                                        <option value="7">ตำ</option>
                                        <option value="6">เครื่องดื่ม</option>
                                    </select>
                                </div> 
                            </div>

                            <div class="form-group">
                                <label class="col-sm-5 control-label">ชื่ออาหาร</label>
                                <div class="col-sm-6">
                                    <input type="text"name="name_food" class="form-control" >
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">ราคา</label>
                                <div class="col-sm-6">
                                    <input type="text" name="cost_food" class="form-control" >
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5 control-label">ภาพอาหาร</label>
                                <div class="col-sm-6">
                                    <input type="file" name="img_food">
                                </div> 
                            </div>
                            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

<?php include 'admin_footer.php'; ?>

