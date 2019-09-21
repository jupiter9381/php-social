<!--header-->
<?php include 'include/header.php';


if (isset($_SESSION['user'])) { 
    $where = "user_id='".$_SESSION['user']."'"; 
    $option = array(
        'columns'=>array('*')
    );
    $OrderInfo = $db->findOne('orders',$where,$option); 
}

include("include/top_navigation.php"); ?>

<style>

    @media only screen and (max-width: 769px) {
        .buy-followers-page .row-id-3.mobile-row {
            margin-bottom: 30px;
        }

        .buy-followers-page .chat-sm-icon img {
            margin-left: auto;
            max-width: 35px;
            float: right;
        }

        .buy-followers-page .chat-sm-icon {
            margin: 0px 0px 15px;
        }

        .buy-followers-page .row.row-id-inner-2 img {
            position: relative;
            right: -11px;
        }

        .buy-followers-page .row.row-id-inner-2 {
            margin-top: 0px;
            margin-bottom: 15px;
            position: relative;
            left: 0px;
        }

        .buy-followers-page .row.row-id-2.desktop-row {
            display: none;
        }
        .post-item:nth-child(even) {
    margin-right: 0;
}

        .post-item {
            display: flex;
            flex-direction: column;
            justify-content: center;

            width: 45%;
            height: 140px;
            margin-right: 4px;
            display: inline-block;

            margin-bottom: 24px;
            margin-right: 1rem;

        }
    }

    @media only screen and (min-width: 769px) {
        .buy-followers-page .row.row-id-3.mobile-row {
            display: none;
        }

        .post-item {
            display: flex;
            flex-direction: column;
            justify-content: center;

            width: 32%;
            height: 140px;
            margin-right: 4px;
            display: inline-block;

            margin-bottom: 24px;
            margin-right: 1rem;

        }
    }

    #posts {
        display: flex;
        flex: 1;
            justify-content: center;
        flex-wrap: wrap;
        align-content: baseline;
        padding-top: 2rem;
    }
    
    .selected-post {
        border: 2px solid white;
    }
    
    .back-first{
        color: #0073d9;
        font-size: 18px;
        font-weight: 600;
        background: #fff;
        border-radius: 50px;
    }

    div#accordion {
        margin-bottom: 70px;
        width: 80%;
        margin: 0 auto;
    }

    .accordianheader {
        color: #000;
        background: #fff;
        padding: 15px 35px;
        text-align: left;
    }

    .accordianbody {
        background: #f4f4f4;
    }

    .accordianbody ul {
        margin: 0;
        list-style: none;
        padding: 0;
    }

    .accordianbody ul li {
        padding: 10px;
        border-bottom: 1px solid lightgrey;
    }

    .ui-accordion-header-active h3 {
        color: #fff !important;
    }

    i {
        position: absolute;
        right: 20px;
        top: 14px;
        -webkit-transition: all 300ms ease-in 0s;
        -moz-transition: all 300ms ease-in 0s;
        -o-transition: all 300ms ease-in 0s;
        transition: all 300ms ease-in 0s;
    }

    .ui-accordion-header-active h3 {
        color: #fff;
    }

    .ui-accordion .ui-accordion-content p {
        text-align: center;
        font-size: 14px;
        font-family: 'Lato';
        font-weight: 600;
    }

    .ui-state-active i {
        color: #ACD4CE;
        -webkit-transform: rotate(180deg);
        -moz-transform: rotate(180deg);
        -o-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg);
    }

    .ui-accordion .ui-accordion-header .ui-accordion-header-icon {
        display: none;
    }

    .accordianheader h3 {
        font-size: 14px;
        font-family: 'Lato' !important;
        margin: 0 auto;
        color: #0074d9;
        line-height: 23px;
        word-spacing: 1px;
        font-weight: 600;
    }

    .ui-accordion .ui-accordion-icons:first-child h3 {
        line-height: 17px;
        position: relative;
        top: -4px;
    }

    h3.small-head-acc {
        font-size: 10px;
    }

    .ui-accordion-header-active {
        background: #2273d5;
        color: #fff;
    }

    .ui-accordion .ui-accordion-icons {
        border: none;
        -webkit-box-shadow: 0px 0px 10px 0px #dedddd;
        box-shadow: 0px 0px 10px 0px #dedddd;
        margin: 10px 0px 0px 0px;
        height: 51px;
        text-align: center;
        padding: 11px 10px;
        border: 2px solid #0074d9 !important;
        border-radius: 11px;
    }

    .accordianbody {
        background: transparent;
        border: none;
    }

    .ui-state-active img.img-angle-down {
        -webkit-transform: rotate(180deg);
        -moz-transform: rotate(180deg);
        -o-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg);
    }

    .accor-head-wrap {
        float: left;
        width: 100%;
    }

    img.img-angle-down {
        position: absolute;
        margin-left: -14px;
        max-width: 16px;
        margin-top: 8px;
    }

    .ui-accordion .ui-accordion-content {
        padding: 15px;
        border-top: 0;
        overflow: auto;
    }

    .ui-state-active img.img-angle-down {
        max-width: 14px;
        margin-top: 7px;
    }
    
    .social-toggled-wrap-buy-followers  {
        position: relative;
    }

    .row-buy-followers {
        margin-top: 19px!important;
        border: 4px solid #3494e2;
        width: 100%;
        margin: 0;
        border-radius: 15px;
    }

    .row-buy-followers::before {
        content: '';
        border: 12px solid transparent;
        border-bottom-color: #3494e2;
        position: absolute;
        top: -24px;
        right: 40px;
        z-index: 10;
    }

    .row-buy-followers::after {
        content: '';
        border: 12px solid transparent;
        border-bottom-color: #fff;
        position: absolute;
        top: -19px;
        right: 40px;
        z-index: 10; 
    }

    .row-buy-followers::after {
        content: '';
        border: 12px solid transparent;
        border-bottom-color: #fff;
        position: absolute;
        top: -19px;
        right: 40px;
        z-index: 10;
    }

    .row-buy-followers .close {
        top: 2px!important;
        right: 12px!important;
    }

    .checkbox-custom-label-text {
        position: relative;
        bottom: 10;
        FONT-WEIGHT: 800;
    }

    .row-inner-buy-followers {
        margin: 0!important;
    }

    .form-group-buy-followers {
        margin: 0;
        padding: 30px 0 0 0;
    }

    .pay01,
    .pay02,
    .pay03 {
        display: none;
    }

    .row.full-price {
        min-height: 150px!important;
    }

    .row.pay-for-the-followers {
        margin: 40px 0px 50px!important;
    }

    .row.checkout-using {
        margin-bottom: 90px!important;
    }

    .imgMobileHidden {
        display: block;
    }

    @media(max-width: 1085px) {
        .imgMobileHidden {
            display: none;
        }
    }

    .row-id-5 {
        justify-content: center;
        display: flex;
    }

    @media only screen and (max-width: 768px) {
        .buy-followers-page .row.row-id-5 .social-media-toggles {
            min-height: 175px;
            max-width: 100%;
            margin: 0 auto;
        }
    }

    @media only screen and (max-width: 768px) {
        .buy-followers-page .row.row-id-5 .zx {
            min-height: 175px;
            max-width: 100%;
            margin: 0 auto;
        }
    }

    @media only screen and (max-width: 768px) {
        .row-id-5 {
            display: block;
        }
        .buy-followers-page-id .social-media-toggles-col {
            width: 50%;
        }
    }
    @media only screen and (max-width: 769px) and (min-width: 578px){
        .buy-followers-page .row.row-id-5 .social-img {
            max-width: 100%;
            width: 150px!important;
        }
    }

    @media only screen and (max-width: 629px) {
        .form-group-buy-followers {
            padding: 25px 0 0 0;
        }
        .form-group-buy-followers .checkbox-custom-label {
            font-size: 15px;
            margin: 0;
        }
        .row-buy-followers::before {
            content: '';
            border: 10px solid transparent;
            border-bottom-color: #3494e2;
            position: absolute;
            top: -20px;
            right: 45px;
            z-index: 10;
        }
        .row-buy-followers::after {
            content: '';
            border: 10px solid transparent;
            border-bottom-color: #fff;
            position: absolute;
            top: -15px;
            right: 45px;
            z-index: 10;
        }
    }

    @media only screen and (max-width: 450px) and (min-width: 400px) {
        .social-toggled-wrap-discord {
            left: auto!important;
            right: 0px!important;
        }
    }
    @media only screen and (max-width: 768px) {
        .social-toggled-wrap-discord {
            left: auto!important;
            right: 0px!important;
        }
        .close-discord {
            right: 14px!important;
        }
    }
    @media only screen and (max-width: 450px) and (min-width: 400px) {
        .social-toggled-wrap-discord {
            left: auto!important;
            right: 0px!important;
        }
    }
    @media only screen and (max-width: 992px) and (min-width: 770px) {
        .pay-ment-col a.icon-payment-btns {
            padding: 35px 10px;
        }
    }
    @media only screen and (max-width: 766px) and (min-width: 750px) {
        .buy-followers-page-id .row.row-id-10 img.payment-btn-img {
            max-width: 130px;
        }
        .pay-ment-col a.icon-payment-btns {
            padding: 20px 30px!important;
            top: 0px!important
        }
    }
    @media only screen and (max-width: 502px) and (min-width: 426px) {
        .buy-followers-page-id .row.row-id-10 img.payment-btn-img {
            max-width: 95px;
        }
        .pay-ment-col a.icon-payment-btns {
            padding: 14px 15px!important;
            top: 0px!important
        }
    }
    @media only screen and (max-width: 425px) and (min-width: 391px) {
        .buy-followers-page-id .row.row-id-10 img.payment-btn-img {
            max-width: 90px;
        }
        .pay-ment-col a.icon-payment-btns {
            padding: 14px 10px!important;
        }
    }
    @media only screen and (max-width: 375px) and (min-width: 1px) {
        .pay-ment-col a.icon-payment-btns {
            padding: 14px 6px!important;
        }
    }
    .pay-ment-col a.icon-payment-btns {
        top: 0px!important
    }
    @media only screen and (max-width: 375px) and (min-width: 1px) {
        .social-toggled-wrap-buy-followers {
            top: 4px
        }
    }
    @media only screen and (max-width: 425px) and (min-width: 376px) {
        .social-toggled-wrap-buy-followers {
            top: 3px
        }
    }
    @media only screen and (max-width: 1023px) and (min-width: 426px) {
        .social-toggled-wrap-buy-followers {
            top: 2px
        }
    }
    @media only screen and (max-width: 30000px) and (min-width: 1024px) {
        .social-toggled-wrap-buy-followers {
            top: 1px
        }
    }
/*  .buy-followers-page-id .buy-followers-page .row.row-id-5 .social-toggled-wrap .triggred-fade {
        padding: 5px;
    }
    .buy-followers-page-id .buy-followers-page .row.row-id-5 .social-media-toggles-col .social-toggled-wrap .triggred-fade {
        padding: 8.5px;
    }
    .row.row-id-5 .social-toggled-wrap .row.row-inner-1 {
        min-height: 93px;
    }
    .buy-followers-page .row.row-id-5 .social-toggled-wrap {
        min-height: 155px;
        } */
        @media only screen and (min-width: 768px) {
            .buy-followers-page .checkbox-custom + .checkbox-custom-label:before {
                content: '';
                border: 2px solid #868686;
                background: #ffffff;
                display: inline-block;
                vertical-align: middle;
                width: 19px;
                height: 20px;
                padding: 1px;
                margin-right: 10px;
                text-align: center;
                line-height: 15px;
                border-radius: 100px;
                margin-bottom: 4px!important;
            }
        }
        @media only screen and (max-width: 769px) {
            .buy-followers-page .checkbox-custom + .checkbox-custom-label:before {
                content: '';
                border: 2px solid #868686;
                background: #ffffff;
                display: inline-block;
                vertical-align: middle;
                width: 17px!important;
                height: 18px!important;
                padding: 1px;
                margin-right: 10px;
                text-align: center;
                line-height: 15px;
                border-radius: 100px;
                margin-bottom: 3px!important;
            }
        }
        
        @media only screen and (min-width: 350px) and (max-width: 425px) {
          .buy-followers-page-id .row.row-id-10 img.payment-btn-img {
            max-width: 90px!important;
        }
    }
    @media only screen and (min-width: 482px) and (max-width: 502px) {
      .buy-followers-page-id .row.row-id-10 img.payment-btn-img {
        max-width: 115px!important;
    }
}
@media only screen and (max-width: 629px) and (min-width: 503px) {
    .buy-followers-page-id .row.row-id-10 img.payment-btn-img {
        max-width: 130px;
    }
    .pay-ment-col a.icon-payment-btns {
        padding: 15px 20px!important;
        top: 0px!important
    }
} 
@media only screen and (min-width: 503px) and (max-width: 529px) {
  .buy-followers-page-id .row.row-id-10 img.payment-btn-img {
    max-width: 115px!important;
}
}
@media only screen and (min-width: 530px) and (max-width: 629px) {
  .buy-followers-page-id .row.row-id-10 img.payment-btn-img {
    max-width: 120px!important;
}
.pay-ment-col a.icon-payment-btns {
    padding: 20px 20px!important;
}
} 
</style>

<!--header-end-->
<title>Buy Real Followers, Likes, & Views | FollowMyAss.com</title>
<meta name="description" content="Buy Real YouTube, Instagram, and Discord Followers, Likes, and Views. We are the least expensive and best place on the market. We have advanced security that restricts bot access & preserves the integrity of your follower base.">
<meta name="keywords" content="about followmyass.com,about us">
<link rel="canonical" href="https://followmyass.com/buy-followers" /> 
</head>
<link rel="stylesheet" href="/css/asRange.css">
<script src="/js/jquery-asRange.js"></script>

<form action="<?php echo BASE_URL."/inc/order_action.php"; ?>" name="frm_buyfollower" id="frm_buyfollower" method="post">
    <?php //$csrf->echoInputField(); ?>
    <?php 
    $token_arr = $csrf->ManualTokenGen(); 
    $token_name = (isset($token_arr['name'])) ? $token_arr['name'] : "";
    $token_val = (isset($token_arr['token'])) ? $token_arr['token'] : "";
    ?>
    <input type="hidden" name="<?php echo $token_name ?>" id="token_val" value="<?php echo $token_val ?>">
    <div class="container full-height buy-followers-page-id">
        <div class="col-lg-12">
            <?php show_messsage('success'); ?>
            <?php show_messsage('error'); ?>
            <?php show_messsage('danger'); ?>
        </div>
        <div class="col-md-12">
            <div id="err_buy_follower" class="alert" style="display: none">
                <button type="button" class="close">&times;</button>
                <img class="img-responsive error-logo-img" src="img/error-pencil.png" />
               <span>ENTER INFORMATION BELOW</span>
                <span id="err_msg"></span>
            </div>
        </div>
        <div class="buy-followers-page">
            <?php if(empty($OrderInfo)) { ?>
                <div class="row row-id-1">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading-title">
                        <h3>Scroll Down to Purchase</h3>
                        <div class="row row-id-inner-1">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 click-to-scroll">
                                <img class="img-responsive" src="<?php echo BASE_URL ?>/img/scroll-down.png" />
                            </div>
                        </div>
                        <div class="row row-id-inner-2">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 chat-sm-icon">
                                <a href="<?php echo BASE_URL ?>/faq" target="_blank">
                                    <img class="img-responsive" src="<?php echo BASE_URL ?>/img/chat-sm-icon.png" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-id-2 desktop-row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 icon-bn-text">
                        <div class="icon-bn-text wrap">
                            <img class="img-responsive icons" src="<?php echo BASE_URL ?>/img/icon-bn-1.png" />

                            <div class="icon-banner">
                                <h4>100% Real Followers
                                and Real Likes</h4>
                                <p>(No bots)</p>

                            </div>
                            <p class="icon-bn-text home-text">
                                You get real followers from our marketplace with advanced security that restricts bot access & preserves the integrity of your follower base.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 icon-bn-text">
                        <div class="icon-bn-text wrap">
                            <img class="img-responsive icons" src="<?php echo BASE_URL ?>/img/icon-bn-2.png" />

                            <div class="icon-banner">
                                <h4>Why Choose FollowMyAss.com?</h4>
                            </div>
                            <p class="icon-bn-text home-text">
                                We provide real followers, have excellent security, and give you control over your orders. Unlike most other websites, all the followers, likes & views are real people that you can view and verify. 
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 icon-bn-text">
                        <div class="icon-bn-text wrap">
                            <img class="img-responsive icons" src="<?php echo BASE_URL ?>/img/icon-bn-3.png" />

                            <div class="icon-banner">
                                <h4>Safety and Privacy</h4>

                            </div>
                            <p class="icon-bn-text home-text">
                                Security is our top priority.
                                We will never share your
                                information with third
                                parties and all payments
                                ﬂow through Stripe and
                                Paypal.
                            </p>
                        </div>
                    </div>

                </div>
            <?php } ?>
            <div class="row row-id-3 mobile-row">
                <?php if(empty($OrderInfo)) { ?>
                    <div id="accordion" class="ui-accordion ui-widget ui-helper-reset" role="tablist">
                        <div class="accordianheader ui-accordion-header ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-5" aria-controls="ui-id-6" aria-selected="false" aria-expanded="false" tabindex="-1">
                            <div class="accor-head-wrap">
                                <a href="JavaScript:void(0);">
                                    <h3>
                                    100% Real Followers and Real Likes</h3>
                                    <h3 class="small-head-acc">
                                    (No bots)</h3>
                                </a>
                            </div>
                            <img class="img-angle-down" src="<?php echo BASE_URL ?>/img/drop-down-arrow-blue-icon.png"></img>
                        </div>
                        <div class="accordianbody ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-id-6" aria-labelledby="ui-id-5" role="tabpanel" aria-hidden="true" style="display: none;">
                            <p>
                                You get real followers from our marketplace with advanced security that restricts bot access & preserves the integrity of your follower base.
                            </p>
                        </div>
                        <div class="accordianheader ui-accordion-header ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-5" aria-controls="ui-id-6" aria-selected="false" aria-expanded="false" tabindex="-1">
                            <div class="accor-head-wrap">
                                <a href="JavaScript:void(0);">
                                    <h3>
                                    Why Choose FollowMyAss.com?</h3>
                                </a>
                            </div>
                            <img class="img-angle-down" src="<?php echo BASE_URL ?>/img/drop-down-arrow-blue-icon.png"></img>
                        </div>
                        <div class="accordianbody ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-id-6" aria-labelledby="ui-id-5" role="tabpanel" aria-hidden="true" style="display: none;">
                            <p>
                             We provide real followers, have excellent security, and give you control over your orders. Unlike most other websites, all the followers, likes & views are real people who you can view and verify. 
                         </p>
                     </div>
                     <div class="accordianheader ui-accordion-header ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-5" aria-controls="ui-id-6" aria-selected="false" aria-expanded="false" tabindex="-1">
                        <div class="accor-head-wrap">
                            <a href="JavaScript:void(0);">
                                <h3>
                                Safety and Privacy</h3>
                            </a>
                        </div>
                        <img class="img-angle-down" src="<?php echo BASE_URL ?>/img/drop-down-arrow-blue-icon.png"></img>
                    </div>
                    <div class="accordianbody ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-id-6" aria-labelledby="ui-id-5" role="tabpanel" aria-hidden="true" style="display: none;">
                        <p>
                            Security is our top priority. We will never share your information with third parties and all payments ﬂow through Stripe and Paypal.
                        </p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row row-id-4">
<div id="social_err_follower" class="alert alert-danger" style="display: none;">
                <button type="button" class="close">×</button>
                <span id="social_err_msg"><b></b></span>
            </div>


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading-title-2">
                <h3 style="margin-bottom: 20px">Choose a Platform</h3>
            </div>
        </div>
        <div class="row row-id-5">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 social-media-toggles-col">
                <div class="social-media-toggles social-media-toggles2" data-platform_id="1">
                    <img class="img-responsive social-toggle-icons social-img" src="<?php echo BASE_URL ?>/img/insta-icon.png" />
                    <div class="image-overlay">
                    </div>
                    <p class="social-toggle-title">Instagram</p>
                </div>
                <div class="social-toggled-wrap">
                    <div class="row row-inner-1">
                        <span class="close">x</span>
                        <div data-platform_item="1" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 triggred-fade multi-pop-trig-insta">
                            <img class="img-responsive like-toggled-icons" src="<?php echo BASE_URL ?>/img/social-toggled-icons1.png" />
                            <p class="toggled-icons-title">POST LIKES</p>
                        </div>
                            <!---
                                    <div data-platform_item = "2" class="col-lg-3 col-md-3 col-sm-3 col-xs-3 triggred-fade">
                                        <img class="img-responsive like-toggled-icons" src="<?php echo BASE_URL ?>/img/social-toggled-icons1.png" />
                                        <p class="toggled-icons-title">PAGE LIKES</p>
                                    </div>
                                    --->
                                    <div data-platform_item="3" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 triggred-fade single-pop-trig-insta">
                                        <img class="img-responsive like-toggled-icons" src="<?php echo BASE_URL ?>/img/social-toggled-icons2.png" />
                                        <p class="toggled-icons-title">FOLLOWERS</p>
                                    </div>
                                    <div data-platform_item="4" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 triggred-fade multi-pop-trig-insta multi-pop-trig-insta03">
                                        <img class="img-responsive like-toggled-icons" src="<?php echo BASE_URL ?>/img/social-toggled-icons3.png" />
                                        <p class="toggled-icons-title">VIEWS</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 social-media-toggles-col">
                            <div class="social-media-toggles" data-platform_id="2">
                                <img class="img-responsive social-toggle-icons social-img" src="<?php echo BASE_URL ?>/img/disc-icon.png" />
                                <div class="image-overlay">
                                </div>
                                <p class="social-toggle-title social-toggle-title-discord">Discord</p>
                            </div>
                            <div class="social-toggled-wrap social-toggled-wrap-discord">
                                <div class="row row-discord row-inner-1">
                                    <span class="close close-discord">x</span>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                                <!---    <img class="img-responsive like-toggled-icons" src="<?php echo BASE_URL ?>/img/social-toggled-icons1.png" />
                                    <p class="toggled-icons-title">LIKES</p> --->
                                </div>
                                <div data-platform_item="5" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 triggred-fade single-pop-trig-insta">
                                    <img class="img-responsive like-toggled-icons" src="<?php echo BASE_URL ?>/img/social-toggled-icons2.png" />
                                    <p class="toggled-icons-title">MEMBERS</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <!---       <img class="img-responsive like-toggled-icons" src="<?php echo BASE_URL ?>/img/social-toggled-icons3.png" />
                                    <p class="toggled-icons-title">VIEWS</p>  --->
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 social-media-toggles-col">
                        <div class="social-media-toggles" data-platform_id="4">
                            <img class="img-responsive social-toggle-icons social-img" src="<?php echo BASE_URL ?>/img/yout-icon.png" />
                            <div class="image-overlay">
                            </div>
                            <p class="social-toggle-title">Youtube</p>

                        </div>
                        <div class="social-toggled-wrap">
                            <div class="row row-inner-1">
                                <span class="close">x</span>
                                <div data-platform_item="6" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 triggred-fade multi-pop-trig-insta ">
                                    <img class="img-responsive like-toggled-icons" src="<?php echo BASE_URL ?>/img/social-toggled-icons1.png" />
                                    <p class="toggled-icons-title"> LIKES</p>
                                </div>
                                <div data-platform_item="3" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 triggred-fade single-pop-trig-insta">
                                    <img class="img-responsive like-toggled-icons" src="<?php echo BASE_URL ?>/img/social-toggled-icons2.png" />
                                    <p class="toggled-icons-title">FOLLOWERS</p>
                                </div>
                                <div data-platform_item="4" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 triggred-fade multi-pop-trig-insta multi-pop-trig-insta3">
                                    <img class="img-responsive like-toggled-icons" src="<?php echo BASE_URL ?>/img/social-toggled-icons3.png" />
                                    <p class="toggled-icons-title">VIEWS</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 social-media-toggles-col">
                        
                        <div class="zx">
                            
                            <img class="img-responsive social-toggle-icons social-img" src="<?php echo BASE_URL ?>/img/CominSoon2.png" />
                            <div class="image-overlay">
                            </div>
                            <p class="social-toggle-title">Coming Soon</p>
                            
                        </div>

                        <div class="social-toggled-wrap" style="display: none !important">
                            <div class="row row-inner-1">
                                <span class="close">x</span>
                                <div data-platform_item="6" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 triggred-fade">
                                    <img class="img-responsive like-toggled-icons" src="<?php echo BASE_URL ?>/img/social-toggled-icons1.png" />
                                    <p class="toggled-icons-title">LIKES</p>
                                </div>
                                <div data-platform_item="3" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 triggred-fade">
                                    <img class="img-responsive like-toggled-icons" src="<?php echo BASE_URL ?>/img/social-toggled-icons2.png" />
                                    <p class="toggled-icons-title">FOLLOWERS</p>
                                </div>
                                <div data-platform_item="4" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 triggred-fade multi-pop-trig-insta3">
                                    <img class="img-responsive like-toggled-icons" src="<?php echo BASE_URL ?>/img/social-toggled-icons3.png" />
                                    <p class="toggled-icons-title">VIEWS</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





















                <div class="row-id-popups">
                    <div class="row row-new-1 social-toggle-expand first-slide-popup insta-single-pop" style="display:none;">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 carousel-col">

                            <div class="row social-media-exapnd-box-bg 1">
                                <a class="close-btn-action" href="javascript:void(0)"><img class="close-btn-img" src="img/tiny-close-png.png"></a>
                                <div class="row wrap-social-media-exapnd">

                                    <div class="row row-top-1">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 social-media-exapnd-steps left-right-cols">
                                            <span class="exapnd-steps-content">1</span>
                                            <h4 class="pop-expoand-title">
                                              Username

                                            </h4>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 social-media-exapnd-steps mid-cols"></div>


                                    </div>
                                    <div class="row inser-user-name">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                            <div class="form-group buy-insert-user">
                                                <input type="text" class="form-control input-usr username_single" id="usr" placeholder="Instagram Username" onfocus="this.placeholder = ''">
                                                <input type="button" class="btn btn-info continue-single" value="Continue">

                                            </div>


                                        </div>

                                    </div>


                                </div>





                            </div>


                        </div>



                    </div>


                    <div class="row row-new-1 social-toggle-expand first-slide-popup insta-multi-pop" style="display: none;">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 carousel-col">




                            <div class="row social-media-exapnd-box-bg">
                                <a class="close-btn-action" href="javascript:void(0)"><img class="close-btn-img" src="img/tiny-close-png.png" /></a>
                                <div class="row wrap-social-media-exapnd">

                                    <div class="row row-top-1">

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 social-media-exapnd-steps left-right-cols">
                                            <span class="exapnd-steps-content goto-next">1</span>
                                            <h4 class="pop-expoand-title">
                                                Username

                                            </h4>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 social-media-exapnd-steps mid-cols"></div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 social-media-exapnd-steps left-right-cols">
                                            <span class="exapnd-steps-content goto-prev">2</span>
                                            <h4 class="pop-expoand-title" >
                                                Select Posts

                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row inser-user-name">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                            <div class="form-group buy-insert-user">
                                                <input type="text" class="form-control input-usr username_multi" id="usr" placeholder="Instagram Username" onfocus="this.placeholder = ''">
                                                <input type="button" class="btn btn-info continue-btn" value="Continue">

                                            </div>


                                        </div>

                                    </div>


                                </div>





                            </div>


                        </div>



                    </div>


                    <div class="row row-new-1 social-toggle-expand second-slide-popup insta-multi-pop" style="display: none;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 carousel-col">
                            <div class="row social-media-exapnd-box-bg">
                                <a class="close-btn-action" href="javascript:void(0)"><img class="close-btn-img" src="img/tiny-close-png.png" /></a>
                                <div class="row wrap-social-media-exapnd">
                                    <div class="row row-top-1">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 social-media-exapnd-steps left-right-cols">
                                            <span class="exapnd-steps-content goto-next">1</span>
                                            <h4 class="pop-expoand-title">
                                                Username
                                            </h4>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 social-media-exapnd-steps mid-cols"></div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 social-media-exapnd-steps left-right-cols">
                                            <span class="exapnd-steps-content goto-prev">2</span>
                                            <h4 class="pop-expoand-title"  id = 'Selected-Posts-label'>
                                                Select Posts
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row row-below-content">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <img id='user-profile'></img>
                                            <h3 class="suptxt-1" id='step2_username'></h3>
                                            <h4 class="suptxt-2" id='step2_selected'>Selected 0</h4>
                                            <!--CSZ-->
                                            <h4 class="suptxt-2" id='step2_likes'></h4>
                                            <h4 class="suptxt-2" id='step2_result'></h4>
                                            <input type='button' class='btn back-first' value='Back'>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gallery-grid-pop-wrp">
                                    <div>
                                        <div id="posts">
                                        </div>

                                        <div id='loader'>
                                            <img width=50px; height=50px; src='img/loader.gif' />
                                        </div>
                                        <div id='discord-info'>
                                        </div>

                                        <div class='btn' id='btn'>
                                            <button type='button' id='viewmore' style='height:4rem;' onclick='view_more()' class='btn btn-info'>View More</button>
                                        </div>
                                    </div>
                                    <div class="form-group buy-insert-user">
                                        <input type="button" id="select_post" class="btn btn-info step2-continue" value="Continue">
                                    </div>

                                </div>
                            </div>


                        </div>



                    </div>
                </div>
                <div class="row row-id-8 ">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 carousel-col">
                        <div class="container">
                            <div id="myCarousel" class="carousel slide" data-interval="false">
                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left">
                                        <img class="img-responsive arrow-left" src="<?php echo BASE_URL ?>/img/arrow-left.png" />
                                    </span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right">
                                        <img class="img-responsive arrow-left right-arrow" src="<?php echo BASE_URL ?>/img/arrow-right.png" />
                                    </span>
                                    <span class="sr-only">Next</span>
                                </a>

                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                </ol>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <div class="row row-id-6">
                                         <div class="validate-wall"></div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading-title">
                                                <h3 id="follow_count_title">How Many Followers do you Want to Buy?</h3>
                                            </div>

                                            <div class="row row-inner-1 half-width-row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                                                    <a id="follow_1" data-followers="50" class="followers_amt high-click1" href="#myCarousel" data-slide="next">50</a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                                                    <a id="follow_2" data-followers="100" class="followers_amt high-click1" href="#myCarousel" data-slide="next">100</a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                                                    <a id="follow_3" data-followers="250" class="followers_amt high-click1" href="#myCarousel" data-slide="next">250</a>
                                                </div>
                                            </div>

                                            <div class="row row-inner-2 half-width-row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                                    <a id="follow_4" data-followers="500" class="followers_amt high-click1" href="#myCarousel" data-slide="next">500</a>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                                    <a id="follow_5" data-followers="1000" class="followers_amt high-click1" href="#myCarousel" data-slide="next">1000</a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row row-id-7 ">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading-title">
                                                <h3>Or Choose Custom Number</h3>
                                            </div>
                                        </div>

                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1  range-Selector-left">
                                            <p class="min-num">10</p>
                                            <h4 class="min-text">MIN</h4>
                                        </div>

                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10  range-Selector">
                                            <div class="range"></div>
                                        </div>


                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1  range-Selector-right">
                                            <p class="max-num">5000</p>
                                            <h4 class="max-text">MAX</h4>
                                        </div>
                                    </div>

                                    <div class="item second-item">
                                        <div class="row range-slides-content">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading-title"> 
                                                <h3 id="follow_title1">How Much Do You Want To Pay Each Follower</h3>

<div class="middle-accordian-ex">
                                                <div id="accordion1" class="ui-accordion ui-widget ui-helper-reset" role="tablist">


<div class="accordianheader ui-accordion-header ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-5" aria-controls="ui-id-6" aria-selected="false" aria-expanded="true" tabindex="0"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>

<div class="accor-head-wrap">
<a href="JavaScript:void(0);">
<h3>
How does it work?</h3></a>
</div>
<img class="img-angle-down" src="/img/arrow-grey.png">
</div>
<div class="accordianbody ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-id-6" aria-labelledby="ui-id-5" role="tabpanel" aria-hidden="true" style="display: none;">
<p>
Decide amount each user gets to help grow your network. After you complete your order, people on the “follow for money” page will follow, like, or view your post/account. For example, if you purchase 100 followers and you select .03 per follower, we will give 100 people $.03 each and cost you $3.
 </p>
</div>

</div>
</div>
                                                <p>Offers that give more money gain followers quicker</p>
                                                <div class="row row-inner-1 half-width-row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                        <a id="amount_per_1" data-amount_per="0.010" class="followers_amt high-click2" href="JavaScript:void(0);">0.02$</a>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                        <a id="amount_per_2" data-amount_per="0.50" class="followers_amt high-click2" href="JavaScript:void(0);">0.50$</a>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                        <a id="amount_per_3" data-amount_per="0.80" class="followers_amt high-click2" href="JavaScript:void(0);">0.80$</a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1  range-Selector-left">
                                            <p class="min-num">0.02$</p>
                                            <h4 class="min-text">MIN</h4>
                                        </div>

                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10  range-Selector">
                                            <div class="range-sec range-parent"></div>
                                            <div class="range-sec range-child" style="display: none;"></div>
                                        </div>


                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1  range-Selector-right">
                                            <p class="max-num">$1</p>
                                            <h4 class="max-text">MAX</h4>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="row range-slides-content full-price" style="display: none;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 heading-title">
                        <h3>Full Price Is</h3>
                        <a class="full_price_btn" href="JavaScript:void(0);">0$</a>
                    </div>
                </div>
                <div class="row row-id-10 checkout-using">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 checkout-using">
                        <h4>Checkout Using</h4>
                        <div class="row row-inner-1">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pay-ment-col"></div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pay-ment-col">
                                <a class="icon-payment-btns pay1" data-payment_gateway="1" href="JavaScript:void(0);">   <img class="payment-btn-img" src="<?php echo BASE_URL ?>/img/pay-pal-new01.png" /></a> 
                                <div class="pay01 social-toggled-wrap-buy-followers social-toggled-wrap f-f-money">
                                    <div style="margin-top: 3px!important" class="row row-buy-followers row-inner-1">
                                        <span class="close closePay1">x</span>
                                        <div class="row row-inner row-inner-buy-followers tick-mark">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pay-for-followers">
                                                <div class="form-group form-group-buy-followers">
                                                    <input id="checkbox01" class="checkbox-custom" name="terms_agree" type="checkbox" value="1">
                                                    <label for="checkbox01" class="checkbox-custom-label checkbox-custom-label-text">Agree to the  <a href="<?php echo BASE_URL ?>/terms" target="_blank">Terms of Service</a></label><!---<a href="<?php// echo BASE_URL ?>/terms" target="_blank"></a>--->
                                                </div>     
                                            </div>
                                        </div>
                                    </div> 

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pay-ment-col">
                                <a class="icon-payment-btns pay2" data-payment_gateway="2" href="JavaScript:void(0);"> <img class="payment-btn-img" src="<?php echo BASE_URL ?>/img/stri-pe-new01.png" /></a>
                                <div class="pay02 social-toggled-wrap-buy-followers social-toggled-wrap f-f-money">
                                    <div style="margin-top: 3px!important" class="row row-buy-followers row-inner-1">
                                        <span class="close closePay2">x</span>
                                        <div class="row row-inner row-inner-buy-followers tick-mark">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pay-for-followers">
                                                <div class="form-group form-group-buy-followers">
                                                    <input id="checkbox02" class="checkbox-custom" name="terms_agree" type="checkbox" value="1">
                                                    <label for="checkbox02" class="checkbox-custom-label checkbox-custom-label-text">Agree to the <a href="<?php echo BASE_URL ?>/terms" target="_blank">Terms of Service</a></label><!---<a href="<?php// echo BASE_URL ?>/terms" target="_blank"></a>--->
                                                </div>     
                                            </div>
                                        </div>
                                    </div> 

                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pay-ment-col"></div>
                        <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pay-ment-col">
                            <a class="icon-payment-btns pay3" data-payment_gateway="3" href="JavaScript:void(0);">     <img class="payment-btn-img" src="<?php echo BASE_URL ?>/img/bit-coin-new01.png" /></a>
                            <div class="pay03 social-toggled-wrap-buy-followers social-toggled-wrap f-f-money">
                                <div style="margin-top: 3px!important" class="row row-buy-followers row-inner-1">
                                    <span class="close closePay3">x</span>
                                    <div class="row row-inner row-inner-buy-followers tick-mark">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pay-for-followers">
                                            <div class="form-group form-group-buy-followers">
                                                <input id="checkbox03" class="checkbox-custom" name="terms_agree" type="checkbox" value="1">
                                                <label for="checkbox03" class="checkbox-custom-label checkbox-custom-label-text"><a href="<?php echo BASE_URL ?>/terms" target="_blank">Agree to the Terms of Service</label></a>
                                            </div>     
                                        </div>
                                    </div>
                                </div> 

                            </div>
                        </div> -->

                    </div>

                </div>
            </div>
            <!-- /.row-->
            
            <div class="row row-id-9 pay-for-the-followers">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pay-for-followers"  style="margin-bottom:1.7rem;line-height:1">
                    <span style="color:#0073da;font-size: 6.4rem;font-weight: bold">Pay</span>
                    <span style="font-weight: bold; margin-right: 25px; font-size: 30px">for the</span>
                </br>
                <span style="color:#0073da;font-size: 6.4rem;font-weight: bold;" id="follow_title">Followers</span>
            </div>
            <div class="row row-inner pay-for-exert">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pay-for-followers">
                    <p style="letter-spacing: 1px;margin-top:1rem;">After the payment, you will redirect to a page that will give<br class="mobile-hide">
                        you information about the order. Including the number of people who<br class="mobile-hide">
                    have followed, identity of followers, etc.</p>
                </div>
            </div>

        </div>


        
    </div>

</div>

<input type="hidden" name="platform" id="platform">
<input type="hidden" name="platform_item" id="platform_item">
<input type="hidden" name="username" id="username">
<input type="hidden" name="followers" id="followers">
<input type="hidden" name="follower_per_amount" id="follower_per_amount">
<input type="hidden" name="payment_gateway" id="payment_gateway">    

</form>

<!-- /.container-->
<!-- footer-->
<?php include 'include/footer.php';?>
<!-- /footer-->

<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>/js/buy_followers.js"></script>

</body>

</html>
