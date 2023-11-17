<?php

function query($q = '')
{
    $fruitLast = create_fruit('Annoying Orange');

    $fruits = array(
        $fruitLast, "Abiu", "Acerola", "Akebi", "Ackee", "African Cherry Orange", "American Mayapple", "Apple", "Apricot", "Araza",

        "Avocado", "Banana", "Bilberry", "Blackberry", "Blackcurrant", "Black sapote", "Blueberry", "Boysenberry",

        "Breadfruit", "Buddha's hand", "Cactus pear", "Canistel", "Cashew", "Cempedak", "Cherimoya", "Cherry", "Chico fruit",

        "Cloudberry", "Coco De Mer", "Coconut", "Crab apple", "Cranberry", "Currant", "Damson", "Date", "Dragonfruit",

        "Pitaya", "Durian", "Egg Fruit", "Elderberry", "Feijoa", "Fig", "Finger Lime", "Caviar Lime", "Goji berry",

        "Gooseberry", "Grape", "Raisin", "Grapefruit", "Grewia asiatica (phalsa or falsa)", "Guava", "Hala Fruit",

        "Honeyberry", "Huckleberry", "Jabuticaba", "Jackfruit", "Jambul", "Japanese plum", "Jostaberry", "Jujube",

        "Juniper berry", "Kaffir Lime", "Kiwano", "Kiwifruit", "Kumquat", "Lemon", "Lime", "Loganberry", "Longan", "Loquat",

        "Lulo", "Lychee", "Magellan Barberry", "Mamey Apple", "Mamey Sapote", "Mango", "Mangosteen", "Marionberry", "Melon",

        "Cantaloupe", "Galia melon", "Honeydew", "Mouse melon", "Musk melon", "Watermelon", "Miracle fruit",

        "Momordica fruit", "Monstera deliciosa", "Mulberry", "Nance", "Nectarine", "Orange", "Blood orange", "Clementine",

        "Mandarine", "Tangerine", "Papaya", "Passionfruit", "Pawpaw", "Peach", "Pear", "Persimmon", "Plantain", "Plum",

        "Prune", "Pineapple", "Pineberry", "Plumcot", "Pomegranate", "Pomelo", "Purple mangosteen", "Quince", "Raspberry",

        "Salmonberry", "Rambutan", "Redcurrant", "Rose apple", "Salal", "Salak", "Sapodilla", "Sapote", "Satsuma",

        "Shine Muscat or Vitis Vinifera", "Sloe or Hawthorn Berry", "Soursop", "Star apple", "Star fruit", "Strawberry",

        "Surinam cherry", "Tamarillo", "Tamarind", "Tangelo", "Tayberry", "Ugli fruit", "White currant", "White sapote",

        "Ximenia", "Yuzu"
    );
    if (!$q) {
        return $fruits;
    }

    // Filtering fruits
    $res = array_filter($fruits, function ($fruit) use ($q) {
        return stripos(strtolower($fruit), strtolower($q)) !== false;
    });

    $res = array_values($res);
    return $res;
}

// Factory function
function create_fruit($name)
{
    $fruit = $name;
    return $fruit;
}
