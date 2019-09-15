<!--header-->
<?php include 'include/header.php';
if (!isset($_SESSION['user'])) {  
	$_SESSION['last_page'] = "follow-facebook";
	redirect('login');
}

$where = "platform_id='Facebook' and order_status='In Process'"; 
$option = array(
	'columns'=>array('*')
);
$OrderInfo_list = $db->findAll('orders',$where,$option); 

include("include/top_navigation.php");

// Facebook SDK
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
require_once __DIR__ . '/inc/SDKs/Facebook/php-graph-sdk-5.7.0/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '{app_id}', // Replace {app-id} with your app id
  'app_secret' => '{secret_key}',
  'default_graph_version' => 'v3.2',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://followmyass.com/fb-callback.php', $permissions);

if (!isset($_SESSION["fbLoggedIn"])) { ?>
	<div id="fb-root"></div>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId            : '{app_id}',
				autoLogAppEvents : true,
				xfbml            : true,
				version          : 'v3.3'
			});
		};
	</script>
	<script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>

	<div class="container">
		<div class="row">
			<div class="col-md-3">              
			</div>
			<div class="col-md-6 text-center pd-b-50">
				<h2><b><a href="<?php echo htmlspecialchars($loginUrl) ?>">Please login with Facebook to continue!</a></b></h2>
			</div>

			<div class="col-md-3">             
			</div>
		</div>
	</div> 
<? } else { ?>
	<!--header-end-->
	<title>Get Paid to Follow and Like Facebook Accounts</title>
	<meta name="description" content="Get paid quick money to follow, like, & view facebook accounts. Cashout through PayPal, Amazon, and Steam!">
	<meta name="keywords" content="">
</head>
<div class="container">
	<div class="row">
		<div class="col-md-3">              
		</div>
		<div class="col-md-6 text-center pd-b-50">
			<h2><b>Follow Facebook For Money</b></h2>
		</div>

		<div class="col-md-3">             
		</div>
	</div>
	<div class="follow-container">
		<!-- <div class="follow-box-col">
			<div class="follow-for-money-box">
				<img src="img/facebook.png">                    
				<h3 class="buyer-name">P. ROZ</h3>  
				<p class="buyer-price">$0.1 per follow</p>
				<a class="follow-button" href="https://www.facebook.com/princessrozzee" target="_blank">Follow</a>
				<button class="checkFacebook" data-action="eyJpZCI6Ijg4MTEiLCJ0YXNrIjoiaHR0cHM6Ly9mYWNlYm9vay5jb20vcHJpbmNlc3Nyb3p6ZWUvIiwibWV0aG9kIjoiZ2V0IiwiZGF0YSI6W10sImNzcmYiOiJmNDQ2ODZjNjNlZGMxOGY3MzY0YzRiNjhiMmY1MTczZWZmMzg4OWZjIiwidGltZXN0YW1wIjoxNTYzNjk0MjM2LCJ3YWl0IjoxMDB9"><i class="glyphicon glyphicon-refresh"></i></button>
			</div>
		</div> -->

		<?php 
		if(!empty($OrderInfo_list)) { 
			foreach ($OrderInfo_list as $key => $value) { ?>
				<div class="follow-box-col">
					<div class="follow-for-money-box">
						<?php 
						$image_path = "/img/facebook.png";
						$offer_image = $value['offer_image'];
						$path = "./uploads/offer_images/";                            
						if (file_exists($path.$offer_image) && $offer_image != "") {
							$image_path = $path.$offer_image;
						}
						?>
						<img src="<?php echo BASE_URL.$image_path ?>" height="100px" width="100px">   
						<h3 class="buyer-name"><?php echo $value['username'] ?></h3>  
						<!-- <p class="buyer-price"><?php echo "$".$value['follower_per_amount']." per follow" ?></p>   -->
						<?php if ($value['user_id'] != $user_id) { ?>
							<a href="<?php echo BASE_URL."/inc/add_follower.php?order_id=".$value['id'] ?>">
								<p class="buyer-price"><?php echo "$".$value['follower_per_amount']." per follow" ?></p>
							</a>  
						<?php } else { ?>
							<a href="<?php echo BASE_URL."/tracking"; ?>">
								<p class="buyer-price"><?php echo "$".$value['follower_per_amount']." per follow" ?></p>
							</a>  
						<?php } ?>
						
						<a class="follow-button" target="_blank" href="<?php echo $value['post_url'] ?>">Follow</a>
					</div>
				</div>
			<?php }
		} else { ?>
			<div class="row">
				<div class="col-md-12">
					<div id="err_buy_follower" class="alert alert-info">
						No record found
					</div>
				</div>
			</div>
		<?php } ?>

	</div>
</div>
<?php } ?>
<?php include("include/footer.php");?>
</body>
</html>


