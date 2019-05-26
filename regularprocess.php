<?php



session_start();


 $servername = "localhost";
 $user= "root";
 $passwd = "";
 $db = "mobilink";

 $conn = new mysqli( $servername, $user, $passwd, $db);


if(isset($_POST['regularsubmit'])){

        $variablone = $_POST['regularcredit'];
      
	$sqlq= "UPDATE users SET credit = '$variablone' WHERE username = '".$_SESSION['ruser']."' ";


	 //$varcaller = SELECT 'caller' FROM insert_data WHERE id = $edit_record;
	        // $sql = "UPDATE  insert_data  SET
     // (  caller, channel , operator, circles,  name, product, remark, call_attained_by ) 
      //VALUES ( '$callername', '$channelname', '$operatorname','$circlesname', '$nameofname', '$productname', '$remarkname', '$callattainbyname' ) 
	 // WHERE 'id' = '$edit_record' ";

	  
	   
	  $retval = mysqli_query( $sqlq , $conn );
	  
	   if(! $retval ) {
      die('Could not enter data: ' . mysqli_error($conn));
      }
   
   
     echo "data entered successfully";
   
}

echo "$fetchcrd" ;

echo "<br>" ;

echo "<br>" ;echo "<br>" ;echo "<br>" ;echo "<br>" ;

echo "$fetchuid" ;




?>

<html>

<body>

	<form align= "center" action="post"  action = "<?php $_PHP_SELF ?>" >
	
     <input type= "text" name="regularcredit" placeholder = "<?php echo $fetchcrd ; ?> " />

     <input type="submit" value="Submit" name= "regularsubmit">

	</form>

</body>

</html>