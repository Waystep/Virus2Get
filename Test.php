    <!DOCTYPE html>
    <html>

    <body>

        <h3>Send e-mail to someone@example.com:</h3>

        <form action="MAILTO:sashakaprobg@gmail.com" method="post" enctype="text/plain">
            Name:<br>
            <input type="text" name="name" value="your name"><br>
            E-mail:<br>
            <input type="text" name="mail" value="your email"><br>
            Comment:<br>
            <input type="text" name="comment" value="your comment" size="50"><br><br>
            <input type="submit" value="Send">
            <input type="reset" value="Reset">
        </form>


        <?php
if(isset($_POST['submit'])) {

if(trim($_POST['contactname']) == '') {
    $hasError = true;
} else {
    $name = trim($_POST['contactname']);
}

if(trim($_POST['subject']) == '') {
    $hasError = true;
} else {
    $subject = trim($_POST['subject']);
}

if(trim($_POST['ContactNum']) == '' && is_numeric($_POST['ContactNum'])) {
    $hasError = true;
} else {
    $Contacting = trim($_POST['ContactNum']);
}

//Check to make sure sure that a valid email address is submitted 
if(trim($_POST['email']) == '' && preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$_POST['email']))  {
    $hasError = true;
}  else {
    $email = trim($_POST['email']);
}
if(trim($_POST['message']) == '') {
    $hasError = true;
} else {
    if(function_exists('stripslashes')) {
        $comments = stripslashes(trim($_POST['message']));
    } else {
        $comments = trim($_POST['message']);
    }
}

//----------------------Email Validation-----------------//
    function EmVal($e)
    {
        return preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$e);
    }


//If there is no error, send the email
if(!isset($hasError)) {
        $emailTo = 'sashakaprobg@gmail.com';
        $body = "Name: $name \n\nEmail: $email \n\nSubject: $subject \n\nComments:\n $comments \n\nContact Number:\n $Contacting";
        $headers = 'From: WebBestow <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

        mail($emailTo, $subject, $body, $headers);
        $emailSent = true;}


}
 ?>
    </body>

    </html>
