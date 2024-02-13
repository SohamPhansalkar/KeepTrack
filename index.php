<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keep Track</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-dark">
    <?php
    include "nav.html";
    include "server.php";
    include "iterate.php";
    ?>

    <div class="entry">
        <form action="insert.php" method="post">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control title-input" id="exampleInputEmail1" name="title" maxlength="50">
            </div>
            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="amount" maxlength="10">
            </div>
            <div class="mb-3 form-check">
            <div class="dropdown" style="text-align: left;">
                <br>
                <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Account
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" id="flexRadioDefault1" name="acc" value="daily_expense" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Daily Expense
                        </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" id="flexRadioDefault1" name="acc" value="udhar">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Udhar
                        </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" id="flexRadioDefault1" name="acc" value="other">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Other
                        </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" id="flexRadioDefault1" name="acc" value="experiment_funds">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Experiment Funds
                        </label>
                        </div>
                    </li>
                </ul>
                </div>

                <br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="flexRadioDefault1" name="operation" value="pos">
                    <label class="form-check-label" style="color: lightgreen;">
                        Increment (+)
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="operation" value="neg"  id="flexRadioDefault2" checked>
                    <label class="form-check-label" style="color: red;">
                        Decrement (-)
                    </label>
                </div>
            </div>
            </div>
            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
        </form>

    </div>

    <div class="expense-main-divs">
        <h2>Daily Expenses</h2>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Cost</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                global $count_daily_expense;
                global $result;

                $count_daily_expense = 1;

                while ($row = $result->fetch_assoc()) {

                    if ($row['acc'] == 'daily_expense') {
                                                
                        $color;

                        if ($row['operation'] == 1) {
                            $color = 'lightgreen';
                        } else {
                            $color = 'red';
                        }
                        

                        echo '<tr>
                        <th scope="row">'.$count_daily_expense.'</th>
                        <td>'.$row['title'].'</td>
                        <td style="color: '.$color.';">'.$row['amount'].'</td>
                        <td><a href="delete.php?id='.$row["id"].'"><button type="button" class="btn btn-outline-danger">Delete</button></a></td>
                        </tr>';
                        global $count_daily_expense;
                        $count_daily_expense = $count_daily_expense + 1;
                    }
                }
            ?>
            <?php
                global $total_daily_expense;

                echo'<tr>
                <th scope="row">~</th>
                <td style="color: lightblue;"><b>Total<b></td>
                <td style="color: lightgreen;"><b>'.$total_daily_expense.'<b></td>
                <td><button type="button" class="btn btn-outline-warning" disabled>Download</button></td>
                </tr>
                </tbody>
                </table>';
            ?>

    </div>

    <div class="expense-main-divs">
        <h2>Udhar</h2>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Cost</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                    global $count_udhar;
                    global $conn;
                    $result3 = $conn->query($sql);

                    $count_udhar = 1;

                    while ($row = $result3->fetch_assoc()) {

                        if ($row['acc'] == 'udhar') {
                                                    
                            $color = 'red';
                            
                            echo '<tr>
                            <th scope="row">'.$count_udhar.'</th>
                            <td>'.$row['title'].'</td>
                            <td style="color: '.$color.';">'.$row['amount'].'</td>
                            <td><a href="delete.php?id='.$row["id"].'"><button type="button" class="btn btn-outline-danger">Delete</button></a></td>
                            </tr>';
                            global $count_udhar;
                            $count_udhar = $count_udhar + 1;
                        }
                    }
                ?>

                <?php
                global $total_udhar;

                echo'<tr>
                <th scope="row">~</th>
                <td style="color: lightblue;"><b>Total<b></td>
                <td style="color: red;"><b>'.$total_udhar.'<b></td>
                <td><button type="button" class="btn btn-outline-warning" disabled>Download</button></td>
                </tr>
                </tbody>
                </table>';
                ?>
            </tbody>
            </table>

    </div>

    <div class="expense-main-divs">
        <h2>Other</h2>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Cost</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                global $count_udhar;
                global $conn;
                $result4 = $conn->query($sql);

                $count_other = 1;

                while ($row = $result4->fetch_assoc()) {

                    if ($row['acc'] == 'other') {
                                                
                        $color = 'aqua';
                        
                        echo '<tr>
                        <th scope="row">'.$count_udhar.'</th>
                        <td>'.$row['title'].'</td>
                        <td style="color: '.$color.';">'.$row['amount'].'</td>
                        <td><a href="delete.php?id='.$row["id"].'"><button type="button" class="btn btn-outline-danger">Delete</button></a></td>
                        </tr>';
                        global $count_other;
                        $count_other = $count_other + 1;
                    }
                }
            ?>  
            </tbody>
            </table>

    </div>

    <div class="expense-main-divs">
        <h2>Experiment Funds</h2>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Funds</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
               global $count_udhar;
               global $conn;
               $result5 = $conn->query($sql);

                $count_experiment_funds = 1;

                while ($row = $result5->fetch_assoc()) {

                    if ($row['acc'] == 'experiment_funds') {
                                                
                        $color;

                        if ($row['operation'] == 1) {
                            $color = 'lightgreen';
                        } else {
                            $color = 'red';
                        }
                        

                        echo '<tr>
                        <th scope="row">'.$count_experiment_funds.'</th>
                        <td>'.$row['title'].'</td>
                        <td style="color: '.$color.';">'.$row['amount'].'</td>
                        <td><a href="delete.php?id='.$row["id"].'"><button type="button" class="btn btn-outline-danger">Delete</button></a></td>
                        </tr>';
                        global $count_experiment_funds;
                        $count_experiment_funds = $count_experiment_funds + 1;
                    }
                }
            ?>
            <?php
            global $total_experiment_funds;

            echo'<tr>
            <th scope="row">~</th>
            <td style="color: lightblue;"><b>Total<b></td>
            <td style="color: lightgreen;"><b>'.$total_experiment_funds.'<b></td>
            <td><button type="button" class="btn btn-outline-warning" disabled>Download</button></td>
            </tr>
            </tbody>
            </table>';
            ?>
            </tbody>
            </table>

    </div>
    
    <?php include "footer.html" ?>
    <script src="password.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>