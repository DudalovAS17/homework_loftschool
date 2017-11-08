<?php
require_once 'burger_db.php';


echo '<a href="?action=users">Список Зарегистрированных пользователей.</a><br>';
echo '<a href="?action=orders">Список заказов</a>';
//if (empty($_GET['action'])) {
//    die('no action');
//}
$action = $_GET['action'];

switch ($action) {
    case 'users':
        $use = $pdo->prepare("SELECT id, firstname, email FROM client WHERE id>=:id1 AND id<=:id2");
        $use->execute([':id1' => 1, ':id2' => 1000]);
        $users = $use->fetchAll(PDO::FETCH_ASSOC);
        var_dump($users);
        break;

    case 'orders':
        $or = $pdo->prepare("SELECT id, client_id, street, home, part, appt, floor, comment, payment, callback, data FROM details WHERE id>=:id1 AND id<=:id2");
        $or->execute([':id1' => 1, ':id2' => 1000]);
        $orders = $or->fetchAll(PDO::FETCH_ASSOC);
        var_dump($orders);
        break;
}