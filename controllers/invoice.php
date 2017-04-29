<?php
session_start();
include '../config/db_connect.php';
if (!isset($_SESSION['userid'])){
     Header("Location: login.php?error_login=คุณยังไม่ได้ login กรุณา login เพื่อเข้าใช้งาน");
}



?>

 <?php  if(isset($_GET['id_table'])){
                    $id_table = $_GET['id_table'];
                    $sql_table = "SELECT * FROM tb_seat WHERE seat_id='$id_table'";
                    $result_table = $conn->query($sql_table);
                    
                    if ($result_table->num_rows > 0) {
   
                    while($row_table = $result_table->fetch_assoc()) {
                            $id_table = $row_table['seat_id'];
                            $name_table = $row_table['seat_name'];
                          }
                  } 
                    } ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FoodStory</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css" media="print">
  @page 
    {
        size: auto;   /* กำหนดขนาดของหน้าเอกสารเป็นออโต้ครับ */
        margin: 7mm;  /* กำหนดขอบกระดาษเป็น 0 มม. */
    }

    
</style>
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
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
          <b>โต๊ะ :</b><?php if(isset($name_table)){ echo $name_table;} ?> <br>
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
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          เรียนท่านลูกค้า หากท่านสั่งอาหารจากทางร้านเรา 300 บาทขึ้นไปรวมเครื่องดื่ม ทางร้านจะมีส่วนลดให้ท่านสูงสุดถึง 5%
          </p>
        </div>
        <?php 
                  $sql_sum = "SELECT SUM(sum_cost) FROM tb_order  WHERE seat_id='$id_table'";
                      $result = $conn->query($sql_sum);
                       $row_sum = $result->fetch_assoc();  ?>
                           
        <div class="col-xs-6">
          <p class="lead">Payment Date :<?php echo date("d/m/Y"); ?></p>
            
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
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>