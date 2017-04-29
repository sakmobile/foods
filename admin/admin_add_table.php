<?php include 'admin_header.php'; ?>
<?php include 'admin_sidebar.php'; ?>

<?php if(isset($_GET['table_success'])){?>
        <script>
           var success  = "<?php echo $_GET['table_success'];?>";
           swal("Data complete",success,"success");
        </script>              
<?php  }?>
<?php if(isset($_GET['table_delete'])){?>
        <script>
           var  delete_data = "<?php echo $_GET['table_delete'];?>";
           swal("Delete complete",delete_data,"success");
        </script>              
<?php  }?>
<section class="content-header">
    <h1>
        จัดการโต๊ะ
    </h1>
</section> 
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">จัดการโต๊ะ</h3>
                </div>
                <div class="box-body">

                    <form class="form-horizontal"  action="controller/tablt_check.php" method="POST" name="add_tablt">
                             
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">สถานะ</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="status">
                                        <option value="1">ว่าง</option>
                                        <option value="2">ไม่ว่าง</option>    
                                    </select>
                                </div> 
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">NO.</label>
                                <div class="col-sm-4">
                                    <input type="text" name="name_tb" class="form-control" >
                                </div> 
                                <button type="submit" name="add_tb" class="btn btn-info">เพิ่มโต๊ะ</button>
                            </div>
                            
                        </div>
                       
                        <div class="col-sm-4"> 
                            <div class="form-group">
                                <label class="col-sm-5 control-label">ป้อนชื่อโต๊ะเพื่อลบ</label>
                                <div class="col-sm-4">
                                    <input type="text"name="name_tb_delete" class="form-control" >
                                </div> 
                                <button type="submit" name="delete_tb"class="btn btn-info">ลบโต๊ะ</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="box-body">
                    <?php
                    include '../config/db_connect.php';
                    $sql_select_tb = "SELECT * FROM tb_seat";
                    $result = $conn->query($sql_select_tb);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <?php if ($row['status_id'] == "1"){?>
                            <a class="btn btn-app"><i class="fa fa-plus"></i><?php echo $row["seat_name"];?></a>
                            <?php } elseif ($row['status_id'] == "2") {?>
                                             <a class="btn btn-app bg-maroon"> <i class="fa fa-users"></i><?php echo $row["seat_name"];?></a>
                                       <?php } ?>
                            
                        <?php }
                    } else {
                        ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-warning"></i> Alert! ไม่มีข้อมูลโต๊ะ</h4>
                            
                        </div>
                      <?php }?>

                    </div>
                </div>

            </div>
        </div>
    </section>



    <?php  include 'admin_footer.php';

    