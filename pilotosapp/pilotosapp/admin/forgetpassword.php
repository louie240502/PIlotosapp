<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require('../connection/connection.php');
$con = connection();

if(isset($_POST['email'])){

    $emailTo = $_POST['email'];
    $mail = new PHPMailer(true);
    $code = uniqid(true);
    $query = mysqli_query($con,"INSERT INTO `resetpassword`(code,username) VALUES ('$code','$emailTo')");
    if(!$query){
        exit("Error!");
    }
    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'humblebeast1218@gmail.com';                     //SMTP username
        $mail->Password   = 'vedjzddzrdxjtgac';                               //SMTP password
        $mail->SMTPSecure = 'tls';                                //Enable implicit TLS encryption tls
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('humblebeast1218@gmail.com', 'Pilotos APP');
        $mail->addAddress($emailTo);     //Add a recipient
    
        $msg = "kayang kaya mo yan naski hart hart!"; 
    
        //Content
        $url = "http://". $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPassword.php?code=$code";
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Your Password Reset link.';
        $mail->Body    = "Clink the link below. <a href='$url'> code </a>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo "<script>alert('Reset Password link has been set to your email. Kindly check it.');</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    // exit();
}
?>
<!--start-->
<?php include('../admin/inc/header.php'); ?>

<style>
      body{
            height: 100vh;
            background-image:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.8)), url("../img/1.png");
            background-repeat: no-repeat;
            background-position: center;
        }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
</style>

    
    <!-- Custom styles for this template -->
    <link href="../admin/css/signin.css" rel="stylesheet">
  </head>
<body class="text-center">
    
  <main class="form-signin w-100 m-auto">
    <form class="clearfix" method="post">
      <!-- <img class="mb-4" src="../img/2.png" alt="" width="72" height="72"> -->
      <h1 class="h3 mb-3 fw-normal text-white">PILOTOS APP</h1>
      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" name="email" placeholder="@gmail.com" autocomplete="off">
        <label for="floatingInput">Registered Email Address</label>
      </div>

      <table class="mt-4 mx-5">
        <tr>
            <td class="mt-5">
                <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">
                <span class="icon"><i class="fas fa-arrow-up"></i></span>Reset</button>
            </td>
            <td class="mx-5">
                <button class="w-100 btn btn-lg btn-danger" type="submit">
                <a href="../admin/index.php" class="text-white text-decoration-none">
                    <span class="icon"><i class="fas fa-arrow-left"></i></span>Back</button>
                </a>
            </td>
        </tr>
      </table>
        <p class="mt-5 mb-3 text-white">&copy; 2022–2023</p>
    </form>
  </main>

</body>
</html>
