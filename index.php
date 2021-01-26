<?php

require_once "bootstrap.php";
$request = str_replace("%20", " ", $_SERVER['REQUEST_URI']);
$baseUrl = "/" . basename(getcwd());
$parseUrl = parse_url($request);
$query = $parseUrl["query"];

$specificPageUrl = explode("/", $request);
$number = count($specificPageUrl) - 1;

if ($request == ($baseUrl . '/') || $request == ($baseUrl . '')) {
    require __DIR__ . '\src\views\home.php';
} elseif ($request == ($baseUrl . '/admin') || $request == ($baseUrl . '/admin?' . $query)) {
    require __DIR__ . '\src\views\admin.php';
} elseif ($request == ($baseUrl . '/admin/edit-page') || $request == ($baseUrl . '/admin/edit-page?' . $query)) {
    require __DIR__ . '\src\views\editPage.php';
} else {
    $page = $entityManager->getRepository('Models\Page')->findBy(array("title" => $specificPageUrl[$number]));
    $specificPage = $page[0] ? $page[0]->getTitle() : "";

    if ($request == ($baseUrl . '/' . $specificPage)) {
        require __DIR__ . '\src\views\home.php';
    } else {
        http_response_code(404);
        require __DIR__ . '\src\views\404.php';
    } 
}
