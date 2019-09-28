<?php

$fbNeedleProfile 			= '/ajax/follow/follow_profile.php';	// on profiles
$fbNeedlePageFollowing		= '"followStatus":true,';				// on pages
$fbNeedlePageNotFollowing	= '"followStatus":false,';				// on pages

$success = false;
if (isset($_GET['check'])) {
	//$postParams = print_r($_POST, true);
	//file_put_contents("logs.txt", $postParams);
	$userPageResponse = base64_decode($_POST['response']);
	
	// Verify if user has followed this page/profile
	$count = substr_count($userPageResponse, $fbNeedleProfile);
	if ($count == 1) {
		$success = true;
		$result = "Following this user...";
	} elseif ($count == 2) {
		$result = "Not following this user...";
	} else {
		// Profile needle didn't work, lets check with Page needle
		if (substr_count($userPageResponse, $fbNeedlePageFollowing) == 2) {
			$success = true;
			$result = "Following this page...";
		} elseif (substr_count($userPageResponse, $fbNeedlePageNotFollowing) == 2) {
			$result = "Not following this page...";
		}
		$result = "Unable to verify!";
	}

}

//file_put_contents("logs.txt", $result);

$response = array("success" => $success);
echo json_encode($response);


?>