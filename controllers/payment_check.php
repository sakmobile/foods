<?php
include '../config/db_connect.php';
session_start();
 if (isset($_POST['Payment'])){
    $id_table  = $_POST['id_table'];
    $status_id = 1;
    $sql_uptable = "UPDATE tb_seat SET status_id='$status_id' WHERE seat_id='$id_table'";
      if ($conn->query($sql_uptable) === TRUE) {
                    $sql_de_status = "DELETE FROM tb_transcript WHERE seat_id='$id_table'";
                   if ($conn->query($sql_de_status) === TRUE) {
                       
                       
                          $sql_de_order = "DELETE FROM tb_order WHERE seat_id='$id_table'";
                                  if ($conn->query($sql_de_order) === TRUE) {
                                        header("location: ../homepage.php?id_table=");
                                    } else {
                                            echo "Error deleting record: " . $conn->error;
                                        }

                       } else {
                         echo "Error deleting record: " . $conn->error;
                       }

      } else {
      echo "Error updating record: " . $conn->error;
      }
  
 }