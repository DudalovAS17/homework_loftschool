<?php
class Car
{
    private $horsePower;
    private $model;
    private $transmission;

    private $engine;
    private $auto;
    private $manual;

    public function __construct($model, $horsePower, $transmission)
    {

        $this -> horsePower = $horsePower;
        $this -> model = $model;
        $this -> transmission = $transmission;


        $this -> engine = new Engine();
        $this -> auto = new Auto();
        $this -> manual = new Manual();
    }

    public function Motion($distance, $speed, $direction)
    {
        echo "Ваша машина - " . $this -> model . ". У ней " . $this -> transmission. ". Имеет " . $this -> horsePower . " лошадиных сил. <br/>";
        if ($this -> horsePower < ($speed/2)) {
            echo 'Ваш автомобиль не может развить такую скорость';
            die();
        }

        echo "Автомобиль движется $direction $distance метров со скоростью $speed м/с <br/>";



        $this -> engine -> On();

        if ($direction == 'Вперед') {
            switch ($this -> transmission) {
                case 'Автоматическая КП':
                    $this->auto->TransmissionAuto();
                    break;
                case 'Механическая КП':
                    $this->manual->TransmissionManual($speed);
                    break;
            }
        } else {
            $this->auto->TransmissionBack($direction);
        }

        for ($ras = 0, $t=0; $ras <= $distance; $ras++)
        {
            if ($ras%10 == 0) {
                if ($t >= 90) {
                    echo "Расстояние - $ras, Температура - $t!!! Включен двигатель <br/>";
                    $t = $this -> engine -> Oxl($t);
                } else {
                    echo "Расстояние - $ras, Температура - $t <br/>";
                }

                $t+=5;
            }
        }

        $this -> engine -> Off();
    }
}


class Engine
{
    public function On()
    {
        echo 'Двигатель включен <br/>';
    }

    public function Oxl($t)
    {
        return $t - 10;
    }

    public function Off()
    {
        echo 'Двигатель выключен <br/>';
    }
}
class Manual
{
    public function TransmissionManual($u)
    {
            if ($u < 20) {
                echo 'Едем вперед: 1-я передача <br/>';
            } else {
                echo 'Едем вперед: 2-я передача <br/>';
            }
        }


    use Back;

}
class Auto
{
    public function TransmissionAuto()
    {
        echo 'Едем вперед <br/>';
    }

    use Back;
}
trait Back
{
    public function TransmissionBack()
    {
        echo 'Едем назад <br/>';
    }
}


$car = new Car('bmw',10,'Механическая КП');
$car -> Motion(200, 15, 'Вперед');

//$car = new Car('bmw',10,'Автоматическая КП');
//$car -> Motion(200, 15, 'Вперед');

//$car = new Car('bmw',10,'Механическая КП');
//$car -> Motion(200, 15, 'Назад');

//$car = new Car('bmw',10,'Автоматическая ');
//$car -> Motion(200, 15, 'Назад');

