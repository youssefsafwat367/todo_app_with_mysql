<?php
####################################------------- username Validation -------------##################################
//  function 1 ->  chech username is weitten or not 
function required_VALIDATION($input)
{
    if (empty($input)) {
        return true;
    } else {
        return false;
    }
}
//  function 2 ->  check username characters is grater than 3 or not 
function min_VALIDATION($input)
{
    if (!(strlen($input)  > 3)) {
        return true;
    } else {
        return false;
    }
}
//  function 3 ->  check username characters is lower than 25 or not 
function max_VALIDATION($input)
{
    if (!(strlen($input)  < 25)) {
        return true;
    } else {
        return false;
    }
}
####################################------------- Email Validation -------------##################################
//  function 1 ->  chech Email is written or not  like username in function (required_VALIDATION)
// function 2 -> check if Email is a Valid Email or not 
function valid_email_VALIDATION($input)
{
    if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}
####################################------------- Password Validation -------------##################################
//  function 1 ->  chech Password is written or not  like username in function (required_VALIDATION)
//  function 2 ->  check Password characters is greater than 8 or not 
function min_password_VALIDATION($input)
{
    if (!(strlen($input)  > 8)) {
        return true;
    } else {
        return false;
    }
}
//  function 3 ->  check password characters is lower than 25 or not 
function max_passwprd_VALIDATION($input)
{
    if (!(strlen($input)  < 25)) {
        return true;
    } else {
        return false;
    }
}
####################################------------- image Validation -------------##################################
//  function 1 ->  chech image is written or not  like username in function (required_VALIDATION)
