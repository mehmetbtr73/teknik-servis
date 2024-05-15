<?php
if(isset($_POST['login_email'])){
    include("conn.php");
    $name =$_POST['name'];
    $lastname =$_POST['lastname'];
    $login_email =$_POST['login_email'];
    $gsm =$_POST['gsm'];
    $login_password = $_POST['login_password'];
    $durum = array();
    $email_pattern = "/^[a-zA-Z0-9\.\_]+@[a-z]+(.[a-z0-9]+)?\.[a-z]{2,}(.[a-z0-9]{2})?$/";
    $password_big_pattern ="/[A-Z]/";
    $password_little_pattern ="/[a-z]/";
    $password_number_pattern ="/[0-9]/";
    $password_big_result = preg_match($password_big_pattern,$login_password,$take_password_big_result);
    $password_little_result = preg_match($password_little_pattern,$login_password,$take_password_little_result);
    $password_number_result = preg_match($password_number_pattern,$login_password,$take_password_number_result);
    $email_result = preg_match($email_pattern,$login_email,$takeNumber);
    if(empty($name)){
        $durum['name']=false;
    }else{
        $durum['name']=true;
    }
    
    if(empty($lastname)){
        $durum['lastname']=false;
    }else{
        $durum['lastname']=true;
    }
    
    if(empty($login_email)){
        $durum['login_email']=false;
    }else if($email_result==0){
        $durum['login_email']="error";
    }else{
        $durum['login_email']=true;
    }
    
    if(empty($gsm)){
        $durum['gsm']=false;
    }else{
        $durum['gsm']=true;
    }
    
    if(empty($login_password)){
        $durum['login_password']=false;
    }else if(strlen($login_password) < 8 || $password_big_result==0 || $password_little_result==0 || $password_number_result==0){
        $durum['login_password']= "low";
    }else{
        $durum['login_password']=true;
    }
    
    
    
    
    if(!empty($name) && !empty($lastname) && !empty($login_email) && $email_result==1 && !empty($gsm) && !empty($login_password) && strlen($login_password) > 8 && $password_big_result==1 && $password_little_result==1 && $password_number_result==1){
        $veriler = $db->query("SELECT *FROM user",PDO::FETCH_ASSOC);
        $durum_db = true;
        $result;
        foreach($veriler as $veri){
            if($veri['email']==$login_email){
                $durum_db = false;
                $durum['result'] = false;
            }
        }
        if($durum_db == true){
            $durum['result']=true;
            $eklee = $db->prepare("INSERT INTO user(name,lastname,email,gsm,password) VALUES(?,?,?,?,?)");
            $eklee->bindparam(1,$name);
            $eklee->bindparam(2,$lastname);
            $eklee->bindparam(3,$login_email);
            $eklee->bindparam(4,$gsm);
            $eklee->bindparam(5,$login_password);
            $eklee->execute();
            setcookie("email",$login_email,time() + 86400);


        }
        
    }
    
    $json_durum = json_encode($durum);
    echo $json_durum;
    
}   
?>