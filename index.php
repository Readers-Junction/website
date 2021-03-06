<?PHP

// For redirect in case of login error
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	if (isset($_SESSION['error']))
	{
		if ($_SESSION['error']==0)
		{?>
			<script type="text/javascript">
				alert("Incorrect Password");
			</script>

<?php 	}
		if ($_SESSION['error']==1)
		{ ?>
			<script type="text/javascript">
				alert("Email not found in database");
			</script>

<?php 	}
		if ($_SESSION['error']==2)
		{?>
			<script type="text/javascript">
			
				alert("Please check your Email");
			
			</script>
<?php 	}
		if ($_SESSION['error']==3)
		{?>
			<script type="text/javascript">
			
				alert("Already Registered");
			
			</script>
<?php 	}
	}
	}
?>	

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Readers' Junction">
    <link rel="shortcut icon" href="assets/img/favico.png">

    <title> Readers Junction | Rent Books and Magazines </title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-theme.min.css" rel="stylesheet" >

    <!-- Other CSS-->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/icomoon.css" rel="stylesheet">
    <link href="assets/css/animate-custom.css" rel="stylesheet">
	<link href="assets/css/popup.css" rel="stylesheet">
	

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
		
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	
    <!--[f lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
			<script type="text/javascript" src="assets/js/jquery.min.js"></script>
			<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
			
  </head>

  <body>
		<?php 
			// Script for google login
			########## MySql, Google Client details#############
			require_once('connectvars.php');

			//include google api files
			require_once 'googleLogin/src/Google_Client.php';
			require_once 'googleLogin/src/contrib/Google_Oauth2Service.php';

			
			$gClient = new Google_Client();
			$gClient->setApplicationName($app_name);
			$gClient->setClientId($google_client_id);
			$gClient->setClientSecret($google_client_secret);
			$gClient->setRedirectUri($google_redirect_url);
			$gClient->setDeveloperKey($google_developer_key);

			$google_oauthV2 = new Google_Oauth2Service($gClient);

			//If user wish to log out, we just unset Session variable
			if (isset($_REQUEST['reset'])) 
			{
			  unset($_SESSION['token']);
			  $gClient->revokeToken();
			  header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL)); //redirect user back to page
			}

			//If code is empty, redirect user to google authentication page for code.
			//Code is required to aquire Access Token from google
			//Once we have access token, assign token to session variable
			//and we can redirect user back to page and login.
			if (isset($_GET['code'])) 
			{ 
				$gClient->authenticate($_GET['code']);
				$_SESSION['token'] = $gClient->getAccessToken();
				header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
				return;
			}


			if (isset($_SESSION['token'])) 
			{ 
				$gClient->setAccessToken($_SESSION['token']);
			}


			if ($gClient->getAccessToken()) 
			{
				  //For logged in user, get details from google using access token
				  $user 				= $google_oauthV2->userinfo->get();
				  $user_id 				= $user['id'];
				  $user_name 			= filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS);
				  $email 				= filter_var($user['email'], FILTER_SANITIZE_EMAIL);
				  $profile_url 			= filter_var($user['link'], FILTER_VALIDATE_URL);
				  $profile_image_url 	= filter_var($user['picture'], FILTER_VALIDATE_URL);
				  $personMarkup 		= "$email<div><img src='$profile_image_url?sz=50'></div>";
				  $_SESSION['token'] 	= $gClient->getAccessToken();
			}
			else 
			{
				//For Guest user, get google login url
				$authUrl = $gClient->createAuthUrl();
			}
		?>
		
		<script type="text/javascript">

			if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){ //test for MSIE x.x;
			 var ieversion=new Number(RegExp.$1) // capture x.x portion and store as a number
			 if (ieversion<=8)
			  window.location="ie.html"
			}

		</script>
		
		<div id="navbar-main">
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse" >
						
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#headerwrap"><b><img src="assets/img/logo.png" width="25" alt="logo" /> &nbsp; Readers' Junction</b></a>
				</div>
				<div id="navbarCollapse" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li> <a href="#headerwrap" class="smoothScroll">Home</a></li>
						<li> <a href="#about" class="smoothScroll"> About</a></li>
						<li> <a href="#services" class="smoothScroll"> Services</a></li>
						<li> <a href="#team" class="smoothScroll"> Team</a></li>
						<li> <a href="#contact" class="smoothScroll"> Contact</a></li>
					</ul>
					<div class="navbar-header navbar-right">
						<p class="navbar-text">
							<a id="signup" href="#modal" name="signup" rel="leanModal">Log In </a>
						</p>
					</div>
				</div>
				</div>
			</nav>
		</div>
			
		<script type="text/javascript">
			$('.navbar-collapse a').click(function(){
			$(".navbar-collapse").collapse('hide');
			});
		</script>

		<!-- ==== HEADERWRAP ==== -->
	    <div id="headerwrap" name="home">
			<header class="clearfix">
	  		 		<header class="clearfix">
	  		 		<h1><span class="logo"><img src="assets/img/logo.png" width="100" alt="Header Image" /></span></h1>

	  		 		<p>Readers Junction</p>
					
	  		 		<p>Books and Magazines on Rent</p>	 
					
					<div class="social-widget">
						<div id="themify-social-links-2" class="widget"><ul class="social-links">
							<li class="social-link-item twitter">
								<a href="https://twitter.com/" title="Twitter"><img src="assets/img/twitter.png" width="32" alt="twitter" /> </a>
							</li>
							
							<li class="social-link-item facebook">
								<a href="https://www.facebook.com/" title="Facebook"><img src="assets/img/facebook.png" width="32" alt="Facebook" /> </a>
							</li>
							
							<li class="social-link-item facebook">
								<a href="https://plus.google.com/" title="Google+"><img src="assets/img/g+.png" width="32" alt="Google+" > </a>
							</li>
							</ul>
						</div>
					</div>
					
				</header>
	  		</header> 
	    </div><!-- /headerwrap -->
		
		
		<!-- ==== ABOUT ==== -->
		<div class="container" id="about" name="about">
			<div class="row white">
			<br><br><br>
				<h1 class="centered">A LITTLE ABOUT US</h1>
				<hr>
				
				<div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
					<p>We believe ideas come from everyone, everywhere. In fact, at BlackTie, everyone within our agency walls is a designer in their own right. And there are a few principles we believe—and we believe everyone should believe—about our design craft. These truths drive us, motivate us, and ultimately help us redefine the power of design. We’re big believers in doing right by our neighbors. After all, we grew up in the Twin Cities and we believe this place has much to offer. So we do what we can to support the community we love.</p>
				</div><!-- col-lg-6 -->
				
				<div class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
					<p>Over the past four years, we’ve provided more than $1 million in combined cash and pro bono support to Way to Grow, an early childhood education and nonprofit organization. Other community giving involvement throughout our agency history includes pro bono work for more than 13 organizations, direct giving, a scholarship program through the Minneapolis College of Art & Design, board memberships, and ongoing participation in the Keystone Club, which gives five percent of our company’s earnings back to the community each year.</p>
				</div><!-- col-lg-6 -->
			</div><!-- row -->
		</div><!-- container -->
		
		<!-- ==== SECTION DIVIDER1 -->
		<section class="section-divider textdivider divider1">
			<div class="container">
				<h1>WRITE SOMETHING HERE</h1>
				<hr>
				<p>Lorem ipsum dolor sit amet, elitr possim at nam, usu in tota quaerendum deterruisset. Vix cu nostro causae vocibus. Quas erroribus eam te.</p>
			</div><!-- container -->
		</section><!-- section -->
		
		
		<!-- ==== SERVICES ==== -->
		<div class="container" id="services" name="services">
			<br><br>
			<div class="row">
				<h2 class="centered">OUR SERVICES.</h2>
				<hr>
				<br>
				<div class="col-lg-offset-2 col-lg-10 col-md-offset-2 col-md-10 col-sm-offset-2 col-sm-10 col-xs-11 col-xs-offset-1">
					
					<a id="signup" href="#modal" name="signup" rel="leanModal"><h1>BOOKS</h1></a>
					<!-- ?php require_once('carouselData.php') ? -->
					<div id="carousel">
						<a id="signup" href="#modal" name="signup" rel="leanModal"><span class="dropt" title="Book Details"><img src="assets/img/books/1.jpg" id="item-1" alt="item-1" /><span style="width:200px; height:230px;"><b> Book Details:</b><br><br>Name: SOME NAME <br> Author: SOME AUTHOR <br> Rating: 3/5 <br>Rent: 30</span></a>
						
						<a id="signup" href="#modal" name="signup" rel="leanModal"><span class="dropt" title="Book Details"><img src="assets/img/books/2.jpg" id="item-2" alt="item-2" /><span style="width:200px; height:230px;"><b> Book Details:</b><br><br>Name: SOME NAME2 <br> Author: SOME AUTHOR <br> Rating: 3/5 <br>Rent: 30</span></a>
						
						<a id="signup" href="#modal" name="signup" rel="leanModal"><span class="dropt" title="Book Details"><img src="assets/img/books/3.jpg" id="item-3" alt="item-3" /><span style="width:200px; height:230px;"><b> Book Details:</b><br><br>Name: SOME NAME3 <br> Author: SOME AUTHOR <br> Rating: 3/5 <br>Rent: 30</span></a>
						
						<a id="signup" href="#modal" name="signup" rel="leanModal"><span class="dropt" title="Book Details"><img src="assets/img/books/4.jpg" id="item-4" alt="item-4" /><span style="width:200px; height:230px;"><b> Book Details:</b><br><br>Name: SOME NAME4 <br> Author: SOME AUTHOR <br> Rating: 3/5 <br>Rent: 30</span></a>
						
						<a id="signup" href="#modal" name="signup" rel="leanModal"><span class="dropt" title="Book Details"><img src="assets/img/books/5.jpg" id="item-5" alt="item-5" /><span style="width:200px; height:230px;"><b> Book Details:</b><br><br>Name: SOME NAME5 <br> Author: SOME AUTHOR <br> Rating: 3/5 <br>Rent: 30</span></a>
						
						<a id="signup" href="#modal" name="signup" rel="leanModal"><span class="dropt" title="Book Details"><img src="assets/img/books/6.jpg" id="item-6" alt="item-6" /><span style="width:200px; height:230px;"><b> Book Details:</b><br><br>Name: SOME NAME6 <br> Author: SOME AUTHOR <br> Rating: 3/5 <br>Rent: 30</span></a>
						
						<a id="signup" href="#modal" name="signup" rel="leanModal"><span class="dropt" title="Book Details"><img src="assets/img/books/7.jpg" id="item-7" alt="item-7" /><span style="width:200px; height:230px;"><b> Book Details:</b><br><br>Name: SOME NAME7 <br> Author: SOME AUTHOR <br> Rating: 3/5 <br>Rent: 30</span></a>
						
						<a id="signup" href="#modal" name="signup" rel="leanModal"><span class="dropt" title="Book Details"><img src="assets/img/books/8.jpg" id="item-8" alt="item-8" /><span style="width:200px; height:230px;"><b> Book Details:</b><br><br>Name: SOME NAME8 <br> Author: SOME AUTHOR <br> Rating: 3/5 <br>Rent: 30</span></a>
						
						<a id="signup" href="#modal" name="signup" rel="leanModal"><span class="dropt" title="Book Details"><img src="assets/img/books/9.jpg" id="item-9" alt="item-9" /><span style="width:200px; height:230px;"><b> Book Details:</b><br><br>Name: SOME NAME9 <br> Author: SOME AUTHOR <br> Rating: 3/5 <br>Rent: 30</span></a>
					</div>
					<!--<a href="#" id="cPrev">Prev</a> | <a href="#" id="cNext">Next</a> -->

					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec varius libero id sapien imperdiet, a dignissim erat fringilla. Integer vitae odio iaculis, posuere sapien vel, blandit turpis. Curabitur quam tellus, vehicula a diam eget, porttitor egestas lectus. Duis sagittis augue sed eleifend fringilla. Curabitur semper tellus augue, in suscipit est congue et. Ut vestibulum arcu at massa dictum, sit amet ultricies lectus maximus. Vestibulum augue quam, efficitur eget tortor non, pellentesque tempor elit. Nunc pretium sed augue nec efficitur.Vestibulum commodo nisi quis rhoncus faucibus. Donec fringilla rutrum tempor. Fusce eleifend odio quis est aliquam gravida. Etiam nec risus volutpat. </p>
					<a id="signup" href="#modal" name="signup" rel="leanModal"><h3>Find out more</h3></a>
					<br>
					
					<a id="signup" href="#modal" name="signup" rel="leanModal"><h1>MAGAZINES</h1></a>
					<p>Duo reque facer ea, nibh pertinax eam te. In qui malis causae bonorum. Et sed euismod iracundia, an mea facer virtute erroribus. Ea sed viderer dolores oporteat, ad eum stet duis errem, mea ullum antiopam gloriatur te. In quod percipitur mel, sit errem prompta incorrupte cu.Pri ad denique torquatos elaboraret, accusam invenire qui no, diam efficiantur pro ea. Justo paulo ut per, an nec quaeque indoctum definitiones. Id deleniti invenire pri, his at esse definitionem. Est ex enim zril semper.Vim essent splendide scripserit eu, ei usu sadipscing dissentiet. Iusto elitr facete eu usu, quo libris quidam ne, ex.</p>
					
					<a id="signup" href="#modal" name="signup" rel="leanModal"><h3>Find out more</h3></a>					
				</div><!-- col-lg -->
			</div><!-- row -->
			
		</div><!-- container -->
  

		<!-- ==== SECTION DIVIDER2 -->
		<section class="section-divider textdivider divider2">
			<div class="container">
				<h1>WRITE SOMETHING HERE</h1>
				<hr>
				<p>Lorem ipsum dolor sit amet, elitr possim at nam, usu in tota quaerendum deterruisset. Vix cu nostro causae vocibus. Quas erroribus eam te.</p>
			</div><!-- container -->
		</section><!-- section -->

		
		<!-- ==== TEAM MEMBERS ==== -->
		<div class="container" id="team" name="team">
		<br><br>
			<div class="row white centered">
				<h1 class="centered">MEET OUR AWESOME TEAM</h1>
				<hr>
				<br>
				<br>
				<div class="col-lg-4 col-sm-4 col-md-4 centered">
					<img class="img img-circle" src="assets/img/team/team01.jpg" height="120" width="120" alt="">
					<br>
					<h4><b>Mike Arney</b></h4>
					<a href="#" class="icon icon-twitter"></a>
					<a href="#" class="icon icon-facebook"></a>
					<a href="#" class="icon icon-flickr"></a>
					<p>Mike combines an expert technical knowledge with a real eye for design. Working with clients from a wide range of industries, he fully understands client objectives when working on a project, large or small.</p>
				</div><!-- col-lg-3 -->

				
				<div class="col-lg-4 col-sm-4 col-md-4 centered">
					<img class="img img-circle" src="assets/img/team/team01.jpg" height="120" width="120" alt="">
					<br>
					<h4><b>Mike Arney</b></h4>
					<a href="#" class="icon icon-twitter"></a>
					<a href="#" class="icon icon-facebook"></a>
					<a href="#" class="icon icon-flickr"></a>
					<p>Mike combines an expert technical knowledge with a real eye for design. Working with clients from a wide range of industries, he fully understands client objectives when working on a project, large or small.</p>
				</div><!-- col-lg-3 -->

				
				<div class="col-lg-4 col-sm-4 col-md-4 centered">
					<img class="img img-circle" src="assets/img/team/team01.jpg" height="120" width="120" alt="">
					<br>
					<h4><b>Mike Arney</b></h4>
					<a href="#" class="icon icon-twitter"></a>
					<a href="#" class="icon icon-facebook"></a>
					<a href="#" class="icon icon-github"></a>
					<p>Mike combines an expert technical knowledge with a real eye for design. Working with clients from a wide range of industries, he fully understands client objectives when working on a project, large or small.</p>
				</div><!-- col-lg-3 -->

				
				<div class="col-lg-4 col-sm-4 col-md-4 centered">
					<img class="img img-circle" src="assets/img/team/team01.jpg" height="120" width="120" alt="">
					<br>
					<h4><b>Mike Arney</b></h4>
					<a href="#" class="icon icon-twitter"></a>
					<a href="#" class="icon icon-facebook"></a>
					<a href="#" class="icon icon-flickr"></a>
					<p>Mike combines an expert technical knowledge with a real eye for design. Working with clients from a wide range of industries, he fully understands client objectives when working on a project, large or small.</p>
				</div><!-- col-lg-3 -->

				
				<div class="col-lg-4 col-sm-4 col-md-4 centered">
					<img class="img img-circle" src="assets/img/team/team01.jpg" height="120" width="120" alt="">
					<br>
					<h4><b>Mike Arney</b></h4>
					<a href="#" class="icon icon-twitter"></a>
					<a href="#" class="icon icon-facebook"></a>
					<a href="#" class="icon icon-flickr"></a>
					<p>Mike combines an expert technical knowledge with a real eye for design. Working with clients from a wide range of industries, he fully understands client objectives when working on a project, large or small.</p>
				</div><!-- col-lg-3 -->
				
			</div><!-- row -->
		</div><!-- container -->

		
		<!-- ==== SECTION DIVIDER3 ==== -->
		<section class="section-divider textdivider divider3">
			<div class="container">
				<h1>CRAFTED IN NEW YORK, USA.</h1>
				<hr>
				<p>Some Address 987,</p>
				<p>+34 9884 4893</p>
				<p><a class="icon icon-twitter" href="#"></a> | <a class="icon icon-facebook" href="#"></a></p>
			</div><!-- container -->
		</section><!-- section -->
		
		
		<!-- ==== CONTACT ==== -->
		<div class="container" id="contact" name="contact">
			<div class="row">
			<br><br>
				<h1 class="centered">THANKS FOR VISITING US</h1>
				<hr>
				<br>
				<br>
				<div class="col-lg-4 col-sm-4 col-md-4">
					<h3>Contact Address</h3>
					<p><span class="icon icon-home"></span> Some Address 987, NY<br/>
						<span class="icon icon-phone"></span> +34 9884 4893 <br/>
						<span class="icon icon-mobile"></span> +34 59855 9853 <br/>
						<span class="icon icon-envelop"></span> <a href="#"> agency@blacktie.co</a> <br/>
						<span class="icon icon-twitter"></span> <a href="#"> @blacktie_co </a> <br/>
						<span class="icon icon-facebook"></span> <a href="#"> BlackTie Agency </a> <br/>
					</p>
				</div><!-- col -->
				
				<div class="col-lg-4 col-sm-4 col-md-4">
					<h3>Queries</h3>
					<p>
						<form class="form-horizontal" role="form" method="post">
							<div class="col-lg-11">
								<div class="form-group">
									<input name="fullname" type="text" class="form-control" id="input_name" placeholder="Name...">
								</div>
								  
								<div class="form-group">
									<input name="email" type="email" class="form-control" id="input_email" placeholder="Email...">
								</div>
							
								<div class="form-group">
									<textarea name="message" rows="3" class="form-control" id="input_message" placeholder="Message..."></textarea><br>
									<button type="submit" class="btn btn-primary pull-right">SEND</button>
								</div>
							</div>
							
						</form><!-- form -->
					</p>
				</div>
			
				
				<div id="gmap" class="col-lg-4 col-sm-4 col-md-4">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30450.929390155332!2d78.4253165!3d17.4421795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x55688a47709711ac!2sRBI+Staff+Quarters!5e0!3m2!1sen!2sin!4v1411936866687" width="350" height="290" frameborder="0" style="border:0"></iframe>
				</div>
			</div><!-- row -->
		</div><!-- container -->
		
		
		
		<!-- ==== FOOTER ==== -->
		<div id="footerwrap">
			<div class="container">
				<h4>Copyright © 2014 <a href="#"><strong>Readers' Junction</strong></a></h4>
			</div>
		</div>

		<!-- ==== LOGIN POPUP ==== -->
		<div id="modal" class="popupContainer" style="display:none;">
			<header class="popupHeader">
			<span class="header_title">Login</span>
			<span class="modal_close"><i class="icon icon-cancel-circle"></i></span>
			</header>
				<section class="popupBody">
				<!-- Social Login -->
				<div class="social_login">
					<div class="">
						<a href="fbLogin/fb.html" class="social_box fb">
							<span class="icon"><i class="icon icon-facebook"></i></span>
							<span class="icon_title">Connect with Facebook</span>
						</a>

					
						<?php echo '<a href="'.$authUrl.'" class="social_box google">';?>
							<span class="icon"><i class="icon icon-google-plus"></i></span>
							<span class="icon_title">Connect with Google</span>
						</a>
					</div>

					<div class="centeredText">
						<span>Or use your Email address</span>
					</div>

					<div class="action_btns">
						<div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
						<div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
					</div>
				</div>

				<!-- Username & Password Login form -->
				<div class="user_login">
					<form name="login_form" action="login.php" method="POST">
						<label>Email</label>
							<input type="email" name="mail" id="mail" />
							<br />

						<label>Password</label>	
							<input type="password" name="pass" id="pass" />
							<br />

						<div class="checkbox">
							<input id="remember" type="checkbox" name="remember" value="1">
							<label for="remember">Remember me (to be implemented)</label>
						</div>

						<div class="action_btns">
							<div class="one_half"><a href="#" class="btn back_btn">Back</a></div>
							<div class="one_half last"><input type="submit" class="btn btn_red" value="Login" name="login" /></div>
						</div>
					</form>
					<a href="#" class="forgot_password">Forgot password?</a>
				</div>

				<!-- Register Form -->
				<div class="user_register">
					<form method="POST" action="login.php" name="signup">
						<label>Full Name</label>
						<input type="text" name="name" id="name" />
						<br />

						<label>Email Address</label>
						<input type="email" name="mail" id="mail" />
						<br />

						<label>Password</label>
						<input type="password"  name="pass" id="pass" />
						<br />

						<div class="checkbox">
							<input id="send_updates" type="checkbox" />
							<label for="send_updates">Send me occasional email updates</label>
						</div>

						<div class="action_btns">
							<div class="one_half"><a href="#" class="btn back_btn">Back</a></div>
							<div class="one_half last"><input type="submit" class="btn btn_red" value="Signup" name="signup"></div>
						</div>
					</form>
				</div>
				</section>
		</div>
	
	
	
		
		<!-- ==== JAVASCRIPT ==== -->
		<!-- Placed at the end of the document so the pages load faster -->
			
		
		<script type="text/javascript" src="assets/js/jquery-func.js"></script>
		<script type="text/javascript" src="assets/js/jquery.leanModal.min.js"></script>
		<script type="text/javascript" src="assets/js/retina.js"></script>
		<script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="assets/js/smoothscroll.js"></script>
		<script type="text/javascript" src="assets/js/modernizr.custom.js"></script>
		
		<script type="text/javascript" src="assets/js/jquery.waterwheelCarousel.js"></script>
		<script type="text/javascript" src="assets/js/carouselFunc.js"></script>
		<script type="text/javascript" src="assets/js/googleLoginFunc.js"></script>
		<script type="text/javascript" src="assets/js/mapFunc.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js"></script>
		
		<!-- TO BE SHIFTED TO EXTERNAL FILE-->
		
		<script type="text/javascript">
	$("a[rel*=leanModal]").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

	$(function(){
		// Calling Login Form
		$("#login_form").click(function(){
			$(".social_login").hide();
			$(".user_login").show();
			return false;
		});

		// Calling Register Form
		$("#register_form").click(function(){
			$(".social_login").hide();
			$(".user_register").show();
			$(".header_title").text('Register');
			return false;
		});

		// Going back to Social Forms
		$(".back_btn").click(function(){
			$(".user_login").hide();
			$(".user_register").hide();
			$(".social_login").show();
			$(".header_title").text('Login');
			return false;
		});

	})
</script>
		
		
 </body>

</html>
