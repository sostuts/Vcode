<?php
if (!isset($_POST["array"])) {
    die("Give me X and Y!");
}

$v = json_decode(file_get_contents("./text.txt"), true)["text"];

foreach ($_POST["array"] as $key => $value) {
    if ($value["x"] > $v[$key]["max_x"]
        || $value["x"] < $v[$key]["min_x"]
        || $value["y"] > $v[$key]["max_y"]
        || $value["y"] < $v[$key]["min_y"]
    ) {
        printRespAndDie(500);
    }
}

printRespAndDie(200);

function printRespAndDie($status)
{
    print_r(json_encode(["status" => $status]));
    die();
}
