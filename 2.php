<?php

echo "Input: ";
$inputs = trim(fgets(STDIN));
$length = strlen($inputs);
$output = [];

$currentChar = $inputs[0];
$count = 1;

for ($i = 1; $i < $length; $i++) {
    if ($currentChar == $inputs[$i]) {
        $count++;
    } else {
        $output[] = "$currentChar = $count";
        $currentChar = $inputs[$i];
        $count = 1;
    }
}

$output[] = "$currentChar = $count";

foreach ($output as $line) {
    echo $line . "\n";
}

exit(0);