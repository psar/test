<?php

    error_reporting(-1);
    ini_set('display_errors',1);
    header('Contetn-Type: text/html; charset=utf-8');
?>

<!--<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">-->
<!--<html>
    <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="keywords" content="Ключевые слова">
    <meta name="description" content="Описание">
    <link href="css/style.css" rel="stylesheet" type="text/css"> 

    <title></title>
    </head>

    <body>-->
        
        <?php
        $news='Четыре новосибирские компании вошли в сотню лучших работодателей
        Выставка университетов США: открой новые горизонты
        Оценку «неудовлетворительно» по качеству получает каждая 5-я квартира в новостройке
        Студент-изобретатель раскрыл запутанное преступление
        Хоккей: «Сибирь» выстояла против «Ак Барса» в пятом матче плей-офф
        Здоровое питание: вегетарианская кулинария
        День святого Патрика: угощения, пивной теннис и уличные гуляния с огнем
        «Красный факел» пустит публику на ночные экскурсии за кулисы и по закоулкам столетнего здания
        Звезды телешоу «Голос» Наргиз Закирова и Гела Гуралиа споют в «Маяковском»';
        $news=  explode("\n", $news);
        
        if (isset($_GET['id'])) {
            echo $news[$_GET['id']];
        } elseif(empty ($_GET)) {
            echo  $news[0].'<br>'.$news[1].'<br>'.
                  $news[2].'<br>'.$news[3].'<br>'.
                  $news[4].'<br>'.$news[5].'<br>'.
                  $news[6].'<br>'.$news[7].'<br>'.
                  $news[8].'<br>';
        } else {
            header('HTTP/1.0 404 Not Found');
            echo '<h1>Ошибка 404</h1>';
            echo '<p>Такой страницы не существует</p>';
        }
        
        ?>

<!--    </body>
</html>-->