<?php
    include "header.php";
    

    $task=json_decode(file_get_contents("php://input"));

    if($task !== null && is_object($task) && count((array)$task) > 0){
        if(isset($task->name) && isset($task->desc) && isset($task->date) && isset($task->priority) ){
            $name=mysqli_real_escape_string($conn,$task->name);
            $desc=mysqli_real_escape_string($conn,$task->desc);
            $due_date=mysqli_real_escape_string($conn,$task->date);
            $priority=mysqli_real_escape_string($conn,$task->priority);
            $user_id=mysqli_real_escape_string($conn,$task->user_id);
            if($name != "" || $desc != "" || $date != "" || $priority != "" || $user_id != ""){
                if($priority == "Select Priority"){
                    $priority=0;
                }
                date_default_timezone_set('Asia/Kolkata');
                $date = date("d-m-Y H:i:s");
                $query=mysqli_query($conn,"Insert into task(name,description,due_date,priority,user_id,status,date)
                    values('$name','$desc','$due_date',$priority,'$user_id','uncomplete','$date')
                ");
                if($query){
                    echo "success";
                }else{
                    echo "unsuccess";
                }
            }else{
                echo "Compulsory to fill all the inputs";
            }
        }
        else{
            echo "Compulsory to fill all the inputs";
        }
    }else{
        echo "Compulsory to fill all the inputs";
    }