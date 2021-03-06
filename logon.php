<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/login.css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>



<body>

<div id="heade" ><div id="particles-js" style="height: 100%;"></div></div>

    <div class="login-reg-panel">
       
		<div class="login-info-box">
			<h2>Have an account?</h2>
			<p>Thats Good</p>
			<label id="label-register" for="log-reg-show" >Login</label>
			<input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
		</div>
							
		<div class="register-info-box">
			<h2>Don't have an account?</h2>
			<p>Sign Up now!</p>
			<label id="label-login" for="log-login-show">Register</label>
			<input type="radio" name="active-log-panel" id="log-login-show">
		</div>
			
		<div class="white-panel">
		<form action="login.php" method="post">	
			<div class="login-show">
				<h2>LOGIN</h2>
				<input type="text" placeholder="Email" name="email" >
				<input type="password" placeholder="Password" name="pass">
                <button type="submit">   <input type="button" value="Login"> </button>
                
				<a href="">Forgot password?</a>
			</div>
		</form>

		<form action="signin.php" method="post">	
			<div class="register-show">
				<h2>REGISTER</h2>
				<input type="text" placeholder="Name" name="name">
				<input type="text" placeholder="Email" name="email">
				<input type="password" placeholder="Password" name="pass">
				<input type="password" placeholder="Confirm Password" >
				<button type="submit" > <input type="button" value="Register"> </button>
			</div>
		</form>
		</div>
    </div>

	<script src="./js/particle.js"></script>
	<script src="./js/app.js"></script>
	<script src="./js/particles.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
    $('.login-info-box').fadeOut();
    $('.login-show').addClass('show-log-panel');
});


$('.login-reg-panel input[type="radio"]').on('change', function() {
    if($('#log-login-show').is(':checked')) {
        $('.register-info-box').fadeOut(); 
        $('.login-info-box').fadeIn();
        
        $('.white-panel').addClass('right-log');
        $('.register-show').addClass('show-log-panel');
        $('.login-show').removeClass('show-log-panel');
        
    }
    else if($('#log-reg-show').is(':checked')) {
        $('.register-info-box').fadeIn();
        $('.login-info-box').fadeOut();
        
        $('.white-panel').removeClass('right-log');
        
        $('.login-show').addClass('show-log-panel');
        $('.register-show').removeClass('show-log-panel');
    }
});
  

</script>
</body>
</html>
