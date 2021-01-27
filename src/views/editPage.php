<?php

require_once "bootstrap.php";

use Models\Page;

session_start();

if (isset($_GET['action']) and $_GET['action'] == 'logout') {
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['logged_in']);
}

$baseUrl = "/" . basename(getcwd());
$adminHome = $baseUrl . "/admin";

function redirect_to_root($adminHome)
{
    header("Location: " . $adminHome);
}

$pageParameter = array(
    "title" => "",
    "submitName" => "",
    "message" => "",
    "pageTitle" => "",
    "content" => ""
);

if (isset($_GET["action"]) and $_GET["action"] == "add") {
    $pageParameter["title"] = "Add Page";
    $pageParameter["submitName"] = "add";
    $pageParameter["message"] = "Page Added";

    if (isset($_POST['add']) && !empty($_POST['title'])) {
        $link = strtolower($_POST['title']);
        $page = new Page($link);
        if ($_POST['content']) {
            $page->setContent($_POST['content']);
        }
        $_SESSION['success_message'] = $pageParameter["message"];
        $entityManager->persist($page);
        $entityManager->flush();
        redirect_to_root($adminHome);
    }
}

if (isset($_GET['delete'])) {
    $page = $entityManager->find('Models\Page', $_GET['delete']);
    $entityManager->remove($page);
    $_SESSION['success_message'] = "Page Deleted";
    $entityManager->flush();
    redirect_to_root($adminHome);
}

if (isset($_GET['update'])) {
    $page = $entityManager->find('Models\Page', $_GET['update']);

    $pageParameter["title"] = "Update Page";
    $pageParameter["submitName"] = "update";
    $pageParameter["message"] = "Page Updated";
    $pageParameter["pageTitle"] = $page->getTitle();
    $pageParameter["content"] = $page->getContent();
}

if (isset($_POST["update"])) {
    $pageParameter["pageTitle"] = $_POST["title"];
    $pageParameter["content"] = $_POST["content"];
    $id = $_GET["update"];

    if (!empty($_POST['title'])) {
        $page = $entityManager->find('Models\Page', $id);
        $page->setTitle($pageParameter["pageTitle"]);
        $page->setContent($pageParameter["content"]);
        $_SESSION['success_message'] = $pageParameter["message"];
        $entityManager->flush();
        redirect_to_root($adminHome);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/scss/components/reset.css">
    <link rel="stylesheet" href="../assets/dist/css/main.min.css">
    <title>Mini CMS</title>
</head>

<body>
    <?php
    if (isset($_POST['login']) || !$_SESSION['logged_in']) {
        include 'login.php';
    }
    if ($_SESSION['logged_in']) {
    ?>
        <?php
        include "adminHeader.php";
        ?>

        <main class="main">
            <div class="main__wrapper">
                <h1 class="main__title"><?php print($pageParameter["title"]) ?></h1>
                <form action="" method="post" class="editPage">
                    <div class="login__input-wrapper">
                        <label for="title" class="label">Title</label>
                        <input type="text" class="input input--edit" name="title" value="<?php if (isset($pageParameter["pageTitle"])) print($pageParameter["pageTitle"]) ?>" required>
                    </div>
                    <div class="login__input-wrapper">
                        <label for="content" class="label">Content</label>
                        <input type="text" class="input input--edit" value="<?php if (isset($pageParameter["content"])) print($pageParameter["content"]) ?>" name="content"></br>
                    </div>
                    <input class="btn" type="submit" name="<?php print($pageParameter["submitName"]) ?>" value="<?php print($pageParameter["title"]) ?>" />
                </form>
            </div>
        </main>

        <?php
        include "footer.php";
        footer("footer");
        ?>

    <?php
    }
    ?>
</body>


</html>