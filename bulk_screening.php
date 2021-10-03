<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "suribabu988@gmail.com";
    $email_subject = "ABR Cinemas Message";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['guests']) ||
        !isset($_POST['date']) ||
        !isset($_POST['movie']) ||
        !isset($_POST['email']) ||
        !isset($_POST['mobile'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $name = $_POST['name']; // required
    $guests = $_POST['guests']; // required
    $date = $_POST['date']; // not required
    $movie = $_POST['movie']; // required
    $email_from = $_POST['email']; // required
    $mobile = $_POST['mobile']; // not required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z  .'-]+$/";
 
  // if(!preg_match($string_exp,$your_name)) {
  //   $error_message .= 'The Your Name you entered does not appear to be valid.<br />';
  // }
 
 
  // if(strlen($comments) > 2) {
  //   $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  // }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Your Name: ".clean_string($name)."\n";
    $email_message .= "Number of Guests: ".clean_string($guests)."\n";
    $email_message .= "Date & Time: ".clean_string($date)."\n";
    $email_message .= "Movie: ".clean_string($movie)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Phone: ".clean_string($mobile)."\n";
    // return $email_message;
    
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
Thank you for contacting us. We will be in touch with you very soon.
<br/><br/>Go back to <a href="index.html">Home</a>
 
<?php
 
}
?>