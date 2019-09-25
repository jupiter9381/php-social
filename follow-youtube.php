<!--header-->
<?php
	include 'include/header.php';
	if (!isset($_SESSION['user'])) {
		$_SESSION['last_page'] = "follow-youtube";
		redirect('login');
	}
	$user_id = $_SESSION['user'];
	$where = "platform_id='Youtube' and o.order_status='In Process' and orders_posts.status='In Process' and user_id != '".$user_id."'"; 
	$option = array(
		'columns'=>array('o.id,o.platform_id,o.platform_item,o.is_manual,o.username,o.user_id,o.follower_per_amount,orders_posts.order_id,orders_posts.post_image,orders_posts.post_url,orders_posts.id as order_posts_id'),
		'join'=>"right join orders_posts on orders_posts.order_id=o.id"
	);
	$OrderInfo_list = $db->findAll('orders o',$where,$option); 

	include("include/top_navigation.php");
	require_once __DIR__ . '/include/youtube-php/vendor/autoload.php';
	if($_SERVER['SERVER_NAME'] == "localhost") {
		$REDIRECT_URI = 'http://localhost/followmyass/follow-youtube';
		$KEY_LOCATION = __DIR__ . '/include/client_secret_local.json';    
	} else {
		$REDIRECT_URI = 'https://followmyass.com/follow-youtube';
		$KEY_LOCATION = __DIR__ . '/include/client_secret.json';    
	}
	$client = new Google_Client();
	$client->setApplicationName("ctrlq.org Application");
	$client->setAuthConfig($KEY_LOCATION);


	// Incremental authorization
	$client->setIncludeGrantedScopes(true);

	// Allow access to Google API when the user is not present. 
	$client->setAccessType('offline');
	$client->setRedirectUri($REDIRECT_URI);
	$client->setScopes([
		'https://www.googleapis.com/auth/youtube.readonly',
		// 'https://www.googleapis.com/auth/youtube',
		'https://www.googleapis.com/auth/youtubepartner',
		'https://www.googleapis.com/auth/userinfo.profile',
	]);

	$userId = $_SESSION['user'];
	$where = "`userId`='$userId'";  
	$data_arr = array (
		'tos_follow'=>'1'
	);
	$Updated = $db->update("users", $data_arr, $where);

	if (isset($_GET['code']) && !empty($_GET['code'])) {
		try {
			// Exchange the one-time authorization code for an access token
			$accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code']);


			$_SESSION['accessToken'] = $accessToken;
			header('Location: ' . filter_var($REDIRECT_URI, FILTER_SANITIZE_URL));
			exit();
		} catch (\Google_Service_Exception $e) {
			print_r($e);
		}
	}

	if (!isset($_SESSION['accessToken'])) {
		$authUrl = $client->createAuthUrl();
		header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
	}

	$client->setAccessToken($_SESSION['accessToken']);

	/* Refresh token when expired */
	if ($client->isAccessTokenExpired()) {
		// the new access token comes with a refresh token as well
		$client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
		$_SESSION['accessToken'] = json_encode($client->getAccessToken());
	}
	$service = new Google_Service_YouTube($client);

	$authService = new Google_Service_Oauth2($client);
	$userInfo = $authService->userinfo->get();

	// /* Check if user subscribed to channel */
	// $queryParams = [
	//     'forChannelId' => 'UC1GOg_QTvDSOuc2mv1B_3xQ',
	//     'mine' => true
	// ];

	// $response = $service->subscriptions->listSubscriptions('snippet', $queryParams);
	// echo json_encode($response);
?>
<!--header-end-->
<title>Get Paid to Follow, Like, & View YouTube Channels</title>
<meta name="description" content="Get paid quick money to follow, like, & view YouTube Channels. Cashout through PayPal, Amazon, and Steam!">
<meta name="keywords" content="">

<!-- Button trigger modal -->
<button id="btnPopUp" type="button" class="d-none btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
	followmyass
</button>

<!-- Modal -->
<div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalCenterTitle">
					How to follow for money:
				</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						<img id="x" class="x" src="img/close-cross.png" width="30">
					</span>
				</button>
			</div>
			<div class="modal-body">

				<p class="zaiz">1) Click the subscribe, or like button, or view a video. You will be redirected to a YouTube channel. Perform the action (like, subscribe, or view) and return to FollowMyAss website.</p>
				
				<p>2) Click the refresh button <img src="img/refereshicon.png"></p>
				
				<p>3) Your money will appear in your wallet (see terms and conditions for more detail). Cashout the money on https://followmyass.com/cashout.</p>

				<div class="alert alert-warning" role="alert">
					<img src="img/pasted image.png" width="20"> don’t unfollow or unlike users, your account will be terminating including any funds within it

				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal" id="view_modal_error" tabindex="-1" role="dialog" aria-labelledby="view_modal_errorTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="view_modal_errorTitle">
					Alert:
				</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						<img id="x" class="x" src="img/close-cross.png" width="30">
					</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="alert alert-warning" role="alert">
					<img src="img/pasted image.png" width="20"> You have to view video at least 35 seconds.

				</div>
			</div>
		</div>
	</div>
</div>
<style>
	.subscribe-button:hover {
		background: #ebeef0;
		color: #fff;
		background-image: url(../img/follow.png);
		background-repeat: no-repeat;
		background-position: 20%;
		background-size: 20px;
	}

	.subscribed-button {
		background: #2273d5;
		color: #fff;
	}

	.subscribed-button:hover {
		background: #2273d5;
		color: #fff;
	}

	img.reload_img {
		width: 32px;
		margin-bottom: 9px;
		margin-top: -24px;
	}
</style>

<div class="container cust_margn_bottom">
	<div class="hidden user_id"><?php echo $_SESSION['user'] ?></div>
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6 text-center pd-b-50">
			<h3><b>Follow Youtube For Money</b></h3>
		</div>

		<div class="col-md-3">
		</div>
	</div>
	<div class="follow-container" style="display: none">
		<?php $new_list = array(); ?>
		<?php if (!empty($OrderInfo_list)) 
		{
			foreach ($OrderInfo_list as $key => $value) 
			{ 
                // Get Video information from database
				$video_link = '';
				$video_id = '';

				$chanel_link = '';
				$chanel_id = '';

				if ($value['platform_item'] == 'Likes') 
				{
					$video_link = $value['post_url'];
					$video_id = trim(explode('=', $video_link)[1]);

					$like_queryParams = [
						'id' => $video_id
					];
					$like_response = $service->videos->getRating('snippet,contentDetails,statistics', $like_queryParams);
					$video_rating = '';
					if ($like_response && count($like_response['items']) > 0) {
						$video_rating = $like_response['items'][0]['rating'];
					}

					$value['order_status'] = $video_rating;
				}
                // End
				if ($value['platform_item'] == 'Followers') 
				{
					$chanel_link = $value['post_url'];
					$ch_arr = explode('/', $chanel_link);
					$chanel_id = trim(end($ch_arr));

					$follow_queryParams = [
						'forChannelId' => $chanel_id,
						'mine' => true
					];

					$like_response = $service->subscriptions->listSubscriptions('snippet', $follow_queryParams);

					$chanel_follow = '';
					if ($like_response && count($like_response['items']) > 0) {
						$chanel_follow = true;
					}

					$value['order_status'] = $chanel_follow;
				}
				array_push($new_list, $value);
			?>
				<div class="follow-box-col">
					<div class="follow-for-money-box" order_id="<?php echo $value['order_posts_id'] ?>" style="height: 275px;">
						<?php
						$image_path = BASE_URL . "/img/youtube.png";

						if ($value['is_manual'] == 1) {
							$post_image = $value['post_image'];
							$path = "./uploads/offer_images/";
							if (file_exists($path . $post_image) && $post_image != "") {
								$image_path = BASE_URL . $path . $post_image;
							}
						} else {
							$image_path = $value['post_image'];
						}

						?>
						<img src="<?php echo $image_path ?>" height="100px" width="100px">
						<h3 class="buyer-name"><?php echo $value['username'] ?></h3>
						<!-- <p class="buyer-price"><?php echo "$" . $value['follower_per_amount'] . " per " . $value['platform_item'] ?></p>   -->
						<?php if ($value['user_id'] != $user_id) { ?>

							<!-- Platform option  -->
							<!-- Likes -->
							<?php if ($value['platform_item'] == 'Likes') { ?>
								<?php if ($video_rating == 'like') { ?>									
									<p class="buyer-price"><?php echo "$" . $value['follower_per_amount'] . " per " . $value['platform_item'] ?></p>									
								<?php } else { ?>									
									<p class="buyer-price"><?php echo "$" . $value['follower_per_amount'] . " per " . $value['platform_item'] ?></p>									
								<?php } ?>
							<?php } ?>

							<!-- Subscribe -->
							<?php if ($value['platform_item'] == 'Followers') { ?>
								<?php if ($chanel_follow == true) { ?>									
									<p class="buyer-price"><?php echo "$" . $value['follower_per_amount'] . " per " . $value['platform_item'] ?></p>									
								<?php } else { ?>									
									<p class="buyer-price"><?php echo "$" . $value['follower_per_amount'] . " per " . $value['platform_item'] ?></p> 
								<?php } ?>
							<?php } ?>

							<!-- Views -->
							<?php if ($value['platform_item'] == 'Views') { ?>
								<!-- <a style="cursor: pointer" class="btn_view_add_follower" url="#"> -->
									<p class="buyer-price"><?php echo "$" . $value['follower_per_amount'] . " per " . $value['platform_item'] ?></p>
								<!-- </a> -->
							<?php } ?>
							<!-- End -->
						<?php } else { ?>
							<a href="<?php echo BASE_URL . "/tracking"; ?>">
								<p class="buyer-price"><?php echo "$" . $value['follower_per_amount'] . " per " . $value['platform_item'] ?></p>
							</a>
						<?php } ?>

						<!-- Platform option  -->
						<!-- Like -->
						<?php if ($value['platform_item'] == 'Likes') { ?>
							<?php if ($video_rating != 'like') { ?>
								<a href="<?php echo BASE_URL."/follow-youtube" ?>">
									<img class="buyer-price reload_img refresh_btn" src="<?php echo BASE_URL ?>/img/reload.png">
								</a>
								<a class="subscribe-button subscribed-button" style="padding: 8px 70px;" target="_blank" href="<?php echo $value['post_url'] ?>">Like</a>
							<?php } else { ?>
								<a href="<?php echo BASE_URL."/follow-youtube" ?>" class="">
									<img class="buyer-price reload_img " src="<?php echo BASE_URL ?>/img/reload.png">
								</a>
								<a class="subscribe-button" target="" href="#" style="padding: 8px 70px;">Liked</a>
							<?php } ?>
						<?php } ?>

						<!-- Subscribe -->
						<?php if ($value['platform_item'] == 'Followers') { ?>
							<?php if ($chanel_follow != true) { ?>
								<a href="<?php echo BASE_URL."/follow-youtube" ?>">
									<img class="buyer-price reload_img refresh_btn" src="<?php echo BASE_URL ?>/img/reload.png">
								</a>
								<a class="subscribe-button subscribed-button" style="padding: 8px 70px;" target="_blank" href="<?php echo $value['post_url'] ?>">Follow</a>
							<?php } else { ?>
								<a href="<?php echo BASE_URL."/follow-youtube" ?>" class="">
									<img class="buyer-price reload_img " src="<?php echo BASE_URL ?>/img/reload.png">
								</a>
								<a class="subscribe-button" target="" href="#">Followed</a>
							<?php } ?>
						<?php } ?>

						<!-- View -->
						<?php if ($value['platform_item'] == 'Views') { ?>
							<a href="<?php echo BASE_URL."/follow-youtube" ?>" class="">
								<img class="buyer-price reload_img view_reload_btn" src="<?php echo BASE_URL ?>/img/reload.png">
							</a>
							<a style="cursor: pointer;padding: 8px 70px;" class="subscribe-button subscribed-button btn_view" target="_blank" url="<?php echo $value['post_url'] ?>">View</a>
						<?php } ?>
						<!-- End -->


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

<?php 
	$token_arr = $csrf->ManualTokenGen(); 
	$token_val = (isset($token_arr['token'])) ? $token_arr['token'] : "";
?>
<input type="hidden" id="token_val" value="<?php echo $token_val ?>">
<script>
	var order_lists = '<?php echo json_encode($new_list) ?>';
	orderlists = JSON.parse(order_lists);

	var userInfo = JSON.parse('<?php echo json_encode($userInfo) ?>');

	
	$('.refresh_btn').on('click', function() {
		location.reload(true);
	});

	$('.btn_view').on('click', function() 
	{
		var order_id = $(this).parent().attr('order_id');

		var item_data = localStorage.getItem('view_data_' + order_id);
		if ($(this).hasClass('subscribed-button')) {
			var json_data = [];
			json_data = {
				'start_time': Date.now()
			}
			localStorage.setItem('view_data_' + order_id, JSON.stringify(json_data));
			var url = $(this).attr('url');
			window.open(url);
		} else {

		}
	});

	$(document).ready(function() {
        // start_time = localStorage.getItem('click_time');
        $('.follow-container').delay(50).fadeIn();
        var view_btn_lists = $('.btn_view');
        view_btn_lists.each(function(key, item) {
        	var order_id = $(item).parent().attr('order_id');
        	var item_data = localStorage.getItem('view_data_' + order_id);
        	if (item_data != null) {
        		var res_arr = JSON.parse(item_data);
        		var start_time = res_arr.start_time;
        		var end_time = Date.now();
        		time_diff = (end_time - start_time) / 1000;
        		if (time_diff > 35) {
        			$(item).removeClass('subscribed-button');
        			$(item).html('Viewed');
        		}
        	}
        });
    });



	$(document).ready(function(){
		var user_id = $(".user_id").html();
		var base_url = $("#base_url").val();
		var token_val = $("#token_val").val();
		console.log(user_id);
        console.log(base_url);
        console.log(token_val);
		orderlists.forEach(function(item){
			view_status = localStorage.getItem('view_data_' + item.order_posts_id);
			if(item['platform_item'] == 'Views') {
				if(view_status) {
					item.order_status = 'yes';
				} else {
					item.order_status = 'no';
				}
			}
		})
		$.ajax({
			'url': base_url+"/inc/manage_post_followers.php",
			'type': 'post',
			'data': {
				user_id: user_id,
				order_data: JSON.stringify(orderlists),
				id: userInfo.id,
				username: userInfo.name,
				avata: userInfo.picture,
				"_csrf":token_val,
			},
			'dataType':'json',
			success: function(res){
				var status = res.status;
				if (status != "success") {
					var is_logout = res.is_logout;
					if (is_logout == 1) {
						location.href = base_url + "/login";
					}
				}
			} 
		})
	})

	$('.view_reload_btn').on('click', function() {
		var order_id = $(this).parent().parent().attr('order_id');
		btn_view = $(this).parent().parent().find('.btn_view');
		if (!btn_view.hasClass('subscribed-button')) {
			return;
		}
		var item_data = localStorage.getItem('view_data_' + order_id);
		if (item_data != null) {
			var res_arr = JSON.parse(item_data);
			var start_time = res_arr.start_time;
			var end_time = Date.now();
			time_diff = (end_time - start_time) / 1000;
			if (time_diff < 35) {
				$('#view_modal_error').modal('show');
			} else {
				location.reload(true);
			}
		} else {

		}
	});

	/*$('.btn_view_add_follower').on('click', function() {
		var order_id = $(this).parent().attr('order_id');
		var item_data = localStorage.getItem('view_data_' + order_id);
		view_button = $(this).parent().find('.btn_view');
		if (view_button.hasClass('subscribed-button')) {

		} else {
			var url = $(this).attr('url');
			window.open(url);
		}
	});*/




	function myFunction() {
		document.getElementById("exampleModalCenter").style.display = "block";
		document.getElementById("exampleModalCenter").classList.remove('animated', 'bounceOut');
		document.getElementById("exampleModalCenter").classList.add('animated', 'bounceIn');
	}

	function compare_array(arr1, arr2) {
		Array.prototype.push.apply(arr1,arr2); 

		for( var i=arr1.length - 1; i>=0; i--){
			for( var j=0; j<arr2.length; j++){
				if(arr1[i] && (arr1[i].id === arr2[j].id) && (arr1[i].order_status === arr2[j].order_status)){
					arr1.splice(i, 1);
				}
			}
		}

		return arr1;
	}

	
	$(document).ready(function(){
		var active_orders = [];
		orderlists.forEach(function(item){
			var temp = {
				id: item.id,
				order_status: item.order_status
			}
			active_orders.push(temp);
		});

        // Hide all finished offers
        var offerList = $('.follow-container').find('.subscribe-button');

        offerList.each(function(index, item) {
        	if($(item).hasClass('subscribed-button')){
        	}else {
        		parent = $(item).parent().parent();
        		$(parent).css('display', 'none');
        	}    
        })   
        // End

        popup_status = localStorage.getItem('popup_status');
        
        if(popup_status && popup_status == 1) {
        	prev_orders = JSON.parse(localStorage.getItem('y_o_list'));
        	finished_offers = compare_array(prev_orders, active_orders);
        	finished_offers.forEach(function(item){
        		parent = $('[order_id=' + item.id + ']');
        		$(parent).parent().css('display', 'block');
        		$(parent).parent().delay(4000).fadeOut();
        	});
        } else {

        	document.getElementById("btnPopUp").click();
        	myFunction();
        	localStorage.setItem('popup_status', 1)
        }
        localStorage.setItem('y_o_list', JSON.stringify(active_orders));
    })


</script>
<?php include("include/footer1.php"); ?>
</body>

</html>
