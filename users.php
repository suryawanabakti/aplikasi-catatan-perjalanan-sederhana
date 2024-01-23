<?php

$file = fopen("user.csv", "r");

while ($row = fgetcsv($file)) {
    var_dump($row[0]);
}
