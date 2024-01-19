<?php
    include "header.php";

    $user=json_decode(file_get_contents("php://input"));

    if($user !== null && is_object($user) && count((array)$user) > 0){
        if(isset($user->name) && isset($user->email) && isset($user->pass) && isset($user->repass)){
            $name=mysqli_real_escape_string($conn,$user->name);
            $email=mysqli_real_escape_string($conn,$user->email);
            $pass=mysqli_real_escape_string($conn,$user->pass);
            $repass=mysqli_real_escape_string($conn,$user->repass);
            $date=date("Y-m-d H-i-s");
            $user_id="user".rand(1111,9999);
            $user_id_query=mysqli_query($conn,"Select * from user where user_id='$user_id'");
            while(mysqli_num_rows($user_id_query)>0){
                $user_id="user"+rand(1111,9999);
                $user_id_query=mysqli_query($conn,"Select * from user where user_id='$user_id'");
            }
            if($name !="" || $email != "" || $pass != "" || $repass != ""){
                $email_query=mysqli_query($conn,"select * from user where email='$email'");
                if(!mysqli_num_rows($email_query)>0){
                if($pass === $repass){
                    $hashPass=password_hash($pass,PASSWORD_DEFAULT);
                    $insert=mysqli_query($conn,"Insert into user(name,email,pass,date,user_id) values('$name','$email','$hashPass','$date','$user_id')");
                    if($insert){
                        echo "success";
                    }else{
                        echo "unsuccess";
                    }
                
                }else{
                    echo "Please Recheack the Password";
                }
            }else{
                echo "Email is already exist try another...!";
            }


                
            }else{
                echo "Compulsory to fill all inputs";
            }
            
        }else{
            echo "Compulsory to fill all inputs";
        }
    }else{
        echo "Compulsory to fill all inputs";
    }

?>