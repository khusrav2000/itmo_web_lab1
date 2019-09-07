<?php
    //if(session_status() <= 0) session_start();
    session_start();
    if (!isset($_SESSION['history'])) {
        $_SESSION['history'] = array();
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Web lab 1</title>

</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal menu__text__style">
            Ашурзода Хусрав Абдусамад, группа P3200, вариант 200001.
        </h5>
        <nav class="my-2 my-md-0 mr-md-3">

        </nav>
    </div>
    <div class="problem__conditions">
        <h3 class="content__text">Текст задания</h3>
        <p>Разработать PHP-скрипт, определяющий попадание точки на координатной плоскости в заданную область, и создать HTML-страницу, которая формирует данные для отправки их на обработку этому скрипту.

            Параметр R и координаты точки должны передаваться скрипту посредством HTTP-запроса. Скрипт должен выполнять валидацию данных и возвращать HTML-страницу с таблицей, содержащей полученные параметры и результат вычислений - факт попадания или непопадания точки в область.

            Кроме того, ответ должен содержать данные о текущем времени и времени работы скрипта.
        </p>
        <?php
            include "includes/check_point.php";
        ?>
    </div>
    <img src="img/web_lab_1_pic.PNG" class="problem__pic__image" alt="No photo">
    <table class="table table-hover table-dark result__points">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col" class="table__result__texts">Координата X</th>
            <th scope="col" class="table__result__texts">Координата Y</th>
            <th scope="col" class="table__result__texts">Радиус R</th>
            <th scope="col" class="table__result__texts">Время работы</th>
            <th scope="col" class="table__result__texts">Текущая время</th>
            <th scope="col" class="table__result__texts">Результат</th>
        </tr>
        </thead>
        <?php


        //$string = file_get_contents("points.json");

        //$data = json_decode( $string );

        //echo sizeof($data);
        $i = 0;
        foreach ($_SESSION['history'] as $value){
            $i++;
            echo "<tr>";
            echo "<th scope='row'>";
            echo $i;
            echo "</th>";

            echo "<td class='table__result__texts'>";
            echo $value[0];
            echo "</td>";

            echo "<td class='table__result__texts'>";
            echo $value[1];
            echo "</td>";

            echo "<td class='table__result__texts'> ";
            echo $value[2];
            echo "</td>";

            echo "<td class='table__result__texts'>";
            echo $value[3] * 1000 . " мс";
            echo "</td>";

            echo "<td class='table__result__texts'>";
            echo $value[4];
            echo "</td>";

            echo "<td class='table__result__texts'>";
            if ($value[5])
                echo "Внутри";
            else
                echo "Вне";
            echo "</td>";

            echo "</tr>";
        }
        echo "</tbody>"
        ?>
    </table>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
</body>
</html>