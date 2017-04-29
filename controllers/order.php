<?php
 session_start();
  include '../config/db_connect.php';
  
  if (isset($_GET['id_table'])){
      $seat_id = $_GET['id_table'];
      $status_id = 2;
      $sql = "UPDATE tb_seat SET status_id='$status_id' WHERE seat_id='$seat_id'";
      
      if ($conn->query($sql) === TRUE) {
      
      header("location: ../foods.php?id_table=".$seat_id);
      
      } else {
      echo "Error updating record: " . $conn->error;
      }

      
      
  }
  
  if (isset($_POST['order'])){
      $id_table = $_POST['id_table'];
      $emp_id = $_SESSION['userid'];
      $food_name = $_POST['food_name'];
      $food_cost = $_POST['food_cost'];
      $num = $_POST['num'];
      $time = date("Y-m-d");
      $ststus_id=2;
      if($num==""){
          $num=1;
      }
      $sum = $food_cost*$num;
      
     $sql_insert_order = "INSERT INTO tb_order (seat_id,emp_id, fd_name, fd_cost,sum_cost,order_count,date) "
             . "VALUES ('$id_table', '$emp_id', '$food_name','$food_cost','$sum','$num','$time')";
          if ($conn->query($sql_insert_order) === TRUE) {
            header("location: ../foods.php?id_table=".$id_table);
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
               }
  
  }
  
  if(isset($_POST['save'])){
      $id_table = $_POST['id_table'];
      $date_order = date("Y-m-d");
      $order_no = $_POST['order_no'];
      
      $sql = "INSERT INTO tb_transcript (seat_id, order_no, date_order)
                       VALUES ('$id_table', '$order_no', '$date_order')";

           if ($conn->query($sql) === TRUE) {
              header("location: ../order.php?id_table=".$id_table);
            } else {
               echo "Error: " . $sql . "<br>" . $conn->error;
            }
     
   
  }
  
  ?>