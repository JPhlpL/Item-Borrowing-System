
<?php 
if(!empty($_FILES)){ 
    // Include the database configuration file 
    require_once '../../config.php'; 
     
    $fileName = basename($_FILES['file']['name']); 
    $uploadFilePath = $folder_dir.$fileName; 
     
    // Upload file to server 
    if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath)){ 
        // Insert file information in the database 
        $sql = "INSERT INTO tblfiles (UPLOAD_FILE_NAME) VALUES ('".$fileName."')"; 
        $insert = $link->query($sql);
    } 
} 
?>
