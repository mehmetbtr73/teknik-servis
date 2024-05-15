<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BİTER|Servis</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<style>
    html{
        overflow: hidden;
    }
    .tittle {
        margin-top: 15px;
        margin-bottom: 20px;
        margin-left: 15px;
        font-family: "Roboto Slab", serif;
        font-style: normal;
        color: rgb(40, 40, 40);
        font-size: 18px;
    }

    .doubleinput {
        width: 100%;
        height: 60px;
        padding-right: 10px;
        padding-left: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .inputbox {
        width: 100%;
    }

    .label {
        font-size: 12px;
        color: dodgerblue;
    }

    .input {
        width: 97%;
        height: 30px;
        border: 1px solid gray;
        border-radius: 5px;
    }

    #reasonsforfailure {
        height: 100px;
        resize: none;
    }

    #failurebox {
        position: relative;
        top: 40px;
    }

    .addcurrentbox {
        top: 50px;
        height: 480px;
    }

    .currentboxbuttons {
        top: 425px;
    }

    .source {
        border: 1px solid rgb(150, 150, 150);
        border-radius: 8px;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        top: 35px;
        height: 38px;
    }

    #source {
        border: none;
        border-radius: 8px;
        width: 100%;
        height: 100%;
    }

    .table {
        border-radius: 4px;
        overflow-y: auto;
        overflow-x: hidden;
        position: relative;
        top: 60px;
        height: calc(100vh - 170px);
    }

    table {
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }
    ::-webkit-scrollbar {
        width: 10px;  
        color: red;
    }
    ::-webkit-scrollbar-track {
        background: #f1f1f1; 
    }
    ::-webkit-scrollbar-thumb {
        background: #888; 
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #555; 
    }
    th {
        padding: 7px;
        background-color: rgb(75, 75, 75);
        color: white;
    }

    tr {
        background-color: rgb(250, 250, 250);
        padding: 5px;
    }

    td {
        text-align: start;
        line-height: 40px;
    }
    .container{
        border:1px solid rgb(200,200,200);
        border-radius: 7px;
        width: 100%;
        background-color: white;
        padding: 5px;
        padding-right: 15px;
        padding-left: 15px;
    }
    .alt_menu {
        height: 50px;
        justify-content: flex-end;
    }

    .altmenu_nav {
        /*        display: flex;*/
        display: none;
        margin-left: 20px;
        justify-content: space-between;
        align-items: center;
        width: 150px;
        height: 100%;
    }

    .altmenunav_buttons {
        border: none;
        color: rgb(61, 191, 85);
        border-radius: 4px;
        font-size: 15px;
        cursor: pointer;
        height: 27px;
        padding-right: 10px;
        padding-left: 10px;
    }

    .altmenunav_buttons:hover {
        background-color: rgb(280, 280, 280);
        border: 1px solid gray;
    }

    .deletebox {
        border: 1px solid rgb(50, 50, 50);
        border-radius: 5px;
        background-color: white;
        display: flex;
        flex-direction: column;
        width: 400px;
        height: 95px;
        position: absolute;
        padding-bottom: 5px;
        left: calc(50% - 200px);
        right: calc(50% - 200px);
        top: 250px;
    }

    .deletetext {
        font-size: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    .deleteconfirm {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding-right: 5px;
        width: 100%;
        height: 50px;
    }

    .delete_buttons {
        border: none;
        padding: 7px;
        padding-right: 13px;
        padding-left: 13px;
        margin-right: 10px;
        font-size: 15px;
        cursor: pointer;
    }

    #delete_ok {
        background-color: yellow;
        color: black;
        border: 1px solid rgb(250, 250, 250)
    }

    #delete_cancel {
        background-color: rgb(40, 40, 40);
        color: white;
    }

    #editbutton {
        background-color: gray;
        margin-right: 15px;
        cursor: default;
        width: 100px;
        height: 30px;
        border: none;
        color: white;
    }

    .deletbigbox {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0px;
        display: none;
    }

    .alt_menu {
        border: 1px solid gray;
        border-radius: 8px;
        background-color: rgb(252, 252, 252);
        position: relative;
        top: 20px;
        display: flex;
        padding-right: 25px;
        padding-right: 25px;
        align-items: center;
        width: 100%;
    }

    .source {
        display: flex;
        align-items: center;
    }

    .ara {
        height: 100%;
        padding-right: 10px;
        padding-left: 10px;
        border-top-right-radius: 8px;
        border-bottom-right-radius: 8px;
        border: none;
        letter-spacing: 1px;
        cursor: pointer;
        color: rgb(61, 191, 85);
        font-size: 15px;
        background-color: white;
        font-weight: 600;
        border-left: 1px solid rgb(150, 150, 150);
    }

    .ara:hover {
        background-color: rgb(245, 245, 245);

    }
    
    thead{
        position: sticky;
        top: 0px;
    }

</style>
<script>
    $(function() {
        $("#source").mouseenter(function() {
            $('#source').css({
                outline: 'none'
            });
        });
        $("#source").focus(function() {
            $(".source").css({
                border: '2px solid rgb(40,40,40)'
            });
        });
        $("#source").blur(function() {
            $(".source").css({
                border: '1px solid rgb(150,150,150)'
            });
        });
        $(".newcurrent").click(function() {
            $(".addcurrentcontainer").css({
                display: 'block'
            });
            $("#editbutton").css({
                display: 'none'
            });
            $("#log").css({
                display: 'block'
            });
            $("#name").val('');
            $("#lastname").val("");
            $("#tel").val("");
            $("#model").val("");
            $("#imei").val("");
            $("#extraproduct").val("");
            $("#reasonsforfailure").val("");
        });
        $("#currentboxexit").click(function() {
            $(".addcurrentcontainer").css({
                display: 'none'
            });
        });
        $("#cancel").click(function() {
            $(".addcurrentcontainer").css({
                display: 'none'
            });
        });
        $("#log").click(function() {
            var name = $("#name").val();
            var lastname = $("#lastname").val();
            var tel = $("#tel").val();
            var model = $("#model").val();
            var imei = $("#imei").val(); // imei değişkeni burada tanımlanıyor
            var extraproduct = $("#extraproduct").val();
            var reasonsforfailure = $("#reasonsforfailure").val();
            if (name === '') {
                $('#name').css({
                    border: '1px solid red'
                });
            } else {
                $('#name').css({
                    border: '1px solid gray'
                });
            }
            if (lastname === '') {
                $('#lastname').css({
                    border: '1px solid red'
                });
            } else {
                $('#lastname').css({
                    border: '1px solid gray'
                });
            }
            if (tel === '') {
                $('#tel').css({
                    border: '1px solid red'
                });
            } else {
                $('#tel').css({
                    border: '1px solid gray'
                });
            }
            if (model === '') {
                $('#model').css({
                    border: '1px solid red'
                });
            } else {
                $('#model').css({
                    border: '1px solid gray'
                });
            }
            if (name != '' && lastname != '' && tel != '' && model != '') {
                $.post('settings.php', {
                    state: 'log',
                    name: name,
                    lastname: lastname,
                    tel: tel,
                    imei: imei, // imei değişkeni burada kullanılıyor
                    model: model,
                    extraproduct: extraproduct,
                    reasonsforfailure: reasonsforfailure
                }, function(data) {
                    console.log(data)
                    if (data == true) {
                        location.reload();
                    }
                });
            }
        });
        var formList = [];
        $("table tbody").on("click", "tr", function() {
            var ıd = $(this).attr("id");
            console.log(ıd);
            if (formList.includes(ıd)) {
                $("#" + ıd).css({
                    backgroundColor: "rgb(250,250,250)"
                });
                var index = formList.indexOf(ıd);
                if (index !== -1) {
                    formList.splice(index, 1);
                }
            } else {
                $("#" + ıd).css({
                    backgroundColor: "rgb(240,240,240)"
                });
                formList.push(ıd);
            }
            var elemanSayısı = formList.length;
            if (elemanSayısı === 0) {
                $(".altmenu_nav").css({
                    display: "none"
                });
                $(".alt_menu").css({
                    justifyContent: "flex-end"
                });
            } else if (elemanSayısı === 1) {
                $(".altmenu_nav").css({
                    display: "flex"
                });
                $(".alt_menu").css({
                    justifyContent: "space-between"
                });
                $("#edit").css({
                    display: "block"
                });
            } else if (elemanSayısı > 1) {
                $(".altmenu_nav").css({
                    display: "flex"
                });
                $(".alt_menu").css({
                    justifyContent: "space-between"
                });
                $("#edit").css({
                    display: "none"
                });
            }
        });
        $("#delete_cancel").click(function() {
            $(".deletbigbox").css({
                display: 'none'
            });
        });
        $("#delete").click(function() {
            $(".deletbigbox").css({
                display: 'block'
            });
        });
        $("#delete_ok").click(function() {
            $.post("settings.php", {
                state: 'delete',
                formlist: formList
            }, function(data) {
                if (data == true) {
                    location.reload();
                }
            });
        });
        //    var name_old ;
        //    var lastname_old;
        //    var tel_old;
        //    var model_old;
        //    var imei_old;
        //    var extraproduct_old;
        //    var reasonsforfailure_old;
        $("#edit").click(function() {
            $(".addcurrentcontainer").css({
                display: 'block'
            });
            $("#log").css({
                display: 'none'
            });
            $("#editbutton").css({
                display: 'block'
            });
            $("#name").css({
                border: '1px solid gray'
            });
            $("#lastname").css({
                border: '1px solid gray'
            });
            $("#tel").css({
                border: '1px solid gray'
            });
            $("#model").css({
                border: '1px solid gray'
            });
            $.post('settings.php', {
                state: 'look',
                ıd: formList
            }, function(data) {
                console.log(data)
                var response = JSON.parse(data);
                console.log(response);
                var name_old = response['name'];
                var lastname_old = response['lastname'];
                var tel_old = response['tel'];
                var model_old = response['model'];
                var imei_old = response['imei'];
                var extraproduct_old = response['extraproduct'];
                var reasonsforfailure_old = response['reasonsforfailur'];
                $("#name").val(name_old);
                $("#lastname").val(lastname_old);
                $("#tel").val(tel_old);
                $("#model").val(model_old);
                $("#imei").val(imei_old);
                $("#extraproduct").val(extraproduct_old);
                $("#reasonsforfailure").val(reasonsforfailure_old);
                $(".input").keyup(function() {
                    var name = $("#name").val();
                    var lastname = $("#lastname").val();
                    var tel = $("#tel").val();
                    var model = $("#model").val();
                    var imei = $("#imei").val();
                    var extraproduct = $("#extraproduct").val();
                    var reasonsforfailur = $("#reasonsforfailure").val();

                    if (name != name_old || lastname != lastname_old || tel != tel_old || model != model_old || imei != imei_old || extraproduct != extraproduct_old || reasonsforfailur != reasonsforfailure_old) {
                        $("#editbutton").css({
                            backgroundColor: 'cadetblue'
                        });
                        $("#editbutton").click(function() {
                            $.post('settings.php', {
                                state: 'change',
                                id: formList,
                                name: name,
                                lastname: lastname,
                                tel: tel,
                                model: model,
                                imei: imei,
                                extraproduct: extraproduct,
                                reasonsforfailur: reasonsforfailur
                            }, function(data) {
                                console.log(data);
                                if (data == true) {
                                    location.reload();
                                }
                            });
                        });
                    } else {
                        $("#editbutton").css({
                            backgroundColor: 'gray'
                        });
                    }
                });

            });
            $(".newcurrent").click(function() {
                $(".addcurrentcontainer").css({
                    display: 'block'
                });
            });
            $("#currentboxexit").click(function() {
                $(".addcurrentcontainer").css({
                    display: 'none'
                });
            });
            $("#cancel").click(function() {
                $(".addcurrentcontainer").css({
                    display: 'none'
                });
            });

        });
        $(".ara").click(function() {
            var value = $("#source").val();
            if (value === "") {
                console.log("error");
            } else {
                $.post('settings.php', {
                    state: 'source',
                    value: value
                }, function(data) {
                    var data = JSON.parse(data);
                    var table = $("table");
                    table.find("tbody").empty();
                    for (var i = 0; i < data.length; i++) {
                        var row = "<tr id='" + data[i].id + "'>"; // Her tr ye id ekle
                        for (var key in data[i]) {
                            // İstenmeyen sütunları kontrol et ve eklemeyi atla
                            if (key !== 'id' && key !== 'extraproduct' && key !== 'reasonsforfailur' && key !== 'email') {
                                row += "<td>" + data[i][key] + "</td>";
                            }
                        }
                        row += "</tr>";
                        table.find("tbody").append(row);
                    }
                    var formList = [];
                    $(".altmenu_nav").css({
                        display: 'none'
                    });
                    $(".alt_menu").css({
                        justifyContent: 'flex-end'
                    });

                });
            }
        });

    });

</script>

<body>
    <div class="container">
        <div class="addcurrentcontainer" style="display:none">
            <div class="addcurrentbox">

                <i class="fa-solid fa-rectangle-xmark" id="currentboxexit"></i>
                <div class="tittle">YENİ SERVİS FORMU</div>
                <div class="doubleinput">
                    <div class="inputbox">
                        <label for="name" class="label" style='word-spacing:3px;'>İSİM SOYİSİM</label>
                        <input type="text" class="input" id="name" maxlength="250">
                    </div>
                    <div class="inputbox">
                        <label for="lastname" class="label" style='word-spacing:3px;'>TESLİM ALAN KİŞİ</label>
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
                        <input type="text" class="input" id="imei" maxlength="15">
                    </div>
                </div>
                <div class="doubleinput">
                    <div class="inputbox">
                        <label for="extraproduct" class="label" style='word-spacing:2px;'>CİHAZ İLE BİRLİKTE ALINAN ÜRÜNLER</label>
                        <input type="text" class="input" id="extraproduct" maxlength="1200">
                    </div>
                </div>
                <div class="doubleinput" id="failurebox">
                    <div class="inputbox">
                        <label for="reasonsforfailure" class="label" style='word-spacing:3px;'>ARIZA NEDENLERİ</label>
                        <textarea rows="4" cols="50" type="text" class="input" id="reasonsforfailure" maxlength="1200"></textarea>
                    </div>
                </div>
                <div class="currentboxbuttons">
                    <button class="currentboxbutton" id="log">KAYDET</button>
                    <button class="currentboxbutton" id="editbutton" style="display:none">DEĞİŞTİR</button>
                    <button class="currentboxbutton" id="cancel">VAZGEÇ</button>
                </div>
            </div>
        </div>

        <div class="alt_menu">
            <div class="altmenu_nav">
                <button class="altmenunav_buttons" id="delete">SİL</button> <button class="altmenunav_buttons" id="edit">DÜZENLE</button>

            </div>
            <button class="newcurrent">Servis Formu Oluştur</button>
        </div>
        <div class="source">
            <input type="text" id="source" placeholder="İsim Giriniz">
            <button class="ara">ARA</button>
        </div>
        
        <div class="table">
                
            <table>
                <thead>
                    <th>İSİM SOYİSİM</th>
                    <th>TESLİM ALAN KİŞİ</th>
                    <th>TEL</th>
                    <th>MODEL</th>
                    <th>İMEİ</th>
                    <th>TARİH</th>
                </thead>
                <tbody>
                    <?php
                            include("conn.php");

                            // Veritabanından verileri seç
                            $user = $_COOKIE['email'];
                            $query = $db->prepare("SELECT * FROM phones WHERE email = :user ORDER BY id DESC");
                            $query->execute(array(':user' => $user));

                            if ($query) {
                                $datas = $query->fetchAll(PDO::FETCH_ASSOC);
                                foreach($datas as $data){
                                    echo "<tr id='".$data['id']."'>";
                                        echo "<td id='".$data['name']."'>".$data['name']."</td>";
                                        echo "<td id='".$data['lastname']."'>".$data['lastname']."</td>";
                                        echo "<td id='".$data['tel']."'>".$data['tel']."</td>";
                                        echo "<td id='".$data['model']."'>".$data['model']."</td>";
                                        echo "<td id='".$data['imei']."'>".$data['imei']."</td>";
                                        echo "<td id='".$data['date']."'>".$data['date']."</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "Sorgu başarısız!";
                            }

                        ?>
                </tbody>
            </table>
        </div>

        <div class="deletbigbox">
            <div class="deletebox">
                <div class="deletetext">Servis formunu silmek istediğinizden eminmisiniz?</div>
                <div class="deleteconfirm">
                    <button class="delete_buttons" id="delete_ok">EVET</button>
                    <button class="delete_buttons" id="delete_cancel">İPTAL</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
