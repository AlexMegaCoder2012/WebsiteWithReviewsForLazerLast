<?php
    session_start();
    require "Settings/Scripts/db.php";
    
    // Данные, которые полетят в БД
    $db_table = "reviews";

    $check_user = mysqli_query($connect, "SELECT COUNT(*) FROM reviews");
    $count = mysqli_fetch_row($check_user)[0];
    $id=$count+1;

    $user=$_SESSION['user']['username'];
    $Review=$_POST['review'];
    $DateRev=time();

    mysqli_query($connect,"INSERT INTO ".$db_table." (id,username,review,datereview) VALUES ('$id','$user','$Review','$DateRev')"); 

    //Выход из аккаунта
    unset($_SESSION['user']);
    header('Location: index.php');
?>