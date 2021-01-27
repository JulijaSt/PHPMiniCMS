<?php

$baseUrl = "/" . basename(getcwd());

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/dist/css/main.min.css">
    <title>Mini CMS</title>
</head>

<body>
    <main class="error-wrapper">
        <section class="error404">
            <img src="assets/img/error.png" alt="404 error." class="error404__img" />
            <div class="error404__text">
                <h1 class="error404__title">Oops!!!</h1>
                <p class="error404__info">
                    The page you're looking for isn't found :(
                </p>
                <p class="error404__info">We suggest you back to Home</p>
                <a href="<?php echo $baseUrl ?>"><button class="btn">Back to Home</button></a>
            </div>
        </section>
    </main>
</body>

</html>