<?php
/*// 定義資料庫資訊
$DB_NAME = "loginregister"; // 資料庫名稱
$DB_USER = "root"; // 資料庫管理帳號
$DB_PASS = "F131108840"; // 資料庫管理密碼
$DB_HOST = "localhost"; // 資料庫位址

// 連接 MySQL 資料庫伺服器
$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS);
if (empty($con)) {
    print mysqli_error($con);
    die("資料庫連接失敗！");
    exit;
}

// 選取資料庫
if (!mysqli_select_db($con, $DB_NAME)) {
    die("選取資料庫失敗！");
} else {
    //echo "連接 " . $DB_NAME . " 資料庫成功！<br>";
}

// 設定連線編碼
mysqli_query($con, "SET NAMES 'UTF-8'");

// 取得資料
$sql = "SELECT * FROM users";
$result = mysqli_query($con, $sql);

// 獲得資料筆數
if ($result) {
    $num = mysqli_num_rows($result);
    //echo "loginregister 資料表有 " . $num . " 筆資料<br>";
}

// --- 顯示資料 --- //

/*echo "<br>顯示資料（username，password）：<br>";

$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    printf("username : %s<br>", $row[0], $row[1]);
}
*/
//echo "<br>顯示資料（username，password）：<br>";

/*$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    printf("(%s,%s)<br>", $row["username"], $row["password"]);
}*/
/*
echo "<br>顯示資料（MYSQLI_BOTH，欄位數 & 欄位名稱皆可，採用欄位數）：<br>";

$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    printf("第 %s 筆資料 : %s<br>", $row[0], $row[1]);
}

echo "<br>顯示資料（MYSQLI_BOTH，欄位數 & 欄位名稱皆可，採用欄位名稱）：<br>";

$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    printf("第 %s 筆資料 : %s<br>", $row["id"], $row["username"]);
}
// 釋放記憶體
mysqli_free_result($result);

// 關閉連線
mysqli_close($con);
*/
class users{
    // dbection
    private $db;
    // Table
    private $db_table = "users";
    // Columns
    public $id;
    public $username;
    public $password;
    
    // Db dbection
    public function __construct($db){
    $this->db = $db;
    }
    
    // GET ALL
    public function getEmployees(){
    $sqlQuery = "SELECT id, username, password FROM " . $this->db_table . "";
    $this->result = $this->db->query($sqlQuery);
    return $this->result;
    }
    
    // CREATE
    public function createEmployee(){
    // sanitize
    $this->username=htmlspecialchars(strip_tags($this->username));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $sqlQuery = "INSERT INTO
    ". $this->db_table ." SET username = '".$this->username."',
    password = '".$this->password."'";
    $this->db->query($sqlQuery);
    if($this->db->affected_rows > 0){
    return true;
    }
    return false;
    }
    
    // UPDATE
    public function getSingleEmployee(){
    $sqlQuery = "SELECT id, username, password FROM
    ". $this->db_table ." WHERE id = ".$this->id;
    $record = $this->db->query($sqlQuery);
    $dataRow=$record->fetch_assoc();
    $this->username = $dataRow['username'];
    $this->password = $dataRow['password'];
    }
    
    // UPDATE
    public function updateEmployee(){
    $this->username=htmlspecialchars(strip_tags($this->username));
    $this->pasword=htmlspecialchars(strip_tags($this->password));
    $this->id=htmlspecialchars(strip_tags($this->id));
    
    $sqlQuery = "UPDATE ". $this->db_table ." SET username = '".$this->username."',
    password = '".$this->password."'
    WHERE id = ".$this->id;
    
    $this->db->query($sqlQuery);
    if($this->db->affected_rows > 0){
    return true;
    }
    return false;
    }
    
    // DELETE
    function deleteEmployee(){
    $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ".$this->id;
    $this->db->query($sqlQuery);
    if($this->db->affected_rows > 0){
    return true;
    }
    return false;
    }
    }
?>