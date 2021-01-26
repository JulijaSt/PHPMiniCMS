<?php

include_once "bootstrap.php";

$page = $entityManager->getRepository('Models\Page')->findAll();
$url = str_replace("%20", " ", $_SERVER['REQUEST_URI']);
$baseUrl = "/" . basename(getcwd());
$specificPageUrl = explode("/", $request);
$number = count($specificPageUrl) - 1;

?>

<header class="user-header">
    <div class="user-header__wrapper">
        <h1 class="user-header__name"><a href="<?php print($baseUrl) ?>" class="user-header__name-link">Mini CMS</a></h1>
        <nav class="user-header__nav">
            <ul class="user-header__pages">
                <?php
                if (count($page) > 1) {
                    foreach ($page as $p) {
                        print("<li class='user-header__page'>
                                    <a href='" . $baseUrl . "/" . $p->getTitle()
                            . "'class='user-header__link " . ($specificPageUrl[$number] == $p->getTitle()
                             || ($p->getPageId() == 1 && $specificPageUrl[$number] == "") ? "user-header__link--active" : "") . "'>"
                            . $p->getTitle() . "</a>
                                </li>");
                    };
                }
                ?>
            </ul>
        </nav>
    </div>
</header>