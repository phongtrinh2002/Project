<?php
$response = array();
$servername = "localhost"; $username = "root"; $password = ""; $dbname = "employeemanagement";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT *FROM department");
if ($result->num_rows > 0) {

    $response["department"] = array();
    while($row = $result->fetch_assoc()) {
        $product = array();
        $product["DEPARTMENTID"] = $row["DEPARTMENTID"];
        $product["DEPARTMENTNAME"] = $row["DEPARTMENTNAME"];
        $product["DESCRIPTION"] = $row["DESCRIPTION"];
        array_push($response["department"], $product);
    }
    $response["success"] = 1;
    echo json_encode($response);
} else {
    $response["success"] = 0;
    $response["message"] = "No departments found";
    echo json_encode($response);
}
?>
