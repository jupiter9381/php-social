<?php
    include_once('./include/config.php');
    include_once('./include/functions.php');

    $token = (isset($_POST['_csrf'])) ? $_POST['_csrf'] : "";
    if (!$csrf->isTokenValid($token)) {
        echo '[]';
        die();
    }
             
    // define variables and set to empty values
    $name = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $name = $_POST["name"];
        $url = str_replace("https://discord.gg/", "", $name);
        
        error_reporting(0);
        $url = "https://discordapp.com/api/v6/invites/{$url}?with_counts=true";
        $response = file_get_contents($url);
 
        echo $response;
    
    }

    
?>