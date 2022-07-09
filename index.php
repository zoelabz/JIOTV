<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $u = $_POST['email'];

    if (strpos($u, "@") !== false) {
        $user = $u;
    } else {
        $user = "+91" . $u;
    }

    $pass = $_POST['pass'];
}

$headers = array(
    'Content-Type:application/json',
    'x-api-key: l7xx938b6684ee9e4bbe8831a9a682b8e19f',
    'app-name: RJIL_JioTV'
);

$username = $user;
$password = $pass;

$payload = array(
    'identifier' => "$username",
    'password' => "$password",
    'rememberUser' => 'T',
    'upgradeAuth' => 'Y',
    'returnSessionDetails' => 'T',
    'deviceInfo' => array(
        'consumptionDeviceName' => 'samsung SM-G930F',
        'info' => array(
            'type' => 'android',
            'platform' => array(
                'name' => 'SM-G930F',
                'version' => '5.1.1'
            ),
            'androidId' => '3022048329094879'
        )
    )
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.jio.com/v3/dip/user/unpw/verify');
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($ch, CURLOPT_USERAGENT, 'Dalvik/2.1.0 (Linux; U; Android 5.1.1; SM-G930F Build/LMY48Z)');
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
$result = curl_exec($ch);
curl_close($ch);

$j = json_decode($result, true);

$k = $j["ssoToken"];
if ($k != "") {
    // echo $k;
    file_put_contents("assets/data/creds.json", $result);
    $sign = "LOGGED IN SUCCESSFULLY !";

    //Redirect to Watch Page
    header("location: watch.php");

} else {
    $sign = "WRONG PHONE NO. OR PASSWORDS.<br> PLEASE TRY AGAIN.";
}

?>

<html>

<head>

    <title>JIOTV LOGIN </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/css/signin.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="author" content="Techie Sneh">
    <meta name="copyright" content="This Created by Techie Sneh">
    <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/37fVLxB/f4027915ec9335046755d489a14472f2.png">
    <meta name="robots" content="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->  
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->  
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->  
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->

</head>

<body>
    <div class="">
        <div class="">
            <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                <form action="<?php $_PHP_SELF ?>" method="POST" class="login100-form validate-form flex-sb flex-w">
                    <span class="login100-form-title p-b-53">
                        Login to JIOTV
                    </span>
                    <div class="p-t-31 p-b-9">
                        
                    </div>

                    <div class="p-t-31 p-b-9">
                        <span class="txt1">
                            Username
                        </span>
                        
                    </div>
                    <div class="p-t-31 p-b-9">
                        <span class="txt1">
                            
                        </span>
                        
                    </div>
                    <div class="wrap-input100 validate-input" >
                        <input class="input100" type="text" name="email"  >
                        <span class="focus-input100"></span>
                    </div>
                    <div class="p-t-31 p-b-9">
                        <span class="txt1">
                            Password
                        </span>
                        <a href="https://www.jio.com/selfcare/signup/forgot-password" class="txt2 bo1 m-l-5">
                            Forgot?
                        </a>
                    </div>
                    <div class="p-t-31 p-b-9">
                        <span class="txt1">
                            
                        </span>
                        
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="pass"  >
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-17">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    
                </form>
                
            </div>
        </div>
    </div>
          
        </div>
    </div>

    <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
        <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
        <script src="vendor/daterangepicker/moment.min.js"></script>
        <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
        <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
        <script src="js/main.js"></script>

</body>

</html>