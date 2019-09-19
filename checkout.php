<!--header-->

<?php
ob_start();

include 'include/header.php';
include 'include/stripe/stripe_config.php';
if (!isset($_SESSION['user'])) {
    $_SESSION['last_page'] = "follow-discord";
    redirect('login');
}

$user_id = $_SESSION['user'];

if (!isset($_GET['order_id']) || $_GET['order_id']=="") {
    redirect('buy-followers');
}

$order_id = $_GET['order_id'];

$where = "id='".$order_id."' and order_status='Pending'";
$option = array(
    'columns' => array('*,(select count(*) from orders_posts where order_id = orders.id) as total_post')
);
$OrderInfo_list = $db->findone('orders', $where, $option);

if (empty($OrderInfo_list)) {
    set_message('danger',"Order details not found");
    redirect('buy-followers');
}

if ($user_id != $OrderInfo_list['user_id']) {
    set_message('danger',"Order details not found");
    redirect('buy-followers');
}

include("include/top_navigation.php"); ?>
<!--header-end-->
<title>Checkout</title>
<meta name="description" content="Checkout after buying real followers, likes, or views.">
<meta name="keywords" content="">

<style>
    .rowCustom {
        display: flex;
        justify-content: center;
        align-items: center;
/*         padding: 5rem 0;
        height: calc(100vh - 205px); */
            padding: 8rem 0;
    height: auto;
    }

    .checkout {
        border: 2px solid #0074D9;
        /*         min-height: 56vh; */
        border-radius: 20px;
        transition: capitalize;
        padding: 0rem 1rem;
        position: relative;
    }

    .rowCustom .titleCheck {
        background-color: #0074D9;
        color: #FFF;
        padding: 3px;
        border-radius: 15px 15px 0 0;
        width: 100px;
        font-size: 18px;
        text-align: center;
        position: absolute;
        top: -30px;
        left: 65px;
    }

    .checkout .header {
        text-align: center;
        color: #0074D9;
        margin: 1.5rem 0rem;
        font-size: 2.5rem;
        font-weight: lighter;
        letter-spacing: 0.2rem;
    }

    .checkout .checkoutTop,
    .checkout .checkoutCenter,
    .checkout .checkoutBottom {
        min-height: 40px;
        padding: 1rem 1rem;
        margin: 0rem 1rem;
        font-weight: bold;
        color: #353535;
        font-size: 1.5rem
    }

    .checkout .checkoutTop {
        background: #FBFBFB;
    }

    .checkout .checkoutCenter {
        background: #F9F9F9;
        border-bottom: 2px solid #0074D9;
    }

    .checkout .checkoutBottom {
        padding: 1rem 1rem 1.3rem 1rem;
        border-bottom: 1px solid #eee;
    }

    .checkout .checkoutTop .left,
    .checkout .checkoutCenter .left,
    .checkout .checkoutBottom .left {
        float: left;
    }

    .checkout .checkoutTop .right,
    .checkout .checkoutCenter .right,
    .checkout .checkoutBottom .right {
        float: right;
    }

    .checkout .text {
        text-align: center;
        color: #818181;
        /*         border-top: 1px solid #eee; */
        margin: 0.6rem 0 1.5rem 0;
        padding-top: 0.6rem;
        font-size: 1.4rem;

    }

    .checkout .btn {
        background: #0074D9;
        border-radius: 20px;
        padding: 0.7rem 1.3rem;
        text-align: center;
        color: #fff;
        font-size: 1.5rem;
        margin-bottom: 1.3rem;
    }

    .btnSubmit {
        display: flex;
        justify-content: center;
    }

    .btnSubmit img {
        padding: 0px 0px;
        margin: 0 0px 2px; 
    }
    
</style>
</div></div></div></div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php show_messsage('success'); ?>
            <?php show_messsage('error'); ?>
            <?php show_messsage('danger'); ?>
        </div>
    </div>
    <div class="row rowCustom">        
        <div class="col-lg-6 col-md-8">
            <div class="titleCheck">
                Checkout
            </div>
            <?php 
            $action = "";
            if ($OrderInfo_list['payment_gateway'] == "Stripe") {
                $action = "inc/stripe_payment";
            } else if ($OrderInfo_list['payment_gateway'] == "Paypal") {
                $action = "inc/paypal_payment";
            } else if ($OrderInfo_list['payment_gateway'] == "Bitcoin") {
                $action = "inc/bitcoin_payment";
            }
            ?>
            <div class="checkout">
                <form id="checkout_frm" action="<?php echo $action ?>" method="post">
                    <?php $csrf->echoInputField(); ?>
                    <?php 
                    $order_title = $OrderInfo_list['platform_id']." ".$OrderInfo_list['followers']." ".$OrderInfo_list['platform_item'];
                    $platform_id = $OrderInfo_list['platform_id'];
                    $final_cost = number_format($OrderInfo_list['final_cost'],2);
                    $fee_per = $OrderInfo_list['buy_follower_fee_per'];
                    $total_fees = number_format($OrderInfo_list['total_fees'],2);
                    $grand_total = number_format($OrderInfo_list['grand_total'],2);
                    ?>
                    <p class="header">Order Summary</p>

                    <div class="checkoutTop">
                        <span class="left"><?php echo $OrderInfo_list['total_post']." ".$OrderInfo_list['platform_id']." Post (".$OrderInfo_list['followers']." ".$OrderInfo_list['platform_item'].")" ?></span>
                        <span class="right"><?php echo $final_cost."$"; ?></span>
                    </div>
                    <!-- <div class="checkoutTop">
                        <span class="left"><?php echo "Number of Post" ?></span>
                        <span class="right"><?php echo $OrderInfo_list['total_post']; ?></span>
                    </div> -->
                    <div class="checkoutCenter">
                        <span class="left"><?php echo $fee_per."% Fee" ?></span>
                        <span class="right"><?php echo $total_fees."$" ?></span>
                    </div>
                    <div class="checkoutBottom">
                        <span class="left">Order Total</span>
                        <span class="right"><?php echo $grand_total."$" ?></span>
                    </div>

                    <div class="text">
                        <p>After the payment you will be redirected to a
                            page that will give you information about the
                            order. Including the number of people who have
                            followed, who the people are that followed, and
                        much more.</p>
                    </div>

                    <?php 
                    if ($OrderInfo_list['payment_gateway'] == "Stripe") { ?>
                        <div class="pay_btn" style="width: 100%;text-align: center;">
                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="<?php echo PUBLISHABLE_KEY ?>"
                            data-description="<?php echo $order_title ?>"
                            data-amount="<?php echo str_replace(".","",number_format($grand_total,2)); ?>"
                            data-locale="auto"
                            data-name="<?php echo $platform_id ?>"
                            data-user_id="<?php echo $user_id; ?>"
                            data-order_id="<?php echo $order_id; ?>"
                            data-image="<?php echo BASE_URL ?>/img/fma_logo.png"
                            data-locale="auto"        
                            data-currency="usd"
                            data-label="Pay Now"
                            ></script>
                        </div>
                    <?php } else if ($OrderInfo_list['payment_gateway'] == "Paypal") { ?>
                        <div class="pay_btn" style="width: 100%;text-align: center;padding: 10px;">
                            <div id="paypal-button"></div>
                        </div>
                        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                        <script src="https://www.paypalobjects.com/api/checkout.js"></script>


                        <script>
                            paypal.Button.render({
                                    // Configure environment
                                    env: '<?php echo PAYPAL_ENV ?>',
                                    client: {
                                        sandbox: '<?php echo SAN_Client_ID ?>',
                                        production: '<?php echo LIVE_Client_ID ?>'
                                    },
                                    // Customize button (optional)
                                    locale: 'en_US',
                                    style: {
                                        size: 'small',
                                        color: 'gold',
                                        shape: 'rect',
                                        tagline: false
                                    },

                                    // Enable Pay Now checkout flow (optional)
                                    commit: true,

                                    // Set up a payment
                                    payment: function(data, actions) {
                                        return actions.payment.create({
                                            transactions: [{
                                                amount: {
                                                    total: '<?php echo number_format($grand_total,2) ?>',
                                                    currency: 'USD'
                                                }
                                            }]
                                        });
                                    },
                                    // Execute the payment
                                    onAuthorize: function(data, actions) {
                                        return actions.payment.execute().then(function() { 
                                            $.ajax({
                                                url: '<?php echo BASE_URL."/inc/paypal_payment" ?>',
                                                data: {'data':data,'user_id': '<?php echo $user_id ?>','order_id': '<?php echo $order_id ?>'},
                                                type: 'post',
                                                dataType: 'json',
                                                catch : false,
                                                success: function (data) {
                                                    var status = data.status;
                                                    if (status == "success") {
                                                        window.location = "<?php echo BASE_URL."/campaigns" ?>";
                                                    } else {
                                                        window.location = "<?php echo BASE_URL.'/checkout?order_id='.$order_id; ?>";
                                                    }
                                                }
                                            });

                                        });
                                    }
                                }, '#paypal-button');

                            </script>
                        <?php } else { ?>
                            <div class="btnSubmit">    
                                <a href="#" class="btn" target="_self">Pay Now 
                                    <img src="img/left.png" width="16px">
                                </a>
                            </div>
                        <?php } ?>
                        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                    </form>
                </div>
            </div>

        </div>
    </div>


    <?php
    include("include/footer1.php");
    ob_end_flush();
    ?>
</body>

</html>
