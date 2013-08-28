#!/usr/bin/perl 

use CGI;

my $q = new CGI;
my $cookieValue = "Has Visited";
my $cookie = $q->cookie(-name=>'test_cookie',
                        -value=>$cookieValue);
print   $q->header(-cookie=>$cookie),
        $q->start_html("Cookie Writer"),
        $q->p, "Your cookie has been set to $cookieValue",
        $q->end_html;


