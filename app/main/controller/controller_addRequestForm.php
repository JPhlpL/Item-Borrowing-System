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
     $insertForm_sql = "INSERT INTO tblrequest_form(IT_TRANSACTION_ID, IT_BORROWER_NAME, IT_DATE_FROM, IT_DATE_TO, IT_REMARKS, IT_PURPOSE,IT_TRANSACTION_CODE_HASHED) VALUES('$it_transaction_id', '$it_borrower_name', '$it_date_from', '$it_date_to', '$it_remarks', '$it_purpose','$it_transaction_code_hashed')";
     mysqli_query($link,$insertForm_sql);

     if($number > 0)  
     {  
          for($i=0; $i<$number; $i++)  
          {  
               if($it_request_transaction_id!="" || $it_request_item_name[$i]!="" || $it_request_control_number[$i]!="" || $it_request_item_remarks[$i]!="")  
               {  
        
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
  