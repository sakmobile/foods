<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>FoodStory</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="dist/css/animate.css?=101">
	<!-- Custom Stylesheet -->
        <link rel="stylesheet" href="dist/css/style.css?=101">

  <!-- iCheck -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

  <!-- This is what you need -->
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css"> 

    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
     <?php if(isset($_GET['error_login'])){?>
         
        <script>
           var error = "<?php echo $_GET['error_login'];?>";
           swal("Error",error, "error");
        </script>              
                   <?php  }?>
	<div class="container">
            
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">Food <span>Story</span></span></h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Log In</h2>
			</div>
                    <form action="controllers/check_login.php" method="POST" name="login">
			<label for="username">Email</label>
			<br/>
                        <input type="email" name="login_email" id="username">
			<br/>
			<label for="password">Password</label>
			<br/>
                        <input type="password"  name="login_pass" id="password">
			<br/>
                        <button type="submit" name="login">Sign In</button>
			<br/>
                       
                    </form>
                    
		</div>
            
	</div>
       
</body>

<script>
    
    
     var first = getUrlVars()["view"];
var second = getUrlVars()["var"];
 
alert(first);
alert(second);

	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>

</html>