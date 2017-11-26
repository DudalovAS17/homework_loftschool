<?php
require_once 'starter_db.php';
$list = $pdo->prepare("SELECT login, photo FROM users");
$list->execute();
$array_filelist = $list->fetchAll(PDO::FETCH_ASSOC);
$table_new_filelist = '';
$action = $_GET['action'];
foreach ($array_filelist as $mas) {
    switch ($action) {
        case "{$mas['login']}":
            $delete = $pdo->prepare("UPDATE users SET photo=null WHERE login=:login");
            $delete->execute([':login' => $mas['login']]);
            break;
        default:
            if (empty($mas['photo'])) {
                continue;
            } else {
                $table = "<tr><td>{$mas['photo']}</td>
                <td><img src='{$mas['photo']}' alt=''></td>
                <td><a href='?action={$mas['login']}'>Удалить изображение</a></td>
                </tr>";
                $table_new_filelist .= $table;
                break;
            }
    }
}