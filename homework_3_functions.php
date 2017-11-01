<?php

function task1()
{
    $xmlPath = './homework_3_data.xml';
    $xml = simplexml_load_file($xmlPath);

    $attrs = $xml->attributes();
    echo "PurchaseOrderNumber: " . $attrs['PurchaseOrderNumber'] . '<br/>';
    echo "OrderDate: " . $attrs['OrderDate'] . '<br/>';

    echo '<a href="?action=read">First client</a> ';
    echo '<a href="?action=write">Second client</a><br/><br/>';


    function hel($i)
    {
        $xmlPath = './homework_3_data.xml';
        $xml = simplexml_load_file($xmlPath);
        echo 'Type: ' . $xml->Address[$i]->attributes() . '<br/>';
        echo 'Name: ' . $xml->Address[$i]->Name . '<br/>';
        echo 'Address: ' . $xml->Address[$i]->Country . ',' . $xml->Address[$i]->State . ',' . $xml->Address[$i]->City . ',' . $xml->Address[$i]->Street . '<br/>';
        echo 'Zip: ' . $xml->Address[$i]->Zip . '<br/>';
        echo 'PartNumber: ' . $xml->Items->Item[$i]->attributes() . '<br/>';
        echo 'ProductName: ' . $xml->Items->Item[$i]->ProductName . '<br/>';
        echo 'Quantity: ' . $xml->Items->Item[$i]->Quantity . '<br/>';
        echo 'USPrice: ' . $xml->Items->Item[$i]->USPrice . '<br/>';
        if (!$xml->Items->Item[$i]->Comment) {
            echo 'Comment: No. <br/>';
            echo 'ShipDate: ' . $xml->Items->Item[$i]->ShipDate . '<br/>';
        } else {
            echo 'Comment: ' . $xml->Items->Item[$i]->Comment . '<br/>';
            echo 'ShipDate: No. <br/>';
        }
        echo 'DeliveryNotes: ' . $xml->DeliveryNotes;
    }


    $action = $_GET['action'];

    switch ($action) {
        case 'write':
            hel(1);
            break;
        case 'read';
            hel(0);
            break;
    }

// Другое решение:
//    $handle = fopen('homework_3_data.xml', "r");
//    $contents = fread($handle, filesize('homework_3_data.xml'));
//    print_r($contents);
//    fclose($handle);
}




/* Да я понимаю, что код большой, но работа функции array_diff, array_diff_assoc меня не удовлетворила.
Они не выводят всю нужную информацию.*/
function task2()
{
    $arr = array(
        "Auto" => array(
            array('model' => 'bmw'),
            array('model' => 'kamaro'),
            array('model' => 'mers'),
            array('model' => 'mazda'),
        ),
        "Aircraft"
    );

    $arrjson = json_encode($arr);
    file_put_contents('homework_3_output.json', $arrjson);

    file_get_contents('./homework_3_output.json');
    $arr = json_decode($arrjson, true);

    $a = rand(1, 3);
    switch ($a) {
        case 1:
            $arr = array(
                "Auto" => array(
                    array('model' => 'bmw'),
                    array('model' => 'kamaro'),
//                array('model'=>'mers'),
                    array('model' => 'mazda'),
                    array('model' => 'bygati'),
                    array('mmm' => 'lll'),
                    'Polychilocb'
                ),
                "YOOOO",
                'TTTTT'
            );
            break;

        case 2:
            $arr['Auto'][] = array('model' => 'opel');
            $arr['Auto'][] = array('iki' => 'ololo');
            $arr['Moto'][] = array('model' => 'suzuki');

            break;
        case 3:
            exit('Файл не изменен.');

            break;
    }
    $arrjson_new = json_encode($arr);
    file_put_contents('./homework_3_output2.json', $arrjson_new);


    file_get_contents('./homework_3_output.json');
    file_get_contents('./homework_3_output2.json');

    $mas = json_decode($arrjson, true);
    $mas_new = json_decode($arrjson_new, true);


//var_dump($mas);
//var_dump($mas_new);


    $r = max(count($mas), count($mas_new));
    for ($j = 0; $j < $r; $j++) {
        $a = array_keys($mas)[$j];
        $b = array_keys($mas_new)[$j];

        if ($a == $b & $mas[$a] == $mas_new[$b]) {
            continue;
        } elseif ($a == $b & is_array($mas[$a]) & is_array($mas[$a])) {
            $t = max(count($mas[$a]), count($mas_new[$b]));
            for ($i = 0; $i < $t; $i++) {
                if ($mas[$a][$i] == $mas_new[$b][$i]) {
                    continue;
                } else {

                    if (is_array($mas[$a][$i]) & is_array($mas_new[$b][$i])) {
                        $c = array_keys($mas[$a][$i])[0];
                        $d = array_keys($mas_new[$b][$i])[0];
                        echo "элемент  $a->($i=>($c=>{$mas[$a][$i][$c]}))  заменен на $b->($i=>($d=>{$mas_new[$b][$i][$d]})) <br/>";

                    } elseif (is_array($mas[$a][$i])) {
                        $c = array_keys($mas[$a][$i])[0];
                        if (is_null($mas_new[$b][$i])) {
                            echo "убран элемент: $a->($i=>($c=> {$mas[$a][$i][$c]}))  <br/>";
                        } else {
                            echo "элемент $a->($i=>($c=>{$mas[$a][$i][$c]}))  заменен на  $b->($i=>{$mas_new[$b][$i]}) <br/>";
                        }
                    } elseif (is_array($mas_new[$b][$i])) {
                        $d = array_keys($mas_new[$b][$i])[0];
                        if (is_null($mas[$a][$i])) {
                            echo "добавлен новый элемент: $b->($i=>($d=>{$mas_new[$b][$i][$d]}))  <br/>";
                        } else {
                            echo "элемент $a->($i=>{$mas[$a][$i]})  заменен на $b->($i=>($d=>{$mas_new[$b][$i][$d]})) <br/>";
                        }
                    } else {
                        if (is_null($mas_new[$b][$i])) {
                            echo "убран элемент: $a->($i=>{$mas[$a][$i]})  <br/>";
                        } elseif (is_null($mas[$a][$i])) {
                            echo "добавлен новый элемент: $b->($i=>{$mas_new[$b][$i]})  <br/>";
                        } else {
                            echo "элемент $a->($i=>{$mas[$a][$i]}) заменен на $b->($i=>{$mas_new[$b][$i]} <br/>";
                        }
                    }
                }
            }
        } else {
            if (empty($mas[$a])) {
                echo "добавлен новый элемент: $b - > $mas_new[$b]  <br/>";
            } elseif (empty($mas_new[$b])) {
                echo "убран элемент: $a - > $mas[$a]  <br/>";
            } else {
                echo "элемент  $a->{$mas[$a]}  заменен на $b->{$mas_new[$b]} <br/>";
            }
        }
    }
}


function task3() {
    for ($i = 0; $i < 50; $i++) {
        $a = rand(1, 100);
        $mas[] = $a;
    }
    $fp = fopen('./homework_3_csv.csv', 'w');
    fputcsv($fp, $mas);
    fclose($fp);

    $csvPath = './homework_3_csv.csv';
    $csvFile = fopen($csvPath, "r");
    if ($csvFile) {
        $csvData = fgetcsv($csvFile, 0, ",");
        for ($j = 0, $sum = 0; $j < count($csvData); $j++) {
            if ($j%2==0) {
                $sum = $sum + $csvData[$j];
            }
        }
        echo $sum . '<br/>';
    }
}


function task4() {
    $url = "https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    $result_new = json_decode($result, true);
//    print_r($result_new);
    echo "page_id : {$result_new['query']['pages']['15580374']['pageid']} <br/>";
    echo "title : {$result_new['query']['pages']['15580374']['title']} <br/>";
}
