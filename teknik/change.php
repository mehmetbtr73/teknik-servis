<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include("conn.php");
    $id = implode(",", $_POST['id']);
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $tel = $_POST['tel'];
    $model= $_POST['model'];
    $imei = $_POST['imei'];
    $extraproduct = $_POST['extraproduct'];
    $reasonsforfailur = $_POST['reasonsforfailur'];
    
    $change = $db->prepare("UPDATE phones SET name=?, lastname=?, tel=?, model=?, imei=?, extraproduct=?, reasonsforfailur=? WHERE id=?");
    $change->bindParam(1, $name);
    $change->bindParam(2, $lastname);
    $change->bindParam(3, $tel);
    $change->bindParam(4, $model);
    $change->bindParam(5, $imei);
    $change->bindParam(6, $extraproduct);
    $change->bindParam(7, $reasonsforfailur);
    $change->bindParam(8, $id);
    if($change->execute()){
        echo true;
    }else{
        echo "error";
    }
}

?>