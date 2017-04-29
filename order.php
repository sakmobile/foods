<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
  <section class="content-header">
      <h1>
          ตรวจสอบรายการอาหาร
      </h1>
    </section> 
<section class="content">
      <div class="row">
          <div class="col-md-12">
          <div class="box">
              <form method="POST" action="controllers/order.php">
            <div class="box-header with-border">
             <?php
             $data = date("d/m/Y");
             $order_no = date("Hi");
             ?>
                 <input type="hidden" value="<?php echo $id_table; ?>" name="id_table">
                 <input type="hidden" value="<?php echo $data; ?>" name="date_order"> 
                 <input type="hidden" value="<?php echo $order_no; ?>" name="order_no"> 
                <p class="lead"> รายการอาหารที่สั่ง โต๊ะ : <?php if(isset($name_table)){ echo $name_table;} ?></p>
              <div class="box-tools"> 
                  <p class="lead">Order NO.<?php if(isset($name_table)){ echo $order_no; } ?> &nbsp; &nbsp; Date: <?php if(isset($name_table)){ echo $data; }?> </p>
                 
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                   <tr>
                  <th style="width: 10px">#</th>
                  <th>รายการอาหาร</th>
                 
                  <th >จำนวน</th>
                  <th  >ราคารวม</th>
                  <th style="width: 50px" >Actions</th>
                </tr>
                <?php 
                  $sql_order = "SELECT * FROM tb_order WHERE seat_id='$id_table'";
                       $result = $conn->query($sql_order); 
                       $i=1;
                         while($row_order = $result->fetch_assoc() ){ 
                             ?>
                              
                              <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $row_order['fd_name']; ?></td>
                              <td><?php echo $row_order['order_count'] ; ?></td>
                              <td><?php echo $row_order['sum_cost'] ; ?></td>
                              <td>
                                  <a href="controllers/delete_order.php?id_order=<?php echo $row_order['order_id']; ?>&id_table=<?php echo $id_table; ?>" class=""><i class="fa fa-trash"></i></a>                     
                              </td>
                            </tr>
                        <?php  $i++;} ?>
                       
                
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                 
                <button type="submit" class="btn btn-success pull-right" name="save"><i class="fa fa-floppy-o"></i> บันทึกรายการ </button>
              </ul>
            </div>
              </form>
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
      </div>
</section>
          



<?php include 'footer.php'; ?>
