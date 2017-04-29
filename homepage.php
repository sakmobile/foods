<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
  <section class="content-header">
      <h1>
          เลื่อกโต๊ะ
      </h1>
    </section> 
<div class="col-sm-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">เลือกโต๊ะที่ต้องการ</h3>
            </div>
            <div class="box-body">
                <div class="callout callout-warning"> <p>กรุณาเลือกโต๊ะที่มีสถานะว่าง.......!!</p></div>
              <?php 
                    $sql_select_tb = "SELECT * FROM tb_seat";
                    $result = $conn->query($sql_select_tb);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <?php if ($row['status_id'] == "1"){?>
                           <a class="btn btn-app" href="controllers/order.php?id_table=<?php echo $row['seat_id']; ?>"><i class="fa fa-plus"></i><?php echo $row["seat_name"];?></a>
                            <?php } elseif ($row['status_id'] == "2") {?>
                           <a href="foods.php?id_table=<?php echo $row['seat_id']; ?>" class="btn btn-app bg-maroon"> <i class="fa fa-users"></i><?php echo $row["seat_name"];?></a>
                            <?php } ?> 
                        <?php } } else { ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> Alert! ไม่มีข้อมูลโต๊ะ</h4>
                            
                        </div>
                      <?php }?>
            </div>
          </div>
          
</div>

<div class="col-sm-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title ">สถานะโต๊ะ</h3>
            </div>
            <div class="box-body">
                
              <a class="btn btn-app"><i class="fa fa-plus"></i> สถานะโต๊ะว่าง </a>
                        
              <a class="btn btn-app bg-maroon"> <i class="fa fa-users"></i> สถานะโต๊ะเต็ม </a>
              
            </div>
              <div class="box-body">
                  
            </div>
          </div>
          
</div>
    
<?php include 'footer.php'; 