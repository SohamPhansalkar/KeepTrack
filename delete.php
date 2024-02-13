<?php
include "server.php";
global $tablename;
global $mainURL;

$id = $_GET['id'];

$sql = "DELETE FROM $tablename WHERE id = $id";


if ($conn->query($sql) === TRUE) {
    echo "<script>window.location.replace('$mainURL');</script>";
} else {
    echo "<>Error: " . $sql . "<br>" . $conn->error . "</h1>";
}