<?php
include '../config/db_connect.php';

 if(isset($_GET['id_order'])&& isset($_GET['id_table'])){
       $id_table= $_GET['id_table'];
       $order_id =  $_GET['id_order'];
      $sql_delete_oder = "DELETE FROM tb_order WHERE order_id='$order_id'";

         if ($conn->query($sql_delete_oder) === TRUE) {
               header("location: ../order.php?id_table=".$id_table);
              } else {
               echo "Error deleting record: " . $conn->error;
            }
     }
