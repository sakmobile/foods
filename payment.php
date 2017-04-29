<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
  <section class="content-header">
      <h1>
         ชำระเงิน
      </h1>
    </section> 
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> FoodStory
            <small class="pull-right">Date: <?php echo date("d/m/Y"); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
         
          <address>
            <strong>FoodStory</strong><br>
            795 Folsom Ave, Suite 600<br>
            San Francisco, CA 94107<br>
            Phone: (804) 123-5432<br>
            Email: info@almasaeedstudio.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
         พนักงาน
          <address>
              <strong><?php echo $_SESSION['user_name']; ?></strong><br>
            <?php echo $_SESSION['user_tel']; ?><br>
            <?php echo $_SESSION['user_email']; ?>
          </address>
        </div>
        <!-- /.col -->
        <?php 
        $sql_scp = "SELECT * FROM tb_transcript  WHERE seat_id='$id_table'";
                      $result = $conn->query($sql_scp);
                      $row_scp = $result->fetch_assoc();
                      $date=date_create($row_scp['date_order']);
                     
        ?>
        <div class="col-sm-4 invoice-col">
            <b>Invoice #<?php echo $row_scp['transcript_id']; ?></b><br>
          <b>โต๊ะ :</b><?php if(isset($name_table)){ echo $name_table;} ?><br>
          <b>Order NO:</b><?php echo $row_scp['order_no']; ?><br>
          <b>Payment Due:</b> <?php echo date_format($date,"d-m-Y"); ?><br>
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">

             <table class="table table-striped">
                 
                <tr>
                  <th style="width: 10px">#</th>
                  <th>รายการอาหาร</th>
                  <th >ราคา/จาน</th>
                  <th >จำนวน</th>
                  <th  >ราคารวม</th>
                  </tr>
                  <?php 
                  $sql_sc = "SELECT * FROM tb_transcript INNER JOIN tb_order ON tb_transcript.seat_id = tb_order.seat_id WHERE tb_transcript.seat_id='$id_table'";
                      $result = $conn->query($sql_sc);

                    if ($result->num_rows > 0) {
                         $i=1;
                       while($row_sc = $result->fetch_assoc()) {?>
                         <tr>
                             <td><?php echo $i; ?></td>
                             <td><?php echo $row_sc['fd_name']; ?></td>
                            <td><?php echo $row_sc['fd_cost']; ?></td>
                            <td><?php echo $row_sc['order_count']; ?></td>
                            <td><?php echo $row_sc['sum_cost']; ?></td>
                            </tr>
                              <?php $i++; }
                           } else { ?>
                           <div class="alert alert-warning">
                          <strong>Error!</strong> คุณยังไม่ได้บันทึกรายการอาหาร หรือเลื่อกอาหาร.
                           </div>
                       <?php  }  ?>
                
                
            
              </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Note:</h4>
        เรียนท่านลูกค้า หากท่านสั่งอาหารจากทางร้านเรา 300 บาทขึ้นไปรวมเครื่องดื่ม ทางร้านจะมีส่วนลดให้ท่านสูงสุดถึง 5%
      </div>
    </div>
        </div>
        <?php 
                  $sql_sum = "SELECT SUM(sum_cost) FROM tb_order  WHERE seat_id='$id_table'";
                      $result = $conn->query($sql_sum);
                       $row_sum = $result->fetch_assoc();  ?>
                           
        <div class="col-xs-6">
          <p class="lead">Payment Date :<?php echo date("d/m/Y"); ?> </p>
            
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">ยอดรวม:</th>
                <td><?php echo $row_sum['SUM(sum_cost)'];?></td>
              </tr>
              <tr>
                  <th>สวนลด(5%)</th>
                <?php 
                if($row_sum['SUM(sum_cost)'] >= 300) { ?>
                <td><?php echo (5/100)*$row_sum['SUM(sum_cost)']; ?></td>
                <?php }  else {?>
                      <td>0.00</td>
                 <?php } ?>
                
              </tr>
              
              <tr>
                <th>รวมทั้งหมด:</th>
                <?php
                if($row_sum['SUM(sum_cost)'] >=300){ 
                    ?>
                <td><?php echo $row_sum['SUM(sum_cost)'] -((5/100)*$row_sum['SUM(sum_cost)']); ?></td>
               <?php }  else { ?>
                  <td><?php echo $row_sum['SUM(sum_cost)']; ?></td>
                <?php }?>
                
              </tr>
            </table>
          </div>
          
            </div>
            
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
            <a href="controllers/invoice.php?id_table=<?php echo $id_table;?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            <form action="controllers/payment_check.php" method="POST">
                <input type="hidden" name="id_table" value="<?php echo $id_table; ?>">
                <button type="submit" class="btn btn-success pull-right" name="Payment"><i class="fa fa-credit-card"></i> Payment
          </button>
            </form>
        </div>
      </div>
    </section>
<div class="clearfix"></div>

<?php include 'footer.php'; 
