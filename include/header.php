<?php 

include("include/config.php");  
include("include/functions.php");

if (basename($_SERVER['PHP_SELF']) != "terms.php") {	
	if (!isset($_SESSION['security'])) {
		redirect("security");
	}
}

if (isset($_SESSION['user'])) {
	
	$where = "`users`.userId='".$_SESSION['user']."'";	
	$option = array(
		'join'=>"LEFT JOIN wallet ON `wallet`.userId = `users`.userId ",
	);
	$SelectProfileInfo = $db->findOne('users',$where,$option);	

	$referral_code = "";
	$wallet_amount = "0.00";
	$firstname = "";
	$user_name = "";
	if (!empty($SelectProfileInfo)) {
		$row = $SelectProfileInfo;
		$user_id				= $row['userId'];	
		// $user_img				= $row['img'];
		$user_name				= $row['userName'];
		$user_mobile			= $row['mobile'];
		$user_email				= $row['userEmail'];
		$b_month				= $row['b_month'];
		$b_year					= $row['b_year'];
		$gender					= $row['gender'];
		$city					= $row['city'];
		$country				= $row['country'];
		// $user_role        		= $row['user_role'];
		$referral_code        	= $row['referral_code'];
		$wallet_amount        	= (!empty($row['amount'])) ? $row['amount'] : "0.00";;
		$arr = explode(' ', $user_name);
		$firstname = $arr[0];
	}
}




if (isset($_SESSION['user'])) {		
	if ($referral_code == "") {
		$referral_code = get_referral_code($con);         
	}    

	$referral_link = BASE_URL."/signup?ref=".$referral_code;

	$ref_message_arr = get_referral_message($con,$referral_link);
	$ref_message=$ref_message_arr[1];
	$ref_message_twitter =$ref_message_arr[2];
}
  
?>
   
<html>
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<?php if (isset($_SESSION['user'])) { ?>
		<meta name="description" content="<?php echo "Buy Real Followers or Likes to up your Clout at Followmyass"; ?>">
		<meta property="og:title"         content="Follow My Ass" />
		<meta property="og:type"          content="website" />
		<meta property="og:url"           content="<?php echo $referral_link ?>" />
		<meta property="og:description"   content="<?php echo "Buy Real Followers or Likes to up your Clout at Followmyass"; ?>" />
		<meta property="og:image"         content="https://followmyass.com/img/followmyass.png" />
	<?php } ?>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/asRange.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/bootstrap-tagsinput.css">
	<link rel="icon" href="img/favicon.png" type="image/png">

	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<!-- <script src="js/jquery.js"></script> -->
	<script src="js/jquery-asRange.js"></script>
	<script src="js/slide-menu.js"></script>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
	<script src="https://cdn.jsdelivr.net/bxslider/4.2.5/jquery.bxslider.min.js"></script>
	<script src="js/bootstrap-tagsinput.js"></script>
	
	
	<script>
		$(document).ready(function() {
			$('.menu-link').bigSlide();
		});
	</script>
	
	<style>
	.modal-open {
	    overflow: hidden
	}

	.modal-open .modal {
	    overflow-x: hidden;
	    overflow-y: auto
	}

	.modal {
	    position: fixed;
	    top: 0;
	    left: 0;
	    z-index: 1050;
	    display: none;
	    width: 100%;
	    height: 100%;
	    overflow: hidden;
	    outline: 0;
/* 	    background: rgba(0,0,0,0.7); */
/* 	    box-shadow:1px 1px 2px rgba(0,0,0,0.8); */
	}

	.modal-dialog {
	    position: relative;
	    width: auto;
	    margin: .5rem;
	    pointer-events: none
	}

	.modal.fade .modal-dialog {
	    transition: -webkit-transform .3s ease-out;
	    transition: transform .3s ease-out;
	    transition: transform .3s ease-out, -webkit-transform .3s ease-out;
	    -webkit-transform: translate(0, -50px);
	    transform: translate(0, -50px)
	}

	@media (prefers-reduced-motion:reduce) {
	    .modal.fade .modal-dialog {
		transition: none
	    }
	}

	.modal.show .modal-dialog {
	    -webkit-transform: none;
	    transform: none
	}

	.modal-dialog-scrollable {
	    display: -ms-flexbox;
	    display: flex;
	    max-height: calc(100% - 1rem)
	}

	.modal-dialog-scrollable .modal-content {
	    max-height: calc(100vh - 1rem);
	    overflow: hidden
	}

	.modal-dialog-scrollable .modal-footer,
	.modal-dialog-scrollable .modal-header {
	    -ms-flex-negative: 0;
	    flex-shrink: 0
	}

	.modal-dialog-scrollable .modal-body {
	    overflow-y: auto
	}

	.modal-dialog-centered {
	    display: -ms-flexbox;
	    display: flex;
	    -ms-flex-align: center;
	    align-items: center;
	    min-height: calc(100% - 1rem)
	}

	.modal-dialog-centered::before {
	    display: block;
	    height: calc(100vh - 1rem);
	    content: ""
	}

	.modal-dialog-centered.modal-dialog-scrollable {
	    -ms-flex-direction: column;
	    flex-direction: column;
	    -ms-flex-pack: center;
	    justify-content: center;
	    height: 100%
	}

	.modal-dialog-centered.modal-dialog-scrollable .modal-content {
	    max-height: none
	}

	.modal-dialog-centered.modal-dialog-scrollable::before {
	    content: none
	}

	.modal-content {
	    position: relative;
	    display: -ms-flexbox;
	    display: flex;
	    -ms-flex-direction: column;
	    flex-direction: column;
	    width: 100%;
	    pointer-events: auto;
	    background-color: #fff;
	    background-clip: padding-box;
	    border: 1px solid rgba(0, 0, 0, .2);
	    border-radius: .3rem;
	    outline: 0;
	    font-size: 15px;
	}

	.modal-backdrop {
	    position: fixed;
	    top: 0;
	    left: 0;
	    z-index: 1040;
	    width: 100vw;
	    height: 100vh;
	    background-color: #000
	}

	.modal-backdrop.fade {
	    opacity: 0
	}

	.modal-backdrop.show {
	    opacity: .5
	}

	.modal-header {
	    display: -ms-flexbox;
	    display: flex;
	    -ms-flex-align: start;
	    align-items: flex-start;
	    -ms-flex-pack: justify;
	    justify-content: space-between;
	    padding: 1rem 1rem;
	    border-top-left-radius: .3rem;
	    border-top-right-radius: .3rem
	}

	.modal-header .close {
	    padding: 1rem 1rem;
	    margin: -1rem -1rem -1rem auto
	}

	.modal-title {
	    margin-bottom: 0;
	    line-height: 1.5;
	    font-size: 22px;
   	    color:#0074D9;
	}

	.modal-body {
	    position: relative;
	    -ms-flex: 1 1 auto;
	    flex: 1 1 auto;
	    padding: 1rem
	}

	.modal-footer {
	    display: -ms-flexbox;
	    display: flex;
	    -ms-flex-align: center;
	    align-items: center;
	    -ms-flex-pack: end;
	    justify-content: flex-end;
	    padding: 1rem;
	    border-top: 1px solid #dee2e6;
	    border-bottom-right-radius: .3rem;
	    border-bottom-left-radius: .3rem
	}

	.modal-footer>:not(:first-child) {
	    margin-left: .25rem
	}

	.modal-footer>:not(:last-child) {
	    margin-right: .25rem
	}

	@media (min-width:576px) {
	    .modal-dialog {
		max-width: 500px;
		margin: 1.75rem auto
	    }

	    .modal-dialog-scrollable {
		max-height: calc(100% - 3.5rem)
	    }

	    .modal-dialog-scrollable .modal-content {
		max-height: calc(100vh - 3.5rem)
	    }

	    .modal-dialog-centered {
		min-height: calc(100% - 3.5rem)
	    }

	    .modal-dialog-centered::before {
		height: calc(100vh - 3.5rem)
	    }

	    .modal-sm {
		max-width: 300px
	    }
	}

	@media (min-width:992px) {

	    .modal-lg,
	    .modal-xl {
		max-width: 800px
	    }
	}

	@media (min-width:1200px) {
	    .modal-xl {
		max-width: 1140px
	    }
	}
	
    .modal-body {
	max-height: 70vh;
	overflow: auto;
    }
	
    .modal-content {
        border-radius: 11px;
    }

    .modal-content img.x {
	border: 1px solid #2273D5;
	border-radius: 50%;
    }

    .modal-header {
	border-top-left-radius: 0px;
	border-top-right-radius: 0px;
	border-radius: 10px 10px 0 0;
    }

    .modal-header .modal-title{
	    color:#0074D9;
	}
    .spanWarning {
	width: calc(100% - 60px);
	float: right;
	display: block;
	padding: 7.5px 15px;
    }

    .modal-body hr {
	border: 0.5px solid #2273D5;
    }
	
    .d-none {
	display: none;
    }
	
@-webkit-keyframes bounceIn {
from,
20%,
40%,
60%,
80%,
to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
}

0% {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
}

20% {
    -webkit-transform: scale3d(1.1, 1.1, 1.1);
    transform: scale3d(1.1, 1.1, 1.1);
}

40% {
    -webkit-transform: scale3d(0.9, 0.9, 0.9);
    transform: scale3d(0.9, 0.9, 0.9);
}

60% {
    opacity: 1;
    -webkit-transform: scale3d(1.03, 1.03, 1.03);
    transform: scale3d(1.03, 1.03, 1.03);
}

80% {
    -webkit-transform: scale3d(0.97, 0.97, 0.97);
    transform: scale3d(0.97, 0.97, 0.97);
}

to {
    opacity: 1;
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
}
}

@keyframes bounceIn {
from,
20%,
40%,
60%,
80%,
to {
    -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
}

0% {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
}

20% {
    -webkit-transform: scale3d(1.1, 1.1, 1.1);
    transform: scale3d(1.1, 1.1, 1.1);
}

40% {
    -webkit-transform: scale3d(0.9, 0.9, 0.9);
    transform: scale3d(0.9, 0.9, 0.9);
}

60% {
    opacity: 1;
    -webkit-transform: scale3d(1.03, 1.03, 1.03);
    transform: scale3d(1.03, 1.03, 1.03);
}

80% {
    -webkit-transform: scale3d(0.97, 0.97, 0.97);
    transform: scale3d(0.97, 0.97, 0.97);
}

to {
    opacity: 1;
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
}
}

.bounceIn {
-webkit-animation-duration: 0.75s;
animation-duration: 0.75s;
-webkit-animation-name: bounceIn;
animation-name: bounceIn;
}

@-webkit-keyframes bounceOut {
  20% {
    -webkit-transform: scale3d(0.9, 0.9, 0.9);
    transform: scale3d(0.9, 0.9, 0.9);
  }

  50%,
  55% {
    opacity: 1;
    -webkit-transform: scale3d(1.1, 1.1, 1.1);
    transform: scale3d(1.1, 1.1, 1.1);
  }

  to {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }
}

@keyframes bounceOut {
  20% {
    -webkit-transform: scale3d(0.9, 0.9, 0.9);
    transform: scale3d(0.9, 0.9, 0.9);
  }

  50%,
  55% {
    opacity: 1;
    -webkit-transform: scale3d(1.1, 1.1, 1.1);
    transform: scale3d(1.1, 1.1, 1.1);
  }

  to {
    opacity: 0;
    -webkit-transform: scale3d(0.3, 0.3, 0.3);
    transform: scale3d(0.3, 0.3, 0.3);
  }
}

.bounceOut {
  -webkit-animation-duration: 0.75s;
  animation-duration: 0.75s;
  -webkit-animation-name: bounceOut;
  animation-name: bounceOut;
}
	
</style>

</head>

<body>
<input type="hidden" id="base_url" value="<?php echo BASE_URL ?>">
	<!-- menu -->

<!--<span class="open-menu">
	<p onclick="openNav()">&#9776;</p>-->
<!--</span>
<script>
function openNav() {
  document.getElementById("sideMenu").style.width = "250px";
}

function closeNav() {
  document.getElementById("sideMenu").style.width = "0";
}
</script>-->
  <!-- menu end -->
  
