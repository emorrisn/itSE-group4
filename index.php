<?php

/** 
 * index.php
 *  Acts as the main (and only) entry point into the site (thanks to .htaccess).
 *  Essentially pulls everything in together everytime there's a new request to the site.
 *  Any important enviroment variables will also go here.
*/

include 'autoload.php';
include 'routes.php';