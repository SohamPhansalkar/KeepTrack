<?php
//Connecting to server
//& Link used to redirect user back
include "server.php";
global $mainURL;

//assigning data 
$title = $_POST['title'];
$amount = $_POST['amount'];
$operation = $_POST['operation'];
$acc = $_POST['acc'];



//Function to insert data into BD
function insertData($title, $amount, $acc, $operation){
    //calling global vars
    global $conn;
    global $mainURL;
    global $tablename;

    //converting $operation var to 0 or 1 and assigning it to $op
    //0(false) = withdraw, 1(true) = deposit; 
    $op;
    if ($operation == "pos") {
        $op = 1;
    } else {
        $op = 0;
    }
    

    //Main query to insert data
    $sql="INSERT INTO `$tablename` (`id`, `title`, `amount`, `acc`, `operation`, `date`) VALUES (NULL, '$title', $amount, '$acc', $op, current_timestamp())";
    
    //Checking for successful insertion of data 
    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.replace('$mainURL');</script>";
      } else {
        echo "<>Error: " . $sql . "<br>" . $conn->error . "</h1>";
      }
      
}

insertData($title, $amount, $acc, $operation);
