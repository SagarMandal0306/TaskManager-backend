<?php

include "header.php";

$user_id=json_decode(file_get_contents("php://input"));

$responseArray=array();

if($user_id != null){
    $query_fetch=mysqli_query($conn,"select * from task where user_id = '$user_id->session'  order by  id desc ");
    while($row=mysqli_fetch_array($query_fetch)){
        $response=array(
            "id"=>$row["id"],
            "name"=>$row['name'],
            "desc"=>$row['description'],
            "due_date"=>$row["due_date"],
            "priority"=>$row["priority"],
            "status"=>$row["status"],
            "date"=>$row["date"]
        );

        $responseArray[]=$response;
        

    }
    echo json_encode($responseArray);
}