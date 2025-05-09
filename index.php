<?php
$accessToken = "ed2b4b082b6e7f701101ccb4b469675e45735485";
$deviceID = "0a10aced202194944a055c30";
$url = "https://api.particle.io/v1/devices/$deviceID/led";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $params = $_POST['action'] === 'on' ? 'on' : 'off';

        $data = [
            'params' => $params,
            'access_token' => $accessToken
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($ch);
        curl_close($ch);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Control LED</title>
</head>
<body>

<h1>On/Off Control</h1>

<form method="post">
    <button type="submit" name="action" value="on">ON</button>
    <button type="submit" name="action" value="off">OFF</button>
</form>

</body>
</html>

