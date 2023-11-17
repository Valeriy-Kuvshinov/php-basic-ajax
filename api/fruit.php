<?php
require_once('../services/fruit.service.php');
$q = (isset($_REQUEST['q'])) ? $_REQUEST['q'] : '';
$isAjaxRequest = isset($_REQUEST['ajax']);

if ($isAjaxRequest) {
    $fruits = query($q);
    header('Content-Type: application/json');
    echo json_encode($fruits);
    exit;
}

$fruits = query($q);
