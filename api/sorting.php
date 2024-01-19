<?php

include "header.php";

$data = json_decode(file_get_contents("php://input"));

if ($data != null) {
    if ($data->sort != "") {
        $sortValue = $data->sort;
        $user_id=$data->user_id;
        switch ($sortValue) {
            case 1:
                // echo "sorting";
                $query = mysqli_query($conn, "select * from task where user_id='$user_id' and status='complete'  order by id desc");
                if ($query) {
                    if(mysqli_num_rows($query)>0){

                        $itemDetailsArray=array();
                    while($row = mysqli_fetch_array($query)){

                    $itemDetails = array(
                        "id" => $row["id"],
                        "name" => $row["name"],
                        "desc" => $row["description"],
                        "due_date" => $row["due_date"],
                        "status" => $row["status"],
                        "priority" => $row["priority"],
                        "date" => $row["date"]
                    );
                    $itemDetailsArray[]=$itemDetails;

                }
                    echo json_encode($itemDetailsArray);
                }else{
                    echo "There Are No Any Task :(";
                }
                } else {
                    echo "unsuccess";
                }
                break;

            case 2:
                $query = mysqli_query($conn, "select * from task where user_id='$user_id' and status='uncomplete' order by id desc");
                if ($query) {
                    if(mysqli_num_rows($query)>0){

                        $itemDetailsArray=array();
                    while($row = mysqli_fetch_array($query)){

                    $itemDetails = array(
                        "id" => $row["id"],
                        "name" => $row["name"],
                        "desc" => $row["description"],
                        "due_date" => $row["due_date"],
                        "status" => $row["status"],
                        "priority" => $row["priority"],
                        "date" => $row["date"]
                    );
                    $itemDetailsArray[]=$itemDetails;

                }
                    echo json_encode($itemDetailsArray);
                }else{
                    echo "There Are No Any Task :(";
                }
                } else {
                    echo "unsuccess";
                }
                break;


            case 3:
                $query = mysqli_query($conn, "select * from task where user_id='$user_id' and priority=1 order by id desc");
                if ($query) {
                    if(mysqli_num_rows($query)>0){

                        $itemDetailsArray=array();
                    while($row = mysqli_fetch_array($query)){

                    $itemDetails = array(
                        "id" => $row["id"],
                        "name" => $row["name"],
                        "desc" => $row["description"],
                        "due_date" => $row["due_date"],
                        "status" => $row["status"],
                        "priority" => $row["priority"],
                        "date" => $row["date"]
                    );
                    $itemDetailsArray[]=$itemDetails;

                }
                    echo json_encode($itemDetailsArray);
                }else{
                    echo "There Are No Any Task :(";
                }
                } else {
                    echo "unsuccess";
                }
                break;


            case 4:
                $query = mysqli_query($conn, "select * from task where user_id='$user_id' and priority=0 order by id desc");
                if ($query) {
                    if(mysqli_num_rows($query)>0){

                        $itemDetailsArray=array();
                    while($row = mysqli_fetch_array($query)){

                    $itemDetails = array(
                        "id" => $row["id"],
                        "name" => $row["name"],
                        "desc" => $row["description"],
                        "due_date" => $row["due_date"],
                        "status" => $row["status"],
                        "priority" => $row["priority"],
                        "date" => $row["date"]
                    );
                    $itemDetailsArray[]=$itemDetails;

                }
                    echo json_encode($itemDetailsArray);
                }else{
                    echo "There Are No Any Task :(";
                }
                } else {
                    echo "unsuccess";
                }
                break;
            default:
            $query = mysqli_query($conn, "select * from task where user_id='$user_id' order by id desc");
            if ($query) {
                if(mysqli_num_rows($query)>0){

                    $itemDetailsArray=array();
                while($row = mysqli_fetch_array($query)){

                $itemDetails = array(
                    "id" => $row["id"],
                    "name" => $row["name"],
                    "desc" => $row["description"],
                    "due_date" => $row["due_date"],
                    "status" => $row["status"],
                    "priority" => $row["priority"],
                    "date" => $row["date"]
                );
                $itemDetailsArray[]=$itemDetails;

            }
                echo json_encode($itemDetailsArray);
            }else{
                echo "There Are No Any Task :(";
            }
            } else {
                echo "unsuccess";
            }
            break;
        }
    }
}
