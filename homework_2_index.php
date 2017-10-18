<?php

require('homework_2_functions.php');

echo "Задание 1:"  . '<br/>';
$arr[]="Строка Первая";
$arr[]="Строка Вторая";
$arr[]="Строка Третья";
$arr[]="Строка Четвертая";
$arr[]="Строка Пятая";
$arr[]="Строка Шестая";
echo task1($arr, true) . '<br/>';

echo "Задание 2:"  . '<br/>';
$mas=array(1,2,4);
task2($mas, "+");

echo "Задание 3:"  . '<br/>';
task3('+', 3, 1, 2, 3, 4);

echo "Задание 4:"  . '<br/>';
task4(15, 7);

echo "Задание 5:"  . '<br/>';
$func=task5("tTT yt tt");
var_dump($func);
echo task5_1($func) . '<br/>';

echo "Задание 6:"  . '<br/>';
//Без функции.
echo date('d.m.Y H:i:s') . '<br/>';
echo mktime(0, 0, 0, 2, 24, 2016) . '<br/>';

echo "Задание 7:"  . '<br/>';
//Без функции.
$str='Карл у Клары украл Кораллы';
echo str_replace('К', '', $str) . '<br/>';
$str='Две бутылки лимонада';
echo str_replace('Две', 'Три', $str) . '<br/>';

echo "Задание 8:"  . '<br/>';
//Сказали не делать пока.


echo "Задание 9:"  . '<br/>';
task9('file.txt');

echo "Задание 10:"  . '<br/>';
//Без функции.
$text = "Hello again!";
$fp = fopen("anothertest.txt", "w");
fwrite($fp, $text);
fclose($fp);
