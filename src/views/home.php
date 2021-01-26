<?php
require_once "bootstrap.php";
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
    ?>

    <main class="main main--user">
        <div class="main__wrapper">
            Home
        </div>
    </main>

    <?php
    include "footer.php";
    footer("footer footer--user");
    ?>
</body>

</html>
