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
$get_parent_idSql = "SELECT * FROM tblrequest_form WHERE IT_TRANSACTION_CODE_HASHED = '$url_num'";
$get_parent_idQuery = mysqli_query($link,$get_parent_idSql);
$get_parent_idRow = mysqli_fetch_array($get_parent_idQuery);

// Getting the List of Customer List in specific row vs inside Inventory //LEFT OUTER JOIN IS THE SAVIOR
$get_child_idSql = "SELECT a.IT_REQUEST_CONTROL_NUMBER currentControlNumber,
                    a.IT_REQUEST_ITEM_NAME currentItemName,
                    a.IT_REQUEST_ITEM_REMARKS currentItemRemarks,
                    a.IT_REQUEST_ITEM_QUANTITY currentItemQuantity,
                    b.IT_ITEM_QUANTITY inventoryQty,
                    (b.IT_ITEM_QUANTITY - a.IT_REQUEST_ITEM_QUANTITY) AS totaldiff,
                    b.IT_ITEM_NAME itemName
                    FROM tblrequest_item a 
                    LEFT OUTER JOIN tblinventory b 
                    ON a.IT_REQUEST_ITEM_NAME = b.IT_ITEM_NAME
                    WHERE a.IT_REQUEST_TRANSACTION_ID = '".$get_parent_idRow['IT_TRANSACTION_ID']."'";
$get_child_idQUery = mysqli_query($link,$get_child_idSql);
$get_child_idRow = mysqli_fetch_array($get_child_idQUery);

?>

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">



          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <form>
                <!-- title row -->
                <div class="row">
                    
                    <div class="col-12">
                        <h4>
                        <img src="../../../dist/img/system.png" alt="System" height="40" width="100" class="mr-2"> IT Borrowing Request Form
                        <small class="float-right ml-4"><b>Date:</b> <?php echo $get_parent_idRow["IT_TRANSACTION_DATETIME"];?></small>
                        <small class="float-right"><b>Status:</b> 
                            <?php
                            switch($get_parent_idRow['IT_STATUS']){
                            case "PENDING":
                                echo "<label class='bg-warning border rounded'><i class='p-1 nav-icon fas fa-question-circle'> PENDING</i></label>";
                                break;
                            case "BORROWED":
                                echo "<label class='bg-danger border rounded'><i class='p-1 nav-icon fas fa-cart-arrow-down'> BORROWED</i></label>";
                                break;
                            case "REJECTED":
                                echo "<label class='bg-danger border rounded'><i class='p-1 nav-icon fas fa-times'> REJECTED</i></label>";
                                break;
                            case "RETURNED":
                                echo "<label class='bg-success border rounded'><i class='p-1 nav-icon fas fa-check-circle'> RETURNED</i> </label>";
                                break;
                                }
                            ?>
                        </small>
                        
                        </h4>
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">

                    <div class="col-sm-4 invoice-col">
                        <div><b>Transaction No. #</b> <?php echo $get_parent_idRow["IT_TRANSACTION_ID"];?></div>
                        <div><b>Borrower Name: </b><?php echo $get_parent_idRow["IT_BORROWER_NAME"]; ?></div>
                    </div>

                    <div class="col-sm-4 invoice-col">
                        <div><b>From:</b> <?php echo $get_parent_idRow["IT_DATE_FROM"];?></div>
                        <div><b>To:</b> <?php echo $get_parent_idRow["IT_DATE_TO"]; ?></div>
                    </div>

                    <div class="col-sm-4 invoice-col">
                        <b>Purpose:</b>
                        <address>
                        <?php echo $get_parent_idRow["IT_PURPOSE"]; ?>
                        </address>
                    </div>

                </div>

                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th>Control Number</th>
                                <th>Item Name</th>
                                <th>Item Remarks</th>
                                <th class="text-info">Current Qty</th>
                                <th> Request Qty</th>
                                <th> Total </th>
                            </tr>
                            </thead>
                            <tbody>

                                <?php 
                                if($get_child_result = mysqli_query($link, $get_child_idSql)){
                                    if(mysqli_num_rows($get_child_result) > 0 ){
                                    while($get_child_idRow = mysqli_fetch_array($get_child_result)){ ?>
                                <tr>
                                    <td><?php echo $get_child_idRow["currentControlNumber"];?></td>
                                    <td><?php echo $get_child_idRow["currentItemName"];?></td>      
                                    <td><?php echo $get_child_idRow["currentItemRemarks"];?></td> 
                                    <td>
                                        <?php 
                                            if(!isset($get_child_idRow["inventoryQty"])){
                                            echo 0;
                                            }
                                            else{
                                                echo $get_child_idRow["inventoryQty"];
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if(!isset($get_child_idRow["currentItemQuantity"])){
                                            echo 0;
                                            }
                                            else{
                                                echo $get_child_idRow["currentItemQuantity"];
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                        if(isset($get_child_idRow["totaldiff"]))
                                        {
                                            if($get_child_idRow["totaldiff"] <= 0){
                                                echo "<label class='text-danger'>".$get_child_idRow["totaldiff"]."</label>";
                                            }
                                            else{
                                                echo "<label class='text-success'>".$get_child_idRow["totaldiff"]."</label>";
                                            }
                                        }
                                        else{
                                            echo $get_child_idRow["currentItemQuantity"];
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php } 
                                    mysqli_free_result($get_child_result);
                                    } 
                                else { echo ""; }
                                } 
                            else{ echo "ERROR: Could not able to execute $get_child_idSql. " . mysqli_error($link); }
            
                         
                            ?>
                            </tbody>
                        </table>
                    </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- this row will not appear when printing -->
                <div class="row justify-content-between">
                    <div class="col-3 no-print">
                        <a onclick=window.print() rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                        <a title="Edit Data" class="btn btn-default" href="editRequestForm.php?<?php echo getTransactCode(); ?>"> 
                            <i class="fas fa-pen"></i> Revise
                        </a>
                    </div>
                    <div class="col-2t">
                        <!-- <input type="text" id="IT_TRANSACTION_CODE_HASHED" name="IT_TRANSACTION_CODE_HASHED" value="<?php //getTransactCode(); ?>" > -->
                        <input type="hidden" name="IT_TRANSACTION_CODE_HASHED" id="IT_TRANSACTION_CODE_HASHED" value="<?php echo getTransactCode();?>">
                        <button type="submit" id="approvalBtn" name="Approve" class="btn btn-default"><i class="fas fa-check text-success"></i> Approve</button>
                        <button type="submit" id="declineBtn" name="Decline" class="btn btn-default"><i class="fas fa-times text-danger"></i> Decline</button>
                    </div>
                </div>
            </form>
          </div>

          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>