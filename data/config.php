<?php
/* >_ Developed by Vy Nghĩa */

//mysql info
$dbhost = 'localhost';
$dbuser = 'ctjoppmqhosting_vnghia';
$dbpass = '1151985611';
$dbname = 'ctjoppmqhosting_cloud';

//connect mysql
$con = @mysql_connect($dbhost, $dbuser, $dbpass);
@mysql_select_db($dbname, $con);
