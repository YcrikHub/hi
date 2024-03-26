<?php
$response = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['link'])) {
    $link = filter_var(trim($_POST['link']), FILTER_SANITIZE_URL);

    $apiType = "";
    if (strpos($link, "spdmteam.com") !== false) {
        $apiType = "api-arceusx";
    } elseif (strpos($link, "mobile.codex.lol") !== false) {
        $apiType = "api-codex";
    } elseif (strpos($link, "hohohubv-ac90f67762c4.herokuapp.com") !== false) {
        $apiType = "api-hohohubv";
    } elseif (strpos($link, "gateway.platoboost.com/a/8") !== false) {
        $apiType = "api-delta";
    } elseif (strpos($link, "gateway.platoboost.com/a/2569") !== false) {
        $apiType = "api-hydrogen";
    } elseif (strpos($link, "trigonevo.com/getkey") !== false) {
        $apiType = "api-trigon";
    } elseif (strpos($link, "pandadevelopment.net/getkey") !== false) {
        $apiType = "api-vegax";
    }

    $apiType2 = "";
    switch ($apiType) {
        case "api-arceusx":
            $apiType2 = "hwid";
            break;
        case "api-codex":
            $apiType2 = "token";
            break;
        case "api-hohohubv":
            $apiType2 = "hwid";
            break;
        case "api-delta":
            $apiType2 = "hwid";
            break;
        case "api-hydrogen":
            $apiType2 = "hwid";
            break;
        case "api-trigon":
            $apiType2 = "hwid";
            break;
        case "api-vegax":
            $apiType2 = "hwid";
            break;
        default:
            break;
    }

    $keyreq = "";
    switch ($apiType) {
        case "api-arceusx":
            preg_match('/hwid=(.*)/', $link, $matches);
            $keyreq = isset($matches[1]) ? $matches[1] : "";
            break;
        case "api-codex":
            preg_match('/token=(.*)/', $link, $matches);
            $keyreq = isset($matches[1]) ? $matches[1] : "";
            break;
        case "api-hohohubv":
            preg_match('/hwid=(.*)/', $link, $matches);
            $keyreq = isset($matches[1]) ? $matches[1] : "";
            break;
        case "api-delta":
            preg_match('/id=(.*)/', $link, $matches);
            $keyreq = isset($matches[1]) ? $matches[1] : "";
            break;
        case "api-hydrogen":
            preg_match('/id=(.*)/', $link, $matches);
            $keyreq = isset($matches[1]) ? $matches[1] : "";
            break;
        case "api-trigon":
            preg_match('/hwid=(.*)/', $link, $matches);
            $keyreq = isset($matches[1]) ? $matches[1] : "";
            break;
        case "api-vegax":
            preg_match('/hwid=(.*)/', $link, $matches);
            $keyreq = isset($matches[1]) ? $matches[1] : "";
            break;
        default:
            break;
    }

    $url = "https://stickx.top/{$apiType}/?{$apiType2}={$keyreq}&api_key=E99l9NOctud3vmu6bPne";

    $response = @file_get_contents($url);

    if ($response === FALSE) {
        $response = "Error: Failed to make a request. Please check the link and try again.";
    } else {
        $response = json_decode($response, true);
        if ($response) {
            $response = json_encode($response);
        }
    }
}

if (!empty($response)) {
    echo $response;
}
?>
