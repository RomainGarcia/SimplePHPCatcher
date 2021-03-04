<?php
    require_once("SimplePHPCatcher.class.php");
    $catcher = new SimplePHPCatcher("catch.txt");

    // Set CORS headers
    $catcher->cors();

    if ($_SERVER['REQUEST_METHOD'] !== "GET") {
        $catcher->catch(true);
    }

?>