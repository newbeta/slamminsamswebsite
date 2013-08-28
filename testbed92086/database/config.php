<?php
################################################
##  MYSQL Configuration Details
##  * Edit to connect to correct database
################################################
$hostname='slammintestdb.db.5837842.hostedresource.com';
$username='slammintestdb';
$password='Vevder333';
$dbname='slammintestdb';
$dbtable = 'users';
$link = mysql_connect($hostname, $username, $password);

if(!$link)
{
    die('Couldnt connect' . mysql_error());
}

###############################################
## End of Configuration details
################################################


###############################################
## Function Declarations
################################################


function createQueryInsert($username, $password )
{

/**
 * @param   $username
 * @param   $password
 * @return  $query: MySQL query built from 2 param's
 */
    $query = sprintf("INSERT INTO slammintestdb.users (username, password) VALUES('%s', '%s')",
        mysql_real_escape_string($username),
        mysql_real_escape_string($password));

    return $query;

}

function fetchAllInfo($numFields = NULL)
{
/**
 * @param   $numFields: Number of fields in table
 * @return  void: Prints all data in table
 */


    $qry = "SELECT * FROM slammintestdb.users";
    $result = mysql_query($qry);
    if(!$result)
    {
        echo "Couldnt run query" . mysql_error();
    }
    echo '<br>';
    while ($row = mysql_fetch_row($result))
    {
        print "User ID = $row[0]";
        echo '<br>';
        print "Username = $row[1]";
        echo '<br>';
        print "Password = $row[2]";
        echo '<br>';
    }
}

?>