<?php
$response = array();
$servername = "localhost"; $username = "root"; $password = ""; $dbname = "employeemanagement";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT *FROM project");
if ($result->num_rows > 0) {

    $response["project"] = array();
    while($row = $result->fetch_assoc()) {
        $project = array();
        $project["PROJECTID"] = $row["PROJECTID"];
        $project["PROJECTNAME"] = $row["PROJECTNAME"];
        $project["DESCRIPTION"] = $row["DESCRIPTION"];
        array_push($response["project"], $project);
    }
    $response["success"] = 1;
    echo json_encode($response);
} else {
    $response["success"] = 0;
    $response["message"] = "No projects found";
    echo json_encode($response);
}
?>