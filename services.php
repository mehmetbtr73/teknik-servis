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
    #reasonsforfailure {
        height: 100px;
        resize: none;
    }

    #failurebox {
        position: relative;
        top: 40px;
    }



    .currentboxbuttons {
        top: 425px;
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
    .addcurrentcontainer{
        position: absolute;
        z-index: 5;
        width: 100%;
        height: 100%;
        opacity: 1;
    }
    .addcurrentbox{
        position: absolute;
        width: 800px;
        border:1px solid gray;
        z-index: 5;
        border-radius:5px;
        left:calc(50% - 400px);
        right:calc(50% - 400px);
        background-color: rgb(253,253,253);
        top: 50px;
        height: 480px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
</style>
<script src="app.js"></script>
<script>
    $(function() {
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
            $(".addcurrentcontainer").css({display: 'none'});
        });
        $("#cancel").click(function() {
            $(".addcurrentcontainer").css({display: 'none'});
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
                table:'phones',
                formlist: formList
            }, function(data) {
                if (data == true) {
                    location.reload();
                }
            });
        });
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
                table:'phones',
                id: formList
            }, function(data) {
                var response = JSON.parse(data);
                console.log(response);
                var name_old = response[0]['name'];
                var lastname_old = response[0]['lastname'];
                var tel_old = response[0]['tel'];
                var model_old = response[0]['model'];
                var imei_old = response[0]['imei'];
                var extraproduct_old = response[0]['extraproduct'];
                var reasonsforfailure_old = response[0]['reasonsforfailur'];
                console.log(name_old);
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
                        $("#editbutton").css({backgroundColor: 'cadetblue',cursor:'pointer'});
                        $("#editbutton").click(function() {
                            $.post('settings.php', {
                                state: 'change',
                                id: formList,
                                table:'phones',
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
                            backgroundColor: 'gray',cursor:'default'
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
                <div class="infoboxtop">
                    <i class="fa-solid fa-rectangle-xmark" id="currentboxexit"></i>
                    <div class="tittle">YENİ SERVİS FORMU</div>
                </div>
                <div class="form">
                    <div class="maininputbox">
                        <div class="inputbox">
                            <label for="name" class="label" style='word-spacing:3px;'>İSİM SOYİSİM</label>
                            <input type="text" class="input" id="name" maxlength="250">
                        </div>
                        <div class="inputbox">
                            <label for="lastname" class="label" style='word-spacing:3px;'>TESLİM ALAN KİŞİ</label>
                            <input type="text" class="input" id="lastname" maxlength="250">
                        </div>
                    </div>
                    <div class="maininputbox">
                        <div class="inputbox">
                            <label for="tel" class="label">NUMARA</label>
                            <input type="text" class="input" id="tel" maxlength="15">
                        </div>
                        <div class="inputbox">
                            <label for="model" class="label">MARKA/MODEL</label>
                            <input type="text" class="input" id="model" maxlength="500">
                        </div>
                    </div>
                    <div class="maininputbox">
                        <div class="inputbox">
                            <label for="imei" class="label">İMEİ/SERİ NO</label>
                            <input type="text" class="input" id="imei" maxlength="15">
                        </div>
                    </div>
                    <div class="maininputbox">
                        <div class="inputbox">
                            <label for="extraproduct" class="label" style='word-spacing:2px;'>CİHAZ İLE BİRLİKTE ALINAN ÜRÜNLER</label>
                            <input type="text" class="input" id="extraproduct" maxlength="1200">
                        </div>
                    </div>
                    <div class="maininputbox" id="failurebox">
                        <div class="inputbox">
                            <label for="reasonsforfailure" class="label" style='word-spacing:3px;'>ARIZA NEDENLERİ</label>
                            <textarea rows="4" cols="50" type="text" class="input" id="reasonsforfailure" maxlength="1200"></textarea>
                        </div>
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
            <input type="text" class="sourceinput" placeholder="İsim Giriniz">
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
