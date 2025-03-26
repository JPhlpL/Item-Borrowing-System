<?php 

require_once '../../config.php';

// Getting The URL
class URL{
 public $url_add;
 public function __construct()
 { 
  $this->url_add = $_SERVER['REQUEST_URI'];

  $url_add = $this->url_add;
  //Getting the URL ID
  $url = explode('?',$url_add);
  $url_id = $url[1];
  return $this->url_id = $url_id;
 }
}


$url_address = new URL;
$url_num = $url_address->url_id;

// Getting the specific row
$get_parent_idSql = "SELECT * FROM tbltodolistform WHERE RECORD_NUM = '$url_num'";
$get_parent_idQuery = mysqli_query($link,$get_parent_idSql);
$get_parent_idRow = mysqli_fetch_array($get_parent_idQuery);

$delivery_sched = date("M-d-Y",strtotime($get_parent_idRow["RECORD_DATETIME"]));

$date_time = explode(' ',$get_parent_idRow["RECORD_DATETIME"]);
$date = date('M-d-Y', strtotime($date_time[0]));
$time = date('h:s A', strtotime($date_time[1]));

// Getting the List of Customer List in specific row
$get_child_idSql = "SELECT * FROM tbltodolist WHERE TODO_RECORD_NUM = '$url_num'";
$get_child_idQUery = mysqli_query($link,$get_child_idSql);
$get_child_idRow = mysqli_fetch_array($get_child_idQUery);

?>

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">



          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                <img src="../../../dist/img/system.png" alt="System" height="40" width="100" class="mr-2"> Denso Philippines Corporation
                  <small class="float-right">Date: <b> <?php echo $date; ?> </b></small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                From
                <address>
                  <strong>Denso Philippines Corporation</strong><br>
                  109 Unity Avenue<br>
                  Carmelray Industrial Park 1<br>
                  4037 Canlubang<br>
                  Calamba City, Laguna, Philippines
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                To
                <address>
                  <strong><?php echo $get_parent_idRow["RECORD_NAME"]; ?></strong><br>
                    <?php echo $get_parent_idRow["RECORD_REMARKS"]; ?>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <b >Order No. # <?php echo $get_parent_idRow["RECORD_NUM"];?></b><br>
                <br>
                <b>Invoice #: </b> - <br>
                <b>Delivery Schedule: </b><?php echo $delivery_sched; ?><br>
                <b>Order Remarks: </b><?php echo $get_parent_idRow["RECORD_REMARKS"]; ?>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Qty</th>
                    <th>Measurement Unit</th>
                    <th>Part Number</th>
                    <th>Part Name</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php 
                  if($get_child_result = mysqli_query($link, $get_child_idSql)){
                    if(mysqli_num_rows($get_child_result) > 0 ){
                      while($get_child_idRow = mysqli_fetch_array($get_child_result)){ ?>
                  <tr>
                    <td><?php echo $get_child_idRow["TODO_QUANTITY"];?></td>
                    <td><?php echo $get_child_idRow["TODO_REMARKS"];?></td>
                    <td><?php echo $get_child_idRow["TODO_NUMBER"];?></td>
                    <td><?php echo $get_child_idRow["TODO_NAME"];?></td>       
                  </tr>
                  <?php } 
                       mysqli_free_result($get_child_result);
                      } 
                   else { echo ""; }
                   } 
                   else
                   { echo "ERROR: Could not able to execute $get_child_idSql. " . mysqli_error($link); }
   
                   // Close connection
                   mysqli_close($link);
                   ?>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              <div class="col-6">
                <p class="lead">You can access your :</p>
                <img src="../../../dist/img/credit/visa.png" alt="Visa">
                <img src="../../../dist/img/credit/mastercard.png" alt="Mastercard">
                <img src="../../../dist/img/credit/american-express.png" alt="American Express">
                <img src="../../../dist/img/credit/paypal2.png" alt="Paypal">

                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
              </div>
              <!-- /.col -->
              <div class="col-6">
                <p class="lead">Amount Due: -</p>

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th>Subtotal:</th>
                      <td>-</td>
                    </tr>
                    <tr>
                      <th>Tax:</th>
                      <td>-</td>
                    </tr>
                    <tr>
                      <th>Shipping:</th>
                      <td>-</td>
                    </tr>
                    <tr>
                      <th>Total:</th>
                      <td>-</td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-12">
                <a onclick=window.print() rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
              </div>
            </div>
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>