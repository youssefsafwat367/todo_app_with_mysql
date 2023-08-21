<?php
//------------- to check if the method is post or get------------ 
function sanitize($method)
{
    if ($method == "POST") {
        return true;
    } else {
        return false;
    }
}
//------------- to check if we write in inputs and remove white spaces ------------ 
function check_written($value)
{
    if (isset($value)) {
        return true;
    } else {
        return false;
    }
}
//------------------------------------ redirect function ------------------------------ 
function redirect($path)
{
    header("location:$path");
}
