<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    include('conn.php');
    $dizi =  $_POST['formlist'];
    
    foreach ($dizi as $id) {
        $sil = $db->prepare("DELETE FROM phones WHERE id = ?");
        $sil->bindParam(1, $id);
        $sil->execute();
    }
    
    echo true;
}

?>