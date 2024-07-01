<?php
$response = array();
$servername = "localhost"; $username = "root"; $password = ""; $dbname = "employeemanagement";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['ACCOUNTID'])) {
    $ACCOUNTID = $_POST['ACCOUNTID'];
    $sql="DELETE from account WHERE ACCOUNTID='$ACCOUNTID'";
if ($conn->query($sql) === TRUE) {
    $response["success"] = 1;
    $response["message"] = "Account successfully deleted.";
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
