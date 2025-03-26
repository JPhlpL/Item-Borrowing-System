<?php

require_once '../../config.php';


if ($_POST['mode'] === 'add') {
     
     $fileName = $_FILES['upload_file']['name']; 
     $uploadFilePath = $folder_dir.$fileName; 
      
     // Upload file to server 
     if(move_uploaded_file($_FILES['upload_file']['tmp_name'], $uploadFilePath)){ 
         // Insert file information in the database 
         mysqli_query($link, "INSERT INTO tblfiles (UPLOAD_FILE_NAME)
        VALUES ('$fileName')");

        echo json_encode(true);
     } 
          
    
}  

if ($_POST['mode'] === 'edit') {
    
    $result = mysqli_query($link,"SELECT id, UPLOAD_FILE_NAME FROM tblfiles WHERE id='" . $_POST['id'] . "'");
    $row= mysqli_fetch_array($result);
     echo json_encode($row);
}   

if ($_POST['mode'] === 'update') {

    //! Unlink
        //Select the file for delete
        $file_sql = "SELECT UPLOAD_FILE_NAME FROM tblfiles WHERE id = '".$_POST["id"]."'";
        $file_query = mysqli_query($link, $file_sql);
        $fileData = mysqli_fetch_array($file_query);
        $fileName = $fileData['UPLOAD_FILE_NAME'];

        $file = $folder_dir.$fileName;
        unlink($file);

    $fileName = $_FILES['upload_file']['name']; 
     $uploadFilePath = $folder_dir.$fileName; 
     // Upload file to server 
     if(move_uploaded_file($_FILES['upload_file']['tmp_name'], $uploadFilePath)){ 
         // Insert file information in the database 
       mysqli_query($link,"UPDATE tblfiles set  UPLOAD_FILE_NAME = '$fileName' WHERE id='" . $_POST['id'] . "'");
        echo json_encode(true);
     } 
}  

if ($_POST['mode'] === 'delete') {

    //Select the file for delete
    $file_sql = "SELECT UPLOAD_FILE_NAME FROM tblfiles WHERE id = '".$_POST["id"]."'";
    $file_query = mysqli_query($link, $file_sql);
    $fileData = mysqli_fetch_array($file_query);
    $fileName = $fileData['UPLOAD_FILE_NAME'];

    $file = $folder_dir.$fileName;
    unlink($file);

     mysqli_query($link, "DELETE FROM tblfiles WHERE id='" . $_POST["id"] . "'");
     echo json_encode(true);
}  

?>