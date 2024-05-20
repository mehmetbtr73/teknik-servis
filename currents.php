<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Biter|SATIŞ</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<style> 
    *{
        overflow: hidden;
    }
     .container{
        border:1px solid rgb(200,200,200);
        border-radius: 7px;
        width: 100%;
        height: 100vh;
        background-color: white;
        padding: 5px;
        padding-right: 15px;
        padding-left: 15px;
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
        width: 78vw;
        border:1px solid gray;
        z-index: 5;
        border-radius:5px;
        left:calc(50% - 39vw);
        right:calc(50% - 39vw);
        background-color: rgb(253,253,253);
        top: 8vh;
        height: 80vh;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
}
    .dropdownadressform{
        margin-top: 10px;
        margin-right: 10px;
        margin-left: 10px;
        padding: 10px;
        border-radius: 6px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: rgb(142, 208, 230,0.2);
        cursor: pointer;
        border:none;
    }
    .dropdownadressform:hover{
        background-color: rgb(142, 208, 230,0.6);
    }
    .form{
        overflow: auto;
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
    .deletbigbox {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0px;
        display: none;
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
    #editbutton {
        background-color: gray;
        margin-right: 15px;
        cursor: default;
        width: 100px;
        height: 30px;
        border: none;
        color: white;
    }
</style>
<script src="app.js"></script>
<script>
$(function(){
    $("#currentboxexit").click(function() {
        $(".addcurrentcontainer").css({display: 'none'});
    });
    $("#cancel").click(function() {
        $(".addcurrentcontainer").css({display: 'none'});
    });
    $(".newcurrent").click(function() {
        $(".addcurrentcontainer").css({display: 'block'});
        $("#editbutton").css({display: 'none'});
        $("#provinceselect").css({display: 'none'});
        $("#province").css({display: 'block'});
        $("#districtselect").css({display: 'none'});
        $("#district").css({display: 'block'});
        $("#log").css({display: 'block'});
        var name = $("#name").val("");
        var currenttype = $("#currenttype").val("");
        var taxadministration = $("#taxadministration").val("");
        var id = $("#id").val("");
        
        var email = $("#email").val("");
        var tel = $("#tel").val("");
        var fax = $("#fax").val("");
        var website = $("#website").val("");
        var countryselect = $("#country").val("");
        var neighbourhood = $("#neighbourhood").val("");
        var street = $("#street").val("");
        var buildingnumber = $("#buildingnumber").val("");
        var apartmentnumber = $("#apartmentnumber").val("");
        var postcode = $("#postcode").val("");
        
        $.getJSON('ulke.json',function(data){
            
            var select = $('#country');
            select.empty();
            var countrys = $("<option selected></option>").attr('id',"LÜTFEN ÜLKE SEÇİNİZ").text("LÜTFEN ÜLKE SEÇİNİZ");
            var countryss = $("<option></option>").attr('id',"TÜRKİYE").text("TÜRKİYE");
            select.append(countrys);
            select.append(countryss);
            $.each(data,function(index,country){
                var countrys = $("<option></option>").attr('id',country.name).text(country.name);
                select.append(countrys);
            });
        });
        
    });
    $("#log").click(function(){
        var name = $("#name").val();
        var currenttype = $("#currenttype").val();
        var taxadministration = $("#taxadministration").val();
        var id = $("#id").val();
        
        var email = $("#email").val();
        var tel = $("#tel").val();
        var fax = $("#fax").val();
        var website = $("#website").val();
        var countryselect = $("#country").val();
        var provinceselect = $("#provinceselect").val();
        var districtselect = $("#districtselect").val();
        var neighbourhood = $("#neighbourhood").val();
        var street = $("#street").val();
        var buildingnumber = $("#buildingnumber").val();
        var apartmentnumber = $("#apartmentnumber").val();
        var postcode = $("#postcode").val();
        
        var countryselectt = $("#country");
        var provinceselectt = $("#provinceselect");
        var districtselectt = $("#districtselect");
        var neighbourhoodd = $("#neighbourhood");
        var streett = $("#street");
        var buildingnumberr = $("#buildingnumber");
        
        
        var adressdisplay = $(".formadress").css('display');
        var adressbox = $(".dropdownadressform");
        
        if(adressdisplay == 'none'){
            if(countryselect === "LÜTFEN ÜLKE SEÇİNİZ" || provinceselect == "LÜTFEN ŞEHİR SEÇİNİZ" || districtselect == "LÜTFEN İLÇE SEÇİNİZ" || neighbourhood == "" || street == "" || buildingnumber == ""){
                adressbox.css({backgroundColor:'rgb(242, 208, 230,0.6)'});
                adressbox.css({border:'1px solid red'});
                if(countryselect == "LÜTFEN ÜLKE SEÇİNİZ"){
                    countryselectt.css({border:'1px solid red'});
                }else{
                    countryselectt.css({border:'1px solid gray'});
                }
                if(provinceselect == "LÜTFEN ŞEHİR SEÇİNİZ"){
                    provinceselectt.css({border:'1px solid red'});
                    $("#province").css({border:'1px solid red'});
                }else{
                    provinceselectt.css({border:'1px solid gray'});
                    $("#province").css({border:'1px solid gray'});
                }
                if(districtselect == "LÜTFEN İLÇE SEÇİNİZ"){
                    districtselectt.css({border:'1px solid red'});
                    $("#district").css({border:'1px solid red'});
                }else{
                    districtselectt.css({border:'1px solid gray'});
                    $("#district").css({border:'1px solid red'});
                }
                if(neighbourhood == ""){
                    neighbourhoodd.css({border:'1px solid red'});
                }else{
                    neighbourhoodd.css({border:'1px solid gray'});
                }
                if(street == ""){
                    streett.css({border:'1px solid red'});
                }else{
                    streett.css({border:'1px solid gray'});
                }
                if(buildingnumber == ""){
                    buildingnumberr.css({border:'1px solid red'});
                }else{
                    buildingnumberr.css({border:'1px solid gray'});
                }
            }
        }else{
            
            if(countryselect == "LÜTFEN ÜLKE SEÇİNİZ"){
                countryselectt.css({border:'1px solid red'});
            }else{
                countryselectt.css({border:'1px solid gray'});
            }
            if(provinceselect == "LÜTFEN ŞEHİR SEÇİNİZ"){
                provinceselectt.css({border:'1px solid red'});
                $("#province").css({border:'1px solid red'});
            }else{
                provinceselectt.css({border:'1px solid gray'});
                $("#province").css({border:'1px solid gray'});
            }
            if(districtselect == "LÜTFEN İLÇE SEÇİNİZ"){
                districtselectt.css({border:'1px solid red'});
                $("#district").css({border:'1px solid red'});
            }else{
                districtselectt.css({border:'1px solid gray'});
                $("#district").css({border:'1px solid red'});
            }
            if(neighbourhood == ""){
                neighbourhoodd.css({border:'1px solid red'});
            }else{
                neighbourhoodd.css({border:'1px solid gray'});
            }
            if(street == ""){
                streett.css({border:'1px solid red'});
            }else{
                streett.css({border:'1px solid gray'});
            }
            if(buildingnumber == ""){
                buildingnumberr.css({border:'1px solid red'});
            }else{
                buildingnumberr.css({border:'1px solid gray'});
            }
            
        }
        if(name === ""){
            $("#name").css({border:'1px solid red'});
        
        }else{
            $("#name").css({border:'1px solid gray'});
        
        }if(currenttype === ""){
            
            $("#currenttype").css({border:'1px solid red'});
        
        }else{
            $("#currenttype").css({border:'1px solid gray'});
    
        }if(taxadministration === ""){
            $("#taxadministration").css({border:'1px solid red'});
        
        }else{
            $("#taxadministration").css({border:'1px solid gray'});
        }
        if(id === ""){
            $("#id").css({border:'1px solid red'});
        
        }else{
            $("#id").css({border:'1px solid gray'});
        }
        
        if(name !== "" && currenttype !== "" && taxadministration !== "" && id !== "" && countryselect!=="LÜTFEN ÜLKE SEÇİNİZ" && provinceselect !== "LÜTFEN ŞEHİR SEÇİNİZ" && districtselect !== "LÜTFEN İLÇE SEÇİNİZ" && neighbourhood !== "" && street !== "" && buildingnumber !== ""){
            $.post('settings.php',{
                state:'logcurrent',
                name:name,
                currenttype:currenttype,
                taxadministration:taxadministration,
                id:id,
                email:email,
                tel:tel,
                fax:fax,
                website:website,
                country:countryselect,
                province:provinceselect,
                district:districtselect,
                neighbourhood:neighbourhood,
                street:street,
                buildingnumber:buildingnumber,
                apartmentnumber:apartmentnumber,
                buildingnumber:buildingnumber,
                postcode:postcode
                
            },function(data){
                if(data == 1){
                    location.reload();
                }
            });
        }
    });
    $(".dropdownadressform").click(function(){
        $(".formadress").slideToggle(1000); 
        $(this).css({border:'none'});
        $(this).css({backgroundColor:'rgb(142, 208, 230,0.2)'});
    });
    $('#country').change(function() {
        var selectedCountry = $(this).val(); // Seçilen ülke kodunu al
        if(selectedCountry === "TÜRKİYE"){
            $("#province").css({display:'none'});
            var province = $("#provinceselect");
            province.css({display:'block'});
            province.empty();
            var defaultoption = $("<option selected></option>").attr('id',"LÜTFEN ŞEHİR SEÇİNİZ").text("LÜTFEN ŞEHİR SEÇİNİZ");
            province.append(defaultoption);
            $.getJSON('sehirler.json',function(data){
                var select = $("#provinceselect");
                $.each(data,function(index,city){
                    var provinces = $("<option></option>").attr('id',city.sehir_adi).text(city.sehir_adi);
                    select.append(provinces);
                });
            });
        }else{
            $("#provinceselect").css({display:'none'});
            $("#province").css({display:'block'});
            $("#districtselect").css({display:'none'});
            $("#district").css({display:'block'});
        }
    });
    $("#provinceselect").change(function(){
        var selectedProvince = $(this).val();
        var select = $("#districtselect");
        var defaultoption = $("<option selected></option>").attr('id',"LÜTFEN İLÇE SEÇİNİZ").text("LÜTFEN İLÇE SEÇİNİZ");
        select.append(defaultoption);
        $.getJSON('ilceler.json',function(data){
            var select = $("#districtselect");
            select.css({display:'block'});
            $("#district").css({display:'none'});
            $.each(data,function(index,provinces){
                if(selectedProvince == provinces.sehir_adi){
                    var province = $("<option></option>").attr('id',provinces.ilce_adi).text(provinces.ilce_adi);
                    select.append(province);
                }
            });
        });
    });
    var tableList = [];
    $("table tbody").on('click','tr',function(){
        var value = $(this).attr('id');
        if(tableList.includes(value)){
            var index = tableList.indexOf(value);
            tableList.splice(index);
            $("#"+value).css({backgroundColor:'rgb(250,250,250)'});
        }else{
            $("#"+value).css({backgroundColor:'rgb(240,240,240)'});
            tableList.push(value);
        }
        if(tableList.length == 0){
            $(".alt_menu").css({justifyContent:'flex-end'});
            $(".altmenu_nav").css({display:'none'});
        }else if(tableList.length == 1){
            $(".alt_menu").css({justifyContent:'space-between'});
            $(".altmenu_nav").css({display:'flex'});
            $("#edit").css({display:'block'});
            $("#delete").css({display:'block'});
        }else if(tableList.length > 1){
            $(".alt_menu").css({justifyContent:'space-between'});
            $(".altmenu_nav").css({display:'flex'});
            $("#edit").css({display:'none'});
            $("#delete").css({display:'block'});
        }
    });
    $("#delete").click(function(){
        $(".deletbigbox").css({display: 'block'});
    });
    $("#delete_cancel").click(function() {
        $(".deletbigbox").css({display: 'none'});
    });
    $("#delete_ok").click(function() {
            $.post('settings.php',{
                state:'delete',
                table:'currents',
                formlist:tableList
            },function(data){
                if(data == true){
                   location.reload(); 
                }
            });
    });
    
    $("#edit").click(function(){
        $(".addcurrentcontainer").css({display:'flex'});
        $("#log").css({display:'none'});
        var name_old;
        var currenttype_old; 
        var taxadministration_old; 
        var id_old;
        
        var email_old;
        var tel_old;
        var fax_old;
        var website_old;
        var countryselect_old;
        var provinceselect_old;
        var districtselect_old;
        var neighbourhood_old;
        var street_old;
        var buildingnumber_old;
        var apartmentnumber_old;
        var postcode_old;
        $("#editbutton").css({display:'block'});
            $.post('settings.php',{
                state:'look',
                table:'currents',
                id:tableList
            },function(data){
                var jsondata = JSON.parse(data);
                var name_old = jsondata[0]['name'];
                var currenttype_old = jsondata[0]['currenttype'];
                var taxadministration_old = jsondata[0]['taxadministration'];
                var id_old = jsondata[0]['identity'];

                var email_old = jsondata[0]['email'];
                var tel_old = jsondata[0]['tel'];
                var fax_old = jsondata[0]['fax'];
                var website_old = jsondata[0]['name'];
                var countryselect_old = jsondata[0]['country'].toLocaleLowerCase();
                var provinceselect_old = jsondata[0]['province'];
                var districtselect_old = jsondata[0]['district'];
                var neighbourhood_old = jsondata[0]['neighbourhood'];
                var street_old = jsondata[0]['street'];
                var buildingnumber_old = jsondata[0]['buildingnumber'];
                var apartmentnumber_old = jsondata[0]['apartmennumber'];
                var postcode_old = jsondata[0]['postcode'];
                $("#name").val(name_old);
                $("#currenttype").val(currenttype_old);
                $("#taxadministration").val(taxadministration_old);
                $("#id").val(id_old);

                $("#email").val(email_old);
                $("#tel").val(tel_old);
                $("#fax").val(fax_old);
                $("#website").val(website_old);
                
                        
                var select = $("#country");
                var selectedOptionText; // Seçili optionun metnini saklamak için bir değişken
                var selectedOptionCityText; // Seçili optionun metnini saklamak için bir değişken

                // Select içindeki tüm optionları temizle
                select.empty();

                // JSON dosyasından ülke verilerini al
                $.getJSON('ulke.json', function(data) {
                    $.each(data, function(index, country) {
                        var option = $("<option></option>").text(country.name).val(country.name);
                        if (country.name.toLowerCase() === countryselect_old.toLowerCase()) {
                            option.prop("selected", true);
                        }
                        $("#country").append(option);
                    });

                    if (countryselect_old.toLowerCase() === "türkiye") {
                        $("#province").css({display: 'none'});
                        $("#provinceselect").css({display: 'block'}).empty();
                        $.getJSON('sehirler.json', function(data) {
                            $.each(data, function(index, city) {
                                var option = $("<option></option>").text(city.sehir_adi).val(city.sehir_adi);
                                if (provinceselect_old.toLowerCase() === city.sehir_adi.toLowerCase()) {
                                    option.prop("selected", true);
                                }
                                $("#provinceselect").append(option);
                            });
                            // İlçeleri yüklemek için sehirler.json dosyasının tam yüklenmesini beklememiz gerekir.
                            // Bu nedenle, ilçeleri yükleme işlemi burada değil, sehirler.json dosyasının yüklendiği bloğun içinde olmalıdır.
                        });
                    }
                });

                // İlçeleri yüklemek için sehirler.json dosyasının tam yüklenmesini bekler.
                $.getJSON('ilceler.json', function(data) {
                    var select = $("#districtselect");
                    $.each(data, function(index, district) {
                        var option = $("<option></option>").text(district.ilce_adi).val(district.ilce_adi);
                        if (districtselect_old.toLowerCase() === district.ilce_adi.toLowerCase()) {
                            option.prop("selected", true);
                        }
                        select.append(option);
                    });
                });





                
                
                
                
                $("#district").css({display:'none'});
                $("#districtselect").css({display:'block'});
                $("#districtselect").empty();
                
                
                $("#neighbourhood").val(neighbourhood_old);
                $("#street").val(street_old);
                $("#buildingnumber").val(buildingnumber_old);
                $("#apartmentnumber").val(apartmentnumber_old);
                $("#postcode").val(postcode_old);
                
                $(".input").on('input',function(){
                var name = $("#name").val();
                var currenttype = $("#currenttype").val();
                var taxadministration = $("#taxadministration").val();
                var id = $("#id").val();

                var email = $("#email").val();
                var tel = $("#tel").val();
                var fax = $("#fax").val();
                var website = $("#website").val();
                var countryselect = $("#country").val();
                var provinceselect = $("#provinceselect").val();
                var districtselect = $("#districtselect").val();
                var neighbourhood = $("#neighbourhood").val();
                var street = $("#street").val();
                var buildingnumber = $("#buildingnumber").val();
                var apartmentnumber = $("#apartmentnumber").val();
                var postcode = $("#postcode").val();
                console.log(postcode + " //// "+postcode_old);
                if(name !== name_old || currenttype !== currenttype_old || taxadministration !== taxadministration_old || id != id_old ||email !== email_old || tel != tel_old || fax !== fax_old || website !== website_old || countryselect.toLocaleLowerCase() != countryselect_old || provinceselect !== provinceselect_old || districtselect !== districtselect_old || neighbourhood !== neighbourhood_old || street !== street_old || buildingnumber !== buildingnumber_old || apartmentnumber != apartmentnumber_old ||postcode != postcode_old){
                    $("#editbutton").css({backgroundColor:'cadetblue',cursor:'pointer'});
                    $("#editbutton").click(function(){
                        $.post('settings.php',{
                            state:'change',
                            table:'currents',
                            id:tableList,
                            name:name,
                            currenttype:currenttype,
                            taxadministration:taxadministration,
                            identity:id,
                            email:email,
                            tel:tel,
                            fax:fax,
                            website:website,
                            country:countryselect,
                            province:provinceselect,
                            district:districtselect,
                            neighbourhood:neighbourhood,
                            street:street,
                            buildingnumber:buildingnumber,
                            apartmentnumber:apartmentnumber,
                            postcode:postcode
                        },function(data){
                            console.log(data);
                        });
                    });
                }else{
                    $("#editbutton").css({backgroundColor:'gray',cursor:'default'});
                }
            });
            });
            
    });
    
    });
    

</script>
<body>
   <div class="container">
      
      <div class="addcurrentcontainer" style="display:none;">
          <div class="addcurrentbox">
             <div class="infoboxtop" style="margin-bottom:15px;">
                 <div class="tittle">CARİ OLUŞTUR</div>
                 <i class="fa-solid fa-rectangle-xmark" id="currentboxexit"></i>
             </div>
             <div class="form">
                <div class="formcurrent">
                    <div class="maininputbox">
                        <div class="inputbox">
                            <label for="name" class="label">FIRMA/UNVAN</label>
                            <input type="text" class="input" id="name">
                         </div>
                         <div class="inputbox">
                             <label for="currenttype" class="label">Cari Tipi</label>
                             <select name="currenttype" id="currenttype" class="input">
                                 <option selected>LÜTFEN CARİ TİPİ SEÇİNİZ</option>
                                 <option>PERSONEL</option>
                                 <option>MÜŞTERİ</option>
                             </select>
                         </div>
                     </div>
                    <div class="maininputbox">  
                         <div class="inputbox">
                             <label for="taxadministration" class="label">VERGİ DAİRESİ</label>
                             <input type="text" class="input" id="taxadministration">
                         </div>
                         <div class="inputbox">
                             <label for="id" class="label">VERGİ/TC NO</label>
                             <input type="text" class="input" id="id">
                         </div>
                     </div>
                    <div class="maininputbox">
                         <div class="inputbox">
                             <label for="email" class="label">E-mail</label>
                             <input type="text" class="input" id="email">
                         </div>

                         <div class="inputbox">
                             <label for="tel" class="label">TELEFON NO</label>
                             <input type="text" class="input" id="tel">
                         </div>
                     </div>
                     <div class="maininputbox">
                         <div class="inputbox">
                             <label for="fax" class="label">Fax</label>
                             <input type="text" class="input" id="fax">
                         </div>

                         <div class="inputbox">
                             <label for="website" class="label">WEB SİTESİ</label>
                             <input type="text" class="input" id="website">
                         </div>
                     </div>
                 </div>
                 
                 <div class="dropdownadressform">
                     <a>ADRES BİLGİLERİ</a>
                     <i class="fa-solid fa-circle-down"></i>
                 </div>
                 
                <div class="formadress" style="display:none;">
                    <div class="maininputbox">
                        <div class="inputbox">
                            <label for="country" class="label">ÜLKE</label>
                            <select class="input" id="country">
                                <option selected>LÜTFEN ÜLKE SEÇİNİZ</option>
                                <option >TÜRKİYE</option>
                            </select>
                         </div>
                         <div class="inputbox">
                             <label for="province" class="label">ŞEHİR</label>
                             <input type="text" id="province" class="input">
                             <select class="input" id="provinceselect" style="display:none;">
                                <option selected>LÜTFEN ŞEHİR SEÇİNİZ</option>
                            </select>
                         </div>
                     </div><div class="maininputbox">
                        <div class="inputbox">
                            <label for="district" class="label">İLÇE</label>
                            <input type="text" class="input" id="district">
                            <select class="input" id="districtselect" style="display:none;">
                                <option selected>LÜTFEN İLÇE SEÇİNİZ</option>
                            </select>
                         </div>
                         <div class="inputbox">
                             <label for="neighbourhood" class="label">MAHALLE</label>
                             <input name="currenttype" id="neighbourhood" class="input">
                         </div>
                     </div><div class="maininputbox">
                        <div class="inputbox">
                            <label for="street" class="label">SOKAK</label>
                            <input type="text" class="input" id="street">
                         </div>
                         <div class="inputbox">
                             <label for="buildingnumber" class="label">BİNA NO</label>
                             <input name="currenttype" id="buildingnumber" class="input">
                         </div>
                     </div>
                     <div class="maininputbox">
                        <div class="inputbox">
                            <label for="apartmentnumber" class="label">DAİRE NO</label>
                            <input type="text" class="input" id="apartmentnumber">
                         </div>
                         <div class="inputbox">
                             <label for="postcode" class="label">POSTA KODU</label>
                             <input name="currenttype" id="postcode" class="input">
                         </div>
                     </div>
                </div>
             </div>

              <div class="currentboxbuttons" style="margin-bottom:5px;">
                  <button class="currentboxbutton" id="log">KAYDET</button>
                  <button class="currentboxbutton" id="editbutton" style="display:none">DEĞİŞTİR</button>
                  <button class="currentboxbutton" id="cancel">VAZGEÇ</button>
              </div>
          </div>
      </div>
      
       <div class="alt_menu">
            <div class="altmenu_nav">
                <button class="altmenunav_buttons" id="delete">SİL</button>
                <button class="altmenunav_buttons" id="edit">DÜZENLE</button>
            </div>
            <button class="newcurrent">Cari Oluştur</button>
       </div>
       
       <div class="source">
           <input type="text" class="sourceinput" placeholder="İsim Giriniz">
           <button class="ara">ARA</button>
       </div>
       
       <div class="table">
           <table>
               <thead>
                    <th>İSİM/ÜNVAN</th>
                    <th>CARİ TİPİ</th>
                    <th>E-MAİL</th>
                    <th>TEL</th>
                    <th>TARİH</th>
                </thead>
                <tbody>
                    <?php
                        require_once("conn.php");
                        $sql = $db->query("SELECT * FROM currents order by id desc");
                        $datas = $sql->fetchall();
                        foreach($datas as $data){
                            echo "<tr id='".$data['id']."'>";
                                echo "<td id='".$data['name']."'>".$data['name']."</td>";
                                echo "<td id='".$data['currenttype']."'>".$data['currenttype']."</td>";
                                echo "<td id='".$data['email']."'>".$data['email']."</td>";
                                echo "<td id='".$data['tel']."'>".$data['tel']."</td>";
                                echo "<td id='".$data['date']."'>".$data['date']."</td>";
                            echo"</tr>";
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