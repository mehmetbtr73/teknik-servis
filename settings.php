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
            $table = $_POST['table'];
            $ıd = $_POST['id'];
            $id = implode(',',$ıd);
            $user = $_COOKIE['email'];
            $query = $db->prepare("SELECT * FROM $table where id = ?");
            $query->execute([$id]);
            $datas = $query->fetchall(PDO::FETCH_ASSOC);
            echo json_encode($datas);
        
        
        
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
        }else if($_POST['state'] === 'delete'){
            $dizi = $_POST['formlist'];
            $table = $_POST['table'];
            $allowedTables = ['currents', 'phones', 'table3'];
            if (in_array($table, $allowedTables)) {
                foreach ($dizi as $id) {
                    $sil = $db->prepare("DELETE FROM $table WHERE id = ?");
                    $sil->bindValue(1, $id, PDO::PARAM_INT);
                    $sil->execute();
                }
                echo true;
            } else {
                echo "Geçersiz tablo adı.";
            }
        }else if($_POST['state'] === 'change'){
                // POST verilerini al
                $table = $_POST['table']; // Tablo adı
                $id = implode(',',$_POST['id']); // Güncellenecek satırın ID'si

                // 'table' ve 'id' anahtarlarını POST verilerinden kaldır
                unset($_POST['table']);
                unset($_POST['id']);
                unset($_POST['state']); // 'state' anahtarını da kaldır

                // Güncellenecek sütun ve değerleri al
                $columns = [];
                $values = [];
                foreach ($_POST as $column => $value) {
                    if (is_array($value)) {
                        // Diziyi stringe dönüştür
                        $value = implode(',', $value);
                    }
                    $columns[] = "$column = :$column";
                    $values[":$column"] = $value;
                }

                // Güncelleme sorgusunu oluştur
                $sql = "UPDATE $table SET " . implode(", ", $columns) . " WHERE id = :id";
                $stmt = $db->prepare($sql);
                $values[":id"] = $id;

                // Sorguyu çalıştır
                if ($stmt->execute($values)) {
                    echo true;
                } else {
                    echo false;
                }
        
        }else if($_POST['state'] === 'logcurrent'){
            $name = $_POST['name'];
            $currenttype = $_POST['currenttype'];
            $taxadministration = $_POST['taxadministration'];
            $id = $_POST['id'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $fax = $_POST['fax'];
            $website = $_POST['website'];
            $country = $_POST['country'];
            $province = $_POST['province'];
            $district = $_POST['district'];
            $neighbourhood = $_POST['neighbourhood'];
            $street = $_POST['street'];
            $buildingnumber = $_POST['buildingnumber'];
            $apartmentnumber = $_POST['apartmentnumber'];
            $postcode = $_POST['postcode'];
            $tarih = date("d"); // Gün
            $ay = date("m"); // Ay
            $yil = date("Y"); // Yıl
            $saat = date("H:i"); // Saat, dakika, saniye
            $date = $tarih."/".$ay."/".$yil." | ".$saat;
            $sql = "INSERT INTO currents(name,currenttype,taxadministration,identity,email,tel,fax,website,country,province,district,neighbourhood,street,buildingnumber,apartmennumber,postcode,date) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $db->prepare($sql);
            if($stmt->execute([$name,$currenttype,$taxadministration,$id,$email,$tel,$fax,$website,$country,$province,$district,$neighbourhood,$street,$buildingnumber,$apartmentnumber,$postcode,$date])){
                echo true;
            }
            
            
        }
    }
?>