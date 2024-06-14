<?php
$response = array();
$servername = "localhost"; $username = "root"; $password = ""; $dbname = "employeemanagement";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['DEPARTMENTNAME']) && isset($_POST['DESCRIPTION'])&& isset($_POST['DEPARTMENTID'])) {
   
    $DESCRIPTION = $_POST['DESCRIPTION'];
    $DEPARTMENTNAME = $_POST['DEPARTMENTNAME'];
    $DEPARTMENTID = $_POST['DEPARTMENTID'];
    $sql="UPDATE department SET DEPARTMENTNAME= '$DEPARTMENTNAME',
    DESCRIPTION='$DESCRIPTION' WHERE DEPARTMENTID='$DEPARTMENTID'";
if ($conn->query($sql) === TRUE) {
    $response["success"] = 1;
    $response["message"] = "Department successfully updated.";
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
