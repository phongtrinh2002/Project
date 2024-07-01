<?php
$response = array();
$servername = "localhost"; $username = "root"; $password = ""; $dbname = "employeemanagement";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['DEPARTMENTID']) &&isset($_POST['DEPARTMENTNAME']) && isset($_POST['DESCRIPTION'])) {
    $DEPARTMENTID = $_POST['DEPARTMENTID'];
    $DEPARTMENTNAME = $_POST['DEPARTMENTNAME'];
    $DESCRIPTION = $_POST['DESCRIPTION'];
    $sql = "INSERT INTO department(DEPARTMENTID, DEPARTMENTNAME, DESCRIPTION) VALUES('$DEPARTMENTID', '$DEPARTMENTNAME', '$DESCRIPTION')";
if ($conn->query($sql) === TRUE) {
    $response["success"] = 1;
    $response["message"] = "Department successfully created.";
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
