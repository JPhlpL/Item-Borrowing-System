<?php

        // Hide Error due to Undentified offset @ Line 398
        error_reporting(0);
        ini_set('display_errors', 0);

        // ----- For Excel Import Library ------ 
        require_once ('../../../plugins/SpreadsheetReader/vendor/SpreadsheetReader.php');
        require_once ('../../../plugins/SpreadsheetReader/vendor/php-excel-reader/excel_reader2.php');


        // for class extension for excluding two rows
        class ExcludeRowsFilter extends \FilterIterator {
            protected $excludeRows = [];
            public function __construct(\Iterator $iterator, $excludeRows = []) {
                parent::__construct($iterator);
                $this->excludeRows = $excludeRows;
            }
            public function accept() {
                return !in_array($this->key(), $this->excludeRows);
            }
        }

        if (isset($_POST["import"]))
        {

        $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','text/xlsm',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

        if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = '../../import/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        $Reader = new SpreadsheetReader($targetPath);

        // excluding first two rows
        $filteredReader = new ExcludeRowsFilter($Reader, [0,1]);

        $sheetCount = count($Reader->sheets());

        for($i=0;$i<$sheetCount;$i++) 
        { $Reader->ChangeSheet($i);

        foreach ($Reader as $Row) { 
            
                $it_item_name = mysqli_real_escape_string($link,$Row[0]);
                $it_item_control_number = mysqli_real_escape_string($link,$Row[1]);
                $it_item_photo = mysqli_real_escape_string($link,$Row[2]);
                $it_item_quantity = mysqli_real_escape_string($link,$Row[3]);
                $it_item_description = mysqli_real_escape_string($link,$Row[4]);
                $it_item_remarks = mysqli_real_escape_string($link,$Row[5]);
                $it_item_status = mysqli_real_escape_string($link,$Row[6]);
                $it_item_firstclaim_datetime = mysqli_real_escape_string($link,$Row[7]);
                $it_item_encoder = mysqli_real_escape_string($link,$Row[8]);
                $it_item_pic = mysqli_real_escape_string($link,$Row[9]);
                $it_form_num = mysqli_real_escape_string($link,$Row[10]);


            if (!empty($it_item_name)){

                $query = "INSERT INTO tblinventory (IT_ITEM_NAME, IT_ITEM_CONTROL_NUMBER, IT_ITEM_PHOTO, IT_ITEM_QUANTITY, IT_ITEM_DESCRIPTION, IT_ITEM_REMARKS, IT_ITEM_STATUS, IT_ITEM_FIRSTCLAIM_DATETIME, IT_ITEM_ENCODER, IT_ITEM_PIC, IT_FORM_NUM)
                VALUES('$it_item_name', '$it_item_control_number', '$it_item_photo', '$it_item_quantity', '$it_item_description', '$it_item_remarks', '$it_item_status', '$it_item_firstclaim_datetime', '$it_item_encoder', '$it_item_pic', '$it_form_num')";

                $result = mysqli_query($link, $query);


                    if (!empty($result)) {
                        $type = "success";
                        $message = "";
                        echo "<label class=\"mt-0 swalDefaultSuccess\" hidden></label>";
                    } 
                    else { 
                        $type = "error";  
                        $message = ""; 
                    } //  $message = "Problem in Importing Excel Data"; 
                }
            }
        }
    }

    else { 
    $type = "error";
    echo "<label class=\"mt-0 swalDefaultError\" hidden></label>";
        }

    }
?>