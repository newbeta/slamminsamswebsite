#!/usr/bin/perl -w
####
## Guestbook Version 1.0
###
################################# 
###Start Configuration Details###
#################################

$title = "Sign our Guestbook";

$csspath = '../default.css';
$csstype = 'text/css';
$datafile = '/home/content/s/l/a/slamminsams/html/guestbook/gbook.txt'; # Path to guestbook data file

$goto_url = "http://www.slamminsams.com/guestbook/thankyou.shtml";  #URL to send user after
                                                                                #Successful submission
$button_text = "Sign Me";

$errScreen = 1;          #Prints errors to screen if on (1);
                         #Wont print errors if off (0);
                        
################################# 
###End Configuration Details#####
#################################


use CGI;
$q = new CGI();
$username = $q->param('username');
$email = $q->param('email');
$comments = $q->param('comments');


if($username && $comments)
{
    #Make sure we have the two required fields
    writeEntry();
}
else
{
    #The user either just loaded the page or didn't fill the req'd fields 
    generateForm();
}
exit;




sub writeEntry
{
    $timestamp = localtime;
    ##
    # Open guestbook data file
    ##
    open(DATA, ">> $datafile") or logError("Cannot open or write to $datafile: $!");
    flock(DATA, 2) or logError("Cannot flock $datafile: $!");
    
    
    ##
    # Write to guestbook data file
    ##
    print DATA "\n<HR NOSHADE>\n",
                "Username: $username<BR>\n",
                "Email: <A HREF=\"MAILTO:$email\">$email</A><BR>\n";
    
    #Record the timestamp
    printf DATA ("Date: %s<BR>\n", $timestamp);
    
    print DATA $q->p("Comments: $comments");
    
    close(DATA) or logError("Cannot close $datafile: $!");
    print $q->redirect(-URL=>$goto_url);   
    
}

sub generateForm
{
    print $q->header;
    print $q->start_html(-title=>$title,
                         -src=>$csspath,
                         -type=>$csstype);
    
    print '<CENTER>', $q->h1($title),
    '<SMALL>Name and comments are required</SMALL><BR>',
    "<A HREF=\"$goto_url\">View Guestbook</A>",
    $q->start_form,
		'Name: ',     $q->textfield(-name=>'username', -size=>25),
		'<P>Email: ', $q->textfield(-name=>'email', -size=>25),
		'<P>URL: ',   $q->textfield(-name=>'url', -size=>25),
		'<P>Comments:<BR>',
                $q->textarea(-name=>'comments', -rows=>5, -columns=>50), '<P>',
                $q->submit($button_text),
    $q->end_form;
    print '</CENTER>', $q->end_html;
              
    
}


sub logError
{
    #Print error to screen (if any)
    if ($errScreen)
    {
        print $q->header;
        print "Guestbook misconfiguration: - @_";
        die;
    }
    else
    {
        die "Guestbook misconfiguration - $!";
    }
    
    
}