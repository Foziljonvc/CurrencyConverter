<?php

declare(strict_types=1);

require 'Currency.php';

$currency = new Currency();
$amount = isset($_POST['amount']) ? (float)$_POST['amount'] : 0.0;
$convertedAmount1 = 0.0;
$convertedAmount2 = 0.0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['StateName1']) && isset($_POST['StateName2'])) {
        $convertedAmount1 = $currency->exchange($amount, $_POST['StateName1']);
        $convertedAmount2 = $currency->exchange($amount, $_POST['StateName2']);
    }
}

// Natijalarni ko'rsatish uchun View.php faylini chaqirish
include 'View.php';
?>
