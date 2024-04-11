<html>
    <head>
        <?php include 'reference.php' ?>
        <title>Login | GAPOSA- ScreenClass</title>  
    </head>
    <body>
    <?php include 'header.php' ?>
        <div class="login-overall">
               
            <div class="login-image-cover">
                    <!-- LOGIN MAIN PAGE -->
                <form action="connection/code.php?action=login" method="POST" enctype="multipart/form-data">
                    <div class="next-div" id="next_1">
                        <div class="login-main animated animated zoomIn animated">
                            <h1>Login</h1>
                           
                                    <p>Email Address:<span>*</span></p>
                                    <input type="email" placeholder="Enter Your Email" name="loginemail" id="loginemail" required>
                                    <p>Password:<span>*</span></p>
                                    <input type="password" placeholder="Enter Your Password" name="loginpassword" id="loginpassword" required>
                                    <div class="forgot-password">
                                        <p><span>Have you forgotten your password?</span> <span class="resetpassword" onClick="_next_page('next_2');">RESET PASSWORD </span> </p>
                                    </div>
                                    <button class="login" type="submit"><i class="fa fa-unlock"></i> LOGIN</button>
                                    </div>


                                </div>
                        </div>
                </form>
                <form action="connection/code.php?action=validateemail" method="POST" enctype="multipart/form-data">
                        <!-- RESET PASSWORD PAGE -->

                        <div class="next-div" id="next_2">
                            <div class="login-main animated animated zoomIn animated">
                                <h1>Reset Password</h1>
                                    <p>Email Address:</p>
                                    <input type="email" placeholder="Enter Your Email" name="resetemail" id="email" required>
                                    <div class="forgot-password">
                                        <p><span>An OTP would be sent to your Email.</p>
                                    </div>
                                    <button class="login" type="submit"> PROCEED <i class="fa fa-arrow-right"></i></button>
                                    <div class="forgot-password register reset-forgot-password">
                                        <p><span class="resetpassword" onClick="_next_page('next_1');">LOGIN </span> </p>
                                    </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
     
<script>
    superplaceholder({
	el: loginemail,
		sentences: ['Enter Your Email Address', 'e.g gaposa@gmail.com', 'info@gaposa.com'],
		options: {
		letterDelay: 80,
		loop: true,
		startOnFocus: false
	}
});
</script>
    </body>
    
</html>