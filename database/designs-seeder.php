<?php


$designs = [
    [
        'title' => "SONOS Music Fest",
        'img' => "./public/theme/img/logo.png"
    ],
    [
        'title' => "Monarch Butterfly",
        'img' => "./public/theme/img/butterfly.png"
    ],
    [
        'title' => "Abstract Flower",
        'img' => "./public/theme/img/flower.png"
    ],
    [
        'title' => "Heart of Flowers",
        'img' => "./public/theme/img/heart.png"
    ],
    [
        'title' => "Color Splash",
        'img' => "./public/theme/img/splash.png"
    ],
    [
        'title' => "Choo Choo",
        'img' => "./public/theme/img/train.png"
    ]
];

/* * * mysql hostname ** */
$hostname = "localhost";
/* * * mysql username ** */
$username = "root";
/* * * mysql password ** */
$password = "";
/* * * mysql database name ** */
$database = "merch";


try {
    $connection = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    foreach ($designs as $design) {
        $sqlQueryString = "INSERT INTO designs (title, img)"
            . " VALUES (" . ":title" . ", " . ":img" . ")";
        $statement = $connection->prepare($sqlQueryString);
        $params = [
            'title' => $design["title"],
            'img' => $design["img"]
        ];
        $status = $statement->execute($params);
    }
} catch (PDOException $exception) {
    echo "Something went wrong: " . $exception->getMessage() . "<br>";
}
