<?php
echo "Задание 1:" . '<br/>';
$name="Саша";
$age="21";
echo "Меня зовут: {$name}"  . '<br/>';
echo "Мне {$age} год"  . '<br/>';
echo '"!|\/\'"\\' . '<br/>';



echo "Задание 2:"  . '<br/>';
$all=80;
$marker=23;
$pencil=40;
$paint=$all-($marker+$pencil);
echo "Количество рисунков, выполненных красками: {$paint}"  . '<br/>';



echo "Задание 3:"  . '<br/>';
define("c", 15, true);
if (defined("c")==true) { echo "Переменная объявлена" . '<br/>'; }
echo "Значение константы до изменения:" . c . '<br/>';
define("c",0,true);
echo "Значение константы после изменения:" . c . '<br/>';



echo "Задание 4:"  . '<br/>';
$age=rand(0,120);
echo "-Мне {$age} год(а)/лет." . '<br/>';
if ($age>=18 & $age<=65) { echo "-Вам еще работать и работать." . '<br/>';
} elseif ($age>=0 & $age<=17) { echo "-Вам еще рано работать." . '<br/>';
} elseif ($age>=66 & $age<=100) { echo "-Вам пора на пенсию." . '<br/>';
} else { echo "-Неизвестный возраст." . '<br/>';
}



echo "Задание 5:"  . '<br/>';
$day=rand(1,10);
echo "$day - ";
switch($day){
    case $day<=5:
        echo "Это рабочий день"  . '<br/>';
        break;
    case $day<=7:
        echo "Это выходной день" . '<br/>';
        break;
    default:
        echo "Неизвестный день"  . '<br/>';
        break;
}



echo "Задание 6:"  . '<br/>';
$bmw['model']='X5';
$bmw['speed']=120;
$bmw['doors']=5;
$bmw['year']='2015';
$toyota['model']='X3';
$toyota['speed']=100;
$toyota['doors']=4;
$toyota['year']='2011';
$opel['model']='X1';
$opel['speed']=90;
$opel['doors']=4;
$opel['year']='2001';

$car=array($bmw, $toyota, $opel);
$car_name=array("bmw","toyota", "opel");

for ($i=0;$i<3;$i++) {
    echo "CAR {$car_name[$i]}" . '<br/>';
    $str=join(' - ', $car[$i]);
    echo $str . '<br/>';
}



echo "Задание 7:"  . '<br/>';
for($i=1,  $n=''; $i<=10; $i++) {
    for($j=1, $k="<td>" . $j*$i . "</td>", $p=''; $j<=10; $j++) {
        $p = $p .  "<td>" . $j . "</td>";
        if ($i%2==0 & $j%2==0) {
            $k = $k . "<td>" . '(' . $i * $j . ')' . "</td>";
        } elseif ($i%2==1 & $j%2==1) {
            $k = $k . "<td>" . '[' . $i * $j . ']' . "</td>";
        } else {
            $k = $k . "<td>" . $i*$j . "</td>";
        }
    }
    $n=$n . "<tr>" . $k . "</tr>";

}
$t="<tr>" . "<td> № </td>" . $p . "</tr>" . $n;
echo "<table border=\"1\"> $t </table>";



echo "Задание 8:"  . '<br/>';
$str="shoot didn't that one The";
echo $str . '<br/>';
$arr=explode(' ', $str);
$a=count($arr)-1;
$i=0;
do {
    $arr_new[$i]=$arr[$a-$i];
} while($i++<$a);
$str_new=join('!', $arr_new);
echo $str_new;