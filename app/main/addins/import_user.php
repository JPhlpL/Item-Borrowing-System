<!-- For the file upload  -->
<form method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
    <label>Upload Excel File (.xls, .xlsx, .xlsm) </label> 
    <input type="file" name="file" id="file" class="border rounded" accept=".xls,.xlsx,.xlsm">
    <button type="submit" id="submit" name="import" class="btn bg-dark btn-sm">Import</button>
</form>

<!-- For the display message -->
<div class=" <?php if(!empty($type)) { echo $type . " display-block"; } ?>">
<?php if(!empty($message)) { echo $message;  } ?>
</div>