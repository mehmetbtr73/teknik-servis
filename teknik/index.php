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
        position: relative;
        height: 50px;
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
                            <input type="text" class="input" id="name">
                       </div>
                       <div class="inputbox">
                            <label for="lastname" class="label">SOY İSİM</label>
                            <input type="text" class="input" id="lastname">
                       </div>
                   </div>
                   <div class="doubleinput">
                       <div class="inputbox">
                            <label for="tel" class="label">NUMARA</label>
                            <input type="text" class="input" id="tel">
                       </div>
                       <div class="inputbox">
                            <label for="model" class="label">MARKA/MODEL</label>
                            <input type="text" class="input" id="model">
                       </div>
                   </div>
                   <div class="doubleinput">
                       <div class="inputbox">
                            <label for="imei" class="label">İMEİ/SERİ NO</label>
                            <input type="text" class="input" id="imei">
                       </div>
                   </div>
                   <div class="doubleinput">
                       <div class="inputbox">
                            <label for="extraproduct" class="label">CİHAZ İLE BİRLİKTE ALINAN ÜRÜNLER</label>
                            <input type="text" class="input" id="imei">
                       </div>
                   </div>
                   <div class="doubleinput">
                       <div class="inputbox">
                            <label for="reasonsforfailure" class="label">ARIZA NEDENLERİ</label>
                            <input type="text" class="input" id="reasonsforfailure">
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
           
       </div>
   </div>
</body>
</html>