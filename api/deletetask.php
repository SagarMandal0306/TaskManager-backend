<?php

include "header.php";

$val=json_decode(file_get_contents("php://input"));

if(isset($val->id) ){
    $query=mysqli_query($conn,"delete from task where id=$val->id");
    if($query){
        echo "success";
    }else{
        echo "unsuccess";
    }
}