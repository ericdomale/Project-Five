<?php

 $connection = new mysqli('127.0.0.1:3307','root','','receipt');
?>


<?php


if (isset($_POST['submit']))
{
$serialno = $_POST['serialno'];
$pname = $_POST['pname'];
$pdate = $_POST['pdate'];
$pamount = $_POST['pamount'];
$paid = $_POST['paid'];
$balance = $_POST['balance'];
$payment = $_POST['payment'];
$contact = $_POST['contact'];



if ($connection->connect_error){
    die('Connection Failed : '.$connection->connect_error);
}else{

    $query = "INSERT into pledgetable (serialno, pname, pdate, pamount, paid, balance, payment, contact)
    values('$serialno','$pname', '$pdate', '$pamount', '$paid', '$balance', '$payment', '$contact')";


    $queryrun = mysqli_query($connection, $query);

    if ($queryrun)
    {
sleep(1);
 header('location:index.php');

   
        
    }

    else
    {
        echo "Record Fail";
    }
  
 
}
}


?>

