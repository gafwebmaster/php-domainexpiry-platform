<?php

//Calculate the difference between expiry date and today
function calculateDifference($expiryDate) {
    $now = time();
    $expiryDate = strtotime($expiryDate);
    $datediff = $expiryDate - $now;
    $daysBeforeExpire = round($datediff / (60 * 60 * 24));
    $className = '';
    //Css class name depends of the $daysBeforeExpire
    if ($daysBeforeExpire > 366) {
        $daysBeforeExpire = 366;
        $className = '';
    } else if ($daysBeforeExpire < 250 && $daysBeforeExpire > 101) {
        $className = 'bg-warning';
    } else if ($daysBeforeExpire < 100 && $daysBeforeExpire > 0) {
        $className = 'bg-danger';
    }
    echo $className;
}

//That calculate the percentage for the bootstrap class color
function calculatePercentage($expiryDate) {
    $now = time();
    $expiryDate = strtotime($expiryDate);
    $datediff = $expiryDate - $now;
    $daysBeforeExpire = round($datediff / (60 * 60 * 24));
    $className = '';

    //Css class name depends of the $daysBeforeExpire
    if ($daysBeforeExpire > 100) {
        $daysBeforeExpire = 100;
    }
    echo $daysBeforeExpire;
}
