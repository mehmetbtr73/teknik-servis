<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="reset.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    .tittle{
    margin-top: 15px;
    margin-bottom: 20px;
    margin-left: 15px;
    font-family: "Roboto Slab", serif;
    font-style: normal;
    color: rgb(40,40,40);
    font-size: 18px;
    }

    .doubleinput{
        width: 100%;
        height: 60px;
        padding-right: 10px;
        padding-left: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .inputbox{
        width:100%;
    }
    .label{
        font-size:12px;
        color: dodgerblue;
    }
    .input{
        width: 97%;
        height: 30px;
        border:1px solid gray;
        border-radius: 5px;
    }
    #reasonsforfailure{
        height: 100px;
        resize:none;
    }
    #failurebox{
        position: relative;
        top:40px;
    }
    .addcurrentbox{
        top: 50px;
        height: 480px;
    }
    .currentboxbuttons{
        top: 425px;
    }
    .source{
        border:1px solid gray;
        border-radius: 8px;
        width: 94%;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        top:35px;
        height: 38px;
    }
    #source{
        border: none;
        border-radius: 8px;
        width: 100%;
        height: 100%;
    }
    table{
        position: relative;
        top: 50px;
        width: 94%;
        margin-left: auto;
        margin-right: auto;
    }
    th{
        padding: 7px;
        background-color: rgb(75,75,75);
        color: white
    }
    tr{
        padding: 5px;
        background-color: rgb(250,250,250);
    }
    td{
        padding: 5px;
    }
</style>
<script>
$(function(){
    $(".newcurrent").click(function(){
        $(".addcurrentcontainer").css({display:'block'});
    });
    $("#currentboxexit").click(function(){
        $(".addcurrentcontainer").css({display:'none'});
    });
    $("#cancel").click(function(){
        $(".addcurrentcontainer").css({display:'none'});
    });
    $("#log").click(function(){
        var name = $("#name").val();
        var lastname = $("#lastname").val();
        var tel = $("#tel").val();
        var model = $("#model").val();
        var imei = $("#imei").val(); // imei değişkeni burada tanımlanıyor
        var extraproduct = $("#extraproduct").val();
        var reasonsforfailure = $("#reasonsforfailure").val();
        if(name === ''){
            $('#name').css({border:'1px solid red'});
        }else{
            $('#name').css({border:'1px solid gray'});
        }
        if(lastname === ''){
            $('#lastname').css({border:'1px solid red'});
        }else{
            $('#lastname').css({border:'1px solid gray'});
        }
        if(tel === ''){
            $('#tel').css({border:'1px solid red'});
        }else{
            $('#tel').css({border:'1px solid gray'});
        }
        if(model === ''){
            $('#model').css({border:'1px solid red'});
        }else{
            $('#model').css({border:'1px solid gray'});
        }
        if(name != '' && lastname != '' && tel != '' && model != ''){
            $.post('log.php',{
                name: name,
                lastname: lastname,
                tel:tel,
                imei: imei, // imei değişkeni burada kullanılıyor
                model: model,
                extraproduct: extraproduct,
                reasonsforfailure: reasonsforfailure
            },function(data){
                if(data== true){
                    location.reload();
                }
            });
        }
    });

});
</script>
<head>
    <meta charset="UTF-8">
    <title>biter</title>
</head>
<body>
   <div class="container">
       <div class="nav">
           <div class="logo"><a href="index.php">BİTER|<a href="index.php" id="little">Teknik</a></a></div>
       </div>
       
       <div class="description">
          
           <div class="addcurrentcontainer" style="display:none">
               <div class="addcurrentbox">
                  
                   <i class="fa-solid fa-rectangle-xmark" id="currentboxexit"></i>
                   <div class="tittle">YENİ SERVİS FORMU</div>
                   <div class="doubleinput">
                       <div class="inputbox">
                            <label for="name" class="label">İSİM</label>
                            <input type="text" class="input" id="name" maxlength="250">
                       </div>
                       <div class="inputbox">
                            <label for="lastname" class="label">SOY İSİM</label>
                            <input type="text" class="input" id="lastname" maxlength="250">
                       </div>
                   </div>
                   <div class="doubleinput">
                       <div class="inputbox">
                            <label for="tel" class="label">NUMARA</label>
                            <input type="text" class="input" id="tel" maxlength="15">
                       </div>
                       <div class="inputbox">
                            <label for="model" class="label">MARKA/MODEL</label>
                            <input type="text" class="input" id="model" maxlength="500">
                       </div>
                   </div>
                   <div class="doubleinput">
                       <div class="inputbox">
                            <label for="imei" class="label">İMEİ/SERİ NO</label>
                            <input type="text" class="input" id="imei" maxlength="20">
                       </div>
                   </div>
                   <div class="doubleinput">
                       <div class="inputbox">
                            <label for="extraproduct" class="label">CİHAZ İLE BİRLİKTE ALINAN ÜRÜNLER</label>
                            <input type="text" class="input" id="extraproduct" maxlength="1200">
                       </div>
                   </div>
                   <div class="doubleinput" id="failurebox">
                       <div class="inputbox">
                            <label for="reasonsforfailure" class="label">ARIZA NEDENLERİ</label>
                           <textarea rows="4" cols="50" type="text" class="input" id="reasonsforfailure" maxlength="1200"></textarea>
                       </div>
                   </div>
                   <div class="currentboxbuttons">
                       <button class="currentboxbutton" id="log">KAYDET</button>
                       <button class="currentboxbutton" id="cancel">VAZGEÇ</button>
                   </div>
               </div>
           </div>
           
           <div class="alt_menu">
               <button class="newcurrent">Servis Formu Oluştur</button>
           </div>
           <div class="source">
               <input type="text" id="source">
           </div>
           <table>
               <thead>
                   <th>İSİM</th>
                   <th>SOY İSİM</th>
                   <th>TEL</th>
                   <th>MODEL</th>
                   <th>İMEİ</th>
               </thead>
                <?php
                    include("conn.php");

                    // Veritabanından verileri seç
                    $query = $db->query("SELECT * FROM phones");

                    // Sonuçları bir dizi olarak al
                    $datas = $query->fetchAll(PDO::FETCH_ASSOC);

                    // Her bir veri için bir döngü oluşturarak tabloya yazdır
                    foreach($datas as $data){
                        echo "<tr>";
                        echo "<td id='".$data['name']."'>".$data['name']."</td>";
                        echo "<td id='".$data['lastname']."'>".$data['lastname']."</td>";
                        echo "<td id='".$data['tel']."'>".$data['tel']."</td>";
                        echo "<td id='".$data['model']."'>".$data['model']."</td>";
                        echo "<td id='".$data['imei']."'>".$data['imei']."</td>";
                        echo "</tr>";
                    }
                ?>

           </table>
           
       </div>
   </div>
</body>
</html>