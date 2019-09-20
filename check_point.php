<?php

//if(session_status() <= 0) session_start();
    session_start();
    if (!isset($_SESSION['history'])) {
        $_SESSION['history'] = array();
    }

    $startWork = microtime(true);
    $yCoordinate = htmlspecialchars($_GET['y__coordinate']);
    $rRadius = htmlspecialchars($_GET['r__radius']);
    $xCoordinate = null;
    $xC = null;

    $count = 0 ;
    foreach ($_GET as $key => $value){
        echo $key;
        echo "<br>";
        if (preg_match('/^number_$/', $key)){
            $xC = $value;
            $count++;
        }
    }

    echo $count;
    echo "<br>";

    for ($i = -4; $i <= 4; $i ++){
        if ($xC == "number_" . $i){
            $xCoordinate = $i;
            break;
        }
    }

    echo $yCoordinate;
    echo "<br>";
    echo $rRadius;
    echo "<br>";

    $notValid = true;

    if (!preg_match('/^[-]{0,1}[0-9]+[.]{0,1}[0-9]*$/', $yCoordinate))
        $notValid = false;


    if (!preg_match('/^[-]{0,1}[0-9]+[.]{0,1}[0-9]*$/', $rRadius))
        $notValid = false;

    if ($notValid)
        echo "Yes";
    else echo "No";

    echo "<br>";



    $yCoordinate = (float) $yCoordinate;
    $rRadius = (float) $rRadius;


    if ($notValid && $xCoordinate != null && sizeof($_GET) == 3 && -3.0 < $yCoordinate && $yCoordinate < 5.0 && 2.0 < $rRadius && $rRadius< 5.0) {
        $insideShapes = false;

        echo "------------------------";
        echo "<br>";
        echo $yCoordinate;
        echo "<br>";
        echo $rRadius;
        echo "<br>";

        if ($xCoordinate >= 0.0 and $yCoordinate >=0.0 and $xCoordinate <= $rRadius and $yCoordinate <= $rRadius) {
            $insideShapes = true;
        }

        if (sqrt($xCoordinate * $xCoordinate + $yCoordinate * $xCoordinate) <= $rRadius){
            $insideShapes = true;
        }

        if ($xCoordinate <= 0.0 and $yCoordinate >= 0.0 and $yCoordinate <= $rRadius / 2 - $xCoordinate){
            $insideShapes = true;
        }


        //$dbConnect = pg_connect("host = localhost dbname = postgres user=postgres password=123")

        //or die('Не удалось соединиться: ' . pg_last_error());

        $nowDate = date("Y-m-d H:i:s");
        $workTime = microtime(true) - $startWork;

        $_result = array($xCoordinate, $yCoordinate, $rRadius, $insideShapes, $nowDate, $workTime);

        //number_format($value[5], 10, ".", "")*1000000
        array_push($_SESSION['history'], $_result);


        /*$info = [
            "x_coordinate" => $xCoordinate,
            "y_coordinate" => $yCoordinate,
            "r_radius" => $rRadius,
            "point_inside" => $insideShapes,
            "now_date" => $nowDate,
            "work_time" => $workTime
        ];

        //$json = json_encode($info);
        $string = file_get_contents("./points.json");
        $data = json_decode($string);

        //echo $data[0]->y_coordinate;
        echo json_encode($data);

        array_push($data, $info);

        echo json_encode($data);
        $file = fopen("./points.json", 'w');
        $write = fwrite($file, json_encode($data));

        if ($write)
            echo "Данные записаны!";
        fclose($file);
        */

        /*$sql = "INSERT INTO itmo_web_lab1 (x_coordinate, y_coordinate, r_radius, point_inside, now_date, work_time_script)"+
            " VALUES(" . $xCoordinate . ", " . $yCoordinate . ", " . $rRadius . ", " . $insideShapes . ", " . $now_date . ", " . $workTime . ")";
        echo $sql;
        pg_query($sql) or die('Query failed: ' . pg_last_error());*/
    }


//header('Location: http://localhost:80/Itmo_labs/Web_lab_1/index.php');
header('Location: https://se.ifmo.ru/~s247409/Web_lab_1/index.php');