<!DOCTYPE html>
<html>
<head>
	<title>Books Info</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/intro.css">
</head>

<body>

	<!-- <div class="wrapper">
        <h1>Hello there!</h1>
    </div> -->
    
	
	<nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.html">Book Finder</a> 

			</div>
			<ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['name'])): ?>
                <!-- <a class="link" href="logout.php" style="text-decoration:none">logout</a> -->
                <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> <?php $_SESSION['name'] ?></a></li>
                <?php else: ?>
				<!-- <a class="link" href="login.php" style="text-decoration:none">login</a> -->
				
				<li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php endif; ?>


				
			  </ul>
		</div>
	</nav>