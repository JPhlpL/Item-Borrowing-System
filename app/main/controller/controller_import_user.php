<?php


//! Fix
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
  
    $user_id = "";
    if(isset($Row[0])){
    $user_id = mysqli_real_escape_string($link,$Row[0]);
    }
    $user_pass = "";
    if(isset($Row[1])){
    $user_pass = mysqli_real_escape_string($link,$Row[1]);
    }
    $user_employee_id = "";
    if(isset($Row[2])){
    $user_employee_id = mysqli_real_escape_string($link,$Row[2]);
    }
    $user_name = "";
    if(isset($Row[3])){
    $user_name = mysqli_real_escape_string($link,$Row[3]);
    }
    $user_gender = "";
    if(isset($Row[4])){
    $user_gender = mysqli_real_escape_string($link,$Row[4]);
    }
    $user_email = "";
    if(isset($Row[5])){
    $user_email = mysqli_real_escape_string($link,$Row[5]);
    }
    $user_dept = "";
    if(isset($Row[6])){
    $user_dept = mysqli_real_escape_string($link,$Row[6]);
    }
    $user_section = "";
    if(isset($Row[7])){
    $user_section = mysqli_real_escape_string($link,$Row[7]);
    }
    $user_position = "";
    if(isset($Row[8])){
    $user_position = mysqli_real_escape_string($link,$Row[8]);
    }
    $user_mobile = "";
    if(isset($Row[9])){
    $user_mobile = mysqli_real_escape_string($link,$Row[9]);
    }
    $user_pic = "";
    if(isset($Row[10])){
    $user_pic = mysqli_real_escape_string($link,$Row[10]);
    }
    $user_account_type = "";
    if(isset($Row[11])){
    $user_account_type = mysqli_real_escape_string($link,$Row[11]);
    }

if(isset($Row[0])) {
    $user_id = mysqli_real_escape_string($link,$Row[0]);
    $user_pass = mysqli_real_escape_string($link,$Row[1]);
    $user_employee_id = mysqli_real_escape_string($link,$Row[2]);
    $user_name = mysqli_real_escape_string($link,$Row[3]);
    $user_gender = mysqli_real_escape_string($link,$Row[4]);
    $user_email = mysqli_real_escape_string($link,$Row[5]);
    $user_dept = mysqli_real_escape_string($link,$Row[6]);
    $user_section = mysqli_real_escape_string($link,$Row[7]);
    $user_position = mysqli_real_escape_string($link,$Row[8]);
    $user_mobile = mysqli_real_escape_string($link,$Row[9]);
    $user_pic = mysqli_real_escape_string($link,$Row[10]);
    $user_account_type = mysqli_real_escape_string($link,$Row[11]);
}

if (!empty($user_id)){
$query = "INSERT INTO tbluser 
(USER_ID, USER_PASS, USER_EMPLOYEE_ID, USER_NAME, USER_GENDER, USER_EMAIL, USER_DEPT, USER_SECTION, USER_POSITION, USER_MOBILE, USER_PIC, USER_ACCOUNT_TYPE) 
VALUES('".$user_id."','".$user_pass."','".$user_employee_id."','".$user_name."','".$user_gender."','".$user_email."','".$user_dept."','".$user_section."','".$user_position."','".$user_mobile."','".$user_pic."','".$user_account_type."')";
$result = mysqli_query($link, $query);


if (!empty($result)) {
$type = "success";
$message = "";
echo "<label class=\"mt-0 swalDefaultSuccess\" hidden></label>";
} 
else { $type = "error";  
$message = ""; } //  $message = "Problem in Importing Excel Data"; 
}
}}}
else { $type = "error";
//$message = "Invalid File Type. Upload Excel File.";
echo "<label class=\"mt-0 swalDefaultError\" hidden></label>";
 }

}
?>