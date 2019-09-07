<?php

//if(session_status() <= 0) session_start();
    session_start();
    if (!isset($_SESSION['history'])) {
        $_SESSION['history'] = array();
    }

$startWork = microtime(true);
    $yCoordinate = doubleval(htmlspecialchars($_GET['y__coordinate']));
    $rRadius = doubleval(htmlspecialchars($_GET['r__radius']));
    $xCoordinate = null;
    $xC = null;
    foreach ($_GET as $key => $value){
        $xC = $key;
        break;
    }
    echo $xC;
    echo "<br>";

    for ($i = -4; $i<= 4; $i ++){
        if ($xC == "number_" . $i){
            $xCoordinate = $i;
            break;
        }
    }

    if (sizeof($_GET) == 3 and -3.0 <= $yCoordinate and $yCoordinate <= 5.0 and 2.0 <= $rRadius and $rRadius<= 5.0) {
        $insideShapes = false;

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

        echo $_result[1];
        //number_format($value[5], 10, ".", "")*1000000
        array_push($_SESSION['history'], $_result);
        echo "<br>";
        echo sizeof($_SESSION['history']);


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


header('Location: http://localhost:80/Itmo_labs/Web_lab_1/index.php');