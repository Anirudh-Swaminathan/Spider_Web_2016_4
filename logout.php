<?php
session_start();
require 'login_checker.php';
$redirect_page2 = '/../Spider_2016_4/';
session_unset();
session_destroy();
redirect($redirect_page2);
?>