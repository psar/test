<?php

    error_reporting(-1);
    ini_set('display_errors',1);
    header('Contetn-Type: text/html; charset=utf-8');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="keywords" content="Ключевые слова">
    <meta name="description" content="Описание">
    <!--<link href="css/style.css" rel="stylesheet" type="text/css"> -->

    <title>Заголовок</title>
    </head>

    <body>
        
        <?php
        $product1= array (
        "name" => 'игрушка мягкая мишка белый',
        "price" => mt_rand(1, 10),
        "ordered" => mt_rand(0, 10),
        "left_in_stock" => mt_rand(0, 10),
        "diskont" => 'diskont'.  mt_rand(0, 2)
        );
        $product2= array (
        "name" =>'одежда детская куртка синяя синтепон',
        "price" => mt_rand(1, 10),
        "ordered" => mt_rand(0, 10),
        "left_in_stock" => mt_rand(0, 10),
        "diskont" => 'diskont'.  mt_rand(0, 2)
        );
        $product3= array (
        "name" => 'игрушка детская велосипед',
        "price" => mt_rand(1, 10),
        "ordered" => mt_rand(0, 10),
        "left_in_stock" => mt_rand(0, 10),
        "diskont" => 'diskont'.  mt_rand(0, 2)
        );
        $bd= array ($product1, $product2, $product3);
        //var_dump($bd);
        
        //корзина

        echo '<br><br><br>Ваша корзина:<br><br>';
        //мишка
        if ($bd[0]['ordered']>0) {
            echo 'Игрушка мягкая мишка белый<br>';
            echo 'количество заказано:'.$bd[0]['ordered'].'шт.<br>';
            echo 'цена:'.$bd[0]['price'].'у.е.'.'<br>';
            echo 'осталось на складе:'.$bd[0]['left_in_stock'].'шт.<br>';
        }
        //куртка 
        if ($bd[1]['ordered']>0) {
            echo '<br>'.'Одежда детская куртка синяя синтепон<br>';
            echo 'количество заказано:'.$bd[1]['ordered'].'шт.<br>';
            echo 'цена:'.$bd[1]['price'].'у.е.'.'<br>';
            echo 'осталось на складе:'.$bd[1]['left_in_stock'].'шт.<br>';
        }
        //велосипед
        if ($bd[2]['ordered']>0) {
            echo '<br>'.'Игрушка детская велосипед<br>';
            echo 'количество заказано:'.$bd[2]['ordered'].'шт.<br>';
            echo 'цена:'.$bd[2]['price'].'у.е.<br>';
            echo 'осталось на складе:'.$bd[2]['left_in_stock'].'шт.<br><br>';
        }
        echo "ДИСКОНТ"."<br>";
        //расчет скидок на товар
        if ($bd[2]['ordered']>2){
            echo "на игрушка детская велосипед скидка 30%, учтена в сумме покупок<br>";
            $bd[2]['price']=$bd[2]['price']*0.7;
        } else 
             {
                switch ($bd[2]['diskont']) {
                case 'diskont1':
                    echo "на игрушка детская велосипед скидка 10%, учтена в сумме покупок<br>";
                    $bd[2]['price']=$bd[2]['price']*0.9;
                    break;
                case 'diskont2':
                    echo "на игрушка детская велосипед  скидка 20%, скидка учтена в сумме покупок<br>";
                    $bd[2]['price']=$bd[2]['price']*0.8;
                    break;
                default:
                    echo "в данный момент на данный товар скидок нет<br>";
                    break;
        }
            }
                
            switch ($bd[0]['diskont']) {
                case 'diskont1':
                    echo "на игрушка мягкая мишка белый скидка 10%, скидка учтена в сумме покупок<br>";
                    $bd[0]['price']=$bd[0]['price']*0.9;
                    break;
                case 'diskont2':
                    echo "на игрушку мягкую мишка белый скидка 20%, скидка учтена в сумме покупок<br>";
                    $bd[0]['price']=$bd[0]['price']*0.8;
                    break;
                default:
                    echo "в данный момент на данный товар скидок нет<br>";
                    break;
        }
            switch ($bd[1]['diskont']) {
                case 'diskont1':
                    echo "на одежда детская куртка синяя синтепон скидка 10%, скидка учтена в сумме покупок<br>";
                    $bd[1]['price']=$bd[1]['price']*0.9;
                    break;
                case 'diskont2':
                    echo "на одежда детская куртка синяя синтепон скидка 20%, скидка учтена в сумме покупок<br>";
                    $bd[1]['price']=$bd[1]['price']*0.8;
                    break;
                default:
                    echo "в данный момент на одежда детская куртка синяя синтепон дисконта нет<br>";
                    break;
        }

        //расчет общего кол-ав наименований и суммы
        //наименования
        echo '<br>ИТОГО:<br>';
        $q_name=0;// всего наименований
        if ($bd[0]['ordered']>0){
            $q_name=+1;
        }
        if ($bd[1]['ordered']>0){
            $q_name=$q_name+1;
        }
        if ($bd[2]['ordered']>0){
            $q_name=$q_name+1;
        }
        echo 'Всего наименований заказанно:'.$q_name.'<br>';
        //общее кол-во товара
        $q_product=$bd[0]['ordered']+$bd[1]['ordered']+$bd[2]['ordered'];
        echo 'Общее колличество заказанного товара:'.$q_product.'<br>';
        //общая сумма заказа
        $summ=$bd[0]['ordered']*$bd[0]['price']
                +$bd[1]['ordered']*$bd[1]['price']
                +$bd[2]['ordered']*$bd[2]['price'];
        echo 'Общая сумма заказа:'.$summ.'у.е.<br>';
        //проверка на необходимое для заказа кол-во товара на складе
        function q_product ($ordered,$stock,$name="игрушка мягкая мишка белый"){
            if ($ordered>$stock){
                $q=$ordered-$stock;
                echo "<br>Уведомление!<br>";
                echo "заказываемого вами товара: ".$name."- недостаточно на складе в колличестве: ".$q."шт.";
            }
        }
            q_product($bd[0]['ordered'], $bd[0]['left_in_stock'], "игрушка мягкая мишка белый");
            q_product($bd[1]['ordered'], $bd[1]['left_in_stock'], "одежда детская куртка синяя синтепон");
            q_product($bd[2]['ordered'], $bd[2]['left_in_stock'], "игрушка детская велосипед");

        //СКИДКИ
        if ($bd[2]['ordered']>2){
            echo "<br>При покупке ИГРУШКА ДЕТСКАЯ ВЕЛОСИПЕД в количестве 3-х штук, Вам предоставляется скидка в размере 30% (сумма покупки автоматически пересчитана с учетом скидки)";

        }
        
        ?>
        
    </body>
</html>