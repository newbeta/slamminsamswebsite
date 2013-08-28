<?php

//Include the configuration file
include 'config.php';

//Retrive the variables relevant to creating the user
$user = $_POST['username'];
$pass = $_POST['password'];

// Connect to and select database or print error
mysql_select_db($dbname) or die('Couldnt connect'.mysql_error());

// Save the SQL query to variable
$query = createQueryInsert($user, $pass);

// Query the database or print error
if(mysql_query($query))
{
    echo "User Created...";
    echo '<br><br>';
    fetchAllInfo();
}

else
{
    die('Coulnt insert values '.mysql_error());
}
?>

