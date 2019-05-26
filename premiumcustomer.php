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



 $fetchquery = "  SELECT credit,uid,username,userpassword,firstname,lastname,mobilenumber,emailid,companyname FROM premium_user where username = '".$_SESSION['puser']."' " ;

if( $result = $conn->query( $fetchquery))
{
	while($row=$result->fetch_assoc())

	{

	//	$fetchcrd1 = $row['credit'];	

	//	$fetchuid1 = $row['uid'];	

	//	$fetchcompany1 = $row['companyname'];


		$fetchcrd1 = $row['credit'];	

		$fetchuid = $row['uid'];	

		$fetchusername = $row['username'];

		$fetchuserpassword = $row['userpassword'];

		$fetchfirstname = $row['firstname'];

		$fetchlastname = $row['lastname'];

		$fetchmobilenumber = $row['mobilenumber'];

		$fetchemailid = $row['emailid'];

		$fetchcompany1 = $row['companyname'];



	}

}



if(isset($_POST['premiumsubmit'])){

        $variableone = $_POST['premiumcredit'];

        $company = $_POST['companyname'];
      
$sqlo= "UPDATE premium_user SET credit = '$variableone', companyname = '$company' WHERE username = '".$_SESSION['puser']."' ";


	 //$varcaller = SELECT 'caller' FROM insert_data WHERE id = $edit_record;
	        // $sql = "UPDATE  insert_data  SET
     // (  caller, channel , operator, circles,  name, product, remark, call_attained_by ) 
      //VALUES ( '$callername', '$channelname', '$operatorname','$circlesname', '$nameofname', '$productname', '$remarkname', '$callattainbyname' ) 
	 // WHERE 'id' = '$edit_record' ";

	  

	  $conn->query( $sqlo);{
	   
	  //$retval = mysqli_query( '$conn', $sqlq  );
	  
	//   if(! $retval ) {
     // die('Could not enter data: ' . mysqli_error($conn));
    //  }
   
   
   echo "Entered data successfully\n";
}
   
}

//echo "$fetchcrd1" ;

//echo "<br>" ;

//echo "<br>" ;echo "<br>" ;echo "<br>" ;echo "<br>" ;

//echo "$fetchuid1" ;

//echo "<br>" ;echo "<br>" ;

//echo "$fetchcompany1" ;


?>


<html>

<body>
	<div align = "center">

<BR><BR><BR><BR>

	<form align= "center" method="POST"  action = "<?php $_PHP_SELF ?>" >

 <H1><B><I>COUSTOMER PROFILE FILL THE CREDIT & COMPANY NAME AT LAST BOX</B></I></H1>
<BR>
*  fields are mendetory and should be field or they will be blank<br><br><br>
<label>CUSTOMER ID-</label>	<input type= "text" disabled placeholder = "<?php echo $fetchuid ; ?> " /><br><br>

<label>CUSTOMER USERNAME-</label> <input type= "text" disabled  placeholder = "<?php echo $fetchusername; ?> " /><br><br>

<label>CUSTOMER PASSWORD-</label><input type= "text" disabled placeholder = "<?php echo $fetchuserpassword ; ?> " /><br><br>
<label>CUSTOMER FIRSTNAME-</label> <input type= "text" disabled placeholder = "<?php echo $fetchfirstname ; ?> " /><br><br>
<label>CUSTOMER LASTNAME-</label> <input type= "text" disabled placeholder = "<?php echo $fetchlastname ; ?> " /><br><br>

<label>CUSTOMER MOBILENUMBER-</label> <input type= "text" disabled placeholder = "<?php echo $fetchmobilenumber ; ?> " /><br><br>

<label>CUSTOMER EMAILID-</label> <input type= "text" disabled placeholder = "<?php echo $fetchemailid ; ?> " /><br><br>

  <label>*CUSTOMER CURRENT CREDIT-</label> <input type= "text" name="premiumcredit" placeholder = "<?php echo $fetchcrd1 ; ?> " /><br><br>

  <label>*CUSTOMER COMPANY NAME-</label>   <input type= "text" name="companyname" placeholder = "<?php echo $fetchcompany1 ; ?> " /><br><br>



     <input type="submit" value="Submit" name= "premiumsubmit" />

	</form>

<br><br><br><br>

<a href="logout.php">LOGOUT</a>


</div>
</body>

</html>