<?php


$products =  [
    [
        'id' => 125,
        'title' => "Festival Badges - Different Designs",
        'description' => "A whole bunch of colorful badges with fun and funny illustrations.",
        'available' => 0,
        'price' => 5.49,
        'category' => "other",
        'img' => "./public/theme/img/badges.png"
    ],
    [
        'id' => 126,
        'title' => "Black Trucker Hat - Something in the Water",
        'description' => "Buy Baseball Hat for Women Men Boxing Water Fire Black Hip Hop Caps Adjustable Snapback Hats Dad Trucker Cap from Walmart Canada. ",
        'available' => 1,
        'price' => 15.89,
        'category' => "hats",
        'img' => "./public/theme/img/black_hat.png"
    ],
    [
        'id' => 127,
        'title' => "Techno Is My Motivation - Black T-Shirt",
        'description' => "We’ve said the same thing about white tees and colorful options, sure, but the black T-shirt sits above ’em in the sartorial hierarchy. It is the most flattering; there’s no need to worry too much about lumps and sags peering through.",
        'available' => 1,
        'price' => 24.59,
        'category' => "t_shirts",
        'img' => "./public/theme/img/black_tshirt.png"
    ],
    [
        'id' => 128,
        'title' => "Cloud Hoodie - Pink and Blue",
        'description' => "Designed to make you feel like you're floating on Cloud 9, our super oversized, marshmallowy-soft Cloud Hoodie is simply perfection.",
        'available' => 1,
        'price' => 44.49,
        'category' => "long_sleeve",
        'img' => "./public/theme/img/cloud_hoodie.png"
    ],
    [
        'id' => 129,
        'title' => "Red and Yellow Bucket Hat",
        'description' => "There are many different names for a bucket hat, including a fisherman hat, session cap, and an Irish country hat. They are named for their shape, consisting of a soft top and a wide, floppy brim.",
        'available' => 1,
        'price' => 11.99,
        'category' => "hats",
        'img' => "./public/theme/img/bucket_hat_red.png"
    ],
    [
        'id' => 130,
        'title' => "Red and Yellow Shirt",
        'description' => "This is our Kings Of NY Red And Yellow Striped Mens Rugby Shirt. This long sleeve shirt is super soft and comfortable with a modern fit and timeless design.",
        'available' => 1,
        'price' => 15.49,
        'category' => "t_shirts",
        'img' => "./public/theme/img/colorful_shirt.png"
    ],
    [
        'id' => 131,
        'title' => "Unisex Longsleeve With Cool Design",
        'description' => "The Invisible Glove couples our patented slow-release technology with natural anti-microbial ingredients for long-lasting protection against viruses & bacteria",
        'available' => 1,
        'price' => 24.89,
        'category' => "long_sleeve",
        'img' => "./public/theme/img/combo1_longsleeve.png"
    ],
    [
        'id' => 132,
        'title' => "Unisex Longsleeve With an Even Cooler Design",
        'description' => "The Invisible Glove couples our patented slow-release technology with natural anti-microbialThe Invisible Glove couples our patented slow-release technology with natural anti-microbial ingredients for long-lasting protection against viruses & bacteria ingredients for long-lasting protection against viruses & bacteria",
        'available' => 1,
        'price' => 25.89,
        'category' => "long_sleeve",
        'img' => "./public/theme/img/combo2_longsleeve.png"
    ],
    [
        'id' => 133,
        'title' => "Set of Masks",
        'description' => "The Invisible Glove couples our patented slow-release technology with natural anti-microbial ingredients for long-lasting protection against viruses & bacteria",
        'available' => 1,
        'price' => 4.49,
        'category' => "other",
        'img' => "./public/theme/img/masks.png"
    ],
    [
        'id' => 134,
        'title' => "Pink Bucket Hat",
        'description' => "The Invisible Glove couples our patented slow-release technology with natural anti-microbial ingredients for long-lasting protection against viruses & bacteria",
        'available' => 1,
        'price' => 28.49,
        'category' => "hats",
        'img' => "./public/theme/img/pink_hat.png"
    ],
    [
        'id' => 135,
        'title' => "Festival Survival Kit",
        'description' => "The Invisible Glove couples our patented slow-release technology with natural anti-microbial ingredients for long-lasting protection against viruses & bacteriaThe Invisible Glove couples our patented slow-release technology with natural anti-microbial ingredients for long-lasting protection against viruses & bacteriaThe Invisible Glove couples our patented slow-release technology with natural anti-microbial ingredients for long-lasting protection against viruses & bacteria",
        'available' => 1,
        'price' => 28.49,
        'category' => "other",
        'img' => "./public/theme/img/survival_kit.png"
    ],
    [
        'id' => 136,
        'title' => "Longsleeve With Design",
        'description' => "The Invisible Glove couples our patented slow-release technology with natural anti-microbial ingredients for long-lasting protection against viruses & bacteria",
        'available' => 1,
        'price' => 22.49,
        'category' => "long_sleeve",
        'img' => "./public/theme/img/triangle_longsleeve.png"
    ],
    [
        'id' => 137,
        'title' => "White Dad Hat With Design",
        'description' => "The Invisible Glove couples our patented slow-release technology with natural anti-microbial ingredients for long-lasting protection against viruses & bacteriaThe Invisible Glove couples our patented slow-release technology with natural anti-microbial ingredients for long-lasting protection against viruses & bacteria",
        'available' => 1,
        'price' => 17.99,
        'category' => "hats",
        'img' => "./public/theme/img/white_hat.png"
    ],
    [
        'id' => 138,
        'title' => "Yellow Rock Shirt",
        'description' => "The Invisible Glove couples our patented slow-release technology with natural anti-microbial ingredients for long-lasting protection against viruses & bacteria",
        'available' => 0,
        'price' => 12.49,
        'category' => "t_shirts",
        'img' => "./public/theme/img/yellow_shirt.png"
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

    foreach ($products as $product) {
        $sqlQueryString = "INSERT INTO all_products (title, description, price, stock, img, status, id, category)"
            . " VALUES (" . ":title" . ", " . ":description" . ", " . ":price" . ", " . ":stock" . ", " . ":img" . ", "
            . ":status" . ", " . ":id" . ", " . ":category" . ")";
        $statement = $connection->prepare($sqlQueryString);
        $params = [
            'title' => $product["title"],
            'description' => $product["description"],
            'price' => $product["price"],
            'stock' => rand(1, 10),
            'img' => $product["img"],
            'status' => $product["available"],
            'id' => $product["id"],
            'category' => $product["category"]
        ];
        $status = $statement->execute($params);
    }
} catch (PDOException $exception) {
    echo "Something went wrong: " . $exception->getMessage() . "<br>";
}
