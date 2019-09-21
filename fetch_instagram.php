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
    $api_key = '17799331919.d16d1ec.f249aa99e5ee4ca1a9815e524013ad87';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $is_first = $_POST['is_first'];
        if($is_first == 'true')
        {
            $name = urlencode($_POST["name"]);

            error_reporting(E_ALL);
            ini_set('display_errors',1);
            set_time_limit(0);
            ini_get('curl.cainfo');

            require './vendor/autoload.php';

            \InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;

            $username = 'daniel_shunzhe_226';
            $password = 'vhkgufvir226@@^';

            $ig = new \InstagramAPI\Instagram();
            $rankToken = \InstagramAPI\Signatures::generateUUID();

            $res = [];
            try{
                $ig->login($username, $password);
                
            } catch (\Exception $e){
                echo $e->getMessage();
                
            }
            try {
                // Get the UserPK ID for "natgeo" (National Geographic).
                
                // $userId = $ig->people->getUserIdForName($user_name);
                $userId = $ig->people->getUserIdForName($name);
            } catch (\Exception $e) {
                $res = [];
                echo json_encode($res);
                return;
            }    
            
            $nextpage = $_POST['nextpage'];

            $response = '';
            error_reporting(0);
            
            $response = file_get_contents("https://www.instagram.com/{$name}/?__a=1");
        
            $res = [];
            if($response != NULL)
            {
                $searchResponse = json_decode($response,true);
                // var_dump($searchResponse);
                $res['portfolio'] = $searchResponse['graphql']['user']['profile_pic_url'];
                $res['full_name'] = $searchResponse['graphql']['user']['full_name'];
                $res['id'] = $searchResponse['graphql']['user']['id'];
                $res['url'] = "https://www.instagram.com/p/";
                $res['total_count'] = $searchResponse['graphql']['user']['edge_owner_to_timeline_media']['count'];
                $res['page_info'] = $searchResponse['graphql']['user']['edge_owner_to_timeline_media']['page_info'];
                $res['posts'] = $searchResponse['graphql']['user']['edge_owner_to_timeline_media']['edges'];
            }
            echo json_encode($res);
        }
        else if($is_first == 'false')
        {
            $nextpage = $_POST['nextpage'];
            $id = $_POST['id'];
            
            $response = file_get_contents("https://www.instagram.com/graphql/query/?query_id=17888483320059182&id={$id}&first=12&after={$nextpage}");
            $res = [];
            if($response != NULL)
            {
                $searchResponse = json_decode($response,true);
                $res['url'] = "https://www.instagram.com/p/";
                $res['page_info'] = $searchResponse['data']['user']['edge_owner_to_timeline_media']['page_info'];
                $res['posts'] = $searchResponse['data']['user']['edge_owner_to_timeline_media']['edges'];
                $res['status'] = $searchResponse['status'];
                echo json_encode($res);
            }

        }
        else
            echo '[]';
    }

    
?>