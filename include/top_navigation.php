<style>
    .CampaignsMobile {
	   display: none;
    }
    @media(max-width: 1085px) {
       .CampaignsMobile {
	   display: block;
       }
    }
    .logout-text a{
	    margin: 0px 2px 0px 2px;
            padding: 10px 20px 4px 20px!important;
	}
</style>

<script>
 var url = window.location.href;
 if(url.includes('follow-youtube') || url.includes('follow-discord') || url.includes('follow-instagram')) {
 } else {
	 localStorage.removeItem('popup_status');
	 localStorage.removeItem('y_o_list');
	 localStorage.removeItem('d_o_list');
 }
</script>
<header>
<!--  <nav class="navbar navbar-inverse">
   <div class="">
		<div class="" style="padding:15px 25px">
			<div id="sideMenu" class="menu">
			  <div class="navbar-header">
				 
					  <a href="index" class="logo"><img src="img/followmyass.png" alt="Buy Real Followers "></a>
				   
					</div>   -->
					<span id="mobile-menu">



						<nav>
							<div class="toggle-wrap">
								<span class="toggle-bar"></span>
							</div>

						</nav>
						<aside style="background: #0c2f5a !important;">
							<a href="<?php echo BASE_URL ?>" class="menu_logo"><img src="img/logo-w.png" width="200px" alt="logo"></a>

							<ul style="    list-style-type: none !important;
							padding-top: 15px;
							padding-left: 60px;">
							<!--<li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></li>-->
							<li><a href="<?php echo BASE_URL ?>/buy-followers">Buy Followers</a></li>
							<li><a href="<?php echo BASE_URL ?>/follow-for-money">Follow For Money</a></li>
							<li><a href="<?php echo BASE_URL ?>/referrals">Referrals</a></li>
							
							<?php if(isset($_SESSION['user'])) { ?>
								<li class="CampaignsMobile"><a href="<?php echo BASE_URL ?>/campaigns">Campaigns</a></li>
								<li><a href="<?php echo BASE_URL ?>/wallet">Wallet</a></li>
								<li><a href="<?php echo BASE_URL ?>/logout">Logout</a></li>
							<?php } else { ?>									
								<li><a href="<?php echo BASE_URL ?>/login">Login</a></li>
								<li><a href="<?php echo BASE_URL ?>/signup">Signup</a></li> 
							<?php } ?>
						</ul>
					</aside>







	<!---------	<a href="#menu" class="menu-link">&#9776;</a>
						<nav id="menu" class="panel" role="navigation">
							<a href="<?php echo BASE_URL ?>" class="mobile-logo"><img src="img/followmyass.png" width="200px" alt="followmyass2"></a>
							<ul>
								<!--<li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></li>-->
				<!--------		<li><a href="buy-followers">BUY FOLLOWERS</a></li>
								<li><a href="follow-for-money">FOLLOW FOR MONEY</a></li>
								<li><a href="referrals">REFERRALS</a></li>
								<?php if(isset($_SESSION['user'])) { ?>
									<li><a href="wallet">WALLET</a></li>
								<?php } ?>
							</ul>
						</nav>---------->
					</span>
					<a href="<?php echo BASE_URL ?>" class="logo"><img src="img/followmyass.png" width="200px" alt="followmyass3"></a>
					<span class="blue-line"></span>
					<span id="desktop-menu">
						<ul class="nav navbar-nav">
							<!--<li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></li>-->
							<li><a href="<?php echo BASE_URL ?>/buy-followers">Buy Followers</a></li>
							<li><a href="<?php echo BASE_URL ?>/follow-for-money">Follow For Money</a></li>
							<li><a href="<?php echo BASE_URL ?>/referrals">Referrals</a></li>
							<?php if(isset($_SESSION['user'])) { ?>
								<li><a href="<?php echo BASE_URL ?>/wallet">Wallet</a></li>
								<!-- <li><a href="<?php echo BASE_URL ?>/logout">Logout</a></li> -->
							<?php } ?>
						</ul>
					</span>



					<!-- <div class="login-btn"> 
						<ul class="nav navbar-nav">
							<?php if(isset($_SESSION['user'])) { ?>
								<div class="active-user">
									<div class="row">
										<div class="col-md-6">
											<a href="<?php echo BASE_URL ?>/profile" class="u-name"><?php echo $user_name;?></a><br>
											<p class="u-amount-mbl"><?php echo $wallet_amount."$" ?></p>
										</div>
										<div class="col-md-6">
											<img src="img/jon.png" width="55px">
										</div>
									</div>
								</div> 
							<?php } else {  ?>
								<li><a style="color: #fff" href="<?php echo BASE_URL ?>/login">Login</a></li>
								<li><a href="<?php echo BASE_URL ?>/signup">Register</a></li>
							<?php }   ?>   
						</ul>    
					</div>   -->
					<?php if(isset($_SESSION['user'])) { ?>
						<div class="pull-right dek-login-btn">
							<div class="dropdown">
								<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
									<div class="col-md-6 cust_name">
										<!-- <a href="javascript:void(0)" class="u-name"><?php echo $user_name;?></a><br> -->
										<p class="u-name"><?php echo $user_name;?></p>
										<p class="u-amount-mbl"><?php echo $wallet_amount."$" ?></p>
									</div>
									<div class="col-md-6 cust_name_img">
										<img src="<?php echo BASE_URL."/img/profile1.png" ?>" width="55px">&nbsp;
										<span class="caret"></span>
									</div>
								</button>
								<ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style = "text-align: left">
									<li role="presentation">
										<a role="menuitem" tabindex="-1" href="<?php echo BASE_URL ?>/profile">My Profile</a>
									</li>
									<li role="presentation">
										<a role="menuitem" tabindex="-1" href="<?php echo BASE_URL ?>/campaigns">Campaigns</a>
									</li>
									<li role="presentation" class="divider" style = "margin: 0px"></li>
									<li role="presentation" style="text-align: left; vertical-align: middle" class="logout-text">
										<a role="menuitem" tabindex="-1" href="<?php echo BASE_URL."/logout" ?>">Logout</a>
									</li>
								</ul>
							</div>
						</div>
					<?php } else { ?>
						<div class="login-btn"> 
							<ul class="nav navbar-nav">
								<li><a style="color: #fff" href="<?php echo BASE_URL ?>/login">Login</a></li>
								<li><a href="<?php echo BASE_URL ?>/signup">Register</a></li>
							</ul>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</nav>

	<!--FOR MBL LOGIN BTN & ACTIVE USER-->

	<div class="login-btn-mbl">
		<!--<ul class="nav navbar-nav">-->
			<!--    <li><a style="color: #fff" href="login">LOGIN</a></li>-->
			<!--    <li><a href="signup">REGISTER</a></li>-->

			<!-- </ul>-->

			<!--///active- user-mbl\\\\\---->


			<div class="active-user-mbl">

				<?php if(isset($_SESSION['user'])) { ?>
					<span>						
						<p class="u-name-mbl">
							<a href="<?php echo BASE_URL ?>/profile"><?php echo $user_name;?></a></p>
							<p class="u-amount-mbl"><?php echo $wallet_amount."$" ?></p>
						</span>
						<span>
							<img src="img/jon.png" width="55px">
						</span>
					<?php } else { ?>
						<a class="u-name-mbl" href="<?php echo BASE_URL ?>/login">Login</a>
						<a class="u-name-mbl register-mob" href="<?php echo BASE_URL ?>/singup">Register</a>
					<?php } ?>
				</div>

			</div>

			<!--///active-user-end\\\\\---->

		</div> 
		<!--FOR MBL LOGIN BTN & ACTIVE USER-->                







		<script>


			(function() {
				$('.toggle-wrap').on('click', function() {
					$(this).toggleClass('active');
					$('nav').toggleClass('nav-active');
  //  $('aside').animate({width: 'toggle'}, 200);
  $('aside').toggleClass('hamburger-nav');
});
			})();
		</script>


	</header>

<!-- 	<div class="dropdown">
		<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
			<div class="col-md-6">
				<a href="<?php echo BASE_URL ?>/profile" class="u-name"><?php echo $user_name;?></a><br>
				<p class="u-amount-mbl"><?php echo $wallet_amount."$" ?></p>
			</div>
			<div class="col-md-6">
				<img src="img/jon.png" width="55px">
			</div>
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
			<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Menu item 1</a></li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Menu item 2</a></li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Menu item 3</a></li>
			<li role="presentation" class="divider"></li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Menu item 4</a></li>
		</ul>
	</div> -->
