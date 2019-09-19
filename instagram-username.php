<!--header-->
<?php include 'include/header.php';
?>
<?php include("include/top_navigation.php");?>
<!--header-end-->

<!--header-end-->
<title>Buy Instagram Followers, Likes, & Views | How To Buy Views, Subscribers and Likes On Youtube | followmyass.com</title>
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
<div class="login-bg-page insta-pg-id">
    <div class="container full-height"">
      <div class=" row">
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 login-form">
            <h1 class="form-title form-header">Instagram Username</h1>
       

            <form id="login-form" class="form" method="post">
                <?php 
                    $token_arr = $csrf->ManualTokenGen(); 
                    $token_name = (isset($token_arr['name'])) ? $token_arr['name'] : "";
                    $token_val = (isset($token_arr['token'])) ? $token_arr['token'] : "";
                ?>
                <input type="hidden" name="<?php echo $token_name ?>" id="token_val" value="<?php echo $token_val ?>">

                <!-- <span class="close"><img src="img/close-cross.png" /></span> -->
                <div class="messages"></div>
                <div class="controls login-form-fields">


                    <div class="form-group" style="position:relative;">
                        <!-----  <label for="form_email">Email</label>--->
                        <input type="text" name="email" id="insta-user" class="form-control contact-inner input" placeholder="Instagram Username" value="" required="" onfocus="this.placeholder = ''">
                        <img class="login-fields-icon" src="img/mail-field-icon.png" />
                        <span class="text-danger"></span>
                        <div class="help-block with-errors"></div>
                    </div>

                  
                    <div class="register-btn">
                        <input type="button" name="btn-login" class="btn btn-info btn-send" value="CONTINUE" href="JavaScript:void(0);">
                    </div>
                </div>
            </form>
      
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


</div>
<script>
    $('.btn-send').on('click', function() {
        var username = $('#insta-user').val();
        var token_val = $("#token_val").val();

        if(username == '')
        {
            alert('Input valid username!');
            return;
        }
        $.post('instagram-usernameset', {
            name: username,     
            "_csrf":token_val, 
        }, function(data){
            
            if(data == '[]')
            {
                alert(username + ' does not exist!');
                return;
            }
            else if(data == '0')
            {
                alert(username + ' is private user!');
                return;
            }
            window.location.href = "<?php echo BASE_URL ?>/follow-instagram";
        });
    });
    
    $('form input').keydown(function (e) {
    if (e.keyCode == 13) {
        var inputs = $(this).parents("form").eq(0).find(":input");
        if (inputs[inputs.index(this) + 1] != null) {                    
            inputs[inputs.index(this) + 1].focus();
        }
        e.preventDefault();
        return false;
    }
});
</script>
<!-- /.container-->
</body>
</html>
