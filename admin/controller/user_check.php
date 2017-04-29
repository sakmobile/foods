<?php
include '../../config/db_connect.php';
if(isset($_POST['add_user'])){
    $uaer_name = $_POST['uaer_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $con_pass = $_POST['con_pass'];
 
    $user_img = $_FILES['user_img']['name'];
    
    $ran_name = rand();
    $temp = $_FILES['user_img']['tmp_name'];
    $type = explode(".", $user_img);
    $type = end($type);
    $date = date("Y-m-d");
    if ($uaer_name == "" || $email == "" || $address == "" || $phone == "" ||$pass == "" || $con_pass =="" || $user_img =="") {
        header("Location: ../admin_user.php?admin_user_error=กรอกข้อมูลให้ครบ");
    }elseif ($pass != $con_pass) {
        header("Location: ../admin_user.php?admin_user_error=รหัสผ่านไม่ตรงหัน");
    } elseif ($type == 'png' || $type == 'gif' || $type == 'jpg' && $con_pass == $pass) {
        $url =  '../../uploads/user/';
        $name_img =$ran_name.'_'.$date.'.'.$type;
        move_uploaded_file($temp,$url.$name_img);
        $sql_add_user = "INSERT INTO tb_employe(emp_code,emp_name,emp_email,emp_add,emp_tel,emp_img) VALUE('$con_pass','$uaer_name','$email','$address','$phone','$name_img')";
        if (mysqli_query($conn, $sql_add_user)) {
           header("Location: ../admin_user.php?admin_user_success=บันทึกข้อมูลเรียบร้อยแล้ว");
        } else {
            echo "Error: " . $sql_add_food . "<br>" . mysqli_error($conn);
        }
        
    } else {
        $erorMessage = 'ไม่รองรับ';
    }
    
    
    
} 


if(isset($_POST['edit_user'])){
    $id = $_POST['id_edit_user'];
    $edit_uaer_name = $_POST['edit_uaer_name'];
    $edit_email = $_POST['edit_email'];
    $edit_address = $_POST['edit_address'];
    $edit_phone = $_POST['edit_phone'];
    $edit_pass = $_POST['edit_pass'];
    $edit_con_pass = $_POST['edit_con_pass'];
 
    $edit_user_img = $_FILES['edit_user_img']['name'];
    $ran_name = rand();
    $temp = $_FILES['edit_user_img']['tmp_name'];
    $type = explode(".", $edit_user_img);
    $type = end($type);
    $date = date("Y-m-d");
    $url_user =  '../../uploads/user/';
    $name_img_user =$ran_name.'_'.$date.'.'.$type;
   if($edit_pass != $edit_con_pass){
       header("Location: ../admin_user.php?admin_user_error=รหัสผ่านไม่ตรงหัน"); 
   } 
    if($edit_user_img == "" && $edit_pass == $edit_con_pass ){
        $edit_user = "UPDATE tb_employe SET emp_code='$edit_pass', emp_name='$edit_uaer_name', emp_email='$edit_email',emp_add='$edit_address', emp_tel='$edit_phone' WHERE emp_id='$id'";
        
         if ($conn->query($edit_user) === TRUE) {
         header("Location: ../admin_user.php?admin_user_success=บันทึกข้อมูลเรียบร้อยแล้ว");
         } else {
           echo "Error updating record: " . $conn->error;
         }
    }
    if($edit_user_img !== "" && $edit_pass == $edit_con_pass){
        
        $edit_select = $conn->query("SELECT * FROM tb_employe WHERE emp_id='$id'"); 
        $edit_query = mysqli_fetch_array($edit_select);
        $img_edit = $edit_query['emp_img'];
        
        
        $update_user = "UPDATE tb_employe SET emp_code='$edit_pass', emp_name='$edit_uaer_name', emp_email='$edit_email',emp_add='$edit_address', emp_tel='$edit_phone', emp_img='$name_img_user' WHERE emp_id='$id'";
        
         if ($conn->query($update_user) === TRUE) {
         @unlink("../../uploads/user/".$img_edit);
         @move_uploaded_file($_FILES['edit_user_img']['tmp_name'], $url_user.$name_img_user);
         header("Location: ../admin_user.php?admin_user_success=บันทึกข้อมูลเรียบร้อยแล้ว");
         } else {
           echo "Error updating record: " . $conn->error;
         }
    }
    
   
    
}

if(isset($_GET['user_delete'])){
   $id_delete = $_GET['user_delete'] ;
   
         $img_user = $conn->query("SELECT * FROM tb_employe WHERE emp_id='$id_delete'"); 
         $res = mysqli_fetch_array($img_user);
         $img_delete = $res['emp_img'];
         @unlink("../../uploads/user/".$img_delete);
         
        $sql_delete_user = "DELETE FROM tb_employe WHERE emp_id='$id_delete'";
            if ($conn->query($sql_delete_user) === TRUE) {  
             header("Location: ../admin_user.php?admin_user_delete=ลบข้อมูลเรียบร้อยแล้ว");
             } else {
            echo "Error deleting record: " . $conn->error;
            }
}


?>
