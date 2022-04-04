<?php
try{
 $db = new pdo ('mysql:host=127.0.0.1:3307;dbname=receipt','root','');
}
catch(PDOException $e){
    die($e->getMessage());
}

 if (isset($_POST['id']))
 {
 $value = $_POST['value'];
 $column = $_POST['column'];
 $id = $_POST['id'];
 
$sql = "UPDATE pledgetable SET $column = :value WHERE id = :id LIMIT 1";
$query = $db->prepare($sql);

$query->bindParam('value',$value);
$query->bindParam('id',$id);

if($query->execute()){
    echo "Update Successful";
}else{
    echo "Failed";
}
 }


?>
