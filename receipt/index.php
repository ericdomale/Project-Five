<?php 
 
$connection = new mysqli('127.0.0.1:3307','root','','receipt');
$query = "SELECT serialno FROM pledgetable ORDER BY serialno DESC";
$result = mysqli_query($connection,$query);

$row = mysqli_fetch_array($result);

$lastid = $row['serialno'];

if (empty($lastid))
{
    $number = "ICP-01";
}
else
{
    $idd = str_replace("ICP-","",$lastid);
    $newid = str_pad($idd + 1, 2,0,STR_PAD_LEFT);
    $number = 'ICP-' .$newid;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt System</title>
    <link rel="stylesheet" href="receipt.css">
</head>


<body>
    <div class="container">
        <h1>GLORIOUS IMPACT WORSHIP CENTER</h1>
        <h3>IMPACT CITY PROJECT</h3>
        <!--<p>Have any questions or suggestions, drop a message</p>-->

        <form action="receiptdb.php" method="POST">
            <div class="row">
                <div class="column">
                    <label for="name">SERIAL-NUMBER</label>
                    <input type="text" id="serialno" name="serialno" value="<?php echo $number; ?>" readonly>
                </div>
                <div class="column">
                    <label for="name">NAME</label>
                    <input type="text" id="name" name="pname" placeholder="Enter Name of Individual" required>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="date">DATE</label>
                    <input type="date" id="date" name="pdate" required>
                </div>
                <div class="column">
                    <label for="amount">AMOUNT PLEDGED</label>
                    <input type="text" id="pamount" name="pamount" placeholder="Enter Pledged Amount" required>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="paid">AMOUNT PAID</label>
                    <input type="text" id="paid" name="paid" placeholder="Enter Amount Paid" required>
                </div>
                <div class="column">
                    <label for="balance">AMOUNT OUTSTANDING</label>
                    <input type="text" id="balance" name="balance" placeholder="Enter Outstanding Amount" required>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label for="payment">PAYMENT METHOD</label>
                    <select name="payment" id="payment" required>
                        <option>--Select One--</option>
                        <option label="Cash" value="Cash">Cash</option>
                        <option label="Mobile Money" value="Mobile Money">Mobile Money</option>
                        <option label="Bank Transfer" value="Bank Transfer">Bank Transfer</option>
                        <option label="Debit Card" value="Debit Card">Debit Card</option>
                        <option label="Bank Deposit" value="Bank Deposit">Bank Deposit</option>
                    </select>
                </div>
                <div class="column">
                    <label for="contact">CONTACT</label>
                    <input type="tel" id="contact" name="contact" placeholder="Enter Contact of Individual" required>
                </div>
            </div>
            <button name="submit">SUBMIT</button>
        </form>
        <br>
        <a href="pledegetable.php"><button class="records">VIEW PLEDGES</button></a>
    </div>
</body>

</html>