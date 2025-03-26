<?php 

require_once '../../config.php';

//Display config email
$emailConfigSql = "SELECT * FROM tblconfigmail WHERE id = 1";
$emailConfigQuery = mysqli_query($link,$emailConfigSql);
$emailConfig = mysqli_fetch_array($emailConfigQuery);

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
              <h3 class="card-title">Email Setup</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label>Host Address</label>
                            <input type="text" class="form-control" id="host_address" value="<?php echo $emailConfig['HOST_ADDRESS']; ?>" name="host_address"/>
                        </div>
                        <div class="form-group">
                            <label>Charset</label>
                            <input type="text" class="form-control" id="host_charset" value="<?php echo $emailConfig['HOST_CHARSET']; ?>" name="host_charset"/>
                        </div>
                        <div class="form-group">
                            <label>SMTP Secure</label>
                            <input type="text" class="form-control" id="host_smtp_secure" value="<?php echo $emailConfig['HOST_SMTP_SECURE']; ?>" name="host_smtp_secure"/>
                        </div>
                        <div class="form-group">
                            <label>Port Address</label>
                            <input type="text" class="form-control" id="host_port" value="<?php echo $emailConfig['HOST_PORT']; ?>" name="host_port"/>
                        </div>
                        <div class="form-group">
                            <label>SMTP Keep Alive</label>
                            <input type="text" class="form-control" id="host_smtpkeepalive" value="<?php echo $emailConfig['HOST_SMTPKEEPALIVE']; ?>" name="host_smtpkeepalive"/>
                        </div>
                        <div class="form-group">
                            <label>isHTML</label>
                            <input type="text" class="form-control" id="host_ishtml" value="<?php echo $emailConfig['HOST_ISHTML']; ?>" name="host_ishtml"/>
                        </div>
                        <div class="form-group">
                            <label>Email Sender</label>
                            <input type="email" class="form-control" id="host_setfrom" value="<?php echo $emailConfig['HOST_SETFROM']; ?>" name="host_setfrom"/>
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <input type="hidden" name="id" id="id" value="<?php echo $emailConfig['id'];?>">
                <input type="submit" id="configEmailBtn" class="btn btn-secondary"/>
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