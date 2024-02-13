<?php
include "server.php";

global $conn;
global $tablename;
//global $result2; causes errors!!!
global $sql;



global $total_daily_expense;
$total_daily_expense = 0;
global $total_udhar;
$total_udhar = 0;
global $total_experiment_funds;
$total_experiment_funds = 0;


$sql = "SELECT * FROM $tablename";
$result2 = $conn->query($sql);

while ($row2 = $result2->fetch_assoc()){
    if ($row2["acc"] == "daily_expense") {

        if ($row2["operation"] == 1) {
            $total_daily_expense = $total_daily_expense + $row2["amount"];

        } else {
            $total_daily_expense = $total_daily_expense - $row2["amount"];

        }
        
    } else if($row2["acc"] == "udhar"){
        $total_udhar = $total_udhar + $row2["amount"];

    }else if($row2["acc"] == "experiment_funds"){

        if ($row2["operation"] == 1) {
            $total_experiment_funds = $total_experiment_funds + $row2["amount"];

        } else {
            $total_experiment_funds = $total_experiment_funds - $row2["amount"];

        }
        
    }
    
}
