<?php

include "header.php";

$itemDetails = json_decode(file_get_contents("php://input"));

if ($itemDetails != null) {
    if (isset($itemDetails->name) && isset($itemDetails->desc) && isset($itemDetails->due_date) && isset($itemDetails->priority) && isset($itemDetails->id)) {
        $name = mysqli_real_escape_string($conn, $itemDetails->name);
        $desc = mysqli_real_escape_string($conn, $itemDetails->desc);
        $due_date = mysqli_real_escape_string($conn, $itemDetails->due_date);
        $priority = mysqli_real_escape_string($conn, $itemDetails->priority);
        $id = mysqli_real_escape_string($conn, $itemDetails->id);
        if ($name != "" || $desc != "" || $due_date != "" || $priority != "" || $id != "") {
            $query = mysqli_query($conn, "update task set name = '$name' , description = '$desc' , due_date = '$due_date', priority = $priority  where id= $id");
            if ($query) {
                echo "success";
            } else {
                echo "unsuccess";
            }
        } else {
            echo "Compulsory to fill all fileds";
        }
    }
}
