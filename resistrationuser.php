<?php


session_start();

 $servername = "localhost";
 $user= "root";
 $passwd = "";
 $db = "mobilink";

 $conn = new mysqli( $servername, $user, $passwd, $db);


 if(! $conn ) {
      die('Could not connect: ' . mysql_error());
      }
      else
      {

	   echo "connected";

	   echo "<br>";

     if(isset($_POST['Submit'])) {

     $uname = $_POST["UserName"];

     $upwd = $_POST["UserPwd"];

     $ufirstname = $_POST["FirstName"];

     $ulastname = $_POST["LastName"];

     $umobile = $_POST['Mobile'];

     $uemailid = $_POST["EmailID"];
   

     $sql_u = "SELECT * FROM users WHERE username = '$uname' ";

     $res_u = mysqli_query($conn, $sql_u);


             $sql_m = "SELECT * FROM users WHERE mobilenumber = '$umobile' ";

             $res_m = mysqli_query($conn, $sql_m);


                   $sql_email = "SELECT * FROM users WHERE emailid = '$uemailid' ";

                   $res_email = mysqli_query($conn, $sql_email);




     if(mysqli_num_rows($res_u) > 0) {

     	$name_error = "sorry... user name already taken";

     	echo "$name_error";

     	echo "<script type='text/javascript'>alert('$name_error');</script>";
        


     }

      elseif(mysqli_num_rows($res_m) > 0) {

     	$mobile_error = "sorry... mobile number already exist";

     	echo "$mobile_error";

     	echo "<script type='text/javascript'>alert('$mobile_error');</script>";
        
       }


       elseif(mysqli_num_rows($res_email) > 0) {

     	$mobile_error = "sorry... emailid already exist";

     	echo "$mobile_error";

     	echo "<script type='text/javascript'>alert('$mobile_error');</script>";
        
       }


     else{

      $sqlo = "INSERT INTO users
      (uid, username, userpassword , firstname, lastname,  mobilenumber, emailid ) 
      VALUES ( '' ,'$uname','$upwd', '$ufirstname', '$ulastname', '$umobile', '$uemailid' )";
	  
	   echo "Entered data successfully\n";

	  $retval = mysqli_query( $conn, $sqlo );
	  
	   if(! $retval ) {
      die('Could not enter data: ' . mysqli_error($conn));
      }
      else{
      	header('location:login.php');
      }

  }

   } 
   
   

}
   
   mysqli_close($conn);


       
?>

<html>
<HEAD>
	<style>

     TR{
     	 padding: 20px;
     }

     TD{
     	padding: 15px;
     }

       .button1 {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
    }

* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.buttons {
    margin: 10%;
    text-align: center;
}

.btn-hover {
    width: 200px;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    margin: 20px;
    height: 55px;
    text-align:center;
    border: none;
    background-size: 300% 100%;

    border-radius: 50px;
    moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
}

.btn-hover:hover {
    background-position: 100% 0;
    moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
}

.btn-hover:focus {
    outline: none;
}

.btn-hover.color-1 {
    background-image: linear-gradient(to right, #25aae1, #40e495, #30dd8a, #2bb673);
    box-shadow: 0 4px 15px 0 rgba(49, 196, 190, 0.75);
}
.btn-hover.color-2 {
    background-image: linear-gradient(to right, #f5ce62, #e43603, #fa7199, #e85a19);
    box-shadow: 0 4px 15px 0 rgba(229, 66, 10, 0.75);
}

.col-75 {
  
  width: 50%;
  margin-top: 6px;
  length : 30px;
 font-weight: bold;
font-style: italic;

}

.INPUT {
                   border-radius: 25px;
		}
		
		.tbl{
			 border-radius: 25px;
		}
	</style>
<TITLE>Mobilink Software - NetSMS Registration Page</TITLE>
<script language="javascript">

      function myFunction() {
  alert("I am an alert box!");
}


	 function btnSubmit_onclick()
	 {
	 
		
		
		if(document.forms[0].UserName.value=="")
		{
			if(document.all)
				document.all.item("spanStatus").innerHTML = "Error: Please Enter Username";
			else
				document.getElementById("spanStatus").innerHTML = "Error: Please Enter Username";	
			
			window.alert("Please Enter Username");
			
			document.forms[0].UserName.focus();
			return true;  
		}
	/*	else if(document.forms[0].UserName.value.length<7)
		{
			if(document.all)
				document.all.item("spanStatus").innerHTML = "Error: Please Enter Username Minimum 6 Characters";
			else
				document.getElementById("spanStatus").innerHTML = "Error: Please Enter Username Minimum 6 Characters";	
			
			window.alert("Please Enter Username Minimum 6 Characters");
			
			document.forms[0].UserName.focus();
			return true; 
		}
	*/
		if(document.forms[0].UserPwd.value=="")
		{
			if(document.all)
				document.all.item("spanStatus").innerHTML = "Error: Please Enter Password";
			else
				document.getElementById("spanStatus").innerHTML = "Error: Please Enter Password";	
		
			window.alert("Please Enter Password");
			document.forms[0].UserPwd.focus();
			return true;  
		}
		if(document.forms[0].Confirm.value=="")
		{
			if(document.all)
				document.all.item("spanStatus").innerHTML = "Error: Please Enter Confirm Password";
			else
				document.getElementById("spanStatus").innerHTML = "Error: Please Enter Confirm Password";	

			window.alert("Please Enter Re-Type Password in The Confirm Password field");
			document.forms[0].Confirm.focus();
			return true;  
		}
		
		if(document.forms[0].UserPwd.value!=document.forms[0].Confirm.value)
		{
			if(document.all)
				document.all.item("spanStatus").innerHTML = "Error: Password does'nt match with Confirm Password";
			else
				document.getElementById("spanStatus").innerHTML = "Error: Password does'nt match with Confirm Password";	

			window.alert("Password does'nt match with Confirm Password");
			document.forms[0].Confirm.focus();
			return true;  
		}
		if(document.forms[0].FirstName.value=="")
		{
			if(document.all)
				document.all.item("spanStatus").innerHTML = "Error: Please Enter First Name";
			else
				document.getElementById("spanStatus").innerHTML = "Error: Please Enter First Name";	

			window.alert("Please Enter Your First Name");
			document.forms[0].FirstName.focus();
			return true;  
		}
		if(document.forms[0].LastName.value=="")
		{
			if(document.all)
				document.all.item("spanStatus").innerHTML = "Error: Please Enter Last Name";
			else
				document.getElementById("spanStatus").innerHTML = "Error: Please Enter Last Name";	

			window.alert("Please Enter Your Last Name");
			document.forms[0].LastName.focus();
			return true;  
		}
		if(document.forms[0].Mobile.value=="")
		{
			document.getElementById("spanStatus").innerHTML = "Error: Please Enter Your Mobile Number";	
			window.alert("Please Enter Your Mobile Number");
			document.forms[0].Mobile.focus();
			return true;  
		}
		if(isNaN(document.forms[0].Mobile.value))
		{
			document.getElementById("spanStatus").innerHTML = "Error: Please Enter Your Valid 12 Digit Mobile Number , Example: 919422856687";	
			window.alert("Please Enter Your Valid 12 Digit Mobile Number , Example: 919422856687");
			document.forms[0].Mobile.focus();
			return true;  
		}
		if(document.forms[0].Mobile.value.length!=12 || document.forms[0].Mobile.value.indexOf("91")!=0)
		{
			document.getElementById("spanStatus").innerHTML = "Error: Please Enter Your Valid 12 Digit Mobile Number , Example: 919422856687";	
			window.alert("Please Enter Your Valid 12 Digit Mobile Number , Example: 919422856687");
			document.forms[0].Mobile.focus();
			return true;  
		}
		if(document.forms[0].EmailID.value=="")
		{
			if(document.all)
				document.all.item("spanStatus").innerHTML = "Error: Please Enter Your Email-ID <br>Note: Email-ID will be used to recover your Username/Password";
			else
				document.getElementById("spanStatus").innerHTML = "Error: Please Enter Your Email-ID <br>Note: Email-ID will be used to recover your Username/Password";	

			window.alert("Please Enter Your Email-ID \n\nNote: Email-ID will be used to recover your Username/Password");
			document.forms[0].EmailID.focus();
			return true;  
		}
		if(document.forms[0].EmailID.value.indexOf("@") < 3)
		{
			if(document.all)
				document.all.item("spanStatus").innerHTML = "Error: Please Enter Your Valid Email-ID <br>Note: Email-ID will be used to recover your Username/Password";
			else
				document.getElementById("spanStatus").innerHTML = "Error: Please Enter Your Valid Email-ID  <br>Note: Email-ID will be used to recover your Username/Password";

			window.alert("Please Enter Your Valid Email-ID \n\nNote: Email-ID will be used to recover your Username/Password");
			document.forms[0].EmailID.focus();
			return true;  
		}
		
		document.images["imgStatus"].src = "../Common/Icons/loading_anim.gif";
		document.getElementById("spanStatus").innerHTML = "Registration process in progress...";
		
		document.forms[0].submit(); 
		return true;
	 }
		
	</script>
<!-- End Preload Script -->
<style type="text/css">
<!--
.style1 {color: #0376B1}
-->
</style>
</HEAD>

<div align="center">

  <center>

  <table border="0" cellpadding="50px" cellspacing="50px" style="BORDER-COLLAPSE: collapse" width="70%"  id="AutoNumber11" height="90%" border-radius= "25px">
    
       <tr cellpadding="50px" cellspacing="50px">
       	<td>
       		<img src="Mobilink_02.gif" class="user" width="17%">
       	</td>
       </tr>

    <tr>
           
      <td width="90%" height="90%" bgcolor=#f7f7f7 align="center" valign="top"><span id="span1" name="span1" style="font-color:#ff0000 font-weight:bold; font-size:10">
		<p>&nbsp;</p>


	<FORM NAME="fNewUser" METHOD="POST">

	<div align="center"><FONT color=#FF0000 size=5><b>New User Registration</b></FONT>
		<br>
	<b><font size="2" face="Tahoma">( '</font><FONT size="2" face="Tahoma" color="red">*</font><font size="2" face="Tahoma">' Mark Fields must not be Empty )</font></b>

		<table align='center' width='95%' height='95%' cellspacing='0' cellpadding='0' border='1' bordercolor=#FF2424 bordercolorlight=#ffffff><tr><td>LOGIN AND GET HUGE CREDIT FREE FOR FREE BULK SMS<TR height='30'><TD bgcolor=#ffffff><FONT size='2' face='Tahoma' color='red'><b>&nbsp;&nbsp;"

				<br>
	<table align="center" width="95%" cellspacing="0" cellpadding="0" border="1" bordercolor=#DFDEDD bordercolorlight=#FFFFFF><tr><td>
	
		<table align="center" class="tbl" width="100%"  >

			<TR height="30">
				<TH colspan=3 background="../Common/Icons/blue.jpg"><FONT size="2" color=#000000><b><h1>Please enter your information</h1></b></FONT>   </TH>
			</TR>

			<TR>
				<TD align="left" width="25%"><FONT color="red" size="2"> * </font><font color=#0086CF>Username</font></TD>
					<div class="col-75">
				<TD width="50%">&nbsp;<INPUT NAME="UserName" size=46 style="WIDTH: 250px; HEIGHT: 30px" value=""  placeholder= "ENTER USERNAME"></TD>
				    </div>
				<TD width="25%"><font size="1">YOUR USER NAME MUST BE VERY UNIQUE</font></TD>
			</TR>
		    
			<TR>
				<TD align="left"><FONT color="red" size="2"> * </font><font color=#0086CF>Password</font></TD>
				<TD>&nbsp;<INPUT TYPE="password" NAME="UserPwd" size=46 style="WIDTH: 250px; HEIGHT: 30px"placeholder= "ENTER PASSWORD"></TD>
				<TD><font size="1">Minimum 6 and Maximum 8 </font></TD>
			</TR>

			<TR>
				<TD align="left"><FONT color="red" size="2"> * </font><font color=#0086CF>Confirm-Password</font></TD>
				<TD width="50%">&nbsp;<INPUT type="password" NAME="Confirm" size=46 style="WIDTH: 250px; HEIGHT: 30px" placeholder= "CONFIRM PASSWORD" ></TD>
				<TD><font size="1">Re-type for confirmation </font></TD>
			</TR>
			
			<TR>
				<TD align="left"><FONT color="red" size="2"> * </font><font color=#0086CF>First Name</font></TD>
				<TD width="50%">&nbsp;<INPUT NAME="FirstName" size=46 style="WIDTH: 250px; HEIGHT: 30px" value="" placeholder= "ENTER FIRSTNAME"></TD>
				<TD><font size="1">15 Characters </font></TD>
			</TR>

			<TR>
				<TD align="left"><FONT color="red" size="2"> * </font><font color=#0086CF>Last Name</font></TD>
				<TD width="50%">&nbsp;<INPUT NAME="LastName" size=46 style="WIDTH: 250px; HEIGHT: 30px" value="" placeholder= "ENTER LASTNAME" border-radius = 20px ></TD>
				<TD><font size="1">20 Characters </font></TD>
			</TR>
			
			<TR>
				<TD align="left"><FONT color="red" size="2"> * </font><font color=#0086CF>Mobile Number</font> </TD>
				<TD width="50%">&nbsp;<INPUT NAME="Mobile" size=46 style="WIDTH: 250px; HEIGHT: 30px" maxlength="12" value="" placeholder= "ENTER MOBILENUMBER"><marquee><font size=1>You must enter your mobile number to use as your SenderID<font></font></font></marquee></TD>
				<TD><font size="1">91 + 10 Digit mobile number<br> example: 919422856687 </font></TD>
			</TR>
			<TR>
				<TD align="left"><FONT color="red" size="2"> * </font><font color=#0086CF>Email Id:</font></TD>
				<TD width="50%">&nbsp;<INPUT NAME="EmailID" size=46 style="WIDTH: 250px; HEIGHT: 30px" value=""placeholder= "ENTER YOUR EMAIL"></TD>
				<TD><font size="1">Necessary to recover your username and password </font></TD>

				<!--
			</TR>
			<TR><TD colspan="3">&nbsp;</td></tr>
			<TR><TD colspan="3"><span id="spanStatus" name="spanStatus" style="color:#ff0000">&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
                     -->

             </table></td></tr></table><br>

	
		
		<input type="reset" name="reset" value="Reset All" class="btn-hover color-1"> 


        <button   class="btn-hover color-2" name="Submit" type="submit">Register</button>


        <button   class="btn-hover color-1" name="premium" type="submit"><a href = "premiumregistration.php">PREMIUM MEMBERSHIP</a></button>

<!--
		<input type="button" name="btnSubmit" METHOD= "POST"  type="submit" Value="PREMIUM MEMBERSHIP" class="btn-hover color-2" language="javascript" onclick="return btnSubmit_onclick()">
		-->
	</div>
	</FORM>
      </td></tr>
      </table>
      
     
  </center>
  </div>
<body>

</body>

</html>