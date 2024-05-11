<?php
    if (isset($_POST)) {
        if(empty($_POST['summ']) OR empty($_POST['date'])){
            echo "Все поля формы должны быть заполнены!";
        }
        else{
            $summn1 = $_POST['summ'];
            if($_POST['radio'] == 'yes' && isset($_POST['summ_refill'])){
                $summadd = $_POST['summ_refill'];
            }
            else if($_POST['radio'] == 'no'){
                $summadd = 0;
            }
            else{
                echo "Все поля формы должны быть заполнены!";
            }
            $percent = 0.1;
            $daysn = cal_days_in_month(CAL_GREGORIAN,date('m', strtotime($_POST['date'])),date('Y', strtotime($_POST['date'])));
            $totalMonth = $_POST['validity'] * 12;
            if(date('L',strtotime($_POST['date'])) == 1){
                $daysy = 366;
            }
            else{
                $daysy = 365;
            }
            /* Рекурсия ниже работает не верно, высчитывает всегда без пополнения, хотя по логике должна высчитывать
            с пополнением, если данный пункт выбран, много часов пыталась понять, почему работает не верно, решения не нашла :(
            также высчитывает исходя из того, что в каждом месяце дней столько же, сколько в месяце открытия вклада и в каждом году 
            дней столько же сколько в году открытия вклада, что так же не верно*/
            function recursive_summ($summn1, $summadd,  $daysn, $percent, $daysy, $totalMonth){
                if($totalMonth == 0){
                    return $summn1;
                }
                $capital = ($summn1 + $summadd) * $daysn * ($percent / $daysy);
               
                return recursive_summ(($summn1 + $capital), $summadd,  $daysn, $percent, $daysy, $totalMonth-1);
                
            }
            $result = recursive_summ($summn1, $summadd,  $daysn, $percent, $daysy, $totalMonth);
            echo "Результат: ".round($result, 2)." руб";
        }
        
	}

?>