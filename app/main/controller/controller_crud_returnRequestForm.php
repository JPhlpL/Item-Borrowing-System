<?php

session_start();
require_once '../../config.php';


if ($_POST['mode'] === 'edit') {
    
        $result = mysqli_query($link,"SELECT * FROM tblrequest_item WHERE id='" . $_POST['id'] . "'");
        $row= mysqli_fetch_array($result);
        echo json_encode($row);
}   

if ($_POST['mode'] === 'update') {

        function itemRequest($link)
        {
            //
            mysqli_query($link,"UPDATE tblrequest_item SET 
            IT_REQUEST_ITEM_QUANTITY = IT_REQUEST_ITEM_QUANTITY - '".$_POST['IT_REQUEST_ITEM_QUANTITY']."',
            IT_REQUEST_ITEM_STATUS = CASE
                    WHEN IT_REQUEST_ITEM_QUANTITY = 0 THEN 'RETURNED'
                    WHEN IT_REQUEST_ITEM_QUANTITY < 0 THEN 'RETURNED'
                    WHEN IT_REQUEST_ITEM_QUANTITY > 0 THEN 'BORROWED'
                ELSE IT_REQUEST_ITEM_STATUS
             END,
             IT_REQUEST_ITEM_DATETIME_RETURNED = CASE
                    WHEN IT_REQUEST_ITEM_QUANTITY = 0 THEN NOW()
                    WHEN IT_REQUEST_ITEM_QUANTITY < 0 THEN NOW()
                    WHEN IT_REQUEST_ITEM_QUANTITY > 0 THEN NULL
                ELSE IT_REQUEST_ITEM_DATETIME_RETURNED
             END
             WHERE id ='" . $_POST['id'] . "' ");

                // Get Current Transaction No.
                $getCurrentSql = "SELECT a.IT_TRANSACTION_ID, b.IT_REQUEST_TRANSACTION_ID, b.IT_REQUEST_ITEM_STATUS
                                    FROM tblrequest_form a
                                    LEFT JOIN tblrequest_item b
                                    ON a.IT_TRANSACTION_ID = b.IT_REQUEST_TRANSACTION_ID
                                    WHERE IT_TRANSACTION_ID = '".$_POST['IT_REQUEST_TRANSACTION_ID']."' AND b.IT_REQUEST_ITEM_STATUS = 'BORROWED'";

                    //Update If 
                    if($result = mysqli_query($link, $getCurrentSql)){
                        if(empty(mysqli_num_rows($result))){
            
                            mysqli_query($link,"UPDATE tblrequest_form SET IT_STATUS='RETURNED', IT_DATETIME_RETURNED = NOW() WHERE IT_TRANSACTION_ID = '".$_POST['IT_REQUEST_TRANSACTION_ID']."'");
                            }
                        }
        }

        //Get The Currrent Data
        $getItemQuery = mysqli_query($link, "SELECT * FROM tblinventory WHERE IT_ITEM_CONTROL_NUMBER = '".$_POST['IT_REQUEST_CONTROL_NUMBER']."'");
        $getItemRow = mysqli_fetch_array($getItemQuery);
        
        if(!empty($getItemRow['IT_ITEM_CONTROL_NUMBER']))
        {
            // Create a Script that minus the current - request 
            mysqli_query($link,"UPDATE tblinventory SET IT_ITEM_QUANTITY = IT_ITEM_QUANTITY + '".$_POST['IT_REQUEST_ITEM_QUANTITY']."', 
            IT_ITEM_STATUS = CASE
                    WHEN IT_ITEM_QUANTITY = 0 THEN 'UNAVAILABLE'
                    WHEN IT_ITEM_QUANTITY < 0 THEN 'UNAVAILABLE'
                    WHEN IT_ITEM_QUANTITY > 0 THEN 'AVAILABLE'
                ELSE IT_ITEM_QUANTITY
                END
            WHERE IT_ITEM_CONTROL_NUMBER = '".$_POST['IT_REQUEST_CONTROL_NUMBER']."'");

                itemRequest($link);
            
        }else{

            itemRequest($link);
            

        }
        echo json_encode(true);

        mysqli_close($link);
}  
?>