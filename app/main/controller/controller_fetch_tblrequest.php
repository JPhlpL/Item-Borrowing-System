<?php 
session_start();
require '../../config.php';

// mysql db table to use 
$table = 'tblrequest_form'; 


// Table's primary key 
$primaryKey = 'id'; 
 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array( 
    array( 
        'db'        => 'id',
        'dt'        => 0,
        'field' => 'id', 
        'formatter' => function( $d, $row ) { 
            return ''; 
        }),
        array( 
            'db'        => 'id',
            'dt'        => 1,
            'field' => 'id', 
            'formatter' => function( $d, $row ) { 
                return "
                <div class='custom-control custom-switch'>
                      <input type='checkbox' class='custom-control-input selectedRow' id='customSwitch".$row['id']."' value='".$row['id']."'>
                      <label class='custom-control-label' for='customSwitch".$row['id']."'></label>
                    </div>            
                "; 
            }),
    array('db' => 'IT_TRANSACTION_ID', 'dt' => 2, 'field' => 'IT_TRANSACTION_ID'),
    array('db' => 'IT_BORROWER_NAME', 'dt' => 3, 'field' => 'IT_BORROWER_NAME'),
    array('db' => 'IT_DATE_FROM', 
          'dt'        => 4, 
          'field' => 'IT_DATE_FROM',
          'formatter' => function( $d, $row ) { 
              return date( 'M d, Y', strtotime($d));
          }),
    array('db' => 'IT_DATE_TO', 
          'dt'        => 5, 
          'field' => 'IT_DATE_TO',
          'formatter' => function( $d, $row ) { 
            $date = strtotime(date('Y-M-d'));

            if(strtotime($row['IT_DATE_TO']) > $date && $row['IT_STATUS'] !== 'RETURNED'){
                return "<label class='bg-info border rounded'><i class='p-2 nav-icon fas fa-question-circle'>". date( 'M d, Y', strtotime($d))."</i></label>";
                }
            elseif(strtotime($row['IT_DATE_TO']) < $date && $row['IT_STATUS'] !== 'RETURNED'){
                return "<label class='bg-danger border rounded'><i class='p-2 nav-icon fas fa-times'>  ".date( 'M d, Y', strtotime($d))."</i></label>";
                }
            elseif(strtotime($row['IT_DATE_TO']) == $date && $row['IT_STATUS'] !== 'RETURNED'){
                return "<label class='bg-warning border rounded'><i class='p-2 nav-icon fas fa-exclamation-triangle'>  ".date( 'M d, Y', strtotime($d))."</i></label>";
                }
            elseif($row['IT_STATUS'] == 'RETURNED'){
                return "<label class='bg-success border rounded'><i class='p-2 nav-icon fas fa-check'>  ".date( 'M d, Y', strtotime($d))."</i></label>";
                }
            else{
                return false;
            }
            
          }),          
    array('db' => 'IT_STATUS', 'dt' => 6, 'field' => 'IT_STATUS',
    'formatter' => function( $d, $row ) { 
    switch($row['IT_STATUS']){
        case "PENDING":
            return "<label class='bg-warning border rounded'><i class='p-2 nav-icon fas fa-question-circle'>  PENDING</i></label>";
            break;
        case "BORROWED":
            return "<label class='bg-danger border rounded'><i class='p-2 nav-icon fas fa-cart-arrow-down'>  BORROWED</i></label>";
            break;
        case "REJECTED":
            return "<label class='bg-danger border rounded'><i class='p-2 nav-icon fas fa-times'>  REJECTED</i></label>";
            break;
        case "RETURNED":
            return "<label class='bg-success border rounded'><i class='p-2 nav-icon fas fa-check-circle'>  RETURNED</i> </label>";
            break;

            }
        }
    ),
    array('db' => 'IT_PURPOSE', 'dt' => 7, 'field' => 'IT_PURPOSE'),
    array('db' => 'IT_REMARKS', 'dt' => 8, 'field' => 'IT_REMARKS'),
    array('db'        => 'IT_DATETIME_RETURNED',
          'dt'        => 9, 
          'field' => 'IT_DATETIME_RETURNED',
          'formatter' => function( $d, $row ) { 
            if(!empty($row['IT_DATETIME_RETURNED']))
            {
              return date( 'M d, Y h:i:s A', strtotime($d));
            }else{
                return "";
            }
          }),
    array('db'        => 'IT_TRANSACTION_DATETIME',
          'dt'        => 10, 
          'field' => 'IT_TRANSACTION_DATETIME',
          'formatter' => function( $d, $row ) { 
              return date( 'M d, Y h:i:s A', strtotime($d));
          }),
    array( 
        'db'        => 'IT_TRANSACTION_CODE_HASHED',
        'dt'        => 11, 
        'field' => 'IT_TRANSACTION_CODE_HASHED',
        'formatter' => function( $d, $row ) { 
            switch($row['IT_STATUS']){
                case "PENDING":
                    return 
                    '<a data-toggle="tooltip" title="Comment Request" class="border border-secondary text-dark rounded ml-2" href="request_comment.php?'.$row['IT_TRANSACTION_CODE_HASHED'].'"> 
                        <i class="p-2 nav-icon fas fa-comment"></i>
                    </a>
                    <a data-toggle="tooltip" title="View Data" class="border border-secondary text-dark rounded ml-2" href="viewRequestForm.php?'.$row['IT_TRANSACTION_CODE_HASHED'].'"> 
                        <i class="p-2 nav-icon fas fa-eye"></i>
                    </a>
                    <a data-toggle="tooltip" title="Edit Data" class="border border-secondary text-dark rounded ml-2" href="editRequestForm.php?'.$row['IT_TRANSACTION_CODE_HASHED'].'"> 
                        <i class="p-2 nav-icon fas fa-pencil-alt"></i>
                    </a>
                    <a href="javascript:void(0)" data-toggle="tooltip" title="Delete Data" id="btn-delete" class="border border-secondary text-dark rounded ml-2" data-id="'.$row['IT_TRANSACTION_CODE_HASHED'].'"> 
                        <i class="p-2 nav-icon fas fa-trash-alt"></i>
                    </a>'; 
                    break;
                case "BORROWED":
                    return 
                    '<a data-toggle="tooltip" title="Comment Request" class="border border-secondary text-dark rounded ml-2" href="request_comment.php?'.$row['IT_TRANSACTION_CODE_HASHED'].'"> 
                        <i class="p-2 nav-icon fas fa-comment"></i>
                    </a>
                    <a data-toggle="tooltip" title="View Data" class="border border-secondary text-dark rounded ml-2" href="viewRequestForm.php?'.$row['IT_TRANSACTION_CODE_HASHED'].'"> 
                        <i class="p-2 nav-icon fas fa-eye"></i>
                    </a>';
                    break;
                case "REJECTED":
                    return 
                    '
                    <a data-toggle="tooltip" title="Comment Request" class="border border-secondary text-dark rounded ml-2" href="request_comment.php?'.$row['IT_TRANSACTION_CODE_HASHED'].'"> 
                        <i class="p-2 nav-icon fas fa-comment"></i>
                    </a>
                    <a data-toggle="tooltip" title="View Data" class="border border-secondary text-dark rounded ml-2" href="viewRequestForm.php?'.$row['IT_TRANSACTION_CODE_HASHED'].'"> 
                        <i class="p-2 nav-icon fas fa-eye"></i>
                    </a>';
                    break;
                case "RETURNED":
                    return 
                    '
                    <a data-toggle="tooltip" title="Comment Request" class="border border-secondary text-dark rounded ml-2" href="request_comment.php?'.$row['IT_TRANSACTION_CODE_HASHED'].'"> 
                        <i class="p-2 nav-icon fas fa-comment"></i>
                    </a>
                    <a data-toggle="tooltip" title="View Data" class="border border-secondary text-dark rounded ml-2" href="viewRequestForm.php?'.$row['IT_TRANSACTION_CODE_HASHED'].'"> 
                        <i class="p-2 nav-icon fas fa-eye"></i>
                    </a>'; 
                    break;
            }
        }) 
); 



// Include SQL query processing class 
require '../../classes/ssp.class.customized.php'; 

$joinQuery = "FROM tblrequest_form";
$extraWhere = "IT_BORROWER_NAME = '".$_SESSION['USER_NAME']."'";
$groupBy = "";
$having = "";

echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
);
