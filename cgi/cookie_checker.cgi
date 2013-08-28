#!/usr/bin/perl -w
use strict;
use CGI;

my $q = new CGI;

my $cookie = $q->cookie('Has Visited')
    || "Cookie has not been set";
    
print   $q->header,
        $q->start_html("Cookie Reader"),
        $q->p, "Cookie: $cookie",
        $q->end_html;


