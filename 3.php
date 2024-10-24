<?php

if ($argc < 2) {
    echo "Usage: " . $argv[0] . " path/to/transaction.json\n";
    exit(1);
}

$filename = $argv[1];

if (!file_exists($filename)) {
    echo "File not found: " . $filename . "\n";
    exit(1);
}

$contents = file_get_contents($filename);
$transactions = json_decode($contents, true);
$summaries = [];

if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Format error: " . json_last_error() . "\n";
    exit(1);
}

foreach ($transactions as $key => $transaction) {
    $counter = 0;
    $customer = $transaction['Customer_ID'];

    if (isset($summaries[$customer])) {
        $counter = $summaries[$customer]['Total'];
    }

    $counter++;

    $summaries[$customer] = [
        'Customer_ID' => $customer,
        'Total' => $counter,
    ];
}

usort($summaries, function ($a, $b) {
    if ($a['Total'] === $b['Total']) {
        return $a['Customer_ID'] <=> $b['Customer_ID'];
    }

    return $b['Total'] <=> $a['Total'];
});

var_dump($summaries);