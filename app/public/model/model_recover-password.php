<?php 
//! Getting the param
$url_split = explode('?',$_SERVER['REQUEST_URI']);
$param_code = $url_split[1];

//! Query Join equal to the url param
$acctSelect = "SELECT a.id acct_id, a.USER_ID acct_USER_ID, a.USER_EMPLOYEE_ID acct_USER_EMPLOYEE_ID, a.USER_EMAIL acct_USER_EMAIL
FROM tbluser a JOIN tblforgotpass b ON a.USER_EMAIL = b.RECOVER_EMAIL WHERE b.RECOVER_CODE = '". $param_code ."'";

$acctQuery = mysqli_query($link,$acctSelect);

$acctData = mysqli_fetch_array($acctQuery);

$_SESSION['user_id'] = $acctData['acct_USER_ID'];

$acctUserId = $_SESSION['user_id'] ;

?>

<div class="login-box">
  <div class="card card-outline card-secondary">
    <div class="card-header text-center">
      <b class="h1">Recover Password</b>
    </div>
    <div class="card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
      <form>
      <input type="hidden" id=user_id" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
        <div class="input-group mb-3">
          <input type="password" autocomplete="on" class="form-control pass-key" id="password" name="password" required placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
             <span id="show" class="show fas fa-eye "></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input type="password" autocomplete="on" class="form-control con_pass-key" id="confirm_password" name="confirm_password" required placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
             <span id="con_show" class="con_show fas fa-eye "></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <input type="submit" id="recoverBtn" class="btn btn-secondary btn-block" value="Change password" disabled>
          </div>
          <!-- /.col -->
        </div> 
      </form>
      <!-- Password Validation -->
      Password Match: <span id='message'></span><br><br>
      Password Strength: <span id='pass_status'></span>    
      <p class="mt-3 mb-1">
                <a class="btn btn-secondary" href="../view/login.php">Login Page</a>
              </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->