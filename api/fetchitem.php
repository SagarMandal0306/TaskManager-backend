<?php

include "header.php";

$item_id=json_decode(file_get_contents("php://input"));

if($item_id != null){
    $query=mysqli_query($conn,"select * from task where id=$item_id->id");
    if($query){
       $row=mysqli_fetch_array($query);
        $itemDetails=array(
            "id"=>$row["id"],
            "name"=>$row["name"],
            "desc"=>$row["description"],
            "due_date"=>$row["due_date"],
             "status"=>$row["status"],
             "priority"=>$row["priority"],
             "date"=>$row["date"]
        );

        echo json_encode($itemDetails);
       
    }else{
        echo "unsuccess";
    }
}