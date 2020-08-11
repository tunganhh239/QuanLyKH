<?php
    include '../connect.php';
    include '../User.php';
    $user= new User();
    $output = '';
    $search;
    if(isset($_POST["query"])) $search= $_POST["query"];
    if(isset($search)){
        $result=$user->searchUser($search);
        foreach($result as $row){
            $id=$row['id'];
            $output .='<a href="'.'profileView.php?id='.$row['id'].'">'.$row["firstname"].' '.$row["lastname"].'</a><br>';
        }
        echo $output;
    }
    
?>
