<?php

include "header.php";

$val=json_decode(file_get_contents("php://input"));

if(isset($val->id) && isset($val->status)){
    $status="uncomplete";
    if($val->status == "true"){
        $status="complete";
    }
    $query=mysqli_query($conn,"update task set status = '$status' where id=$val->id");
    if($query){
        echo "success";
    }else{
        echo "unsuccess";
    }
}