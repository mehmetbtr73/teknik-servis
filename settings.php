<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require('conn.php');
        if($_POST['state'] === 'source'){
            $user = $_COOKIE['email'];
            $value = "%".$_POST['value']."%";
            $query = $db->prepare("SELECT * FROM phones WHERE email = :user AND name LIKE :value");
            $query->execute(array(':user' => $user, ':value' => $value));
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            $json = json_encode($results);
            echo $json;

            
        
        
        }else if($_POST['state'] === 'look'){
            $ıd = $_POST['ıd'];
            $id = implode(',',$ıd);
            $user = $_COOKIE['email'];
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
        
        
        }else if($_POST['state'] === 'log'){
            $name = $_POST['name'];
            $lastname = $_POST['lastname'];
            $tel = $_POST['tel'];
            $model = $_POST['model'];
            $imei = $_POST['imei'];
            $extraproduct = $_POST['extraproduct'];
            $reasonsforfailure = $_POST['reasonsforfailure'];
            $user = $_COOKIE['email'];
            $tarih = date("d"); // Gün
            $ay = date("m"); // Ay
            $yil = date("Y"); // Yıl
            $saat = date("H:i"); // Saat, dakika, saniye
            $date = $tarih."/".$ay."/".$yil." | ".$saat;
            $add = $db->prepare("INSERT INTO phones(name,lastname,tel,model,imei,extraproduct,reasonsforfailur,date,email) VALUES(?,?,?,?,?,?,?,?,?)");
            $add->bindparam(1,$name);
            $add->bindparam(2,$lastname);
            $add->bindparam(3,$tel);
            $add->bindparam(4,$model);
            $add->bindparam(5,$imei);
            $add->bindparam(6,$extraproduct);
            $add->bindparam(7,$reasonsforfailure);
            $add->bindparam(8,$date);
            $add->bindparam(9,$user);
            $add->execute();
            echo true;
        
        }
        else if($_POST['state'] === 'delete'){
            $dizi =  $_POST['formlist'];
            foreach ($dizi as $id) {
                $sil = $db->prepare("DELETE FROM phones WHERE id = ?");
                $sil->bindParam(1, $id);
                $sil->execute();
            }
            echo true;
        
        }else if($_POST['state'] === 'change'){
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
    }
?>