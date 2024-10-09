<?php
    $connect = mysqli_connect('localhost', 'login', 'pass', 'db');

    if (!$connect) {
        die('Ошибка подключение к базе данных');
    }