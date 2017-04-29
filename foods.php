<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

  <section class="content-header">
      <h1>
         เลือกอาหาร
      </h1>
    </section> 
<div class="col-sm-12">
          <div class="box">
            <div class="box-header">
               
                <h3 class="box-title ">เลื่อกรายการอาหาร โต๊ะ : <?php if(isset($name_table)){ echo $name_table; } ?></h3>
                </div>
                 <div class="box-body">
                 <div class="col-sm-6"> 
                     <form class="form-horizontal" action="" method="POST">
              
                    <div class="form-group">
                     <label class="col-sm-5 control-label">เลือกประเภทอาหาร</label>
                      <div class="col-sm-3">
                        <select class="form-control" name="show_type_food">
                        <?php
                        
                        $sql_type_food =  "SELECT * FROM type_foods" ;
                        $result_type = $conn->query($sql_type_food);
                        while ($row_type = $result_type->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $row_type['type_id'] ;?>" > <?php echo $row_type['type_detail'] ;?></option>
                        <?php } ?>
                        </select>
                       </div> 
                          <div class="col-md-3">
                              <button type="submit" class="btn btn-info">ค้นหา</button>
                         </div>
                      </div>      
                  </form>
                </div>
                  
               </div>
            </div>
      
</div>
<section class="content">
      <!-- Info boxes -->
      <div class="row">
          <?php if(isset($_POST['show_type_food'])){ 
             $get_id = $_POST['show_type_food'];
             $sql_type_food =  "SELECT * FROM  tb_foods WHERE type_id LIKE '$get_id'" ;
             $result_type = $conn->query($sql_type_food);
             while ($row_type = $result_type->fetch_assoc()) { ?>
              <div class="col-sm-3">
                 <div class="info-box ">
                     <form role="form" method="POST" action="controllers/order.php">
                         <input type="hidden" name="id_table" value="<?php echo $id_table; ?>">
                         <input type="hidden" name="food_name" value="<?php echo $row_type['fd_name']; ?>">
                         <input type="hidden" name="food_cost" value="<?php echo $row_type['fd_cost']; ?>">
                  <img style="width: 228px; height: 130px;"src="uploads/<?php echo $row_type['fd_img']; ?>" class="margin"> 
               <div class="box-footer">
                   <label><?php echo $row_type['fd_name']; ?></label><label name="food_cost"><?php echo $row_type['fd_cost']; ?></label>
                   <input type="text" class="form-control" name="num" placeholder="จำนวน">
                <button type="submit" class="btn btn-info " name="order">สั่งชื้อ</button>
               </div>
             
              </form>
            <!-- /.info-box-content -->
          </div>
        </div>
             <?php } ?>          
            <?php }  else { 
              $sql_type_food_all =  "SELECT * FROM  tb_foods" ;
              $result_food_all = $conn->query($sql_type_food_all);
               while ($row_food_all = $result_food_all->fetch_assoc()) { ?>
              <div class="col-sm-3">
                 <div class="info-box ">
              <form role="form"  method="POST" action="controllers/order.php">
                  <input type="hidden" name="id_table" value="<?php echo $id_table; ?>">
                  <input type="hidden" name="food_name" value="<?php echo $row_food_all['fd_name']; ?>">
                         <input type="hidden" name="food_cost" value="<?php echo $row_food_all['fd_cost']; ?>">
                  <img style="width: 228px; height: 130px;"src="uploads/<?php echo $row_food_all['fd_img']; ?>" class="margin"> 
               <div class="box-footer">
                   <label  name="food_name"><?php echo $row_food_all['fd_name']; ?></label><label name="food_cost"><?php echo $row_food_all['fd_cost']; ?></label>
                   <input type="text" class="form-control" name="num" placeholder="จำนวน" >
                <button type="submit" class="btn btn-info" name="order">สั่งชื้อ</button>
               </div>
             
              </form>
            <!-- /.info-box-content -->
          </div>
            </div>
             <?php } ?>
            <?php  } ?>
 
          
        
          
      </div>
</section>
<?php include 'footer.php';  ?>
