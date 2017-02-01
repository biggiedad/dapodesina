<?php
function myautomatedmail($to,$subject,$body)
{
$message = "
$body";

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
// $headers .= 'To: Teejay Maya <info@teejaymaya.com>, Boss <ceo@tosbitechnology.com>' . "\r\n";
$headers .= 'From: dapodesina Website <noreply@dapodesina.com>' . "\r\n";
// $headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
// $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);
    $mresult="success";
    return $mresult; 
}


$Fname_from = $_POST['fname']; 
$lname_from = $_POST['lname']; 
$Email_from = $_POST['eemail']; 
$Pnumber_from = $_POST['number'];
$Message_from = $_POST['messages']; 

// MANDATORY FIELDS 
$error_message = "";
        $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
          if(!preg_match($email_exp,$Email_from)) {
            $error_message .= 'The email address you entered does not appear to be valid.<br/>
            Please use the back button on your browser to go back to the <br>
             Contact Us Form<br />';
          }

$string_exp = "/^[A-Za-z .'-]+$/";
          if(!preg_match($string_exp,$Fname_from)) {
            $error_message .= 'The Full Name you entered does not appear to be valid. <br> 
            Please use the back button on your browser to go back to the <br>
             Contact Us Form<br />';
          } 
          if(strlen($error_message) > 0) {
            die($error_message);
          }

$from = "Dapo Desina  <noreply@dapodesina.com>";
$to = "Dapo Desina Webmaster <info@effluxcompany.com>";
$to = "$Email_from";
$subject = "From dapodesina.com Contact Form";
$body = "Hi, new entry from the CONTACT US FORM of www.dapodesina.com website<br><br>  
First Name: $Fname_from<br>
Last Name: $lname_from<br>
Email: $Email_from<br>
Phone Number: $Pnumber_from<br> 
Message: $Message_from<br> ";

$myautomailresult = myautomatedmail($to,$subject,$body);
if ($myautomailresult == "success") {
    $mailformsuccessmsg = "Email sent successfully";
} else {
    $mailformerrormsg = "Failure in sending email: $myautomailresult";
 }

header('Location: ../index.html?formsent=yes');

?>