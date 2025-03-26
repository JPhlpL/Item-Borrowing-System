<?php  
session_start();

require_once '../../config.php';

$number = count($_POST["IT_REQUEST_CONTROL_NUMBER"]);  

$it_transaction_id = $_POST['IT_TRANSACTION_ID'];

$it_borrower_name = $_POST['IT_BORROWER_NAME'];
$it_date_from = $_POST['IT_DATE_FROM'];
$it_date_to = $_POST['IT_DATE_TO'];
$it_remarks = $_POST['IT_REMARKS'];
$it_purpose = $_POST['IT_PURPOSE'];


$it_request_transaction_id = $_POST['IT_TRANSACTION_ID'];
$it_request_item_name = $_POST['IT_REQUEST_ITEM_NAME'];
$it_request_control_number = $_POST['IT_REQUEST_CONTROL_NUMBER'];
$it_request_item_quantity = $_POST['IT_REQUEST_ITEM_QUANTITY'];
$it_request_item_remarks = $_POST['IT_REQUEST_ITEM_REMARKS'];

$it_transaction_code_hashed = strtolower(substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 10)).strtoupper(substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 10))."&==".strtolower(substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 10)).strtoupper(substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 10)); 
if(isset($it_transaction_id))
{
     // Insert Record
     $insertForm_sql = "UPDATE tblrequest_form SET IT_BORROWER_NAME = '$it_borrower_name', IT_DATE_FROM = '$it_date_from',IT_DATE_TO = '$it_date_to', IT_REMARKS = '$it_remarks', IT_PURPOSE = '$it_purpose',IT_TRANSACTION_CODE_HASHED = '$it_transaction_code_hashed'WHERE IT_TRANSACTION_ID = '$it_transaction_id'";
     mysqli_query($link,$insertForm_sql);

     mysqli_query($link,"DELETE FROM tblrequest_item WHERE IT_REQUEST_TRANSACTION_ID = '$it_request_transaction_id'");

     if($number > 0)  
     {  
          for($i=0; $i<$number; $i++)  
          {  
               if($it_request_transaction_id!="" || $it_request_item_name[$i]!="" || $it_request_control_number[$i]!="" || $it_request_item_remarks[$i]!="")  
               {  
                
                    //Insert Existing
                    $list_sql = "INSERT INTO tblrequest_item(IT_REQUEST_TRANSACTION_ID, IT_REQUEST_ITEM_NAME, IT_REQUEST_CONTROL_NUMBER, IT_REQUEST_ITEM_QUANTITY, IT_REQUEST_ITEM_REMARKS) VALUES('$it_request_transaction_id','$it_request_item_name[$i]','$it_request_control_number[$i]','$it_request_item_quantity[$i]','$it_request_item_remarks[$i]')";  
                    mysqli_query($link, $list_sql);      

                    echo json_encode(true);
                    
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
  