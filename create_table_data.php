<?php

require_once "bootstrap.php";

use Models\Page;
use Models\User;

function createPage($entityManager, $pageName, $content)
{
    $link = strtolower($pageName);
    $page = new Page($link);
    $page->setTitle($pageName);
    $page->setContent($content);
    $entityManager->persist($page);
}

$admin = new User("admin", "admin123");
$entityManager->persist($admin);

createPage($entityManager, "Home", "<h3>Write basic information about your page.</h3>");
createPage($entityManager, "About", "<h3>Tell the reader about yourself.</h3>");
createPage($entityManager, "Contact", "<h3>Tell us how readers can contact with you.</h3>");

$entityManager->flush();
