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
    $str=join($arr);
    $str_new=str_replace('.', '', $str);
    if (ctype_digit($str_new) & is_string($arith)) {
        switch ($arith) {
            case '+':
                for ($i = 1, $G = $arr[0]; $i < count($arr); $i++) {
                    $G += $arr[$i];
                }
                break;
            case '-':
                for ($i = 1, $G = $arr[0]; $i < count($arr); $i++) {
                    $G -= $arr[$i];
                }
                break;
            case '*':
                for ($i = 1, $G = $arr[0]; $i < count($arr); $i++) {
                    $G *= $arr[$i];
                }
                break;
            case '/':
                $zero=array_search(0, $arr);
                if ($zero!=0) {
                    echo 'Делениие на ноль!';
                } else {
                    for ($i = 1, $G = $arr[0]; $i < count($arr); $i++) {
                        $G /= $arr[$i];
                    }
                }

                break;
            default:
                echo 'Введите корректную арифметическую операцию: +,-,*,/' . '<br/>';
                break;
        }
    } else {
        echo "Внимание! Первый аргумент - массив из чисел, второй - строка, содержащая +,-,* или /." . '<br/>';
    }
    echo $G . '<br/>';
}


function task3()
{
    $args=func_get_args();
    $mas=array_slice($args, 1);
    $str=join($mas);
    $str_new=str_replace('.', '', $str);
    if (ctype_digit($str_new) & is_string($args[0])) {
        task2($mas, $args[0]);
    } else {
        echo 'Внимание! Первый аргумент - операция +,-,* или /, остальные - числа.';
    }
}




function task4($numb1, $numb2)
{
    if (is_int($numb1) & is_int($numb2)) {
        echo '<table border=\"1\"><tr><td>№</td>';
        for ($p=1; $p<=$numb2; $p++) {
            echo '<td>' . $p . '</td>';
        }
        echo '</tr>';

        for ($i=1; $i<=$numb1; $i++) {
            echo '<tr><td>' . $i . '</td>';
            for ($j=1; $j<=$numb2; $j++) {
                echo '<td>' . $i*$j . '</td>';
            }
            echo '</tr>';
        }
        echo '</tr>';
        echo '</table>';
    } else {
        echo "Внимание! Аргументы функции должны быть целыми числами";
    }
}
function task_4($numb1, $numb2)
{
    if (is_int($numb1) & is_int($numb2)) {
        echo '<table border=\"1\">';
        for ($i=1; $i<=$numb1; $i++) {
            echo '<tr>';
            for ($j=1; $j<=$numb2; $j++) {
                echo '<td>' . $i*$j . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
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

function task5_1($str)
{
    $str=mb_strtolower($str);
    $str=str_replace(' ', '', $str);

    preg_match_all('/./us', $str, $array);
    $str_new=join('', array_reverse($array[0]));
    if ($str==$str_new) {
        return true;
    } else {
        return false;
    }
}



function task9($file_name)
{
    $a=fopen($file_name, 'r');
    $text=file_get_contents($file_name);
    print $text . '<br/>';
    fclose($a);
}

