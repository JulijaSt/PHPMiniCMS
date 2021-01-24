<?php

require_once "bootstrap.php";
$request = $_SERVER['REQUEST_URI'];
$baseUrl = "/" . basename(getcwd());
$parseUrl = parse_url($request);
$query = $parseUrl["query"];


switch ($request) {
    case $baseUrl . '/':
    case $baseUrl . '':
        require __DIR__ . '\src\views\home.php';
        break;
    case $baseUrl . '/admin':
    case $baseUrl . '/admin?' . $query:
        require __DIR__ . '\src\views\admin.php';
        break;
    case $baseUrl . '/admin/edit-page':
    case $baseUrl . '/admin/edit-page?' . $query:
        require __DIR__ . '\src\views\editPage.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '\src\views\404.php';
        break;
}
