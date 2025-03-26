<?php
// Universal Config
    class Database_Connection
    {
        private $host = "localhost";
        private $user = "u210059680_sysJP";
        private $password = '$fNkn#Vub.FpYh2';
        private $db = "u210059680_systemDB";

        public function __construct()
        {
        
            $conn = mysqli_connect($this -> host, $this -> user, $this -> password, $this -> db);

            if($conn->connect_error)
            {
                die ("<h1>Database Connection Failed</h1>");
            }
            //echo "Database Connected Successfully";
            return $this->conn = $conn;
        }
    }
    $db = new Database_Connection;
    $link = $db->conn;
// Universal Config

//For CartRequest 
    class DBController {
        private $host = "localhost";
        private $user = "u210059680_sysJP";
        private $password = '$fNkn#Vub.FpYh2';
        private $database = "u210059680_systemDB";
        private $conn;
        
        function __construct() {
            $this->conn = $this->connectDB();
        }
        
        function connectDB() {
            $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
            return $conn;
        }
        
        function runQuery($query) {
            $result = mysqli_query($this->conn,$query);
            while($row=mysqli_fetch_assoc($result)) {
                $resultset[] = $row;
            }		
            if(!empty($resultset))
                return $resultset;
        }
        
        function numRows($query) {
            $result  = mysqli_query($this->conn,$query);
            $rowcount = mysqli_num_rows($result);
            return $rowcount;	
        }
    }
//For CartRequest 

// storing  request (ie, get/post) global array to a variable  
    $requestData= $_REQUEST;
        
    // Database connection info 
    $sql_details = array( 
        'host' => 'localhost', 
        'user' => "u210059680_sysJP", 
        'pass' => '$fNkn#Vub.FpYh2', 
        'db'   => 'u210059680_systemDB' 
    ); 

    $ip_address = "10.72.141.246";
    $folder_dir = "../../uploads/";
// storing  request (ie, get/post) global array to a variable  


//System Configuration Display
    $systemConfSql = "SELECT * FROM tblsysteminfo WHERE id = 1";
    $systemConfQuery = mysqli_query($link,$systemConfSql);
    $systemData = mysqli_fetch_array($systemConfQuery);
    $systemName = $systemData['SYSTEM_NAME'];
    $systemTitleHeader = $systemData['SYSTEM_TITLE_HEADER'];
    $systemAuthor = $systemData['SYSTEM_AUTHOR'];
    $systemDept = $systemData['SYSTEM_DEPT'];
    $systemStatus = $systemData['SYSTEM_STATUS'];
    $systemDescription = $systemData['SYSTEM_DESCRIPTION'];
    $systemLogo = $systemData['SYSTEM_LOGO'];
    $systemDatetime_published = $systemData['SYSTEM_DATETIME_PUBLISHED'];

// Error Hiding
function hideError()
{
    error_reporting(E_ERROR | E_PARSE);
    error_reporting(0);
    ini_set('display_errors', 0);
    error_reporting(E_ALL ^ E_WARNING); 
    
}


?>
