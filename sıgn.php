<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include("conn.php");
    if(isset($_POST['sign_email'])){
        $email = $_POST['sign_email'];
        $password = $_POST['sign_password'];
        $veriler = $db->query("SELECT * FROM user",PDO::FETCH_ASSOC);
        $durum = false;
        foreach($veriler as $veri){
            if($veri['email'] == $email || $veri['email'] == $email && $veri['password'] == $password){
                $durum = true;
            }
        }
        if($durum == true){
            setcookie("email",$email,time() + 86400);
            header("Location:http://localhost/dashboard/teknik/");
            exit;
        }else if($email == "admin"&&$password=="Mbitter2006"){
            header("Location:http://localhost/dashboard/teknik/");
        }else{
            $not = "Mail veya şifre yanlış";
            $hata = true;
        }
        }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Biter-Giriş</title>
    <link rel="stylesheet" href="main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Anta&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Anta&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');
        a{
            text-decoration: none;
        }
        .sıgn_log{
            border:5px solid rgb(220,220,220);
            border-radius: 7px;
            height: 500px;
            width: 450px;
            margin-right: auto;
            margin-left: auto;
            position: relative;
            top: 160px;
        }
        .sıgn_log_button{
            display: flex;
            justify-content: center;
            height: 70px;
            align-items: center;
            margin-top: 15px;
            position: relative;
            top:0px;
        }
        .sıgn_log_button div{
            padding-top: 6px;
            padding-bottom: 6px;
            padding-right: 15px;
            padding-left: 15px;
            display: flex;
            justify-content: center;

        }
        #first{
            border-bottom: 2px solid black;
        }
        #second{
            border-bottom: 2px solid gray;
        }
        #sıgn_text_sıgn{
            font-family: "Rubik", sans-serif;
            color: black;
            cursor: pointer;
        }
        #log_text_log{
            font-family: sans-serif;
            color: gray;
            cursor: pointer;

        }
        form{
            width: 100%;
            height: 405px;
        }
        .sıgnın{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
            display: flex;
            flex-direction: column;
            padding-top: 25px;
        }
        #sıgn_email{
            margin-bottom: 25px;
            background-color: rgb(240,240,240);
            border:1px solid rgb(145,145,145);
        }
        #signin_submit{
            border:none;
            border-radius: 5px;
            height: 30px;
            width: 85%;
            margin-right: auto;
            margin-left: auto;
            background-color: rgb(58,102,162);
            color: white;
            font-size: 16px;
        }
        .label_sıgnın{
            color: rgb(75,75,75); 
        }
        .name{
            width: 50%;
        }.lastname{
            width: 50%;
        }
        .email{
            width: 50%;
        }
        .password{
            width: 50%;
        }
        .login{
            padding-top: 25px;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        .login input{
            margin-bottom: 25px;
            background-color: rgb(240,240,240);
            border:1px solid rgb(145,145,145);
        }
        .label_login{
            color: rgb(75,75,75); 
        }
        #login_submit{
            border:none;
            border-radius: 5px;
            height: 30px;
            width: 85%;
            background-color: rgb(58,102,162);
            color: white;
            font-size: 16px; 
        }
        #box{
            display:flex;align-items:center;
            margin-bottom: 25px;
            background-color: rgb(240,240,240);
            border:1px solid rgb(145,145,145);
            border-radius: 5px;
        }
        #passsword_open{
            padding-right: 5px;
            padding-left: 5px;
        }
        #password_close{
            padding-right: 4px;
            padding-left: 4px;
        }
        #sıgn_password{
            background-color: rgb(240,240,240);
        }
        .forgot_password_box{
            width: 100%;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: flex-end;
        }
        #forgot_password{
            text-decoration: underline;
            color: rgb(100,100,100);
        }
        .message{
            display: none;
            width: 180px;
            height: 100px;
            border-radius: 4px;
            background-color: white;
            box-shadow: 1px 1px 5px;
            position: absolute;
            top: 200px;
            right: 40px;
        }
        .punkt{
            display: flex;
            align-items: center;
            margin: 5px;
        }
        .punkt i{
            font-size: 8px;
            color: red;
        }
        .box{
            display:flex;
            align-items:center;
        }
        .info{
            display: flex;
            align-items: center;
        }
        .info a{
            font-size: 12px;
            font-weight: 900;
            font-family: "Nunito", sans-serif;
            font-style: normal;
        }
        #sifre{
            margin-left:10px;
            margin-top:5px;
            margin-right:0px;
            margin-bottom:5px;
            font-weight: 500;
        }
        #bilgi{
            height: 20px;
            width: 80%;
            margin-right: auto;
            margin-left: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            display: none;
        }
    </style>
    
</head>

<script>
    $(function(){
        
        var sıgnın = $(".sıgnın");
        var logın = $(".login");
        var sıgnın_text = $("#sıgn_text_sıgn");
        var log_text = $("#log_text_log");
        var first = $("#first");
        var second = $("#second");
        
        
        $("#sıgn_text_sıgn").click(function(){
            $(this).css({color:"black"});
            log_text.css({color:"gray"})
            first.css({borderBottom:"2px solid black"});
            second.css({borderBottom:"2px solid gray"});
            sıgnın.css({display:"flex"});
            logın.css({display:"none"});
            
            
        });
        
        $("#log_text_log").click(function(){
            $(this).css({color:"black"});
            sıgnın_text.css({color:"gray"});
            second.css({borderBottom:"2px solid black"});
            first.css({borderBottom:"2px solid gray"});
            sıgnın.css({display:"none"});
            logın.css({display:"block"});
            
            
        });
        
        
        var open = $("#passsword_open");
        var close = $("#password_close");
        var password = $("#sıgn_password");
        
        open.click(function(){
            close.css({display:"block"});
            open.css({display:"none"});
            password.removeAttr("type");
            password.attr("type","text");
        });
        close.click(function(){
            close.css({display:"none"});
            open.css({display:"block"});
            password.removeAttr("type");
            password.attr("type","password");
        });
        
        
        
        
        $(".login").submit(function(event){
            $(this).css({color:"black"});
            sıgnın_text.css({color:"gray"});
            second.css({borderBottom:"2px solid black"});
            first.css({borderBottom:"2px solid gray"});
            sıgnın.css({display:"none"});
            logın.css({display:"block"});
        });
        <?php if(isset($hata) && $hata==true){?>
        $("#sıgn_email").css({border:"1px solid red"});
        $("#box").css({border:"1px solid red"});
        <?php } ?>

        $("#sıgn_password, #sıgn_email").on('change focus', function(){
        $("#box").css({border:"1px solid rgb(145,145,145)"});
        $("#sıgn_email").css({border:"1px solid rgb(145,145,145)"});
            
        });
        
        $("#login_submit").click(function(){
            var name = $("#name").val();
            var lastname = $("#lastname").val();
            var login_email = $("#login_email").val();
            var gsm = $("#gsm").val();
            var login_password = $("#login_password").val(); 
            $.post("login.php",{
                name:name,
                lastname:lastname,
                login_email:login_email,
                gsm:gsm,
                login_password:login_password
            },function(data){
                console.log(data);
                var durum = JSON.parse(data);
                if(durum['name']==false){
                    $("#name").css({border:"1px solid red"});
                }
                if(durum['lastname']==false){
                    $("#lastname").css({border:"1px solid red"});
                }
                if(durum['login_email']==false){
                    $("#login_email").css({border:"1px solid red"});
                    
                }else if(durum['login_email']=="error"){
                    $("#bilgi").css({display:"flex"});
                    $("#bilgi").text("GEÇERSİZ EMAİL FORMATI !!");
                }else if(durum['login_password']=='low'){
                    console.log("selam");
                    $("#bilgi").css({display:"flex"});
                    $("#bilgi").text("GÜÇSÜZ ŞİFRE !!");
                }else{
                    $("#bilgi").css({display:"none"});
                }
                if(durum['gsm']==false){
                    $("#gsm").css({border:"1px solid red"});
                }
                if(durum['login_password']==false){
                    $("#login_password").css({border:"1px solid red"});
                }
                if(durum['result']==false){
                    $("#bilgi").css({display:"flex",width:"300px"});
                    $("#bilgi").text("BU EMAİL İLE KAYIT ZATEN VAR");
                }else if(durum['result']==true){

                    window.location="http://localhost/dashboard/teknik/";
                    
                }
                console.log(durum);
            });
        });
        $("#name").focus(function(){
            $(this).css({border:"1px solid gray"});
        });
        $("#lastname").focus(function(){
            $(this).css({border:"1px solid gray"});
        });    
        $("#login_email").focus(function(){
            $(this).css({border:"1px solid gray"});
        });
        $("#gsm").focus(function(){
            $(this).css({border:"1px solid gray"});
        });
        $("#login_password").focus(function(){
            $(this).css({border:"1px solid gray"});
            $("#message").css({display:"block"});
        });
        $("#login_password").blur(function(){
            $("#message").css({display:"none"});
        });
        $("#login_password").keyup(function(){
            var values = $(this).val();
            var value_length = values.length;
            var kucukHarfRegExp = /[a-z]/;
            var buyukHarfRegExp = /[A-Z]/;
            var numberRegExp = /[0-9]/;
            if(value_length>=8){
                $("#one").css({color:"blue"});
            }else if(value_length<=8){
                 $("#one").css({color:"red"});    
            }
            if(kucukHarfRegExp.test(values) && buyukHarfRegExp.test(values)){
                $("#two").css({color:"blue"});
            }else{
                $("#two").css({color:"red"});    
            }
            if(numberRegExp.test(values)){
                $("#thre").css({color:"blue"});
            }else{
                $("#thre").css({color:"red"});
            }
        });
        
    });
</script>

<body>
  <div class="containerr">
    <div class="nav">
        <div class="logo"><a href="index.php">BİTER|<a href="index.php" id="little">Teknik</a></a></div>
    </div>
  </div>


    
    
    <div class="sıgn_log">
       
        <div class="sıgn_log_button">    
            <div style="margin-right:20px;" id="first"><a class="sıgn_log_button_text" id="sıgn_text_sıgn">GİRİŞ YAP</a></div>
            <div style="margin-left:20px;" id="second"><a class="sıgn_log_button_text" id="log_text_log">KAYIT OL</a></div>
        </div>
        
        
        <form action="#" method="post" class="sıgnın">
           
            <label for="email" class="label_sıgnın">Email</label>
            <input type="text" class="form-control"  value="<?php if(isset($email)){echo $email;}?>"name="sign_email" id="sıgn_email" required>
            
            
            <label for="password" class="label_sıgnın">Şifre</label>
            <div id="box" >
                <input type="password" class="form-control" value="<?php if(isset($password)){echo $password;}?>" name="sign_password" id="sıgn_password" required>
                <i class="fa-regular fa-eye" id="passsword_open"></i>
                <i class="fa-regular fa-eye-slash" id="password_close" style="display:none"></i> 
            </div>
            
            <input type="submit" id="signin_submit" value="Giriş Yap" required>
            <div class="not" style="width:100%;display:flex;justify-content:center;margin-top:15px;"><?php if(isset($not)){echo $not;}?></div>
            <div class="forgot_password_box">
                <a href="forgot_password.php" id="forgot_password">Şifremi Unuttum</a>
            </div>
            
            
        </form>
        
        
        
        <form action="#" method="post" class="login" style="display:none;">
          
           <div style="display:flex;justify-content:center;">
                <div class="name" style="margin-right:5px;">
                    <label for="name" class="label_login">İsim</label>
                    <input type="text" class="form-control" name="name" id="name" required>  
                </div>
                
                 <div class="lastname" style="margin-left:5px;">
                     <label for="lastname" class="label_login">Soy İsim</label>
                     <input type="text" class="form-control" name="lastname" id="lastname" required>    
                 </div>
                
           </div>
           
            <label for="email" class="label_login">Email</label>
            <input type="text" class="form-control" name="login_email" id="login_email" required> 
             
            
           
           <div style="display:flex;justify-content:center;">
              
               <div class="email" style="margin-right:5px;">
                   <label for="gsm" class="label_login">Telefon Numarası</label>
                  <input type="text" class="form-control" name="gsm" id="gsm" required maxlength="10">

               </div>
               
               <div class="message" id="message">
               
               
                <p id="sifre">Şifreniz</p>
                
                <div class="box">
                  <div class="punkt" >
                      <i class="fa-solid fa-circle" id="one"></i>
                  </div>
                  <div class="info"><a>En az 8 karakter</a></div>
                  </div>
                   
                <div class="box">
                    <div class="punkt">
                        <i class="fa-solid fa-circle" id="two"></i>
                    </div>
                    <div class="info"><a> Bir küçük ve büyük harf</a></div>
                </div>   
                
                <div class="box">
                    <div class="punkt">
                        <i class="fa-solid fa-circle" id="thre"></i>
                    </div>
                    <div class="info"><a>Bir rakam içermelidir.</a></div>
                </div>
                
               </div>
               
               
               <div class="password" style="margin-left:5px;">
                   <label for="password" class="label_login">Şifre</label>
                    <input type="text" class="form-control" name="login_password" id="login_password" required>                   
               </div>
               
           </div>
           
           <div style="width:100%;display:flex;justify-content:center;align-items:center;">
               <input type="button" name="login_submit" value="Kayıt Ol" id="login_submit" required>
           </div>
           <div class="alert alert-dark" id="bilgi"></div>
           
        </form>
           
    </div>

    
</body>
</html>