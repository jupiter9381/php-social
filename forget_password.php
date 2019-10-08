<!--header-->
<?php include 'include/header.php';?>
<?php include("include/top_navigation.php");?>
<!--header-end-->
<body>

    <style>
        img.foget-form-logo {
            max-width: 340px;
            margin-bottom: 15px;
        }
        .terms-text.text-center.py-5 p {
            line-height: 18px;
        }
        @media only screen and (max-width: 600px) {
            img.foget-form-logo {
                max-width: 240px;
            }
            span.close img {
                max-width: 30px;
            }
        }
        .login-bg-page form#login-form .form-control, .login-bg-page form#contact-form .form-control {
            color: #000;
        }
    </style>

    <div class="login-bg-page">
        <div class="container full-height">
            <div class="row">
                <!-- confirm your email section ends -->
                <!-- become a member strts -->
                <div class="become-member-section mb-5 email-edit-section text-center">
                    <div class="become-member-content">
                        <h3 style="color: #000; text-align: center;">
                            <?php if(isset($msg)){echo $msg; }?>
                        </h3>
                        <!-- edit your email strts -->
                        <div class="edit-your-email edit-your-password"> 
                            <?php if(isset($_GET['token'])){

                                $where = "`rand_number`='".$_GET['token']."'"; 
                                $option = array(
                                    'columns'=>array('userId,userEmail')
                                );
                                $result = $db->findOne('users',$where,$option); 
                                if (empty($result)) {
                                    set_message('danger',"Error! Invalid token");
                                    redirect('./forget_password');  
                                }

                             ?>
                                         <div class="login-form">
                                    <a class="foget-form-logolink" href="https://followmyass.com/index"><img class="foget-form-logo" src="img/followmyass.png" alt="Site Logo" style="width:400px"></a>
                                <form id="login-form" class="form verify_password_form" action="<?php echo BASE_URL ?>/inc/forget_password_action" method="post">
                                    <?php $csrf->echoInputField(); ?>
                                   <!--- <h4 class="text-center pb-5">New Password Settings</h4> -->



                                   
                                    <!-- Change Password Code Starts Here -->
                                    <input type="hidden" name="token" class="form-control"  value="<?php echo $_GET['token']; ?>" />
                                    <div class="d-flex form-group position-relative pb-5" style="position:relative;">
                                       <!--- <label for="password">Change Your Password</label> --->
                                       <!--- <i class="fas fa-unlock-alt position-absolute fa-padding"></i> --->
                                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Enter Your New Password">
                                        <img class="login-fields-icon passs" src="img/pass-field-icon.png">
                                    </div>

                                    <div class="d-flex form-group position-relative pb-5" style="position:relative;">
                                        <!---<label for="password">Confirm Password</label>--->
                                    <!---    <i class="fas fa-unlock-alt position-absolute fa-padding"></i> -->
                                        <input type="password" name="confirm_pass" id="confirm_pass" class="form-control" placeholder="Confirm Password">
                                       <img class="login-fields-icon passs" src="img/pass-field-icon.png">
                                    </div>

                                    <div class="d-flex form-group btn-fa" style="margin: 0px -8px;">
                                       <!-- <i class="fas fa-pen-nib position-absolute fa-padding"></i>-->
                                        <input type="submit" name="Password" class="btn btn-lg btn-defualt log-in-btn pl-3" value="Change Your Password">
                                    </div>

                                </form>
</div>
                                <div class="form-group"></div>

                            <?php
                             }

                            else{ ?>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 login-form">
                                    <a class="foget-form-logolink" href="<?php echo BASE_URL ?>/index"><img class="foget-form-logo" src="img/followmyass.png" alt="Site Logo" style="width:400px"></a>


                                    <form id="login-form" class="form forgot_password_form" action="<?php echo BASE_URL ?>/inc/forget_password_action" method="post">
                                        <?php $csrf->echoInputField(); ?>

                                        <!-- Forget Password Code Starts Here -->
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
                                            <div class="form-group">
                                                <?php show_messsage('success'); ?>
                                                <?php show_messsage('error'); ?>
                                                <?php show_messsage('danger'); ?>
                                            </div>

                                            <div class="register-btn">
                                                <input type="submit" name="submit_email" class="btn btn-info btn-send" value="Reset">
                                            </div>                       
                                        </div>
                                    </form>
                                    <!-- Forget Password Code Ends Here --> 
                                    <!-- become a member ends -->
                                    <!-- after pro section text -->
                                    <div class="terms-text text-center py-5">
                                        <p>A link will be sent to your registered email address to reset your password.</p>
                                    </div>                                                                                    
                                </div>
                            <?php } ?> 

                        </div>

                    </div>

                    <!-- footer-->
                    <?php include 'include/footer.php';?>
                    <!-- /footer-->
                </div>
            </div>
        </div>
        <div class="login-signup-footer">
            <span class="login-copyright">© Copyright 2019 - All Rights Reserved. </span>
        </div>      
    </div>
    <!-- /.container-->
    <script type="text/javascript" language="javascript">
    $(document).ready(function () { 
        $('.forgot_password_form').validate({
            rules: {
                pass: {
                    required: true,
                }
            },
            messages: {
                email: {
                    required: "Please enter email address"
                },
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
        $('.verify_password_form').validate({
            rules: {
                pass: {
                    required: true,
                    minlength:6,
                },
                confirm_pass: {
                    required: true,
                    equalTo : "#pass"
                },
                  
            },
            messages: {
                pass: {
                    required: "Please enter password"
                },
                confirm_pass: {
                    required: "Please enter confirm password",
                    equalTo : "Confirm password does't match"
                },
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>

</body>
</html>





