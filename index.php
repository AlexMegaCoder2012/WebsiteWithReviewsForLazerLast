<?php
    session_start();
    require "Settings/Scripts/db.php";
?>

<!DOCTYPE html>
<HTML>
    <head>
        <title>Отзывы о проекте LazerLast</title>
        <meta charset="UTF-8">
        <link href="Settings/Styles/Default.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="Settings/Scripts/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="Settings/Scripts/ScripctStyle.js"></script>
    </head>
    <body>
        <div id="Background_site">
           <img id="img_main">
            <div class="workspace">
                <div class="title_page">
                    <p id="donate_reviews">LazerLast - Отзывы о качестве услуг</p>
                </div>
                <div class="Content">
                    <?php
                        $check_user = mysqli_query($connect, "SELECT * FROM `reviews` WHERE `id`");
                        $CountTb = mysqli_query($connect, "SELECT COUNT(*) FROM reviews");
                        $count = mysqli_fetch_row($CountTb)[0];

                        $rows = mysqli_num_rows($check_user);

                        for ($i = 0 ; $i < $rows ; ++$i) {
                            $row = mysqli_fetch_row($check_user);
                            echo "<div class='UsersReview'>";
                            echo "<h3 id='Nick'>$row[1]</h3>";
                            echo "<div class='Text'>";
                            echo "<h4>$row[2]</h4>";
                            $HumDate=$row[3]+7200;
                            echo "<h3>". date('d.m.Y H:i', $HumDate)."</h3>";
                            echo "</div>";
                            echo "</div>";
                        }

                        if ($count==0) {echo "<h2 align='center'>Здесь пока нет отзывов, но вы можете стать первым!</h2>";} 

                    ?>
                </div>
                <center>
                <div class="Your_review">
                    <div class="form_review">
                       <?php
                        if (!$_SESSION['user']) {
                            echo " <p>Вы не можете оставить отзыв! отзывы могут оставлять только авторизованные пользователи проекта 'LazerLast'! Пожалуйста, <a id='link_area' href='#openModal'>войдите</a> аккаунт, используя свой логин и пароль.</p>";
                        } else {
                            echo "<form id='PlaceEnterReview' class='form_review' action='review.php' method='POST'><textarea id='Text_review' placeholder='Введите ваш отзыв' name='review'></textarea><div id='Numchar'><text>Символов написано: 0/300</text></div><button id='Send' name='Send_feedback'>Отправить отзыв</button></form>";
                        }
                        ?>
                        
                        <div id="openModal" class="modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <a href="#close" title="Close" class="close">×</a>
                                    </div>
                                    <div class="modal-body">
                                        <form onchange="CheckFieds();" id="Enter" action="EnterAccaunt.php" method="POST">
                                            <center>
                                                <h1>Авторизация</h1>
                                                <input id='one' name='Login' placeholder='Логин [Ник]'><br>
                                                <input id='two' type='password' name='Password' placeholder='Пароль'><br>
                                                <button type="submit" id="confirm" name="EnterConfirm">Войти</button>
                                            </center>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </div>
    </body>
— </HTML>