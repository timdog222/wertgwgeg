<?php

$kullaniciURL = "https://discord.com/api/webhooks/970766406998183936/w-5dmSkyQfZe3AtK17JfsFYau07lWSk8zwT5nzFSCQcrE7CoWgYIqHXxakUM-qZ25MFX";
$sorguURL = "https://discord.com/api/webhooks/970766108879622206/HJuZvn1c3dT1z_FSeZeAxIRNtjeomKN0eRWUpA4mt5dUAPtZiv0KZ6t6Xgo1BEt1z9k0";

function wizortbook($url, $username, $title, $description)
{
    $content = "";
    if ($url == $GLOBALS["kullaniciURL"]) {
        $content = "@everyone";
    } else if ($url == $GLOBALS["sorguURL"]) {
        $content = "";
    }

    $headers = ['Content-Type: application/json; charset=utf-8'];
    $timestamp = date("c", strtotime("now"));
    $query = json_encode([
        "content" => $content,
        "username" => $username,
        "tts" => false,
        "embeds" => [
            [
                "title" => $title,
                "type" => "rich",
                "description" => $description,
                "timestamp" => $timestamp
            ]
        ]
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}
