<?php
$response = array();
$servername = "localhost"; $username = "root"; $password = ""; $dbname = "employeemanagement";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['EMPLOYEEID']) &&isset($_POST['EMPLOYEENAME']) && isset($_POST['EMAIL']) 
    && isset($_POST['PHONE']) && isset($_POST['ADDRESS']) && isset($_POST['DEPARTMENTID'])) {
    $EMPLOYEEID = $_POST['EMPLOYEEID'];
    $EMPLOYEENAME = $_POST['EMPLOYEENAME'];
    $EMAIL = $_POST['EMAIL'];
    $PHONE = $_POST['PHONE'];
    $ADDRESS = $_POST['ADDRESS'];
    $DEPARTMENTID = $_POST['DEPARTMENTID'];
    $sql = "INSERT INTO employee(EMPLOYEEID, EMPLOYEENAME, EMAIL, PHONE, ADDRESS, DEPARTMENTID) 
            VALUES('$EMPLOYEEID', '$EMPLOYEENAME', '$EMAIL', '$PHONE', '$ADDRESS', '$DEPARTMENTID')";
if ($conn->query($sql) === TRUE) {
    $response["success"] = 1;
    $response["message"] = "Employee successfully created.";
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
