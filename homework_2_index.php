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
$mas=array(100,5,2);
task2($mas, "/");

echo "Задание 3:" . '<br/>';
task3('/', 100, 5, 4, 2);
echo '<br/>';

echo "Задание 4:" . '<br/>';
task4(15, 7);
task_4(9, 4);

echo "Задание 5:" . '<br/>';
$func=task5("tTT yt tt");
var_dump($func);
$func_1=task5_1("ОЛО   лО");
var_dump($func_1);

echo "Задание 6:" . '<br/>';
$dat=array(0,0,0,2,24,2016);
task6($dat);



echo "Задание 7:" . '<br/>';
$str='Карл у Клары украл Кораллы';
$str1='Две бутылки лимонада';
task7($str,$str1);

echo "Задание 8:" . '<br/>';
//Сказали не делать пока.


echo "Задание 9:" . '<br/>';
task9('file.txt');

echo "Задание 10:" . '<br/>';
$text = "Hello again!";
task10($text);