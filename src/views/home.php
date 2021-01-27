<?php
require_once "bootstrap.php";

$url = str_replace("%20", " ", $_SERVER['REQUEST_URI']);
$baseUrl = "/" . basename(getcwd());
$specificPageUrl = explode("/", $request);
$number = count($specificPageUrl) - 1;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/scss/components/reset.css">
    <link rel="stylesheet" href="assets/dist/css/main.min.css">
    <title>Mini CMS</title>
</head>

<body>
    <?php
    include "userHeader.php";

    if (!$specificPageUrl[$number]) {
        $page = $entityManager->getRepository('Models\Page')->findBy(array("title" => "home"));
    } else {
        $page = $entityManager->getRepository('Models\Page')->findBy(array("title" => $specificPageUrl[$number]));
    }
    ?>

    <main class="main main--user">
        <?php
        if ($page[0]->getTitle() == "home") {
            print("<div class='hero'><h1 class='hero__title'>Bring your ideas to life!!!</h1></div>");
        }
        ?>
        <div class="main__wrapper main__wrapper--user">
            <?php
            if ($page[0]->getTitle() != "home") {
                print("<h1 class='main__title main__title--page'>" . $page[0]->getTitle() . "</h1>");
            }
            ?>
            <div class="main__page-content"><?php print $page[0]-> getContent() ?></div>
        </div>
    </main>

    <?php
    include "footer.php";
    footer("footer footer--user");
    ?>
</body>

</html>