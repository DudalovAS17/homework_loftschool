<?php
require_once 'VP1_db.php';
require_once 'vendor/autoload.php';


echo '<a href="?action=users">Список Зарегистрированных пользователей.</a><br>';
echo '<a href="?action=orders">Список заказов</a>';
$action = $_GET['action'];
$title = 'Админка';

switch ($action) {
    case 'users':
        $use = $pdo->prepare("SELECT id, firstname, email FROM client WHERE id>=:id1 AND id<=:id2");
        $use->execute([':id1' => 1, ':id2' => 1000]);
        $users = $use->fetchAll(PDO::FETCH_ASSOC);
        $array = $users;

        $title = 'Админка: пользователи';
        break;

    case 'orders':
        $or = $pdo->prepare("SELECT id, client_id, street, home, part, appt, floor, comment, payment, callback, data FROM details WHERE id>=:id1 AND id<=:id2");
        $or->execute([':id1' => 1, ':id2' => 1000]);
        $orders = $or->fetchAll(PDO::FETCH_ASSOC);
        $array = $orders;

        $title = 'Админка: заказы';
        break;
}


class View
{
    public function renderTwig(array $data = [])
    {
        $loader = new Twig_Loader_Filesystem('templates');//templates - папка где будут храниться наши шаблоны.
        $twig = new Twig_Environment($loader, array('cache' => 'template_c',));
        //template_c - папка, где будет хранить кэш.

        echo $twig->render('index.html', $data);
    }
}

$data = array('title' => $title, 'digits' => $array);
$tw = new View();
$tw -> renderTwig($data);