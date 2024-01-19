<?php
    session_start();
    include "header.php";

    

    if(isset($_SESSION["user_id"])){
        $query=mysqli_query($conn,"select * from user where user_id='{$_SESSION['user_id']}'");
        $row=mysqli_fetch_array($query);
        $respons=json_encode(array(
            "authenticate"=>true,
            "session"=>$_SESSION["user_id"],
            "name"=>$row["name"]
        ));

        echo $respons;

    }else{
        $respons=json_encode(array(
            "authenticate"=>false,
            "message"=>"User is not authenticate"
        ));

        echo $respons;
    }

?>