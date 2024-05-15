<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="reset.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style>
    .main{
        padding-top: 15px;
        width: 300px;
        padding-right: 7px;
        padding-left: 5px;
        display: flex;
        flex-direction: column;
    }
    .iframes{
        position: relative;
        top: 15px;
        width: 100%;
        height: calc(100% - 15px);
    }
    .iframes iframe{
        width: 100%;
        height: 100%;
    }
    .navmainbuttons{
        height: 40px;
        width: 100%;
        border:none;
        outline: none;
        background-color: rgb(254,254,254);
        border-radius: 6px;
        cursor: pointer;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        font-size: 14px;
        
    }
    .navmainbuttons:hover{
        background-color: rgb(242,242,242);
    }
    .mainpagebuttons{
        background-color: rgb(254,254,254);
        border-radius: 8px;
        border:1px solid rgb(200,200,200);
        overflow: hidden;
        padding: 10px;
    }
    .description{
       border:none;
       border-radius:5px;
       width: 100%;
       position: relative;
       top: 7px; 
       height: calc(100vh - 65px);
       display: flex;
       flex-direction: row;
    }
    body{
        background-color: rgb(250,250,250);
    }
</style>
<script>
    $(function(){
        $("#mainpage").click(function(){
            $("#currentstatus").css({display:'flex'});
            $("#services").css({display:'none'});
            $("#incomee").css({display:'none'});
            $("#expense").css({display:'none'});
            $("#currents").css({display:'none'});
            $("#stock").css({display:'none'});
        
        });
        $("#formsofservices").click(function(){
            $("#currentstatus").css({display:'none'});
            $("#services").css({display:'flex'});
            $("#incomee").css({display:'none'});
            $("#expense").css({display:'none'});
            $("#currents").css({display:'none'});
            $("#stock").css({display:'none'});
        });
        $("#income").click(function(){
            $("#currentstatus").css({display:'none'});
            $("#services").css({display:'none'});
            $("#incomee").css({display:'flex'});
            $("#expense").css({display:'none'});
            $("#currents").css({display:'none'});
            $("#stock").css({display:'none'});
        });
        $("#expensebutton").click(function(){
            $("#currentstatus").css({display:'none'});
            $("#services").css({display:'none'});
            $("#incomee").css({display:'none'});
            $("#expense").css({display:'flex'});
            $("#currents").css({display:'none'});
            $("#stock").css({display:'none'});
        });
        $("#currentsbutton").click(function(){
            $("#currentstatus").css({display:'none'});
            $("#services").css({display:'none'});
            $("#incomee").css({display:'none'});
            $("#expense").css({display:'none'});
            $("#currents").css({display:'flex'});
            $("#stock").css({display:'none'});
        });
        $("#stockbutton").click(function(){
            $("#currentstatus").css({display:'none'});
            $("#services").css({display:'none'});
            $("#incomee").css({display:'none'});
            $("#expense").css({display:'none'});
            $("#currents").css({display:'none'});
            $("#stock").css({display:'flex'});
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
         <nav class="main">
            <div class="mainpagebuttons">
                <button class="navmainbuttons" id="mainpage">GÜNCEL DURUM</button>
                <button class="navmainbuttons" id="formsofservices">SERVİS FORMLARI</button>
                <button class="navmainbuttons" id="income">ALIŞ YÖNETİMİ</button>
                <button class="navmainbuttons" id="expensebutton">SATIŞ YÖNETİMİ</button>
                <button class="navmainbuttons" id="currentsbutton">CARİ YÖNETİMİ</button>
                <button class="navmainbuttons" id="stockbutton">STOK YÖNETİMİ</button>
            </div>
             
         </nav>
         <div class="iframes">
             <iframe src="currentstatus.php" id="currentstatus" frameborder="0" style="display:none;"></iframe>
             <iframe src="services.php" id="services" frameborder="0"></iframe>
             <iframe src="income.php" id="incomee" frameborder="0" style="display:none;"></iframe>
             <iframe src="expense.php" id="expense" frameborder="0" style="display:none;"></iframe>
             <iframe src="currents.php" id="currents" frameborder="0" style="display:none;"></iframe>
             <iframe src="stock.php" id="stock" frameborder="0" style="display:none;"></iframe>
         </div>
           
           
           
       </div>
   </div>
</body>
</html