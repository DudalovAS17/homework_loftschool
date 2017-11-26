<?php
require_once 'starter_db.php';

$fields=array('login'=>FILTER_SANITIZE_STRING,
    'pass1'=>FILTER_SANITIZE_STRING,
    'pass2'=>FILTER_SANITIZE_STRING,
    'user_name'=>FILTER_SANITIZE_STRING,
    'user_age'=>FILTER_VALIDATE_INT,
    );
$proverka=filter_input_array(INPUT_POST, $fields);


$login = strip_tags($proverka['login']);
$pass1 = strip_tags($proverka['pass1']);
$pass2=strip_tags($proverka['pass2']);
$user_name=strip_tags($proverka['user_name']);
$user_age=$proverka['user_age'];
$user_description=strip_tags($_REQUEST['user_description']);

$mas=array($login, $pass1, $pass2, $user_name,$user_age, $user_description);
$file=$_FILES['photo'];

$errors=array();
if (trim($login=='')) {
    $errors[]='<h2>Введите логин</h2>';
}
if (trim($pass1=='')) {
    $errors[]='<h2>Введите пароль</h2>';
}
if (trim($pass2=='')) {
    $errors[]='<h2>Подтвердите пароль</h2>';
}
if(preg_match('/jpeg/', $file['name']) or preg_match('/jpg/', $file['name']) or preg_match('/png/', $file['name']) or preg_match('/gif/', $file['name'])) {
    if (preg_match('/jpeg/', $file['type']) or preg_match('/jpg/', $file['type']) or preg_match('/png/', $file['type']) or preg_match('/gif/', $file['type'])) {
        //Файл имеет верный mime-type. "Доверяем" и загружаем его'.
    } else {
        $errors[]="<h2>Вы должны загрузить картинку!</h2>";
    }
} else {
    $errors[]="<h2>Вы должны загрузить картинку!</h2>";
}
if (!empty($errors)) {
    echo array_shift($errors);
    echo '<a href="reg.php">Попробовать снова</a>';
//    exit();
} else {
    if ($pass1 !== $pass2) {
        echo "<h2>Пароли не совпадают.</h2>";
    } else {
        $password=password_hash($pass1, PASSWORD_DEFAULT);
        $data = [
            'login' => $login,
            'pass1' => $password,
            'user_name' => $user_name,
            'user_age' => $user_age,
            'user_description' => $user_description,
        ];
        $lopdo = $pdo->prepare('SELECT login FROM users WHERE login = :login');
        $lopdo->execute([':login' => $login]);
        $log = $lopdo->fetch();


        if ($log == '') {
            $STH = $pdo->prepare("INSERT INTO users (login, password, name, age, description) values (:login, :pass1, :user_name, :user_age, :user_description)");
            $STH->execute($data);

            $idpdo = $pdo->prepare('SELECT id FROM users WHERE login = :login');
            $idpdo->execute([':login' => $login]);
            $id = $idpdo->fetch();

            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $new_name = "{$id['id']}.$ext";
            $path = "photos/" . $new_name;
            move_uploaded_file($file['tmp_name'], $path);

            $STH = $pdo->prepare("UPDATE users SET photo=:photo WHERE login=:login");
            $STH->execute([':photo' => $path, ':login' => $login]);

            echo '<h2>Вы у Нас впервые. Добро пожаловать, Вы зарегистрированы.</h2><br/>';
            echo 'Можете <a href="index.php">авторизоваться</a>';

        } else {
            echo '<h2>Данный логин уже существует. Введите другой логин или авторизируйтесь.</h2>';
            echo 'Попробуйте <a href="reg.php">зарегистрироваться</a> снова<br/>';
            echo 'Или попробуйте<a href="index.php">авторизоваться</a>';
        }
    }
}