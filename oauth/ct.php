<?php
error_reporting(E_ALL);
ini_set('display_error', 1);
$client_id = '909219603358-97sjus92fb11aumsig3557t7jo4ptkgo.apps.googleusercontent.com';
$client_secret = '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';
$redirect_uri = 'http://localhost/mywork/oauth/callback.php';

if (isset($_GET['code'])) {
    $code = $_GET['code'];

    $token_url = 'https://accounts.google.com/o/oauth2/token';
    $post_fields = 'code=' . urlencode($code) .
        '&client_id=' . urlencode($client_id) .
        '&client_secret=' . urlencode($client_secret) .
        '&redirect_uri=' . urlencode($redirect_uri) .
        '&grant_type=authorization_code';

    $curl = curl_init($token_url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_fields);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);

    $token_data = json_decode($response, true);

    if (isset($token_data['access_token'])) {
        $access_token = $token_data['access_token'];

        $json_response = json_encode(['access_token' => $access_token]);

        echo $json_response;
    } else {
        echo "Failed to retrieve access token.";
    }
} else {

    echo "Error: Authorization code not found.";
}
?>