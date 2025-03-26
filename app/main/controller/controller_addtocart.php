<?php 

require_once '../../config.php';

session_start();

$it_transaction_id = mysqli_real_escape_string($link,$_POST['IT_TRANSACTION_ID']);
$it_borrower_name = mysqli_real_escape_string($link,$_POST['IT_BORROWER_NAME']);

$it_date_from = mysqli_real_escape_string($link,$_POST['IT_DATE_FROM']);
$it_date_to = mysqli_real_escape_string($link,$_POST['IT_DATE_TO']);
$it_remarks = mysqli_real_escape_string($link,$_POST['IT_REMARKS']);
$it_purpose = mysqli_real_escape_string($link,$_POST['IT_PURPOSE']);

$it_transaction_code_hashed = strtolower(substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 10)).strtoupper(substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 10))."&==".strtolower(substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 10)).strtoupper(substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 10)); 

$insertForm_sql = "INSERT INTO tblrequest_form(IT_TRANSACTION_ID, IT_BORROWER_NAME, IT_DATE_FROM, IT_DATE_TO, IT_REMARKS, IT_PURPOSE,IT_TRANSACTION_CODE_HASHED) 
VALUES('$it_transaction_id', '$it_borrower_name', '$it_date_from', '$it_date_to', '$it_remarks', '$it_purpose','$it_transaction_code_hashed')";
mysqli_query($link,$insertForm_sql);

if(isset($it_transaction_id))
{
    foreach ($_SESSION["cart_item"] as $item){
        $item_name = $item['IT_ITEM_NAME'];
        $item_control_number = $item['IT_ITEM_CONTROL_NUMBER'];
        $item_quantity = $item['quantity'];

        $list_sql = "INSERT INTO tblrequest_item(IT_REQUEST_TRANSACTION_ID, IT_REQUEST_ITEM_NAME, IT_REQUEST_CONTROL_NUMBER, IT_REQUEST_ITEM_QUANTITY, IT_REQUEST_ITEM_REMARKS) 
                    VALUES('$it_transaction_id','$item_name','$item_control_number','$item_quantity','none')";  
        mysqli_query($link, $list_sql);  

            }
}


            // Getting Transaction
            $selectCurrentRecord = "SELECT a.IT_TRANSACTION_ID transactID, a.IT_TRANSACTION_CODE_HASHED transactCode, b.IT_REQUEST_ITEM_QUANTITY requestItemQty, 
            c.IT_ITEM_QUANTITY inventoryItemQty, c.IT_ITEM_CONTROL_NUMBER inventoryControlNum
                FROM tblrequest_form a
                    LEFT JOIN tblrequest_item b
                        ON a.IT_TRANSACTION_ID = b.IT_REQUEST_TRANSACTION_ID
                    RIGHT JOIN tblinventory c
                        ON  b.IT_REQUEST_CONTROL_NUMBER = c.IT_ITEM_CONTROL_NUMBER
                    WHERE a.IT_TRANSACTION_CODE_HASHED = '$it_transaction_code_hashed'";


            //Select Currrent Data in a row
            $sql = mysqli_query($link,$selectCurrentRecord);

            // Updating each row
            $row = mysqli_fetch_array($sql);

            if($result = mysqli_query($link, $selectCurrentRecord)){

                if(mysqli_num_rows($result) > 0 ){

                    while($row = mysqli_fetch_array($result)){

                        //! Create query if blank current quantity
                        if(!empty($row['requestItemQty'])){

                            // Create a Script that minus the current - request 
                            mysqli_query($link,"UPDATE  tblinventory set IT_ITEM_QUANTITY = IT_ITEM_QUANTITY - '".$row['requestItemQty']."', 
                                                    IT_ITEM_STATUS = CASE
                                                        WHEN IT_ITEM_QUANTITY = 0 THEN 'UNAVAILABLE'
                                                        WHEN IT_ITEM_QUANTITY < 0 THEN 'UNAVAILABLE'
                                                        WHEN IT_ITEM_QUANTITY > 0 THEN 'AVAILABLE'
                                                        ELSE IT_ITEM_QUANTITY
                                                        END
                                                    WHERE IT_ITEM_CONTROL_NUMBER = '".$row['inventoryControlNum']."'");
                                } 
                                else{
                                // Create a Script that minus the current - request 
                                mysqli_close($link);
                                }
                        }
                        mysqli_free_result($result);
                    }
                    else { 
                    return false; 
                    }
                }
                else{ 
                echo "ERROR: Could not able to execute $selectCurrentRecord. " . mysqli_error($link); 
                }

unset($_SESSION['cart_item']);
mysqli_close($link);
?>