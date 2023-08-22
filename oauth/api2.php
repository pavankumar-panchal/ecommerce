<?php

$client_id = '909219603358-97sjus92fb11aumsig3557t7jo4ptkgo.apps.googleusercontent.com';
$client_secret = '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';
$redirect_uri = 'http://localhost/mywork/oauth/callback.php';

$auth_url = 'https://accounts.google.com/o/oauth2/auth?' .
    'client_id=' . $client_id .
    '&redirect_uri=' . urlencode($redirect_uri) .
    '&response_type=code' .
    '&scope=https://www.googleapis.com/auth/photoslibrary.readonly';
    
header('Location: ' . $auth_url);
?>