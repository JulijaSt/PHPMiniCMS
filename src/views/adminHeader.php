<?php
$url = $_SERVER['REQUEST_URI'];
$baseUrl = "/" . basename(getcwd());
$adminHome = $baseUrl . "/admin";
$parseUrl = parse_url($url);
$query = $parseUrl["query"];
$querySimbol = $query ? "&" : "?"
?>

<header class="header">
    <div class="header__wrapper">
        <div class="header__title">
            <h1 class="header__name"><a href="<?php print($adminHome)?>" class="header__name-link">Mini CMS</a></h1>
            <nav class="header__admin-nav">
                <ul class="header__login">
                    <li class="header__admin-login">
                        <a href="<?php print($adminHome)?>" class="header__login-link fas fa-home"></a>
                    </li>
                    <li class="header__admin-login">
                        <a href=" 
                        <?php print($url . $querySimbol)?>action=logout" class="header__login-link fas fa-sign-out-alt"></a>
                    </li>
                    <li class="header__admin-login">
                        <img src=<?php ($url == $adminHome) ? print("assets/img/admin.png") : print("../assets/img/admin.png")?>
                         alt="admin." class="header__admin-img">
                    </li>
                    <li class="header__admin-login">admin</li>
                </ul>
            </nav>
        </div>
        <nav class="header__nav">
            <ul class="header__page-nav">
                <li class="header__page">
                    <a href="<?php print($adminHome)?>" class="header__page-link">Pages</a>
                </li>
                <li class="header__page" class="header__page-link">
                    <a href="<?php print($baseUrl) ?>" class="header__page-link" target="_blank">View Website</a>
                </li>
            </ul>
        </nav>
    </div>
</header>