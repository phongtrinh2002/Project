<?php
$response = array();
$servername = "localhost"; $username = "root"; $password = ""; $dbname = "employeemanagement";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['PROJECTNAME']) && isset($_POST['DESCRIPTION'])&& isset($_POST['PROJECTID'])) {
   
    $DESCRIPTION = $_POST['DESCRIPTION'];
    $PROJECTNAME = $_POST['PROJECTNAME'];
    $PROJECTID = $_POST['PROJECTID'];
    $sql="UPDATE project SET PROJECTNAME= '$PROJECTNAME',
    DESCRIPTION='$DESCRIPTION' WHERE PROJECTID='$PROJECTID'";
if ($conn->query($sql) === TRUE) {
    $response["success"] = 1;
    $response["message"] = "Project successfully updated.";
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
