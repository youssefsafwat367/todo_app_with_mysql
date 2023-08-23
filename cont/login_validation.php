<?php
function required_VALIDATION($input)
{
    if (empty($input)) {
        return false;
    } else {
        return true;
    }
}
