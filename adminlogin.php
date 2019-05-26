

 <html>


<head>ADMIN LOGIN PAGE
<style>
body
{
	
	margin:0;
	padding:0;
	background:url("bulk-sms.jpg");
	background-size:cover;
	font-family: sans-serif; 
}

.loginBox
{
	position:absolute;
	top:50%;
	left:50%;
	transform: translate(-50%, -50%);
	width:350px;
	height:420px;
	padding:80px 40px;
	box-sizing: border-box;
	background:rgba(0,0,0,0.5) ;
	
}



h2
{
	margin:0;
	padding:0 0 20px;
	color:#1E90FF;
	text-align:center;
} 



.loginBox p
{
	padding:0;
	margin:0;
	font-weight:bold;
	color:#fff;
	
} 


.loginBox input
{
	width:100%;
	margin-bottom: 20px; 
}

.loginBox input[type="text"], .loginBox input[type="password"]
{
	border: none;
	border-bottom: 1px solid #fff;
	background: transparent;
	outline:none;
	height:40px;
	color:#fff;
	font-size: 16px;
	
	
}


.loginBox button[type="submit"]
{
	border:none;
	outline:none;
	height: 40px;
	color:#fff;
	font-size:16px;
	background: rgb(255,38,126);
	cursor:pointer;
	border-radius:20px;
	width:100%;
}


.loginBox button[type="submit"]:hover
{
	background: #4CAF50;
	color: #262626;
}
 
 
 

.loginBox a
{
	color: #fff;
	font-size:14px;
	font-weight:bold;
} 


::placeholder
{
	color:rgba(255,255,255,0.5); 
}


.user
{
	width:100px;
	height:100px; 
	overflow:hidden;
	position:absolute;
	top:calc(-100px/2);
	left:calc(50% - 50px);
	border-radius:50%;
}
 


</style>
</head>
<body>
<div class="loginBox">
<img src="Mobilink_02.gif" class="user">
<h2>ADMIN Log In Here</h2>
<form method= "post"  >

<p>ADMIN USERNAME</p> <input type="text" placeholder="Enter Username" name="uname" required><br><br><br>

<p>ADMIN PASSWORD</p> <input type="PASSWORD" placeholder="Enter password" name="passname" required><br><br><br>

<button type="submit" name= "submitlogin" value= "submit">Login</button>

</form>
</div>
</body>
</html>

 <?php

session_start();

 $servername = "localhost";
 $user= "root";
 $passwd = "";
 $db = "mobilink";

 $conn = new mysqli( $servername, $user, $passwd, $db);
 
if(isset($_POST['submitlogin'])) {
	
  $myusername = $_POST['uname'];
  
  $mypassword = $_POST['passname'];
  
 
  
  $sqli = " SELECT aid from admin WHERE admin_name='$myusername' and admin_password='$mypassword' ";
  
  $result = mysqli_query($conn,$sqli);
  
  $row = mysqli_fetch_array($result);
  
  //$active = $row ['active'];
  
  $count = mysqli_num_rows($result);
  
  if($count==1){
	  
  

    $_SESSION['login_user'] = $myusername;

    $_SESSION['userid'] = $result;

	  echo"hello";
	  
	  //session_register("myusername");
	  
	 $_SESSION['using'] = true ;
	 
	  header("location:editcredit.php");
  }else{
	     $error = "your login Name or password is invalid";
  }
  
}
?>