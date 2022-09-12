<?php

include_once('./callapi.php');
$make_call = callAPI('POST', 'http://localhost:3002/api/checkgmail', json_encode($_POST));
$response = json_decode($make_call, true);
?>
<?php 
  
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    require_once "vendor/autoload.php";
   // use PHPMailer\PHPMailer\Exception;
    function sendMail($name,$email,$token){
     

        $mail= new PHPMailer(true);

        $mail->isSMTP();
        $mail->SMTPAuth= true;

        $mail->Host = "smtp.gmail.com";
        $mail->Username="conghaubboy@gmail.com";
        $mail->Password ="nwhhpnurbxxooksa";

        $mail->SMTSecure="tls";
        $mail->Port=587;

        $mail->setFrom("conghaubboy@gmail.com","Manager Library");
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject="Reset Password Notification";

        $email_template="
            <h2>Hello</h2>
            <h3>You are receiving this email because we received a password reset request for your account.</h3>
            <br/><br?>
            <a href='http://localhost/QL_thuvien/admin/form-resetpass.php?token=$token&email=$email'>Click Me</a>
        ";
        $mail->Body=$email_template;
        $mail->send();
        echo ("<script>alert('Please check your email')</script>");
        echo ("<script>window.location = 'adminlogin.php';</script>");     
    }

    if ($response["data"] != "successfully" ) {
        echo ("<script>alert('email does already exits! or invalid username')</script>");
       // include_once('./logout.php');       
        echo ("<script>window.location = 'forgot-password.php';</script>");       
    //  exit;   
    } else {
        $name=$response["name"];
        $email=$response["email"];
        $token=$response["token"];
        session_start();
        if(isset($_POST['send'])){
            $_SESSION['name'] = $name;
          // $_SESSION['email'] = $email;
           //$_SESSION['token'] = $token;

        }
        sendMail($name,$email,$token);

        
    }

?>