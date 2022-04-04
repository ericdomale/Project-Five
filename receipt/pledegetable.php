<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Pledges</title>
    <script src="jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="jquery/datatables.css">
    <link rel="stylesheet" href="jquery/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="jquery/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="pledgetable.css">


</head>

<body>
    <a href="index.php"><button class="records">
            <--GO BACK </button></a>
    <div class="container">
        <div class="table-responsive">
            <table class="contentable table table-bordered table-hover" id="contable">
                <thead>
                    <tr>
                        <th>SERIAL NO.</th>
                        <th>ENTRY DATE</th>
                        <th>NAME</th>
                        <th>AMOUNT PLEDGED</th>
                        <th>PAID AMOUNT</th>
                        <th>OUTSTANDING</th>
                        <th>PAYMENT METHOD</th>
                        <th>CONTACT</th>
                        <th>RECEIPT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php require 'receiptview.php' ?>
                </tbody>
            </table>
        </div>
    </div>
    <br><br><br><br><br>


    <div class="container">
        <div class="row">
            <div class="column">

                <label for="name"><img src="icon/medal-line.svg" alt="">TOTAL NUMBER OF PLEDGES:</label><br>
                <label for="name">
                    <?php

                    $conn = mysqli_connect('127.0.0.1:3307','root','','receipt');

                    $query = "SELECT serialno FROM pledgetable";
                    $query_run = mysqli_query($conn,$query);

                    $row = mysqli_num_rows($query_run);

                    echo $row;
                    ?>
                </label>
            </div>
            <div class="column">
                <label for="amount"><img src="icon/funds-line.svg" alt="">TOTAL AMOUNT PLEDGED:</label><br>
                <label for="amount">
                    <?php
                            $conn = mysqli_connect('127.0.0.1:3307','root','','receipt');

                            $query = "SELECT SUM(pamount) AS sum FROM `pledgetable`";
                            $query_run = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($query_run)){

                                $output = 'GHS '.number_format($row['sum']);

                            }; 
                           ?>
                    <?php echo $output; ?>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <label for="paid"><img src="icon/secure-payment-fill.svg" alt="">TOTAL AMOUNT PAID:</label><br>
                <label for="paid">
                    <?php
                            $conn = mysqli_connect('127.0.0.1:3307','root','','receipt');

                            $query = "SELECT SUM(paid) AS sum FROM `pledgetable`";
                            $query_run = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($query_run)){

                                $output = 'GHS '.number_format($row['sum']);

                            }; 
                           ?>
                    <?php echo $output; ?>
                </label>
            </div>
            <div class="column">
                <label for="balance"><img src="icon/swap-line.svg" alt="">TOTAL AMOUNT OUTSTANDING:</label><br>
                <label for="balance">
                    <?php
                            $conn = mysqli_connect('127.0.0.1:3307','root','','receipt');

                            $query = "SELECT SUM(balance) AS sum FROM `pledgetable`";
                            $query_run = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($query_run)){

                                $output = 'GHS '.number_format($row['sum']);

                            }; 
                           ?>
                    <?php echo $output; ?>
                </label>
            </div>
        </div>
    </div>


    <script src="jquery/datatables.js"></script>
    <script src="jquery/jquery.dataTables.min.js"></script>
    <script src="jquery/jquery/dataTables.bootstrap.min.js"></script>

</body>
<script src="pledgetable.js"></script>

</html>