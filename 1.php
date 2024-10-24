<?php

echo "Input: ";
$line = trim(fgets(STDIN));
$inputs = array_map('intval', explode(",", $line));
$output = [];

$i = 2;
$n = count($inputs);

while ($i < $n) {
    // Always pick value of $i
    $output[] = $inputs[$i];
    $i++;

    // Skip one value if possible
    if ($i < $n) {
        $i++;
    }

    // Pick two value if possible
    for ($j = 0; $j < 2; $j++) {
        if ($i < $n) {
            $output[] = $inputs[$i];
            $i++;
        }
    }

    // Skip one value if possible
    if ($i < $n) {
        $i++;
    }

    // Pick one value if possible
    if ($i < $n) {
        $output[] = $inputs[$i];
        $i++;
    }

    // Skip two value if possible
    for ($j = 0; $j < 2; $j++) {
        if ($i < $n) {
            $i++;
        }
    }
}

// Sort asd the outputs
rsort($output);

echo "Output: " . implode(',', $output). "\n";

exit(0);