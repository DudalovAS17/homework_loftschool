<?php

function task1($mas, $tre)
{
    if ($tre===true) {
        $str = join(' ', $mas);
        return $str;
    } else {
        foreach ($mas as $item) {
            echo "<p>$item</p>";
        }
    }
}


function task2($arr, $arith)
{
    for ($i = 1, $G = $arr[0]; $i < count($arr); $i++) {
        switch ($arith) {
            case '+':
                $G += $arr[$i];
                break;
            case '-':
                $G -= $arr[$i];
                break;
            case '*':
                $G *= $arr[$i];
                break;
            case '/':
                $G /= $arr[$i];
                break;
            default:
                echo 'Введете корректную арифметическую операцию: +,-,*,/' . '<br/>';
                break;
        }
    }
    echo $G . '<br/>';
}


function task3()
{
    $args=func_get_args();
    for ($i=1; $i<count($args); $i++) {
        $mas[]=$args[$i];
    }
    task2($mas, $args[0]);
}



function task4($numb1, $numb2)
{
    if (is_int($numb1) & is_int($numb2)) {
        for ($i=1,  $n=''; $i<=$numb1; $i++) {
            for ($j=1, $k="<td>" . $j*$i . "</td>", $p=''; $j<=$numb2; $j++) {
                $p = $p .  "<td>" . $j . "</td>";
                $k = $k . "<td>" . $i*$j . "</td>";
            }
            $n=$n . "<tr>" . $k . "</tr>";
        }
        $t="<tr>" . "<td> № </td>" . $p . "</tr>" . $n;
        echo "<table border=\"1\"> $t </table>";
    } else {
        echo "Внимание! Аргументы функции должны быть целыми числами";
    }
}



function task5($str)
{
    $str=mb_strtolower($str);
    $str=str_replace(' ', '', $str);
    $str_new=strrev($str);
    if ($str==$str_new) {
        return true;
    } else {
        return false;
    }
}

function task5_1($t)
{
    if ($t==true) {
        echo "Эта строка - палиндром!" . '<br/>';
    } else {
        echo "Эта строка - НЕ палиндром!" . '<br/>';
    }
}


function task9($file_name)
{
    $a=fopen($file_name, 'r');
    $text=file_get_contents($file_name);
    print $text . '<br/>';
    fclose($a);
}

