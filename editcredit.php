

<?php

session_start();

 $servername = "localhost";
 $user= "root";
 $passwd = "";
 $db = "mobilink";

 $conn = new mysqli( $servername, $user, $passwd, $db);

if(!isset($_SESSION['using'])||$_SESSION['using']==false){
       header("Location:adminlogin.php");
  }


 if(isset($_POST['regular'])){

 	$regularuser = $_POST['regularname'];

 	   $_SESSION['ruser'] = $regularuser;

   header("location:regularcustomer.php");

	

 }

if(isset($_POST['premium'])){

 	$premiumuser = $_POST['premiumname'];

  $_SESSION['puser'] = $premiumuser;

     header("location:premiumcustomer.php");
 }

?>


<html>
<style>
.form-style-9{
  max-width: 450px;
  background: #FAFAFA;
  padding: 30px;
  margin: 50px auto;
  box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
  border-radius: 10px;
  border: 6px solid #305A72;
}


.form-style-10{
  max-width: 450px;
  background: #FAFAFA;
  padding: 30px;
  margin: 50px auto;
  box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
  border-radius: 10px;
  border: 6px solid #852637;
}

.form-style-9 ul li input[type="button"], 
.form-style-9 ul li input[type="submit"] {
  -moz-box-shadow: inset 0px 1px 0px 0px #3985B1;
  -webkit-box-shadow: inset 0px 1px 0px 0px #3985B1;
  box-shadow: inset 0px 1px 0px 0px #3985B1;
  background-color: #216288;
  border: 1px solid #17445E;
  display: inline-block;
  cursor: pointer;
  color: #FFFFFF;
  padding: 8px 18px;
  text-decoration: none;
  font: 12px Arial, Helvetica, sans-serif;
}
.form-style-9 ul li input[type="button"]:hover, 
.form-style-9 ul li input[type="submit"]:hover {
  background: linear-gradient(to bottom, #2D77A2 5%, #337DA8 100%);
  background-color: #28739E;
}

.form-style-10 ul li input[type="button"], 
.form-style-10 ul li input[type="submit"] {
  -moz-box-shadow: inset 0px 1px 0px 0px #3985B1;
  -webkit-box-shadow: inset 0px 1px 0px 0px #3985B1;
  box-shadow: inset 0px 1px 0px 0px #3985B1;
  background-color: #216288;
  border: 1px solid #17445E;
  display: inline-block;
  cursor: pointer;
  color: #FFFFFF;
  padding: 8px 18px;
  text-decoration: none;
  font: 12px Arial, Helvetica, sans-serif;
}
.form-style-10 ul li input[type="button"]:hover, 
.form-style-10 ul li input[type="submit"]:hover {
  background: linear-gradient(to bottom, #2D77A2 5%, #337DA8 100%);
  background-color: #28739E;
}

.form-style-9 ul li textarea{
  width: 100%;
  height: 100px;
}

</style>
<body>

<h1><b><i>ADMIN CONTROL PANNEL</i></b></h1>


	<form method= "post" class="form-style-9" >
	
       <h1>For regular customer updating of credits :-</h1>
          USERNAME:

   <ul>
<li>       
  <input type="text"  name="regularname" placeholder="enter regular username">
</ul>
    </li> 


<ul>
<li>
      <input type="submit" value="Submit" name="regular">
</ul>
    </li>  


	</form>







	<form method= "post" class="form-style-10" >
<h1>For premium customer updating of credits and sender name :-</h1>
        PREMIUM USERNAME:

  <input type="text"  name="premiumname" placeholder="enter premium username">
<ul>
<li>
       <input type="submit" value="Submit" name= "premium">
</ul>
</li>
	</form>

<form  class="form-style-10" >
  <ul>
<li>
     <a href="logout.php">PLEASE LOGOUT HERE</a>
     </ul>
</li>
  </form>

</body>

</html>