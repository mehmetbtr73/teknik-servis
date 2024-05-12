<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    include("conn.php");
    $ıd = $_POST['ıd'];
    $id = implode(',',$ıd);
    $query = $db->query("SELECT * FROM phones");
    $datas = $query->fetchAll(PDO::FETCH_ASSOC);
    $veri = array();
    foreach ($datas as $data) {
    if($data['id'] == $id){
        $veri['name'] = $data['name'];
        $veri['lastname'] = $data['lastname'];
        $veri['tel'] = $data['tel'];
        $veri['model'] = $data['model'];
        $veri['imei'] = $data['imei'];
        $veri['extraproduct'] = $data['extraproduct'];
        $veri['reasonsforfailur'] = $data['reasonsforfailur'];
    }
        
    }
    
    $jsonData = json_encode($veri);
    echo $jsonData;
}
?>