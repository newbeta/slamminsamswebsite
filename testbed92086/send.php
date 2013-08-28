<?php
echo '<link href="default.css" rel="stylesheet" type="text/css" />';

$subject = $_POST['subject'];   //"subject";
$message= $_POST['msg'];        // "$msg";
$name = $_POST['name'];
$mail_from= $_POST['from_email'];//"$from_email";

if(!validate_email($mail_from))
{
    echo '<h1>';
    echo 'Please enter a valid email address';
    echo '<br />';
    echo '</h1>';
    ?>
<form action ="index.php" method="post">
    <input type="hidden" name="subject"
           value="<?php echo $subject; ?>">
    <input type="hidden" name="message"
           value="<?php echo $message; ?>">
    <input type="hidden" name="name"
           value="<?php echo $name; ?>">
    <input type="hidden" name="mail_from"
           value="<?php echo $mail_from; ?>">

    <input type="submit" value="Go Back" name="resubmit" />
</form>
<?
}
else
{


$header = "Reply-to: $mail_from";

// My email address that the email will be sent to
$to ='stevenjohnjr@gmail.com';

if(isFilled($subject) && isFilled($message) &&
   isFilled($name)    && isFilled($mail_from))
{
    $send = mail($to,$subject,$message, "Reply-To: $mail_from");    
}
else
{
    echo '<h1>';
    echo "Please complete all fields";
    echo '</h1>';
//    ?>
<form action ="index.php" method="post">
   <input type="hidden" name="subject"
           value="<?php echo $subject; ?>">
    <input type="hidden" name="message"
           value="<?php echo $message; ?>">
    <input type="hidden" name="name"
           value="<?php echo $name; ?>">
    <input type="hidden" name="mail_from"
           value="<?php echo $mail_from; ?>">
    <input type="submit" value="Go Back" name="resubmit" />
</form>
<?
}   //End If-Else for completed fields

}   //End If-Else for validating email
if($send)
{
    echo '<h1>';
    echo "Thank you $name.<br />";
    echo "We've recived your contact information";
    echo '</h1> <br />';
    ?>
<form action="http://www.slamminsams.com">
    <input type="submit" value="Go Home" name="home"/>
</form>
<?
}

else
{
    echo '<h1>';
    echo "Error sending information <br />";
    echo "Please correct mistakes by clicking \"Go Back\" ";
    echo '</h1> <br />';
?>
<form action="http://www.slamminsams.com">
    <input type="submit" value="Go Home" name="home"/>
</form>
<?
}

##Functions

function validate_email($email)
{
    $flag = false;

    if(preg_match('/([[:alpha:]][[:alnum:]]+[@]{1})/', $email))
        $flag = true;

    
    return $flag;
}

function isFilled($x)
{
    if($x != "")
    {
        return true;
    }
    else
        return false;
}
?>
