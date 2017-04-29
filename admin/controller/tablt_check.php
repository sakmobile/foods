<?php

include '../../config/db_connect.php';
if (isset($_POST['add_tb'])) {

    $add_tb = $_POST['name_tb'];
    $status_tb = $_POST['status'];
    if ($add_tb == "") {
        echo 'null';
    }
    $name_tb = "NO." . $add_tb;
    $sql_add_tb = "INSERT INTO tb_seat (seat_name , status_id)
                   VALUES ('$name_tb','$status_tb')";
    if ($conn->query($sql_add_tb) === TRUE) {
        header("Location: ../admin_add_table.php?table_success=บันทึกข้อมูลเรียบร้อยแล้ว");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} elseif (isset($_POST['delete_tb'])) {
    $delete_tb = $_POST['name_tb_delete'];
   $sql = "DELETE FROM tb_seat WHERE seat_name='$delete_tb'";

if ($conn->query($sql) === TRUE) {
    header("Location: ../admin_add_table.php?table_delete=ลบข้อมูลเรียบร้อยแล้ว");
} else {
    echo "Error deleting record: " . $conn->error;
}
}