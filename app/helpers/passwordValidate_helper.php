<?php

//Validate the password format
function passwordValidate($password) {
    $pattern = '/^(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#\$%\^&\*]).{5,20}$/';
    $result = preg_match($pattern, $password);
    return $result;
}
