<?php
session_start();
ob_clean();
ob_start();
include 'MySqli_Crud.php';

$db = new DB();

if($_SERVER['SERVER_NAME'] == "localhost"){
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	defined('BASE_URL')      OR define('BASE_URL', "http://localhost/followmyass"); 
	// Create connection
	$con = mysqli_connect("localhost", "root", "", "followmyass_main");
	$db->initialize("localhost", "root", "", "followmyass_main");
} else {	
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	defined('BASE_URL')      OR define('BASE_URL', "https://followmyass.com"); 
	// Create connection
	$con = mysqli_connect("localhost", "root", "", "followmyass");
	$db->initialize("localhost", "root", "", "followmyass");;
}

//Stripe
defined('PUBLISHABLE_KEY') OR define('PUBLISHABLE_KEY', "pk_test_NN7Xsw6hUop13JWi9uR2gVFq00blPG0tb0");
defined('SECRET_KEY') OR define('SECRET_KEY', "sk_test_ZeRRSEJlUQwoYTZpVmtQIWRY00C7INIBiH"); 

//Jeff Stripe Details
/*defined('PUBLISHABLE_KEY')      OR define('PUBLISHABLE_KEY', 'pk_test_a5RfyiXM6v0x4P5EsIjb64O5');
defined('SECRET_KEY')      OR define('SECRET_KEY', 'sk_test_F3kj5JoFnlv3RQ5UakrvgakG');*/

//Paypal
defined('PAYPAL_ENV') OR define('PAYPAL_ENV', "sandbox");
defined('SAN_Client_ID') OR define('SAN_Client_ID', "AS-Jzt_lhA5L8evlo4xrbUvCwEXfc42dsNKDDm-zRmNsjOO9wBilySDbFRkDpQG4_HJ-r90tX8_FtM_C");
defined('LIVE_Client_ID') OR define('LIVE_Client_ID', "AZV62nDggOZuEsq_dIf46fWTLFtI431FJRUi3JbSqSBL-yzi3FJ-g46RaaPmMzJNjpUbxqIshxNcjVEW");
defined('Secret') OR define('Secret', "EPxGlJ8kNhoTzE1Bzc9Uu9wRWI-6h6F1w0o4NtGuZxEc-9BXzFZE_DZkME_UOyXt8vGfJ5O8HG5QlUDu"); 

//Jeff Details
/*defined('PAYPAL_ENV') OR define('PAYPAL_ENV', "sandbox");
defined('SAN_Client_ID') OR define('SAN_Client_ID', "ARJPbbPn-iAt48hsubZcjv03AupuZm__LpV05Sehxrn5DtsCOk1aR3zQYfTfDZLJACr4MgC3iC3dlArs");
defined('LIVE_Client_ID') OR define('LIVE_Client_ID', "ASX27rc5LRASlhZMzCi0A_fpdhOk5PoBQkPmGNPsQcg4BaU9VOj1hTdDxFrPyQTF3vDJ-bfDoDMWIXA_");

defined('SAN_Secret') OR define('SAN_Secret', "ENtX17FQnNCmBoQvpOEkG4_tuSG_HNqljf7ze201d_GMvcdBdFQ7hAJmmwPs8efx_MWTir-uQVVKJgTe"); 
defined('LIVE_Secret') OR define('LIVE_Secret', "ENtX17FQnNCmBoQvpOEkG4_tuSG_HNqljf7ze201d_GMvcdBdFQ7hAJmmwPs8efx_MWTir-uQVVKJgTe"); */

//Coinbase 
// API Key: UaXvvhejzx9jMEp9
// API Secret: UaUbTNVoVS1cpaCPa35h4WJlUMewtdPs

// Check connection
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}
mysqli_query($con,'SET character_set_results=utf8');
mysqli_query($con,'SET names=utf8');
mysqli_query($con,'SET character_set_client=utf8');
mysqli_query($con,'SET character_set_connection=utf8');
mysqli_query($con,'SET character_set_results=utf8');
mysqli_query($con,'SET collation_connection=utf8_general_ci');
mysqli_query($con,"SET NAMES utf8"); //the main trick   


include 'CSRF_Protect.php';
$csrf = new CSRF_Protect();
	
?>