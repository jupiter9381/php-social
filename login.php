<!--header-->
<?php include 'include/header.php';
if (isset($_SESSION['user'])!="" ) {
    redirect("./index"); 
}
?>
<?php include("include/top_navigation.php");?>
<!--header-end-->
<?php  
$errMSG='';
if(isset($_GET['code']) && isset($_GET['email'])){
	$email = $_GET['email'];

    $where = "`userEmail`='$email' AND `rand_number`='".$_GET['code']."'"; 
    $option = array(
        'columns'=>array('*')
    );
    $GetUsername = $db->findOne('users',$where,$option); 

    if(!empty($GetUsername)){

        $where = "`userEmail`='$email'";  
        $data_arr = array (
            'rand_number'=>'1'
        );
        $CeateAccount = $db->update("users", $data_arr,$where);  
        if($CeateAccount){
            set_message('success',"You have successfully activated your account");
            redirect('login');
        }
    } 
}
?>
<!--header-end-->
<title>Login | How to Buy Views, Subscribers and Likes on Youtube</title>
<meta name="description" content="Login or Register at followmyass.com, to Promote Your Brand, Gain Publicity Or Just Make A Quick Buck. Here find How to increase views, likes and followers on Instagram.">
<meta name="keywords" content="">
<link rel="canonical" href="https://followmyass.com/login" />
<style>
	
    .form-header {
     text-align: center;
     margin: 0px 0px 25px 0px;
 }
 .login-bg-page .container.full-height {
     min-height: calc(100vh - 110px);
 }
 @media screen and (max-width: 767px) {
     .container.full-height {
      min-height: calc(100vh - 110px)!important;
  }
}

</style>
</head>
<div class="login-bg-page">
    <div class="container full-height">
      <div class=" row">
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 login-form">
            <h1 class="form-title form-header">Login</h1>
            <?php 
            if ( isset($_SESSION['message']) ) { ?>
                <div class="form-group">
                    <div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> <?php echo $_SESSION['message']; ?> </div>
                </div>
            <?php } ?>

            <form id="login-form" class="form" action="<?php echo BASE_URL ?>/inc/login" autocomplete="off" method="post">
                <?php $csrf->echoInputField(); ?>
                <?php if($errMSG != ''){ ?>
                    <div class="alert alert-success">
                        <strong>Success!</strong> <?php echo $errMSG; ?>
                    </div>
                <?php } ?>


                <!-- <span class="close"><img src="img/close-cross.png" /></span> -->
                <div class="messages"></div>
                <div class="controls login-form-fields">


                    <div class="form-group" style="position:relative;">
                        <!-----  <label for="form_email">Email</label>--->
                        <input type="email" name="email" id="email" class="form-control contact-inner input" placeholder="Email" value="<?php if(isset($email)){ echo $email; } else {
                            echo (isset($_COOKIE["fma_email"])) ? $_COOKIE["fma_email"] : '';
                        } ?>" required="">
                        <img class="login-fields-icon" src="img/mail-field-icon.png" />
                        <span class="text-danger"><?php if(isset($emailError)){  echo $emailError; }?></span>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group" style="position:relative;">
                        <!-----     <label for="form_pass">Password</label>---->
                        <input type="password" name="pass" id="password" class="form-control contact-inner input" placeholder="Password" required="" value="<?php echo (isset($_COOKIE["fma_password"])) ? $_COOKIE["fma_password"] : ''; ?>">
                        <img class="login-fields-icon passs" src="img/pass-field-icon.png" />
                        <span class="text-danger"><?php if(isset($passError)){ echo $passError; } ?></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <?php show_messsage('success'); ?>
                        <?php show_messsage('error'); ?>
                        <?php show_messsage('danger'); ?>
                    </div>
                    <div class="register-btn">
                        <input type="submit" name="btn-login" class="btn btn-info btn-send" value="LOGIN">
                        
                    </div>
                </div>
            </form>
            <div class="login-links">
                <ul class="nav">
                    <li><a href="<?php echo BASE_URL ?>/signup">REGISTER</a></li>
                    <li><a style="line-height: 1" href="<?php echo BASE_URL ?>/forget_password">FORGOT YOUR PASSWORD?</a></li>
                </ul>
            </div>
        </div>

    </div>
    <!-- /.row-->
</div>
<div class="login-signup-footer">
    <span class="login-copyright">© Copyright 2019 - All Rights Reserved. </span>
</div>
<!-- footer-->
<?php include 'include/footer.php';?>
<!-- /footer-->
<script type="text/javascript" language="javascript">
    $(document).ready(function () { 
        $('#login-form').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                pass: {
                    required: true,
                }
            },
            messages: {
                email: {
                    required: "Please enter email address"
                },
                pass: {
                    required: "Please enter password"
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>

</div>
<!-- /.container-->
</body>
</html>
