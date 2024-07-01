<?php
$response = array();
$servername = "localhost"; $username = "root"; $password = ""; $dbname = "employeemanagement";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT *FROM employee");
if ($result->num_rows > 0) {

    $response["employee"] = array();
    while($row = $result->fetch_assoc()) {
        $employee = array();
        $employee["EMPLOYEEID"] = $row["EMPLOYEEID"];
        $employee["EMPLOYEENAME"] = $row["EMPLOYEENAME"];
        $employee["EMAIL"] = $row["EMAIL"];
        $employee["PHONE"] = $row["PHONE"];
        $employee["ADDRESS"] = $row["ADDRESS"];
        $employee["DEPARTMENTID"] = $row["DEPARTMENTID"];
        array_push($response["employee"], $employee);
    }
    $response["success"] = 1;
    echo json_encode($response);
} else {
    $response["success"] = 0;
    $response["message"] = "No employees found";
    echo json_encode($response);
}
?>
