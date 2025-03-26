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

// Getting the List of Customer List in specific row
$get_child_idSql = "SELECT * FROM tblrequest_item WHERE IT_REQUEST_TRANSACTION_ID = '".$get_parent_idRow['IT_TRANSACTION_ID']."'";
$get_child_idQUery = mysqli_query($link,$get_child_idSql);
$get_child_idRow = mysqli_fetch_array($get_child_idQUery);

?>

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <!--  Content -->

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                <div class="col-12">
                    <h4>
                    <img src="../../../dist/img/system.png" alt="System" height="40" width="100" class="mr-2"> IT Borrowing Request Form
                    <small class="float-right ml-4"><b>Date:</b> <?php echo $get_parent_idRow["IT_TRANSACTION_DATETIME"];?> </small>
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
                        <th>Qty</th>
                        <th>Control Number</th>
                        <th>Item Name</th>
                        <th>Item Remarks</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php 
                    if($get_child_result = mysqli_query($link, $get_child_idSql)){
                        if(mysqli_num_rows($get_child_result) > 0 ){
                        while($get_child_idRow = mysqli_fetch_array($get_child_result)){ ?>
                    <tr>
                        <td><?php echo $get_child_idRow["IT_REQUEST_ITEM_QUANTITY"];?></td>
                        <td><?php echo $get_child_idRow["IT_REQUEST_CONTROL_NUMBER"];?></td>
                        <td><?php echo $get_child_idRow["IT_REQUEST_ITEM_NAME"];?></td>      
                        <td><?php echo $get_child_idRow["IT_REQUEST_ITEM_REMARKS"];?></td> 
                    </tr>
                    <?php } 
                        mysqli_free_result($get_child_result);
                        } 
                    else { echo ""; }
                    } 
                    else
                    { echo "ERROR: Could not able to execute $get_child_idSql. " . mysqli_error($link); }
    
                
                    ?>
                        
                    </tbody>
                    </table>
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
            
            <!-- Content -->

            <!-- Comment Box -->
            <form id="announce" name="announce">
                <div class="card">
                    <div class="card-header"> 
                    <h3 class="card-title">
                        <div class="user-block">
                            Reply:
                        </div>
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                    
                <div class="card-body">
                    <div class="post">
                            <input type="hidden" name="comment_name" id="comment_name" value="<?php echo $user_name;?>">
                            <input type="hidden" name="comment_announce_id" id="comment_announce_id" value="<?php echo $url_num;?>" />
                            <textarea id="commentContent" name="commentContent"></textarea>
                            <p>
                            <span class="float-left">
                                <button id="commentBtn" name="commentBtn" class="btn btn-secondary"> Comment </button>
                            </span>
                            </p>
                    </div>
                </div>
                </div>
            </form>
        <!-- Comment Box -->

        <!--  -->
            <?php 
            $display_commentSql = 
            "SELECT a.id aId, a.COMMENT_REQUEST_ID_HASHED aCAID, a.COMMENT_NAME aCN, a.COMMENT_CONTENT aCC, a.COMMENT_DATETIME aCDT, b.USER_PIC uPic
                FROM tblrequest_comment a 
                JOIN tbluser b 
                ON a.COMMENT_NAME = b.USER_NAME
                WHERE a.COMMENT_REQUEST_ID_HASHED = '$url_num'
                ORDER BY a.COMMENT_DATETIME DESC";
                $display_commentQuery = mysqli_query($link,$display_commentSql);
                $display_commentRow = mysqli_fetch_array($display_commentQuery);
                if($display_commentQuery = mysqli_query($link, $display_commentSql)){
                while($display_commentRow = mysqli_fetch_array($display_commentQuery)){?>
                <div class="card">
                <div class="card-header"> 
                    <h3 class="card-title">
                    <div class="user-block">
                        <?php echo '<img class="img-circle img-bordered-sm" src="data:image/jpeg;base64,'.base64_encode( $display_commentRow['uPic'] ).'"/>'; ?>
                        <span class="username">
                        <a> <?php echo $display_commentRow['aCN']; ?> </a>
                        </span>
                        <span class="description">
                            <?php 
                            $timestamp = $display_commentRow['aCDT'];
                            $splitTimeStamp = explode(" ",$timestamp);
                            $date =  date('F d, Y',strtotime($splitTimeStamp[0]));
                            $time = date('h:iA', strtotime($splitTimeStamp[1]));
                            echo $date." at ".$time 
                            ?>
                            <i class="fas fa-globe-asia"></i>
                        </span> 
                    </div>
                    </h3>

                    <div class="card-tools">
                    <?php if($display_commentRow['aCN'] == $_SESSION['USER_NAME']) { ?>
                    <a href="javascript:void(0)"  title="Delete Post" data-toggle="tooltip\ title=\Delete Data" id="deleteComment" class="btn btn-tool" data-id="<?php echo $display_commentRow['aId'];?>"> 
                        <i class="fas fa-trash"></i>
                    </a>
                    <?php } ?>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="post">
                        <p><?php echo $display_commentRow['aCC']; ?></p> 
                        <a href="#" class="link-black text-sm mr-2 disabled"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm disabled"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                    </div>
                    
                    <!-- Post -->
                </div>
                <div class="card-footer"></div>
                </div>
                <?php }
                    } ?>
        <!--  -->
        </div>
      </div>
    </div>
  </section>