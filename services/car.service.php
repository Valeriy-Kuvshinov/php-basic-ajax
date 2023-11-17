<?php
$isDiscount = true;

function query($q = '')
{
    // Associative Array (Used as kind of a Car object)
    $car1 = array('vendor' => 'Audu', 'speed' => 89);
    $car2 = array('vendor' => 'Siak Igzima', 'speed' => 30);
    $car3 = create_car('Mitsubikik', 120);

    // Normal Array
    $cars  = array($car1, $car2, $car3);

    if (!$q) {
        return $cars;
    }

    // Filtering Cars
    $res = array_filter($cars, function ($car) use ($q) {
        return stripos(strtolower($car['vendor']), strtolower($q)) !== false;
    });

    $res = array_values($res);
    return $res;
}

// Factory function
function create_car($vendor, $speed)
{
    global $isDiscount;
    $car = array(
        'vendor' => $vendor,
        'speed' => $speed,
        'isDiscount' => $isDiscount
    );
    return $car;
}
