<?php
require_once 'starter_db.php';
$list = $pdo->prepare("SELECT login, name, age, description, photo FROM users");
$list->execute();
$array_list = $list->fetchAll(PDO::FETCH_ASSOC);
$table_new_list = '';
$action = $_GET['action'];

foreach ($array_list as $mas) {
    switch ($action) {
        case "{$mas['login']}":
            $delete = $pdo->prepare("DELETE FROM users WHERE login=:login");
            $delete->execute([':login' => $mas['login']]);
            break;
        default:
            $table = "<tr><td>{$mas['login']}</td>
                <td>{$mas['name']}</td>
                <td>{$mas['age']}</td>
                <td>{$mas['description']}</td>
                <td><img src='{$mas['photo']}' alt=''></td>
                <td><a href='?action={$mas['login']}'>Удалить пользователя</a></td>
                </tr>";
            $table_new_list .= $table;
            break;
    }
}