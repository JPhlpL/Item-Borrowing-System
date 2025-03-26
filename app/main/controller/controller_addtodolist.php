<?php  
session_start();

require_once '../../config.php';

$number = count($_POST["TODO_NUMBER"]);  

$record_num = $_POST['RECORD_NUM'];
$record_name = $_POST['RECORD_NAME'];
$todo_record_num = $_POST['RECORD_NUM'];
$todo_name = $_POST['TODO_NAME'];
$todo_number = $_POST['TODO_NUMBER'];
$todo_quantity = $_POST['TODO_QUANTITY'];
$todo_remarks = $_POST['TODO_REMARKS'];
$record_datetime = $_POST['RECORD_DATETIME'];
$record_remarks = $_POST['RECORD_REMARKS'];


if(isset($record_num))
{
     $todo_sql = "INSERT INTO tbltodolistform(RECORD_NUM,RECORD_NAME,RECORD_DATETIME,RECORD_REMARKS) VALUES('$record_num','$record_name','$record_datetime','$record_remarks')";
     mysqli_query($link,$todo_sql);

     if($number > 0)  
     {  
          for($i=0; $i<$number; $i++)  
          {  
               if($todo_record_num!="" || $todo_name[$i]!="" || $todo_number[$i]!="" || $todo_remarks[$i]!="")  
               {  
                    $list_sql = "INSERT INTO tbltodolist(TODO_RECORD_NUM,TODO_NAME,TODO_NUMBER,TODO_QUANTITY,TODO_REMARKS) VALUES('$todo_record_num','$todo_name[$i]','$todo_number[$i]','$todo_quantity[$i]','$todo_remarks[$i]')";  
                    mysqli_query($link, $list_sql);      
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
  