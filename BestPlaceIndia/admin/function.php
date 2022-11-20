<?php
function sendResponse($code, $msg)
{
    $myObj = new StdClass();
    $myObj->code = $code;
    $myObj->message = $msg;

    return json_encode($myObj);

}

?>