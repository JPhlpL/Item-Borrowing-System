<?php 

require_once '../../config.php';

//Display config email
$systemSql = "SELECT * FROM tblsysteminfo WHERE id = 1";
$systemQuery = mysqli_query($link,$systemSql);
$systemConfig = mysqli_fetch_array($systemQuery);

?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col">
          <!-- general form elements -->
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">System Setup</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label>System Name:</label>
                            <input type="text" class="form-control" id="system_name" value="<?php echo $systemConfig['SYSTEM_NAME']; ?>" name="system_name"/>
                        </div>
                        <div class="form-group">
                            <label>System Title Header:</label>
                            <textarea id="system_title_header" name="system_title_header"><?php echo $systemConfig['SYSTEM_TITLE_HEADER']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Author:</label>
                            <input type="text" class="form-control" id="system_author" value="<?php echo $systemConfig['SYSTEM_AUTHOR']; ?>" name="system_author"/>
                        </div>
                        <div class="form-group">
                            <label>Department:</label>
                            <input type="text" class="form-control" id="system_dept" value="<?php echo $systemConfig['SYSTEM_DEPT']; ?>" name="system_dept"/>
                        </div>
                        <div class="form-group">
                            <label>Status:</label>
                            <input type="text" class="form-control" id="system_status" value="<?php echo $systemConfig['SYSTEM_STATUS']; ?>" name="system_status"/>
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <textarea id="system_description" name="system_description"><?php echo $systemConfig['SYSTEM_DESCRIPTION']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>System Logo:</label>
                            <textarea id="system_logo" name="system_logo"><?php echo $systemConfig['SYSTEM_LOGO']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Date and Time Published:</label>
                            <input type="datetime-local" class="form-control" id="system_datetime_published" value="<?php echo $systemConfig['SYSTEM_DATETIME_PUBLISHED']; ?>" name="system_datetime_published"/>
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <input type="hidden" name="id" id="id" value="<?php echo $systemConfig['id'];?>">
                <input type="submit" id="configSystemBtn" class="btn btn-secondary"/>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>