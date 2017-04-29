<?php

include '../../config/db_connect.php';
if (isset($_POST['add_food'])) {
    $fd_type = $_POST['type_food'];
    $fd_name = $_POST['name_food'];
    $fd_cost = $_POST['cost_food'];

    $form_fileimg = $_FILES['img_food']['name'];


    $ran_name = rand();
    $temp = $_FILES['img_food']['tmp_name'];
    $type = explode(".", $form_fileimg);
    $type = end($type);
    $date = date("Y-m-d");
    if ($fd_name == "" || $fd_cost == "" || $fd_type == "" || $form_fileimg == "") {
        header("Location: ../admin_food.php?admin_food_error=กรอกข้อมูลไม่ครบ");
    } elseif ($type == 'png' || $type == 'gif' || $type == 'jpg') {
        $url =  '../../uploads/';
        $name_img =$ran_name.'_'.$date.'.'.$type;
        move_uploaded_file($temp,$url.$name_img);
        $sql_add_food = "INSERT INTO tb_foods(fd_name,fd_cost,fd_img,type_id) VALUE('$fd_name','$fd_cost','$name_img','$fd_type')";
        if (mysqli_query($conn, $sql_add_food)) {
           header("Location: ../admin_food.php?admin_food_success=บันทึกข้อมูลเรียบร้อยแล้ว");
        } else {
            echo "Error: " . $sql_add_food . "<br>" . mysqli_error($conn);
        }
        
    } else {
        header("Location: ../admin_food.php?admin_food_error=ไฟล์ไม่ถูกต้อง");
    }
} elseif (isset($_POST['edit_food'])) {
    $date = date("Y-m-d");
    $id_edit_food = $_POST['id_edit_food'];
    $type_edit_food=$_POST['type_edit_food'];
    $edit_name_food=$_POST['edit_name_food'];
    $edit_cost_food=$_POST['edit_cost_food'];
    $edit_img_food = $_FILES['edit_img_food']['name'];
    $type = explode(".", $edit_img_food);
    $type = end($type);
    $date = date("Y-m-d");
    $ran_name = rand();
    $url =  '../../uploads/';
    $edit_name_img =$ran_name.'_'.$date.'.'.$type;
     if($edit_img_food == ""){
        
         $sql_edit_food = "UPDATE tb_foods SET fd_name='$edit_name_food', fd_cost='$edit_cost_food', type_id='$type_edit_food' WHERE fd_id='$id_edit_food'";
        
         if ($conn->query($sql_edit_food) === TRUE) {
         header("Location: ../admin_food.php?admin_food_success=บันทึกข้อมูลเรียบร้อยแล้ว");
         } else {
           echo "Error updating record: " . $conn->error;
         }
     }
     if($edit_img_food !== ""){
        
         
          $sql_edit_food_img = "UPDATE tb_foods SET fd_name='$edit_name_food', fd_cost='$edit_cost_food', fd_img='$edit_name_img', type_id='$type_edit_food' WHERE fd_id='$id_edit_food'";
         
          $imgresuer = $conn->query("SELECT fd_img FROM tb_foods");
          $date_img = $imgresuer->fetch_object(); 
         
         if ($conn->query($sql_edit_food_img) === TRUE) {                   
               @unlink($url.$date_img->fd_img);
               @move_uploaded_file($_FILES['edit_img_food']['tmp_name'],$url.$edit_name_img);
               header("Location: ../admin_food.php?admin_food_success=บันทึกข้อมูลเรียบร้อยแล้ว");
         } else {
           echo "Error updating record: " . $conn->error;
         }
     }
     
}
if(isset($_GET['delete_food'])){
    
         
         $delete_food = $_GET['delete_food'];
         $sql_delete_food = "DELETE FROM tb_foods WHERE fd_id='$delete_food'";
      
   if ($conn->query($sql_delete_food) === TRUE) {
             
             header("Location: ../admin_food.php?admin_food_delete=ลบข้อมูลเรียบร้อยแล้ว");
        } else {
            echo "Error deleting record: " . $conn->error;
        }
  
}
?>