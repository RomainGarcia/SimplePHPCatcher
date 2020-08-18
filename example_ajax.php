<?php
    require_once("SimplePHPCatcher.class.php");
    $catcher = new SimplePHPCatcher("catch.txt");

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $catcher->catch();
    }

?>