	<!--header-->
	<?php 

	include 'include/header.php';

	if (!isset($_SESSION['user'])) {	
		$_SESSION['last_page'] = "referrals";
		redirect('login');
	}

	if ($wallet_amount < 0) {
		set_message('danger',"You don't have enough money to cashout.");
		redirect('wallet');
	}

	?>
	<?php include("include/top_navigation.php");?>
	<!--header-end-->
	<title>Cashout</title>
	<meta name="description" content="Cashout money that you earned from following people. Cashouts available using Amazon, PayPal, and Steam Giftcards.">
	<meta name="keywords" content="buy followers on instagram free,buy followers and likes,buy followers cheap,buy followers on instagram app,buy followers on instagram india,buy followers app store,buy followers active,buy instagram followers app,buy insta followers app,buy instagram followers and likes,buy instagram followers best site,buy instagram followers cheap,buy instagram followers cheap 10k,buy cheapest instagram followers">
</head>
<style>
	.cashout-box p {
		text-transform: capitalize;
		font-size: 14px;
	        min-height: 120px;
		height: 120px;
		max-height: 120px;
   		padding: 10px 0;
	}
	.cashout-box h4 {
		padding: 10px 0;
		text-transform: capitalize;
		font-size: 18px;
		min-height: 60px;
		height: 60px;
		max-height: 60px;
	}

	.cashout-box {
		padding: 20px;
		height: auto!important
	}
	
	.error {
	        display: inline-block;
   		height: 40px;
	}
	
	@media only screen and (min-width: 1800px) {

		.container.full.full-height.cashout {
			min-height: 812px;
		}
	}
	.cashout-mob-wrap a {
		margin-bottom: 8px;
	}
	.cashout-mob-wrap .col-md-3.col-sm-3 {
		padding: 0px 10px;
	}
	.cashout-mob-wrap h4, .cashout-mob-wrap p {
		margin: 10px 0px;
	}
	@media only screen and (min-width: 768px) {
		.cashout-box img {
			width: 122px!important;
			height: 112px!important;
		}
		.cashout-box img.amazon-logo, img.edf-logo {
			width: 100% !important;
/* 			height: 90px !important; */
/* 			margin-top: 20px; */
		}
		.cashout-mob-wrap .cashout-box {
			height: auto;
			min-height: 320px;
		}
	}
	
	span.cashout_amount {
		color: #09c33e;
	}
	@media only screen and (max-width: 768px) {
	.cashout-mob-wrap .cashout-box p {
		text-transform: capitalize;
		font-size: 13px;
		min-height: 70px;
		height: 70px;
		max-height: 70px;
	}
	.cashout-mob-wrap .col-md-3.col-sm-3 {
		margin-bottom: 14px;
	}
	.cashout-mob-wrap .cashout-box {
		height: auto;
		min-height: 270px;
		padding: 20px 10px 10px;

	}
	.cashout-box img {
		width: 90px;
		height: 100px;
    		max-height: 90px;
	}
	.cashout-box h4 {
		padding: 10px 0;
		text-transform: uppercase;
		font-size: 14px;
		min-height: 50px;
		height: 50px;
		max-height: 50px;
	}
	.cashout-mob-wrap h4, .cashout-mob-wrap p {
		margin: 5px 0px;
	}
	.cashout-mob-wrap {
		float: left;
		width: 100%;
		display: flex;
	}
	.container.full.full-height.cashout {
		padding: 0px;
	}
	.cashout-mob-wrap .col-md-3.col-sm-3 {
		padding: 0px 5px;
		width: 50%;

	}
	h3.cashout-head {
		margin-bottom: 40px;
	}
	header {
		box-shadow: 0px 0px 10px 0px #dedddd;
		/* border-radius: 50px; */
		height: 60px;
		margin-bottom: 20px !important;
		padding-right: 20px;
		/* width: 80%; */
		margin: auto auto 50px auto;
	}
	}
	@media only screen and (max-width: 600px) {
		img.amazon-logo {
			margin-top: 27px !important;
		}
		img.edf-logo {
			margin-top: 12px;
		}
		.cashout-box img.amazon-logo, img.edf-logo {
			width: 140px !important;
			height: auto;
		}
		.container.full.full-height.cashout .row {
			margin: 0 auto;
		}
		.cashout-mob-wrap .cashout-box p {
			text-transform: capitalize;
			font-size: 13px;
			min-height: 70px;
			height: 70px;
			max-height: 70px;
		}
		.cashout-mob-wrap .col-md-3.col-sm-3 {
			margin-bottom: 14px;
		}
		.cashout-mob-wrap .cashout-box {
			height: auto;
			min-height: 270px;
			padding: 20px 10px 10px;

		}
		.cashout-box img {
			width: 90px;
			height: auto;
		}
		.cashout-box h4 {
			padding: 10px 0;
			text-transform: uppercase;
			font-size: 14px;
			min-height: 30px;
			height: 30px;
			max-height: 30px;
		}
		.cashout-mob-wrap h4, .cashout-mob-wrap p {
			margin: 5px 0px;
		}
		.cashout-mob-wrap {
			float: left;
			width: 100%;
			display: flex;
		}
		.container.full.full-height.cashout {
			padding: 0px;
		}
		.cashout-mob-wrap .col-md-3.col-sm-3 {
			padding: 0px 5px;
			width: 50%;

		}
		h3.cashout-head {
			margin-bottom: 40px;
		}
		header {
			box-shadow: 0px 0px 10px 0px #dedddd;
			/* border-radius: 50px; */
			height: 60px;
			margin-bottom: 20px !important;
			padding-right: 20px;
			/* width: 80%; */
			margin: auto auto 50px auto;
		}
	}
	h4.cashout-sub-head{
		font-family: 'Lato-Medium', sans-serif;

	}
	.container.full.full-height.cashout .row {
		margin-bottom: 42px;
	} 

</style>

<div class="container full full-height cashout">
	<div class="col-lg-12">
		<?php show_messsage('success'); ?>
		<?php show_messsage('error'); ?>
		<?php show_messsage('danger'); ?>
	</div>
	<!--  -->
	<form action="<?php echo BASE_URL ?>/inc/cashout_action" method="post" id="add_cashout_frm" name="add_cashout_frm">
		<div class="row">
			<?php $csrf->echoInputField(); ?>
			<div class="col-md-12 text-center pd-b-50">
				<h3 class="cashout-head"><b>Store Items</b></h3>
				<h4 class="cashout-sub-head">You Have <span class="cashout_amount"> (<?php echo $wallet_amount."$" ?>)</span> Available</h4><br>
			</div>
			<div class="col-md-offset-3 col-md-7 text-center pd-b-50 form-group">
				<label class="control-label col-md-5 cust_text_right" style = "padding: 5 0px ">Cashout Amount:</label>
				<div class="col-md-3">
					<?php 
					$amount_slab = array(5,10,15,100,300,500);
					?>
					<select name="cashout_amount" class="form-control">
						<option value="">Select</option>
						<?php foreach ($amount_slab as $key => $value) { 
							if ($wallet_amount >= $value) { ?>
								<option value="<?php echo $value ?>"><?php echo $value."$" ?></option> 
							<?php }
						} ?>
					</select> 
				</div>
			</div>
		</div>
		<div class="cashout-mob-wrap">
			<?php 
			$where = "`gift_cards`.card_type='Paypal' and status='New'";	
			$option = array(
				'columns'=>array('id')
			);
			$paypal_result = $db->findOne('gift_cards',$where,$option);	
			?>
			<div class="col-md-3 col-sm-3">
				<div class="cashout-box" style="opacity: <?php echo (empty($paypal_result)) ? '0.5' : ''; ?> ">
					<img src="img/paypal-logo.png">
					<h4><b>Paypal gift card</b></h4>                     
					<p>Get an paypal digital gift card for you to spend on their website.</p>    
					<?php if(empty($paypal_result)) { ?>
						<br>
						<span class="error">No gift card available</span>
					<?php } else { ?>
						<input type="submit" name="paypal_submit" class="cashout_btn" value="Cashout">
					<?php } ?>
				</div>
			</div>
			<?php 
			$where = "`gift_cards`.card_type='Amazon' and status='New'";	
			$option = array(
				'columns'=>array('id')
			);
			$amazon_result = $db->findOne('gift_cards',$where,$option);	 ?>
			<div class="col-md-3 col-sm-3">
				<div class="cashout-box" style="opacity: <?php echo (empty($amazon_result)) ? '0.5' : ''; ?> ">
					<img class="amazon-logo" src="img/amazon.png">
					<h4><b>Amazon gift card</b></h4>
					<p>Get an Amazon digital gift card for you to spend on their website.</p>   
					<?php if(empty($amazon_result)) { ?>
						<br>
						<span class="error">No gift card available</span>
					<?php } else { ?>
						<input type="submit" name="amazon_submit" class="cashout_btn" value="Cashout">
					<?php } ?>
				</div>
			</div>
		</div>

		<div class="cashout-mob-wrap">
			<?php 
			$where = "`gift_cards`.card_type='Steam' and status='New'";	
			$option = array(
				'columns'=>array('id')
			);
			$steam_result = $db->findOne('gift_cards',$where,$option);	?>
			<div class="col-md-3 col-sm-3">
				<div class="cashout-box" style="opacity: <?php echo (empty($steam_result)) ? '0.5' : ''; ?> ">
					<img src="img/steam.png">
					<h4><b>Steam gift card</b></h4>
					<p>Get a Steam digital gift card for you to spend on their website or app.</p>  
					<?php if(empty($steam_result)) { ?>
						<br>
						<span class="error">No gift card available</span>
					<?php } else { ?>
						<input type="submit" name="steam_submit" class="cashout_btn" value="Cashout">
					<?php } ?>						
				</div>
			</div>
			<?php 
			$where = "`gift_cards`.card_type='EDF' and status='New'";	
			$option = array(
				'columns'=>array('id')
			);
			$edf_result = $db->findOne('gift_cards',$where,$option); ?>
			<div class="col-md-3 col-sm-3">
				<div class="cashout-box" style="opacity: <?php echo (empty($edf_result)) ? '0.5' : ''; ?> ">
					<img class="edf-logo" src="img/edf.png">
					<h4><b>Donation to EDF</b></h4> 
					<p>Donate a dollar to this amazing charity. They work on global warming, oceans, and much more.</p>  
					<?php if(empty($edf_result)) { ?>
						<br>
						<span class="error">No gift card available</span>
					<?php } else { ?>
						<input type="submit" name="edf_submit" class="cashout_btn" value="Cashout">
					<?php } ?>
					<!-- <a href="#">Cashout</a> -->						
				</div>
			</div>
		</div>
	</form>
</div>
<!-- /.row-->
</div>
<!-- /.container-->

<!-- footer-->


<?php include 'include/footer.php';?>

<script type="text/javascript" language="javascript">
	$(document).ready(function () { 
		$('#add_cashout_frm').validate({
			rules: {
				cashout_amount: {
					required: true,
				}
			},
			messages: {
				cashout_amount: {
					required: "Please select cashout amount"
				}
			},
			submitHandler: function (form) {
				form.submit();
			}
		});
	});
</script>


<!-- /footer-->
</body>

</html>
