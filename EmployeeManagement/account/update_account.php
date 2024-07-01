<?php
$response = array();
$servername = "localhost"; $username = "root"; $password = ""; $dbname = "employeemanagement";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['ACCOUNTID']) &&isset($_POST['USERNAME']) && isset($_POST['PASSWORD']) && isset($_POST['ROLE'])) {
   
    $USERNAME = $_POST['USERNAME'];
    $PASSWORD = $_POST['PASSWORD'];
    $ROLE = $_POST['ROLE'];
    $ACCOUNTID = $_POST['ACCOUNTID'];
    $sql="UPDATE account SET PASSWORD= '$PASSWORD',
    USERNAME='$USERNAME', ACCOUNT='$ACCOUNT' WHERE ACCOUNTID='$ACCOUNTID'";
if ($conn->query($sql) === TRUE) {
    $response["success"] = 1;
    $response["message"] = "Account successfully updated.";
    echo json_encode($response);
} else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
    echo json_encode($response);
}
$conn->close();
} else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
    echo json_encode($response);
}
?>
