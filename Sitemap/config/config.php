<?php
$format = 'DATE_ISO8601';
$time = time();

$config['changefreq']   =   'always';   // Options : none | always | hourly | daily | weekly | monthly | yearly | never
$config['priority']     =   '1.00'; // Options : none | 1.00
$config['lastmod']      =   standard_date($format, $time);  //Default : standard_date($format, $time); /Output :2011-04-02T13:54:16+00:00
$config['file_path']    =   'files/sitemap.xml';    // Default files/sitemap.xml