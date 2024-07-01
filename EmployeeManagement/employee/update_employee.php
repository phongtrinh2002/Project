<?php
$response = array();
$servername = "localhost"; $username = "root"; $password = ""; $dbname = "employeemanagement";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['EMPLOYEENAME']) && isset($_POST['EMAIL'])
    && isset($_POST['DEPARTMENTID'])&& isset($_POST['DEPARTMENTID'])&& isset($_POST['EMPLOYEEID'])) {
   
    $EMAIL = $_POST['EMAIL'];
    $EMPLOYEENAME = $_POST['EMPLOYEENAME'];
    $EMPLOYEEID = $_POST['EMPLOYEEID'];
    $PHONE = $_POST['PHONE'];
    $ADDRESS = $_POST['ADDRESS'];
    $sql="UPDATE employee SET EMPLOYEENAME= '$EMPLOYEENAME', PHONE= '$PHONE',
    EMAIL='$EMAIL', ADDRESS= '$ADDRESS' WHERE EMPLOYEEID='$EMPLOYEEID'";
if ($conn->query($sql) === TRUE) {
    $response["success"] = 1;
    $response["message"] = "Employee successfully updated.";
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
