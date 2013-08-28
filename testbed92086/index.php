<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Feedback Form</title>
        <link href="default.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
<table width="400" border="0" align="center" cellpadding="3" cellspacing="1">
<tr>
    <td><h1>Send us your feedback</h1></td>
</tr>
</table>

<table width="400" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td>
<form method="post" action="send.php"/>
<table width="100%" border="0" cellspacing="1" cellpadding="3">

    <?php
    if(isset ($_POST['resubmit']))
    {
        $subject = $_POST['subject'];
        $message = $_POST['msg'];
        $name = $_POST['name'];
        $mail_from = $_POST['mail_from'];

        //Start HTML
     ?>
<tr>
<td width="120%">Subject</td>
<td width="2%">:</td>
<td width="85%">
    <input name="subject" type="text" id="subject" size="50" value="<?echo $subject; ?>">
</td>
</tr>
<tr>
<td>Message</td>
<td>:</td>
<td><textarea name="msg" cols="57" rows="4" id="msg"><? sprintf("%s", $message); ?></textarea>
</td>
</tr>
<tr>
<td>Name</td>
<td>:</td>
<td><input name="name" type="text" id="name" size="50" value="<?php echo $name; ?>"></td>
</tr>
<tr>
<td>Email</td>
<td>:</td>
<td><input name="from_email" type="text" id="from_email" size="50" value="<?php echo $mail_from;?>"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Submit"></td>
</tr>
</table>
</td>
</tr>
</table>
    </body>
</html>
    <?php
        //End HTML
    }
    else
    {
    ?>
<tr>
<td width="120%">Subject</td>
<td width="2%">:</td>
<td width="85%">
<input name="subject" type="text" id="subject" size="50">
</td>
</tr>
<tr>
<td>Message</td>
<td>:</td>
<td><textarea name="msg" cols="57" rows="4" id="msg"></textarea></td>
</tr>
<tr>
<td>Name</td>
<td>:</td>
<td><input name="name" type="text" id="name" size="50"></td>
</tr>
<tr>
<td>Email</td>
<td>:</td>
<td><input name="from_email" type="text" id="from_email" size="50"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
</tr>
</table>
</td>
</tr>
</table>
    </body>
</html>
<?
    }
?>




