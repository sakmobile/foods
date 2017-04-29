<?php
session_start();
include '../config/db_connect.php';

if (isset($_POST['login'])){
    $login_email = $_POST['login_email'];
    $login_pass = $_POST['login_pass'];
    
    
        
        $sql_user = ("select * from tb_employe where emp_email='$login_email' and emp_code ='$login_pass' ");                       
        $result_user = $conn->query($sql_user);
        
        $sql_admin = ("select * from tb_admin where admin_email='$login_email' and admin_code ='$login_pass' ");                       
        $result_admin = $conn->query($sql_admin);
    
    if(mysqli_num_rows($result_user)==1){
                      
                       $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
                         $_SESSION['userid'] = $row_user['emp_id'];
                                  
                     
                            if(isset($_SESSION['userid'])){ // user
                               
                                  $_SESSION['user_name'] = $row_user['emp_name'];
                                  $_SESSION['user_email'] = $row_user['emp_email'];
                                  $_SESSION['user_add'] = $row_user['emp_add'];
                                  $_SESSION['user_tel'] = $row_user['emp_tel'];
                                  
                                  Header("Location: ../homepage.php");
 
                                }
 
                      
                      /*if ($_SESSION["User_type"] == "1"){  //Admin 
                           $_SESSION["UserID"] = $row["id"];
                           $_SESSION["User"] = $row["mem_name"];
                           Header("Location: ../admin.php");
                      }*/
 
        }elseif(mysqli_num_rows($result_admin)==1){
                     $row_admin = mysqli_fetch_array($result_admin,MYSQLI_ASSOC);
                     $_SESSION['adminid'] = $row_admin['admin_id'];
                     
                         if (isset($_SESSION['adminid'])){  //admin 
                             $_SESSION['admin_name'] = $row_admin['admin_name'];
                             $_SESSION['admin_email'] = $row_admin['admin_email'];
                             
                             Header("Location: ../admin/admin_add_table.php");
                            }
            
        
        
        
        
        
    }  else {
        Header("Location: ../login.php?error_login=อีเมลหรือรหัสผ่านไม่ถูกต้อง");
        
        
    }
    
    
}
   
?>