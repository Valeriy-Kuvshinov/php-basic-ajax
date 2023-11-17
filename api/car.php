<?php
require_once('../services/car.service.php');
$q = (isset($_REQUEST['q'])) ? $_REQUEST['q'] : '';
$isAjaxRequest = isset($_REQUEST['ajax']);

if ($isAjaxRequest) {
    $cars = query($q);
    header('Content-Type: application/json');
    echo json_encode($cars);
    exit;
}

$cars = query($q);
