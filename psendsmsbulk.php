<!DOCTYPE html>
<html lang="en">
        <head>
            <title>send sms</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/mainblue.css">
<!--===============================================================================================-->
        </head>
    <body>
        <div style="margin-left:30px" align= "center">
<?php
session_start();

 $servername = "localhost";
 $user= "root";
 $passwd = "";
 $db = "mobilink";

 $conn = new mysqli( $servername, $user, $passwd, $db);

if(!isset($_SESSION['user'])||$_SESSION['user']==false){
       header("Location:premiumlogin.php");
  }

$queryabc = "SELECT uid , username , firstname , lastname , mobilenumber , emailid , credit, companyname FROM premium_user  where username = '".$_SESSION['login_user']."' " ;

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
		
		$fetchcompany = $row['companyname'];
		
    }
}

header('Content-Type: text/html; charset=utf-8'); 


if($fetchcredit>0){

if(isset($_POST['submit'])) {

error_reporting(E_ALL);
//URL of targeted site
//$url = "http://m.www.yahoo.com/";
//$url = "http://www.myvaluefirst.com/smpp/sendsms?username=%20xxx&password=%20xxx&to=9822xxx&from=xxxx";



$phone = $_POST['toname'];
$text = $_POST['messagename'].$_POST['fromname'];

$texts = str_replace(' ','%20',$text);
$time = time();

$phonecount = strlen($phone);

$phonecounts = $phonecount/10;

$textcount = strlen($text);

$string = 160;



//$data="UPDATE users SET credit = credit-$phonecounts";



//mysqli_query($conn,$data);    

echo $phonecount;

echo "<br>";

echo "$textcount";

echo "<br>";

$url = "https://www.myvaluefirst.com/smpp/sendsms?username=yourusername&password=yourpassword&to=".$phone."&from=".$fetchcompany."&text=".$texts."&category=bulk";

$ch = curl_init();


//$data_string = urlencode("xxxxxx \n");
//$data_string .= urlencode("xxxxx");





echo $phone;

echo $texts;
//.$data_string;
// set URL and other appropriate options
/*curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);*/

$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_SSL_VERIFYHOST => 2,
         //CURLOPT_HEADER => 0,
    CURLOPT_VERBOSE => true,
        CURLOPT_CUSTOMREQUEST => "GET",
         //CURLOPT_POSTFIELDS => $data_string,
         //CURLOPT_RETURNTRANSFER => true,
    //CURLOPT_CAINFO => '/var/www/api.myvaluefirst.com.crt'
));

/*$curl = curl_init($url);
//curl_setopt($curl, CURLOPT_FAILONERROR, true);
//curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
$output = curl_exec($curl);
echo $output; */

$output = curl_exec($ch);

if (false == $output) {
    echo "Error while loading page: ", curl_error($ch), "\n";
}

// grab URL and pass it to the browser

var_dump($output);


//Regular expression to excerpt the targeted portion
//preg_match('/<dl class="markets clearfix strong small">(.*)<\/dl>/is', $output, $matches);
//echo $matches[0];

// close curl resource, and free up system resources
curl_close($ch);


 if ($textcount<= 160){
          $data="UPDATE premium_user SET credit = credit-$phonecounts WHERE username = '$fetchusername' ";
          
    }

    if ( $textcount>160 & $textcount<320 ){
          $data="UPDATE premium_user SET credit = credit-(2*$phonecounts) WHERE username = '$fetchusername' ";
          
    }
    if ( $textcount>320  ){
          $data="UPDATE premium_user SET credit = credit-(3*$phonecounts) WHERE username = '$fetchusername' ";
          
    }



  
     mysqli_query($conn,$data);

      echo "<script type='text/javascript'>alert('MESSAGE SENT');</script>";

}

}
else{

    $credit_error = "your credit is zero please recharge to start sending sms again";

  echo "<script type='text/javascript'>alert('$credit_error');</script>";
}

?>


</div>



<div class="header">
    <a href= "https://www.mobilink.co.in"><img src ="Mobilink_02.gif"border="0"></img></a>
 <!-- <a href="#default" class="logo">CompanyLogo</a>-->
  <div class="header-right">
 
    <a href="profile/profilepage.php"><?php echo $fetchfirstname ?>  <?php echo $fetchlastname ?></a>
    <a href= "https://www.mobilink.co.in/#contact">CREDIT LEFT "<?php echo $fetchcredit ?>"</a>
    <a href="psendsms.php">SEND SMS</a>
    <a class="active" href="psendsmsbulk.php">SEND BULKSMS</a>
    <a href="punicode.php"> UNICODE SMS</a>
    <a href="punicodebulk.php">BULK UNICODE SMS</a>
    <a href="plogout.php">LOGOUT<img src="poweroff.png" border="0" width="50" height="30"></a>

  </div>
</div>

<div class="bg-contact100" style="background-image: url('images/bg-01.jpg');">
        <div class="container-contact100">
            <div class="wrap-contact100">
                <div class="contact100-pic js-tilt" data-tilt>
                    <img src="images/img-01.png" alt="IMG">
                </div>



     <form class="contact100-form validate-form" method= "post"  >

                            <span class="contact100-form-title">
                        SEND SMS TO MANY NUMBER
                    </span>




                    <div class="wrap-input100 validate-input" data-validate = "NUMBER is required">
        
        <textarea class="input100" type="text" name="toname" value="" placeholder="TYPE MOBILE NUMBER HERE SEPERATED BY COMMAS ,,,,,,,,,,,,,   MAXIMUM 100 NUMBERS PREFERED 1 CREDIT PER NUMBER " ></textarea>
                                <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
          </div>


                    <div class="wrap-input100 validate-input" data-validate = "YOUR NAME OR YOUR COMPANY NAME">
 
        <input class="input100" type="text" name="fromname" value="" placeholder="YOUR NAME">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>     
                    </div>      



                    <div class="wrap-input100 validate-input" data-validate = "Message is required">
        <textarea class="input100" name="messagename" value="" placeholder="TYPE ..Message.. HERE YOU WANT TO SEND MAXIMUM 500 CHARACTER PREFERED INCLUDING  YOUR NAME (1 CREDIT PER 160 CHARACTER INCLUDING SPACES)  "></textarea>
                                <span class="focus-input100"></span>
                    </div>


                    <div class="container-contact100-form-btn">
        <input type="submit" value="submit"  class="contact100-form-btn" name="submit">
                    </div>      


     </form>
     
            </div>
        </div>
    </div>




<!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
    </body>
</html>



