<!DOCTYPE html>
<html>
<head>
	<title>book Info</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="heade" ><div id="particles-js" style="height: 100%;"></div></div>
	<nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.html">Book Finder</a> 
			</div>
			<ul class="nav navbar-nav navbar-right">
			<?php
				include_once 'utils/db_connection.php';
				session_start();
				if(!(isset($_SESSION['email']))){
				header("location:index.html");

				}
				else
				{
				$name = $_SESSION['name'];
				$email=$_SESSION['email'];

				include_once 'utils/db_connection.php';
				// echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="account.php?q=1" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</button></a></span>';
				}
				?>



                <?php if(isset($_SESSION['name'])): 
                
				echo  '<li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> '.$name. '</a></li>' ;
                echo  '<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>'  ; ?>
				         
                <?php else: ?>
				<!-- <a class="link" href="login.php" style="text-decoration:none">login</a> -->
				
				<li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				<?php endif; ?>
				


				
			  </ul>
		</div>
	</nav>

	<div id="preloader" class="">
		<img src="assets/loader.gif" />
	</div>
	
	<div class="container">
		<div class="well hidden" id="book">
			
		</div>
	</div>


<script
	src="https://code.jquery.com/jquery-3.2.0.min.js"
	integrity="sha256-JAW99MJVpJBGcbzEuXk4Az05s/XyDdBomFqNlM3ic+I="
	crossorigin="anonymous"></script>

<script src="./js/particle.js"></script>
<script src="./js/app.js"></script>
<script src="./js/particles.js"></script>
<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="http://threejs.org/examples/js/libs/stats.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript">
	getbook();
</script>
</body>
</html>