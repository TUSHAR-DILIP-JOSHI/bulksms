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



 $fetchquery = "  SELECT credit,uid,username,userpassword,firstname,lastname,mobilenumber,emailid  FROM users where username = '".$_SESSION['ruser']."' " ;

if( $result = $conn->query( $fetchquery))
{
	while($row=$result->fetch_assoc())

	{

		$fetchcrd = $row['credit'];	

		$fetchuid = $row['uid'];	

		$fetchusername = $row['username'];

		$fetchuserpassword = $row['userpassword'];

		$fetchfirstname = $row['firstname'];

		$fetchlastname = $row['lastname'];

		$fetchmobilenumber = $row['mobilenumber'];

		$fetchemailid = $row['emailid'];

	}

}



if(isset($_POST['regularsubmit'])){

        $variablone = $_POST['regularcredit'];
      
	$sqlq= "UPDATE users SET credit = '$variablone' WHERE username = '".$_SESSION['ruser']."' ";


	 //$varcaller = SELECT 'caller' FROM insert_data WHERE id = $edit_record;
	        // $sql = "UPDATE  insert_data  SET
     // (  caller, channel , operator, circles,  name, product, remark, call_attained_by ) 
      //VALUES ( '$callername', '$channelname', '$operatorname','$circlesname', '$nameofname', '$productname', '$remarkname', '$callattainbyname' ) 
	 // WHERE 'id' = '$edit_record' ";

	  

	  $conn->query( $sqlq);{
	   
	  //$retval = mysqli_query( '$conn', $sqlq  );
	  
	//   if(! $retval ) {
     // die('Could not enter data: ' . mysqli_error($conn));
    //  }
   
   
   echo "Entered data successfully\n";}
   
}



//echo "<br>" ;echo "<br>" ;

//echo "COUSTOMER ID =>>"."$fetchuid" ;

//echo "<br>" ;echo "<br>" ;

//echo "COUSTOMER USERNAME =>>"."$fetchusername" ;

//echo "<br>" ;echo "<br>" ;

//echo "COUSTOMER PASSWORD =>>"."$fetchuserpassword" ;

//echo "<br>" ;echo "<br>" ;

//echo "COUSTOMER FIRSTNAME =>>"."$fetchfirstname" ;


//echo "<br>" ;echo "<br>" ;

//echo "COUSTOMER LASTNAME =>>"."$fetchlastname" ;


//echo "<br>" ;echo "<br>" ;

//echo "COUSTOMER MOBILE NUMBER =>>"."$fetchmobilenumber" ;


//echo "<br>" ;echo "<br>" ;

//echo "COUSTOMER EMAIL ID =>>"."$fetchemailid" ;

//echo "<br>" ;echo "<br>" ;

//echo "COUSTOMER CREDIT =>>"."$fetchcrd" ;

//echo "<br>" ;




?>


<html>

<body>
<div align = "center">

<BR><BR><BR><BR>
	<form align= "center" method="POST"   action = "<?php $_PHP_SELF ?>" >

         <H1><B><I>COUSTOMER PROFILE FILL THE CREDIT AT LAST BOX</B></I></H1>
<BR>
<label>CUSTOMER ID-</label>	<input type= "text" disabled placeholder = "<?php echo $fetchuid ; ?> " /><br><br>

<label>CUSTOMER USERNAME-</label> <input type= "text" disabled  placeholder = "<?php echo $fetchusername; ?> " /><br><br>

<label>CUSTOMER PASSWORD-</label><input type= "text" disabled placeholder = "<?php echo $fetchuserpassword ; ?> " /><br><br>
<label>CUSTOMER FIRSTNAME-</label> <input type= "text" disabled placeholder = "<?php echo $fetchfirstname ; ?> " /><br><br>
<label>CUSTOMER LASTNAME-</label> <input type= "text" disabled placeholder = "<?php echo $fetchlastname ; ?> " /><br><br>

<label>CUSTOMER MOBILENUMBER-</label> <input type= "text" disabled placeholder = "<?php echo $fetchmobilenumber ; ?> " /><br><br>

<label>CUSTOMER EMAILID-</label> <input type= "text" disabled placeholder = "<?php echo $fetchemailid ; ?> " /><br><br><br><br>

  <label>CUSTOMER CURRENT CREDIT-</label>   <input type= "text" name="regularcredit" placeholder = "<?php echo $fetchcrd ; ?> " />

     <input type="submit" value="Submit" name= "regularsubmit" />

	</form>

<br><br><br><br>

<a href="logout.php">LOGOUT</a>

</div>

</body>

</html>