<?php
$response = array();
$servername = "localhost"; $username = "root"; $password = ""; $dbname = "employeemanagement";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT *FROM account");
if ($result->num_rows > 0) {

    $response["account"] = array();
    while($row = $result->fetch_assoc()) {
        $account = array();
        $account["ACCOUNTID"] = $row["ACCOUNTID"];
        $account["USERNAME"] = $row["USERNAME"];
        $account["PASSWORD"] = $row["PASSWORD"];
        $account["ROLE"] = $row["ROLE"];
        array_push($response["account"], $account);
    }
    $response["success"] = 1;
    echo json_encode($response);
} else {
    $response["success"] = 0;
    $response["message"] = "No accounts found";
    echo json_encode($response);
}
?>
