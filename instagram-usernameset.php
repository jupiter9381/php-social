<?php
    include_once('./include/config.php');
    include_once('./include/functions.php');

    $token = (isset($_POST['_csrf'])) ? $_POST['_csrf'] : "";
    if (!$csrf->isTokenValid($token)) {
        echo '[]';
        die();
    } 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['instagram_user'] = $_POST["name"];
        
        error_reporting(E_ALL);
        ini_set('display_errors',1);
        set_time_limit(0);
        ini_get('curl.cainfo');

        //qweqweqweqweqweqws
        require './vendor/autoload.php';

        \InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;

        $username = 'daniel_shunzhe_226';
        $password = 'vhkgufvir226@@^';

        $ig = new \InstagramAPI\Instagram();
        $rankToken = \InstagramAPI\Signatures::generateUUID();

        $res = [];
        try{
            $ig->login($username, $password);
            $res = $ig->people->getInfoByName($_SESSION['instagram_user']);

            $someArray = (array)json_decode($res, true);
                      
            if($someArray['user']['username'] == $_SESSION['instagram_user'])
            {
                // $res = $someArray['user']['username'];
                if($someArray['user']['is_private'] == false)
                    $res = $someArray['user']['username'];
                else
                    $res = 0;
            }
        } catch (\Exception $e){
            # echo $e->getMessage();
            $res = [];
        }
        echo json_encode($res);
    }
?>