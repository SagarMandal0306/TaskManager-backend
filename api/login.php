<?php
    session_start();
    include "header.php";

    $user=json_decode(file_get_contents("php://input"));


  if($user !== null && is_object($user) && count((array)$user) > 0){
    if(isset($user->email) && isset($user->pass)){
    $email=mysqli_real_escape_string($conn,$user->email);
    $pass=mysqli_real_escape_string($conn,$user->pass);

    if($email !=="" || $pass !== ""){

    $query=mysqli_query($conn,"Select * from user where email='$email'");
    if(mysqli_num_rows($query)>0){
        // $query_pass=mysqli_query($conn,"select * from user where email='$email' and pass='$pass'");
        $row=mysqli_fetch_assoc($query);

        // $row=mysqli_fetch_assoc($query_pass);
        if(password_verify($pass,$row["pass"])){
            $_SESSION["user_id"]=$row["user_id"];
            $data=array(
                "respons"=> "success",
                "session"=>$_SESSION["user_id"],
                "name"=>$row["name"]
            );

            $json_data=json_encode($data);
            echo $json_data;
        }else{
            $data=array(
                "respons"=> "Paasword is Incorrect",
                
            );

            $json_data=json_encode($data);
            echo $json_data;
            // echo "Paasword is Incorrect";  
        }
   
    }else{
        $data=array(
            "respons"=> "Your email is not registered",
           
        );

        $json_data=json_encode($data);
        echo $json_data;
        // echo "Your email is not registered";
    }
}else{
    $data=array(
        "respons"=> "Compulsory to fill all the inputs..!",
        
    );

    $json_data=json_encode($data);
    echo $json_data;
    // echo "Compulsory to fill all the inputs..!";
}
}else{
    $data=array(
        "respons"=> "Compulsory to fill all the inputs..!",
        
    );

    $json_data=json_encode($data);
    echo $json_data;
    // echo "Compulsory to fill all the inputs..!";
}
  }else{
    $data=array(
        "respons"=> "Compulsory to fill all the inputs..!",
        
    );

    $json_data=json_encode($data);
    echo $json_data;
    // echo "Compulsory to fill all the inputs..!";
  }
  

?>