<?php
session_start();
require_once 'starter_db.php';

$login_autoriz = strip_tags($_REQUEST['login_autoriz']);
$password_autoriz = strip_tags($_REQUEST['password_autoriz']);

$data = [
    'login' => $login_autoriz,
    'password' => $password_autoriz
];


$errors=array();
if (trim($data['login']=='')) {
    $errors[]='<h2>Введите логин</h2>';
}
if (trim($data['password']=='')) {
    $errors[]='<h2>Введите пароль</h2>';
}


if (!empty($errors)) {
    echo array_shift($errors);
    $_SESSION['user']='';
    echo '<a href="index.php"> Вернуться </a>';
//    exit();
} else {
        $lopdo = $pdo->prepare('SELECT login, password FROM users WHERE login = :login');
        $lopdo->execute([':login' => $login_autoriz]);
        $log = $lopdo->fetchAll(PDO::FETCH_ASSOC);
        if (empty($log) || !password_verify($data['password'], $log[0]['password'])) {
            echo '<h2>Невеный логин или пароль. Возможно, Вы не зарегистрированны.</h2>';
            echo '<a href="index.php">Попробуйте зайти еще раз</a><br/>';
            echo '<a href="reg.php">Зарегистрироваться</a>';
            $_SESSION['user']='';

        } else {
            echo '<h2>Все клево. Вы вошли</h2>';
            $_SESSION['user']=$login_autoriz;
            echo '<a href="list.php">Посмотреть список пользователей</a><br/>';
            echo '<a href="filelist.php">Посмотреть список файлов</a>';
        }
}