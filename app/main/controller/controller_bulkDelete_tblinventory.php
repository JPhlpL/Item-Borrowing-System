<?php 
// Database connection info 
require_once '../../config.php';
$data_ids = $_REQUEST['data_ids'];
$data_id_array = explode(",", $data_ids); 
if(!empty($data_id_array)) {
    foreach($data_id_array as $id) {
         //Select the file for delete

         //! Improve
         $file_sql = "SELECT IT_ITEM_PHOTO FROM tblinventory";
         $file_sql.= "WHERE id = '".$id."'";

         $file_query = mysqli_query($link, $file_sql);
         $fileData = mysqli_fetch_array($file_query);
         $fileName = $fileData['IT_ITEM_PHOTO'];
 
         $file = $folder_dir.$fileName;
         unlink($file);

        $sql = "DELETE FROM tblinventory ";
        $sql.=" WHERE id = '".$id."'";
        $query=mysqli_query($link, $sql) or die("controller_bulkDelete_tblUser.php: delete users");
    }
}

?>