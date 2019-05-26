<?php

session_start();

$servername = "localhost";
 $user= "root";
 $passwd = "";
 $db = "mobilink";

 $conn = new mysqli( $servername, $user, $passwd, $db);


if(!isset($_SESSION['use'])||$_SESSION['use']==false){
       header("Location:http://localhost/hushar/mobilink/loginsms.php");
  }


 $queryabc = "SELECT uid , username , firstname , lastname , mobilenumber , emailid , credit FROM users where username = '".$_SESSION['login_user']."' " ;
 	
if( $result = $conn->query($queryabc))
{
	while($row=$result->fetch_assoc())
	{
		$fetchuid = $row['uid'];

		$fetchusername = $row['username'];

		$fetchfirstname = $row['firstname'];

		$fetchlastname = $row['lastname'];

		$fetchmobile = $row['mobilenumber'];

		$fetchemailid = $row['emailid'];

		$fetchcredit = $row['credit'];
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<STYLE>
.buttone {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #00F402;
}

.button2:hover {
  background-color: #00F402;
  color: white;
}

		.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 46px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 26px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}
	</STYLE>
	<meta charset="utf-8">
	<title>Easy Profile Blue - templatemo</title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
<!-- 
Easy Profile Template
http://www.templatemo.com/tm-467-easy-profile
-->
	<!-- stylesheet css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/templatemo-blue.css">
</head>
<body data-spy="scroll" data-target=".navbar-collapse">

<!-- preloader section -->
<div class="preloader">
	<div class="sk-spinner sk-spinner-wordpress">
       <span class="sk-inner-circle"></span>
     </div>
</div>

<!-- header section -->
<header>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<img src="images/avatar.png" border="0" width="100" height="100" class="img-responsive img-circle tm-border" alt="templatemo easy profile">
				<hr>
				<h1 class="tm-title bold shadow">Hi, USER <br>Welcome to your profile</h1>

				<input type="text" name="cucuname" placeholder= "<?php echo $_SESSION['login_user']; ?>" style="width:300px"disabled  "  align : "center" >
<BR><BR><BR>
				<a href ="http://localhost/hushar/mobilink/sendsms.php"><button class="button button1">CLICK HERE TO SEND SMS</button></a>

		<!--		<h1 class="white bold shadow">
<img border="0" alt="W3Schools" src="message.png" width="201" height="100"></h1>
			-->
			</div>
		</div>
	</div>
</header>

<!-- about and skills section -->
<section class="container">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="about">
				<h3 class="accent">YOUR PROFILE</h3>
				<h2><?php echo $fetchfirstname ?>  <?php echo $fetchlastname ?></h2>
				<p>  YOUR USER ID IS ==>  <?php echo $fetchuid ?></p>
				<p>  YOUR USER NAME IS  ==>     <?php echo $fetchusername ?></p>
				<p>  YOUR FIRST NAME IS ==>     <?php echo $fetchfirstname ?></p>
				<p>  YOUR LAST NAME IS  ==>     <?php echo $fetchlastname ?></p>
				<p>  YOUR MOBILE NUMBER IS ==>  <?php echo $fetchmobile ?></p>
				<p>  YOUR EMAIL ID IS     ==>   <?php echo $fetchemailid ?></p>
				<!--
				 <a href="index-green.html">Green</a>, <a href="index.html">Blue</a>, <a href="index-gray.html">Gray</a>, and <a href="index-orange.html">Orange</a>. Sed vitae dui in neque elementum tempor eu id risus. Phasellus sed facilisis lacus, et venenatis augue.</p> -->
			</div>
		</div>
		<div class="col-md-6 col-sm-12">
			<div class="skills">
				<h2 class="white">CREDIT LEFT IN YOUR ACCOUNT IS " <?php echo $fetchcredit ?> "</h2>
				<!--
				<strong>PHP MySQL</strong>
				<span class="pull-right">70%</span>
					<div class="progress">
						<div class="progress-bar progress-bar-primary" role="progressbar" 
                        aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
					</div>
				<strong>UI/UX Design</strong>
				<span class="pull-right">85%</span>
					<div class="progress">
						<div class="progress-bar progress-bar-primary" role="progressbar" 
                        aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;"></div>
					</div>
				<strong>Bootstrap</strong>
				<span class="pull-right">95%</span>
					<div class="progress">
						<div class="progress-bar progress-bar-primary" role="progressbar" 
                        aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;"></div>
                       -->
                     <a href = "https://www.mobilink.co.in/#contact"><button  class="buttone button2">BUY CREDIT NOW</button></a>

                      <a href = "https://www.mobilink.co.in/#contact"/><button class="buttone button2">BECOME PREMIUM MEMBER</button></a>
                      <br><h4>
                      just call us... its that simple
                      </h4>
                     <p>
					</div>
			</div>
		</div>
	</div>
</section>

<!-- education and languages -->
<section class="container">
	<div class="row">
		<div class="col-md-8 col-sm-12">
			<div class="education">
				<h2 class="white">WANT YOUR OWN SMS DOMAIN / NAME</h2>
					<div class="education-content">
						<h4 class="education-title accent">PREMIUM MEMBERSHIP</h4>
							<div class="education-school">
								<h5>HIGHLIGHT YOUR COMPANY</h5><span></span>
								<h5>GET YOUR OWN SMS NAME AT LOWEST PRICE </h5>
							</div>
						<p class="education-description">YOUR CUSTOM NAME WILL APPEAR AT ALL YOUR CUSTOMER MOBILE WHEN YOU SEND SMS , THIS WILL BOOST YOUR BUSSINESS AND HELP YOU ENGAGING YOUR COUSTOMER WITH YOU MORE RELEVANTLY AND "PROMOTE YOU BRAND".......</p>
					</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-12">
			<div class="languages">
				<h2>Languages support in sms</h2>
					<ul>
						<li>unicode sms all languages support</li>
						<li>Hindi / urdu/marathi etc</li>
						<li>Myanmar / Thai</li>
						<li>English / Spanish</li>
						<li>Chinese / Japanese</li>
						<li>Arabic / Hebrew</li>
					</ul>
			</div>
		</div>
	</div>
</section>

<!-- contact and experience -->
<section class="container">
	<div class="row">
		<div class="col-md-4 col-sm-12">
			<div class="contact">
				<h2>Contact</h2>
					<p><i class="fa fa-map-marker"></i>Ph: 0721- 2574561, 2590020. Fax: 0721- 2572426</p>
					<p><i class="fa fa-phone"></i> Vinit – (+91) 94228 55048</p>
					<p><i class="fa fa-envelope"></i>Suchita – (+91) 98239 84559</p>
					<p><i class="fa fa-globe"></i>Reilance – (+91) 93706 25878</p>
					<p><i class="fa fa-globe"></i>Email: mobilink.software@gmail.com</p>
			</div>
		</div>
		<div class="col-md-8 col-sm-12">
			<div class="experience">
				<h2 class="white">ABOUT US</h2>
					<div class="experience-content">
						<h4 class="experience-title accent">MOBILINK SOFTWARE</h4>
						<h5>Bulk SMS SERVICE PROVIDER COMPANY</h5><span></span>
						<h5>Group Messaging<br>
                            Two Way SMS<br>
                            Virtual Mobile Number<br>
                            Net sms<br>
                            <br>
						<p class="education-description">Mobilink Software is among the leaders in providing effective, efficient and responsive two-way SMS (Short Messaging Service) text messaging software applications (desktop tools) and services provider (SMS aggregator) for wireless communication.</p>
					</div>
			</div>
		</div>
	</div>
</section>

<!-- footer section -->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<p>Copyright &copy; 2084 Your Easy Profile</p>
				<ul class="social-icons">
					<li><a href="#" class="fa fa-facebook"></a></li>
                    <li><a href="#" class="fa fa-google-plus"></a></li>
					<li><a href="#" class="fa fa-twitter"></a></li>
					<li><a href="#" class="fa fa-dribbble"></a></li>
					<li><a href="#" class="fa fa-github"></a></li>
					<li><a href="#" class="fa fa-behance"></a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>

<!-- javascript js -->	
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>	
<script src="js/jquery.backstretch.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
