<?php
require_once 'VP1_db.php';
require_once 'mail.php';
require_once "vendor/autoload.php";

//if (isset($_REQUEST['order'])) {
//    echo 'Можешь регаться';
//}



//captcha
$renoteIp = $_SERVER['REMOTE_ADDR'];
$gRecaptchaResponse = $_REQUEST['g-recaptcha-response'];
$recaptcha = new \ReCaptcha\ReCaptcha("6LcitzwUAAAAAOAyPiqVrAdujOFWfYBKpZwRghzh");
$resp = $recaptcha -> verify($gRecaptchaResponse, $renoteIp);



$login = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone=$_REQUEST['phone'];
$data = [
    'login' => $login,
    'email' => $email,
    'phone' => $phone
];



$errors=array();
if (!$resp -> isSuccess()) {
    $errors[]='Поражен вашей неудачей, Сударь. Возможно Вы бот.';
}
if (trim($login=='')) {
    $errors[]='Введите логин';
}
if (trim($email=='')) {
    $errors[]='Введите майл';
}
if (trim($_REQUEST['street']=='')) {
    $errors[]='Укажите Вашу улицу';
}
if (trim($_REQUEST['home']=='')) {
    $errors[]='Укажите номер Вашего дома';
}
if (trim($_REQUEST['appt']=='')) {
    $errors[]='Укажите номер Вашей квартиры';
}
if (trim($_REQUEST['floor']=='')) {
    $errors[]='Укажите номер Вашего этажа';
}




if (!empty($errors)) {
    var_dump(array_shift($errors));
//    header ("Location: http://burger.ru/index.html");
//    exit();
} else {
    $mapdo = $pdo->prepare('SELECT email FROM client WHERE email = :email');
    $mapdo->execute([':email' => $email]);
    $result_ma = $mapdo->fetchAll(PDO::FETCH_ASSOC);

    $lopdo = $pdo->prepare('SELECT firstname FROM client WHERE email = :email');
    $lopdo->execute([':email' => $email]);
    $result_lo = $lopdo->fetchAll(PDO::FETCH_ASSOC);
    $log = $result_lo[0]['firstname'];

    if (!empty($result_ma) & $login != $log) {
        echo 'Данный майл уже существует <br/>';
        die();
    } elseif (!empty($result_ma) & $login == $log) {
        echo 'Здравствуйте. Вы авторизованы <br/>';
    } else {
        $STH = $pdo->prepare("INSERT INTO client (firstname, email, mobile) values (:login, :email, :phone)");
        $STH->execute($data);
        echo 'Вы у Нас впервые. Добро пожаловать, Вы зарегистрированы. <br/>';
    }

    $idpdo = $pdo->prepare("SELECT id FROM client WHERE email = :email");
    $idpdo->execute([':email' => $email]);
    $result_id = $idpdo->fetchAll(PDO::FETCH_ASSOC);
    $id = $result_id[0]['id'];

    $details['client_id'] = $id;
    $details['street'] = $_REQUEST['street'];
    $details['home'] = $_REQUEST['home'];
    if (trim($_REQUEST['part'])==null) {
        $details['part'] = 'Отсутствует';
    } else {
        $details['part'] = $_REQUEST['part'];
    }
    $details['appt'] = $_REQUEST['appt'];
    $details['floor'] = $_REQUEST['floor'];
    if (trim($_REQUEST['comment'])==null) {
        $details['comment'] = 'Отсутствует';
    } else {
        $details['comment'] = $_REQUEST['comment'];
    }

    if ($_REQUEST['payment']==1) {
        $details['payment']='Оплата по карте';
    } else {
        $details['payment']='Нужна сдача';
    }

    if ($_REQUEST['callback']==null) {
        $details['callback']='Перезвонить';
    } else {
        $details['callback']='Не Перезванивать';
    }
    $details['dat'] = date("d-m-Y H:i:s");


    $det = $pdo->prepare("INSERT INTO details ( client_id, street, home, part, appt, floor, comment, payment, callback, data) values ( :client_id, :street, :home, :part, :appt, :floor, :comment, :payment, :callback, :dat)");
    $det->execute($details);


//Номер Последнего Заказа:
    $Nzakpdo = $pdo->prepare('SELECT max(id) FROM details WHERE client_id=:id');
    $Nzakpdo->execute([':id' => $id]);
    $result_Nzak = $Nzakpdo->fetchAll(PDO::FETCH_ASSOC);
    $nzak=$result_Nzak[0]['max(id)'];


//Сколько заказов у данного клиента:
    $zakpdo = $pdo->prepare('SELECT id FROM details WHERE client_id = :id');
    $zakpdo->execute([':id' => $id]);
    $result_zak = $zakpdo->fetchAll(PDO::FETCH_ASSOC);
    $zak=count($result_zak);


    if ($zak==1) {
        $str = "Спасибо - это Ваш первый заказ.";
    } else {
        $str = "Спасибо! Это уже $zak заказ.";
    }
    $letter = "Заказ №$nzak. \n Ваш заказ будет доставлен по адресу: ул. {$details['street']}, дом: {$details['home']}, корпус: {$details['part']}, Кв. {$details['appt']}, Этаж: {$details['floor']}. \n Вы заказали DarkBeefBurger, 1 шт. Стоимость заказа: 500 рублей. \n $str";

    $mailer = new Mailer($email);
    $mailer->setMessage($letter);
    $mailer->send();

//Без ООП:
//    $result = mail ( $email, 'Zakaz', $letter);
//    if ($result) {
//        echo 'Вам отправлено письмо на Ваш майл. <br/>';
//    } else {
//        echo 'Сожалеем, но письмо не отправилось. <br/>';
//    }
}