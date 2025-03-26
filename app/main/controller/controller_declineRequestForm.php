<?php

require_once '../../config.php';

$selectCurrentRecord = "SELECT a.IT_TRANSACTION_ID transactID, a.IT_TRANSACTION_CODE_HASHED transactCode, b.IT_REQUEST_ITEM_QUANTITY requestItemQty, 
                                b.IT_REQUEST_ITEM_STATUS requestItemStatus, c.IT_ITEM_QUANTITY inventoryItemQty, c.IT_ITEM_CONTROL_NUMBER inventoryControlNum
                                FROM tblrequest_form a
                                    LEFT JOIN tblrequest_item b
                                        ON a.IT_TRANSACTION_ID = b.IT_REQUEST_TRANSACTION_ID
                                    RIGHT JOIN tblinventory c
                                        ON  b.IT_REQUEST_CONTROL_NUMBER = c.IT_ITEM_CONTROL_NUMBER
                                    WHERE a.IT_TRANSACTION_CODE_HASHED = '".$_POST['IT_TRANSACTION_CODE_HASHED']."' AND b.IT_REQUEST_ITEM_STATUS = 'BORROWED'";

mysqli_query($link,"UPDATE tblrequest_form set IT_STATUS='REJECTED' WHERE IT_TRANSACTION_CODE_HASHED='" . $_POST['IT_TRANSACTION_CODE_HASHED'] . "'");

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
                        mysqli_query($link,"UPDATE  tblinventory SET IT_ITEM_QUANTITY = IT_ITEM_QUANTITY + '".$row['requestItemQty']."', 
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
// Close connection
mysqli_close($link);

?>