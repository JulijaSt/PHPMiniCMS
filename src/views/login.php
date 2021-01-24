<?php
include_once "bootstrap.php";

$url = $_SERVER['REQUEST_URI'];
$parseUrl = parse_url($url);
$query = $parseUrl["query"];
$splitUrl = explode("?" . $query, $url, -1);
$pageLink = join("/", $splitUrl);

$username_error = '';
$password_error = '';

$user = $entityManager->getRepository('Models\User')->findBy(array('username' => 'admin'));

if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {	
    if ($_POST['username'] == $user[0]->getUsername() && $_POST['password'] == $user[0]->getPassword()) {
        $_SESSION['logged_in'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = 'Admin';
        header('location:' . $pageLink);
	    exit;
    } elseif ($_POST['username'] != $user[0]->getUsername() && $_POST['password'] != $user[0]->getPassword()) {
        $username_error = 'Wrong username';
        $password_error = 'Wrong password';
    } elseif ($_POST['username'] != $user[0]->getUsername()) {
        $username_error = 'Wrong username';
    } elseif ($_POST['password'] != $user[0]->getPassword()) {
        $password_error = 'Wrong password';
    }
} 

if (!$_SESSION['logged_in']) {
?>  
<div class="login-wrapper">
    <form action="" method="post" class="login">
        <h3 class="login__title">Login</h3>
        <p class="login__info">Welcome back, please login to see "Mini CMS" admin page.</p>
        <div class="login__input-wrapper">
            <label for="username" class="label">Username</label>
            <input type="text" class="input" name="username" value="<?php if(isset($_POST['username'])) print($_POST['username']) ?>"placeholder="Enter your username" required autofocus>
            <span class="error"><?php echo $username_error; ?></span>
        </div>
        <div class="login__input-wrapper">
            <label for="password" class="label">Password</label>
            <input type="password" class="input" name="password" placeholder="Enter your password" required></br>
            <span class="error"><?php echo $password_error; ?></span>
        </div>
        <input class ="btn" type="submit" name="login" value="Login" />
    </form> 
</div>    
<?php } ?>