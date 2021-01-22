<?php

include_once "bootstrap.php";

$request = $_SERVER['REQUEST_URI'];
$baseUrl = "/" . basename(getcwd());

switch ($request) {
    case $baseUrl . '/':
        require __DIR__ . '\src\views\home.php';
        break;
    case $baseUrl . '':
        require __DIR__ . '\src\views\home.php';
        break;
    case $baseUrl . '/admin':
        require __DIR__ . '\src\views\admin.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '\src\views\404.php';
        break;
}
