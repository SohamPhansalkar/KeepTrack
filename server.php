<?php

//initiating server details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "KeepTrack";

global $mainURL;
$mainURL = "http://localhost/Keep%20Track/";

global $tablename;
$tablename = "keeptrack";

// Establish connection
global $conn;
$conn = new mysqli($servername, $username, $password, $dbname);

global $result;
global $sql;
$sql = "SELECT * FROM $tablename";
$result = $conn->query($sql);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{
    echo "<script>console.log('Data Base connected!');</script>";
}