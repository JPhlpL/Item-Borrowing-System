<?php  
session_start();

require_once '../../config.php';

$number = count($_POST["IT_ITEM_CONTROL_NUMBER"]);  

$it_form_num = $_POST['IT_FORM_NUM'];
$it_encoder = $_POST['IT_ENCODER'];

$todo_record_num = $_POST['IT_FORM_NUM'];
$it_item_name = $_POST['IT_ITEM_NAME'];
$it_item_control_number = $_POST['IT_ITEM_CONTROL_NUMBER'];
$it_item_quantity = $_POST['IT_ITEM_QUANTITY'];
$it_item_remarks = $_POST['IT_ITEM_REMARKS'];

$it_form_datetime_created = $_POST['IT_FORM_DATETIME_CREATED'];
$it_form_remarks = $_POST['IT_FORM_REMARKS'];

if(isset($it_form_num))
{
     $insertForm_sql = "INSERT INTO tblinventory_history(IT_FORM_NUM,IT_ENCODER,IT_FORM_DATETIME_CREATED,IT_FORM_REMARKS) VALUES('$it_form_num','$it_encoder','$it_form_datetime_created','$it_form_remarks')";
     mysqli_query($link,$insertForm_sql);

     if($number > 0)  
     {  
          for($i=0; $i<$number; $i++)  
          {  
               if($todo_record_num!="" || $it_item_name[$i]!="" || $it_item_control_number[$i]!="" || $it_item_remarks[$i]!="")  
               {  
                    // For Photo
                    $it_item_photo = $_FILES['IT_ITEM_PHOTO']['name'][$i]; 
                    $uploadFilePath = $folder_dir.$it_item_photo; 

                    // Upload file to server 
                    if(move_uploaded_file($_FILES['IT_ITEM_PHOTO']['tmp_name'][$i], $uploadFilePath))
                    { 
                    
                         $list_sql = "INSERT INTO tblinventory(IT_FORM_NUM,IT_ITEM_NAME,IT_ITEM_CONTROL_NUMBER,IT_ITEM_PHOTO,IT_ITEM_QUANTITY,IT_ITEM_REMARKS,IT_ITEM_STATUS,IT_ITEM_FIRSTCLAIM_DATETIME,IT_ITEM_ENCODER) VALUES('$todo_record_num','$it_item_name[$i]','$it_item_control_number[$i]','$it_item_photo','$it_item_quantity[$i]','$it_item_remarks[$i]','AVAILABLE',NOW(),'$it_encoder')";  
                         mysqli_query($link, $list_sql);      

                         echo json_encode(true);
                    } 
               }  
          }  
          echo "Data Inserted";  
     }  
     else  
     {  
          echo "Please Enter Value";  
     }  
}
?> 
  