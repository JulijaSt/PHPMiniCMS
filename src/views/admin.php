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
    <header class="header">
        <div class="header__wrapper">
            <div class="header__title">
                <h1 class="header__name"><a href="" class="header__name-link">Mini CMS</a></h1>
                <nav class="header__admin-nav">
                    <ul class="header__login">
                        <li class="header__admin-login">
                            <a href="" class="header__login-link fas fa-home"></a>
                        </li>
                        <li class="header__admin-login">
                            <a href="" class="header__login-link fas fa-sign-out-alt"></a>
                        </li>
                        <li class="header__admin-login">
                            <img src="assets/img/admin.png" alt="admin." class="header__admin-img">
                        </li>
                        <li class="header__admin-login">admin</li>
                    </ul>
                </nav>
            </div>
            <nav class="header__nav">
                <ul class="header__page-nav">
                    <li class="header__page">
                        <a href="" class="header__page-link">Pages</a>
                    </li>
                    <li class="header__page" class="header__page-link">
                        <a href="<?php print("/" . basename(getcwd())) ?>" class="header__page-link" target="_blank">View Website</a>
                    </li>
                </ul>
            </nav>
        </div>

    </header>
    <main class="main">
        <div class="main__wrapper">
            <h1 class="main__title">Manage Pages</h1>
            <table class="page-table">
                <thead class="page-table__head">
                    <tr class="page-table__row page-table__row--head">
                        <th class="page-table__column page-table__column--head">Title</th>
                        <th class="page-table__column page-table__column--head">Actions</th>
                    </tr>
                </thead>
                <tbody class="page-table__body">
                    <?php

                    include_once "bootstrap.php";

                    $page = $entityManager->getRepository('Models\Page')->findAll();

                    if (count($page) > 0) {
                        foreach ($page as $p)
                            print("<tr class='page-table__body-row'>"
                                . "<td class='page-table__column'>" . $p->getLink() . "</td>"
                                . "<td class='page-table__column'></td>"
                                . "</tr>");
                    } else {
                        print("<tr class='page-table__body-row'>
                            <td class='page-table__column'></td>
                            <td class='page-table__column'></td>
                        </tr>");
                    }
                    ?>
                <tbody>
            </table>
        </div>
    </main>
    <footer class="footer footer--user">
        <div class="footer__wrapper">
            <h6 class="footer__copyright">copyright &copy <?php echo date("Y") ?> Mini CMS</h6>
        </div>
    </footer>
</body>

</html>