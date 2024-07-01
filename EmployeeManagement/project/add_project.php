<?php
$response = array();
$servername = "localhost"; $username = "root"; $password = ""; $dbname = "employeemanagement";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['PROJECTID']) &&isset($_POST['PROJECTNAME']) && isset($_POST['DESCRIPTION'])) {
    $PROJECTID = $_POST['PROJECTID'];
    $PROJECTNAME = $_POST['PROJECTNAME'];
    $DESCRIPTION = $_POST['DESCRIPTION'];
    $sql = "INSERT INTO project(PROJECTID, PROJECTNAME, DESCRIPTION) VALUES('$PROJECTID', '$PROJECTNAME', '$DESCRIPTION')";
if ($conn->query($sql) === TRUE) {
    $response["success"] = 1;
    $response["message"] = "Project successfully created.";
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
