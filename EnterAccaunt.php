<?php
	session_start();
    require "Settings/Scripts/db.php";

    $login=$_POST{'Login'};
    $password=$_POST{'Password'};

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `username` = '$login' AND `password` = '$password'");

    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "username" => $user['username'],
        ];

        header('Location: index.php');
        } else {
            echo "<div class='modal-dialog'><div class='modal-content'><div class='modal-header'><div class='modal-body'><center><h3>Пользователь с таким Логином и паролен не найден, пожалуйста, перейдите на основную страницу и повторите попытку</h3><button type='submit' id='confirm' name='EnterConfirm'>Назад</button></center></div></div></div></div>";
        } 
?>
                     
                     
                     
<!DOCTYPE html>
<HTML>
    <head>
        <title>вход</title>
        <meta charset="UTF-8">
        <link href="Settings/Styles/Errors.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="Settings/Scripts/jquery-3.5.1.js"></script>
    </head>>
    <body>
        <script>
            jQuery(document).ready(function(){
                $('button[name="EnterConfirm"]').click(function () {
                    location.href = "index.php";
                });
            });
        </script>
    </body>
</HTML>