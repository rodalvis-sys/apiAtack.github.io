<?php

function sendResponse($message, $code){
    http_response_code($code);
    echo json_encode(array("message"=>$message));
}