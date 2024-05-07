<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include('conn.php');
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $tel = $_POST['tel'];
    $model = $_POST['model'];
    $imei = $_POST['imei'];
    $extraproduct = $_POST['extraproduct'];
    $reasonsforfailure = $_POST['reasonsforfailure'];
    $add = $db->prepare("INSERT INTO phones(name,lastname,tel,model,imei,extraproduct,reasonsforfailur) VALUES(?,?,?,?,?,?,?)");
    $add->bindparam(1,$name);
    $add->bindparam(2,$lastname);
    $add->bindparam(3,$tel);
    $add->bindparam(4,$model);
    $add->bindparam(5,$imei);
    $add->bindparam(6,$extraproduct);
    $add->bindparam(7,$reasonsforfailure);
    $add->execute();
    echo true;
}
?>