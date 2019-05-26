<html>

<br>

<form method="post" >
<tr>

   <td>
   	Username
   </td>


   <td>
         <input type="text" placeholder="Enter Username" name="UserName" required>
      
         
   </td>

</tr>

<br>

<tr>

      <td>
      	password
      </td>

   <td>
   	   <input type="text" placeholder="Enter password" name="UserPwd" required>


   </td>

</tr>

<br>

<tr>


	<td>
		FirstName
   </td>

   <td>
   	
       <input type="text" placeholder="Enter FirstName" name="FirstName" required>

   </td>

</tr>

<br>

<tr>

   <td>
   	Lastname
   </td>

   <td>
   	
        <input type="text" placeholder="Enter Lastname" name="LastName" required>

   </td>

</tr>

<br>

<tr>


	<td>
		mobilenumber
   </td>
   <td>
   	
       <input type="text" placeholder="Enter mobilenumber" name="Mobile" required>

   </td>

</tr>

<br>

<tr>

	<td>
		Emailid
   </td>

   <td>

   	<input type="text" placeholder="Enter Emailid" name="EmailID" required>
   	
   </td>

</tr>


<br>

<tr>

	<td>
   </td>

   <td>
   	
        <button type="button">Click Me!</button>

   </td>

</tr>

</form>

</html>

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



     $uname = $_POST('UserName');

     $upwd = $_POST('UserPwd');

     $ufirstname = $_POST('FirstName');

     $ulastname = $_POST('LastName');

     $umobile = $_POST('Mobile');

     $uemailid = $_POST('EmailID');
   

      $sqlo = "INSERT INTO 'users'
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
   
   mysqli_close($conn);



?>