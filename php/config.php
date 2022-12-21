<?php

//config.php

//Include Google Client Library for PHP autoload file
require __DIR__."/dbh-con.php";
require('..\vendor\autoload.php');

//Make object of Google API Client for call Google API
$client = new Google_Client();

//Set the OAuth 2.0 Client ID
$client->setClientId('741392903976-v5muvphe4p12kv37co9v38qh02f1dnn1.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$client->setRedirectUri('http://localhost/Project/php/sign-up.php');

//
$client->addScope('email');

$client->addScope('profile');

//start session on web page
session_start();

?>