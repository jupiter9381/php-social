<!--header-->
<?php include 'include/header.php';

if (!isset($_SESSION['user'])) {  
	redirect('login');
}


$where = "`wallet_history`.userId='".$_SESSION['user']."' and amount_type='Credit' and DATE_FORMAT(added_at,'%Y-%m-%d') = '".date('Y-m-d')."'"; 
$option = array(
	'columns'=>array('sum(amount) as total_sum')
);
$result = $db->findAll('wallet_history',$where,$option); 
$today_earning = 0; 
if (!empty($result)) {
	$row = $result[0];
	$today_earning = $row['total_sum'];
}

$where = "`wallet_history`.userId='".$_SESSION['user']."' and amount_type='Credit' and DATE_FORMAT(added_at,'%Y-%m-%d') = '".date('Y-m-d',strtotime("yesterday"))."'"; 
$option = array(
	'columns'=>array('sum(amount) as total_sum')
);
$result = $db->findAll('wallet_history',$where,$option);
$yesterday_earning = 0; 
if (!empty($result)) {
	$row = $result[0];
	$yesterday_earning = $row['total_sum'];
}

$earning_status = "";
$earning_per = 0;
if ($yesterday_earning != 0 && $today_earning != 0) {
	if ($yesterday_earning < $today_earning) {
		$earning_status = "up";
		$earning_per = 100-($yesterday_earning * 100/$today_earning);
	} else { 
		$earning_status = "down";
		$earning_per =  100-($today_earning * 100/$yesterday_earning);
	}
}

?>
<?php include("include/top_navigation.php");?>
<!--header-end-->
<title>Wallet | FollowMyAss</title>
<meta name="description" content=" Use this wallet to move funds to your personal account. Your wallet shows how much money you've made from following people on social media.">
<meta name="keywords" content="">
</head>

<div class="container full-height wallet-page">
	<section class="sec-id-1">
		<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-12" style="width: 99.5%;text-align: center;">
					<?php show_messsage('success'); ?>
					<?php show_messsage('danger'); ?>
				</div>
			</div>
		</div>
		<div class="row">			
			<div class="col-md-8 col-md-8 col-sm-12">
				<div class="row wallet-row">
					<div class="col-md-2 col-md-2 col-sm-2">
						<img class="wallet-icon" src="<?php echo BASE_URL ?>/img/wallet-icon.png" />
					</div>    
					<div class="col-md-10 col-md-10 col-sm-10">
						<h3><b><?php echo $firstname."’s Wallet" ?></b></h3>
						<p>Use your wallet to check your balance or move money to your personal account.</p>
					</div>
				</div>
				
			</div>  
			<div class="col-md-3 col-md-3 col-sm-12">
				<h3>
					<?php if ($earning_per != 0) { ?>
						<img class="up-arow" src="<?php echo BASE_URL ?>/img/<?php echo $earning_status ?>-arow.png">
					<?php } ?>
					<b><?php echo number_format($earning_per,0)."%"; ?></b></h3>
					<p>Today compared <br class="mobile_hide">
					to yesterday</p>
				</div>  
				
			</div>
		</section>


		<section class="sec-id-2">

			<div class="row">

				
				<div class="col-md-8 col-md-8 col-sm-12">
					<div class="wallet-box-left">     
						<div class="wallet-box-mobile-left">
							<div class="row">
								<div class="col-md-12 col-md-12 col-sm-12">
									<h4>You have</h4>  
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 col-md-12 col-sm-12">
									<div class="wallet-amount-btn">
										<span><?php echo $wallet_amount."$" ?></span>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12 col-md-12 col-sm-12">
									<div class="wallet-avaialble-btn">
										<p>Available</p>
									</div>
								</div>
							</div>   
						</div>
						<div class="wallet-box-mobile-right">

							<div class="row ">
								<div class="col-md-12 col-md-12 col-sm-12">
									<div class="wallet-Cashout-btn">
										<a href="<?php echo BASE_URL ?>/cashout">Cashout</a>
									</div>
								</div>
							</div>    </div>  
						</div>
						
					</div>
					<div class="col-md-3 col-md-3 col-sm-12">
						<div class="wallet-box-right">
							<div class="mobile-wrap-left">
								<img src="img/info.png">
							</div>
							<div class="mobile-wrap-right">
								<p>Don't unfollow people or 
								your account will be <br class="mobile_hide">
								terminating and all funds seized.</p>  
							</div>            
						</div>
						
					</div>
					
				</div>
			</div>
			<!-- /.row-->

			<div class="corner-imgs">
				<div class="wallet-side-images-left">
					<img src="img/wallet-img1.png">
				</div>
				<div class="wallet-side-images-right">
					<img src="img/wallet-img2.png">
				</div>
			</div>

		</div>
		<!-- /.container-->

		<!-- footer-->


		<?php include 'include/footer.php';?>

		<!-- /footer-->
	</body>

	</html>