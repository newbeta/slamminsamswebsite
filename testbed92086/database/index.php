<?php
include 'config.php'
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Create User</title>
    </head>
    <body>
        <h1><b>Create a user</b></h1>
        <form action="send.php" method="POST">
            Username*:<input type="text" name="username" value="" size="20" /><br>
            Password*:<input type="password" name="password" value="" size="20" /><br>
            <input type="submit" value="submit" name="submit" />
        </form>
    </body>
</html>