<?php
include_once('../cont/functions.php') ;
session_start(); 
session_destroy() ;
var_dump($_SESSION) ;
redirect('./login.php') ;