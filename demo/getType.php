<?php
$type = json_decode(file_get_contents("./text.txt"), true)["type"];

print_r(json_encode($type));