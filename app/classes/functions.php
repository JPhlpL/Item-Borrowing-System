<?php 


//! For Improvement using OOP
function param_title()
{
    global $param_title;
    $set_url = $_SERVER['REQUEST_URI'];
    $title = explode('view/',$set_url);
    $param_title = parse_url($title[1], PHP_URL_PATH); // KEY FOR REMOVING GET PARAMETERS

    
    return $param_title;
}
param_title();

function display_title()
{   
    global $param_title;

    switch($param_title)
    {
    //
    case "login.php":
        echo "Login";
        break;
    case "register.php":
        echo "Account Registration";
        break;
    case "forgot-password.php":
        echo "Forgot Password";
        break;
    case "recover-password.php":
        echo "Recover Password";
        break;
    case "success_register_account.php":
        echo "Success!";
        break;
    case "success_changeprofilepic.php":
        echo "Success!";
        break;
    case "failed_register_account.php":
        echo "Failed!";
        break;
    //
    case "dashboard.php":
        echo "Dashboard";
        break;
    case "announcement.php":
        echo "Announcement";
        break;
    case "comment.php":
        echo "Comment Section";
        break;
    case "announcement.php":
        echo "Announcement";
        break;
    case "userManagement.php":
        echo "List of Users";
        break;
    case "emailConfig.php":
        echo "Email Configuration";
        break;
    case "systemConfig.php":
        echo "System Configuration";
        break;
    case "toDoList.php":
        echo "To-Do List";
        break;
    case "tbltoDoList.php":
        echo "List of Reminders";
        break;
    case "viewToDoList.php":
        echo "View Reminder";
        break;
    case "fileManagement.php":
        echo "File Management";
        break;
    case "tblfiles.php":
        echo "List of Uploaded Files";
        break;
    case "calendar.php":
        echo "Calendar";
        break;
    case "manual.php":
        echo "Manual";
        break;
    case "contacts.php":
        echo "Contacts";
        break;
    case "support.php":
        echo "Ask Support";
        break;
    case "about.php":
        echo "About";
        break;
    //Main
    case "tblrequest.php":
        echo "List of Request";
        break;
    case "tblapprove.php":
        echo "List of All User's Request";
        break;
    case "tblinventory.php":
        echo "Inventory";
        break;
    case "inventoryUpload.php":
        echo "Upload Inventory";
        break;
    case "addMultipleItem.php":
        echo "Add Items";
        break;
    case "addRequestForm.php":
        echo "Add Request Form";
        break;
    case "viewRequestForm.php":
        echo "View Request Form";
        break;
    case "editRequestForm.php":
        echo "Edit Request Form";
        break;
    case "approveRequestForm.php":
        echo "Approve Request Form";
        break;
    case "returnRequestForm.php":
        echo "Return Request Form";
        break;
    case "request_comment.php":
        echo "Request Comment";
        break;
    case "cartrequest.php":
    case "addtocart.php":
        echo "Create Request";
        break;
    //
    case "timeline.php":
        echo "Timeline";
        break;
    case "activity.php":
        echo "Activity";
        break;
    case "updateprofile.php":
        echo "Update Profile";
        break;
    case "changeuserpass.php":
        echo "Change Username and Password";
        break;
    case "changeprofilepic.php":
        echo "Change Profile Picture";
        break;
    }
    return $param_title;

}

if(param_title() == "addRequestForm.php" || param_title() == "addtocart.php")
{
    // Select Previous Data
    $selectPrevData = mysqli_query($link,"SELECT IT_TRANSACTION_ID transactID FROM tblrequest_form ORDER BY IT_TRANSACTION_DATETIME DESC LIMIT 1");
    $prevDataRow = mysqli_fetch_array($selectPrevData);

    if(isset($prevDataRow['transactID'])){
        $getPrevDataRow = explode('F',$prevDataRow['transactID']);
        $getPrevData = $getPrevDataRow[1];
        //Increment by 1
        $currentTransactNum = $getPrevData + 1;
        $currentTransactID = $getPrevDataRow[0].'F'.$currentTransactNum;
    }
    else{
        $currentTransactID = "ITEMREQ-2022-F1";
    }

    

}
//Getting the Code Hashed Transaction
if(param_title() == "editRequestForm.php" || param_title() == "approveRequestForm.php" || param_title() == "returnRequestForm.php")
{
    function getTransactCode(){
        $param_url = explode('?', $_SERVER['REQUEST_URI']);
        $param_id = $param_url[1];
        return $param_id;
    }
    getTransactCode();
   
    // Get the Current Transaction
    $getCurrentTransaction = "SELECT * FROM tblrequest_form WHERE IT_TRANSACTION_CODE_HASHED = '".getTransactCode()."'";
    $getCurrentTransactionQuery = mysqli_query($link,$getCurrentTransaction);
    $getCurrentRow = mysqli_fetch_array($getCurrentTransactionQuery);

    $request_id = $getCurrentRow['IT_TRANSACTION_ID'];
    $requestor = $getCurrentRow['IT_BORROWER_NAME'];
    $dateFrom = $getCurrentRow['IT_DATE_FROM'];
    $dateTo = $getCurrentRow['IT_DATE_TO'];
    $requestRemarks = $getCurrentRow['IT_REMARKS'];
    $purpose = $getCurrentRow['IT_PURPOSE'];

    $getCurrentRequestItems = "SELECT * FROM tblrequest_item WHERE IT_REQUEST_TRANSACTION_ID = '$request_id'";
    $getCurrentItemsQuery = mysqli_query($link,$getCurrentRequestItems);
    $getAllItemRow = mysqli_fetch_array($getCurrentItemsQuery);

    $item_name = $getAllItemRow['IT_REQUEST_ITEM_NAME'];
    $item_control_number = $getAllItemRow['IT_REQUEST_CONTROL_NUMBER'];
    $item_quantity = $getAllItemRow['IT_REQUEST_ITEM_QUANTITY'];
    $item_request_remarks = $getAllItemRow['IT_REQUEST_ITEM_REMARKS'];   
}


if(param_title() !== "login.php")
{
    $user_id = $_SESSION["USER_ID"];
    $user_name = $_SESSION["USER_NAME"];
    $user_emp_id = $_SESSION["USER_EMPLOYEE_ID"];
    $user_type = $_SESSION["USER_ACCOUNT_TYPE"];
}

// Getting the URL ID Paramater
    if(param_title()=="comment.php"){
        function getUrlParam()
        {
            $url = $_SERVER['REQUEST_URI'];
            $url_param = explode('?',$url);
            $param_id = $url_param[1];
            return $param_id;
        }
        $param_id = getUrlParam();
    }
// Getting the URL ID Paramater

// Putting Count in Comment Portion
    if(param_title()=="announcement.php")
    {
        if(isset($total_comment_count)){
            function getCountComment($link){
                global $displayRow;
                $count_comment_sql = "SELECT COUNT(*) AS total_comment FROM tblcomment WHERE COMMENT_ANNOUNCE_ID = '".$displayRow['aId']."'";
                $count_query = mysqli_query($link,$count_comment_sql);
                $count_all_comment = mysqli_fetch_array($count_query);
                $countComment = $count_all_comment['total_comment'];
                return $countComment;
            }
            $total_comment_count = getCountComment($link);
        } 
        
    }
// Putting Count in Comment Portion


//Count All Users
    function countAllUsers($link){
        global $param_title;
        if($param_title != "changeprofilepic.php"){
            $count_all_sql = "SELECT COUNT(*) AS total FROM tbluser";
            $count_all_result = mysqli_query($link,$count_all_sql);
            $count_all_row = mysqli_fetch_array($count_all_result);
            $countAll = $count_all_row['total'];
            echo $countAll;
        }
        else { echo ""; }
    }
//Count All Users


//if the admin tool is open\
    switch(param_title())
    {
        case "userManagement.php":
        case "emailConfig.php":
        case "systemConfig.php":
        case "tbltoDoList.php":
        case "fileManagement.php":
        case "tblfiles.php":
        case "toDoList.php":
        case "viewToDoList.php":
            $menuSet = "menu-open";
            $navLink = "active";
            break;
        default:
            $menuSet = "menu";
            $navLink = "";
            break;
    }
//if the admin tool is open\

//if the request tool is open\
switch(param_title())
{
    case "tblrequest.php":
    case "cartrequest.php":
    case "addtocart.php":
        $menuSetRequest = "menu-open";
        $navLinkRequest = "active";
        break;
    default:
        $menuSetRequest = "menu";
        $navLinkRequest = "";
        break;
}
//if the request tool is open\


// Cartrequest
    if(param_title() == 'cartrequest.php' || param_title() == 'addtocart.php')
    {
        $db_handle = new DBController();
        if(!empty($_GET["action"])) {
        switch($_GET["action"]) {
            //
            case "add":
                if(!empty($_POST["quantity"])) {
                    $productByCode = $db_handle->runQuery("SELECT * FROM tblinventory WHERE IT_ITEM_CONTROL_NUMBER='" . $_GET["controlNumber"] . "'");
                    
                    $itemArray = array($productByCode[0]["IT_ITEM_CONTROL_NUMBER"]=>array('IT_ITEM_NAME'=>$_POST["IT_ITEM_NAME"], 'IT_ITEM_CONTROL_NUMBER'=>$_POST["IT_ITEM_CONTROL_NUMBER"], 'quantity'=>$_POST["quantity"], 'IT_ITEM_PHOTO'=>$productByCode[0]["IT_ITEM_PHOTO"]));
                    
                    if(!empty($_SESSION["cart_item"])) {
                        if(in_array($productByCode[0]["IT_ITEM_CONTROL_NUMBER"],array_keys($_SESSION["cart_item"]))) {
                            foreach($_SESSION["cart_item"] as $k => $v) {
                                    if($productByCode[0]["IT_ITEM_CONTROL_NUMBER"] == $k) {
                                        if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                            $_SESSION["cart_item"][$k]["quantity"] = 0;
                                        }
                                        $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                                    }
                            }
                        } else {
                            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                        }
                    } else {
                        $_SESSION["cart_item"] = $itemArray;
                    }
                }
                $icon = "success";
                $content = "";
                echo "<label class=\"mt-0 toastSuccess\" hidden></label>";
            break;
            //
            case "remove":
                if(!empty($_SESSION["cart_item"])) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($_GET["controlNumber"] == $k)
                                unset($_SESSION["cart_item"][$k]);				
                            if(empty($_SESSION["cart_item"]))
                                unset($_SESSION["cart_item"]);
                    }
                }
            break;
            //
            case "empty":
                unset($_SESSION["cart_item"]);
            break;	
            }
        }
    }
// Cartrequest

//# function for counting to the shoppingcart
function CountAllItems()
{
    if(isset($_SESSION['cart_item'])) {
        if(!empty(count($_SESSION['cart_item']))){
            echo count($_SESSION['cart_item']);
        }
        else{
            echo 0;
        }
    }
    else{
        echo 0;
    }
}
//# function for counting to the shoppingcart
?>   