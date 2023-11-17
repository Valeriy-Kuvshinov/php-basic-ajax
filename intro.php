<?php
require_once('services/util.service.php');

// no need to define vars
$nickName = 'Puka' . 'li';
if ($nickName === 'Pukali') $nickName .= 'da';

$count = (19 + 30 / 100) % 5;

$nums = array(6, 7, 8, 1);
$names = array('Puki Hey', 'Muki B', 'Tuki Sasa');
$color = get_random_color();

function cube($n)
{
    return ($n * $n * $n);
}

// In newer versions of PHP, it is also possible to define an array with []
$arr = [1, 2, 3, 4, 5];
$arr1 = array_map('cube', $arr);

// echo $count;
// echo $names;
// var_dump($names);
// var_dump($nums);
// die('Bye');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intro PHP</title>
</head>

<body>
    <h1 style="color:#<?= $color ?>" class="<?= 'headush' ?>">Intro PHP</h1>
    <h1> <?= $nickName ?> Lets PHP Together</h1>
    <h2>Count is: <?= $count ?></h2>
    <ul>
        <?php foreach ($names as $name) : ?>
            <li><?= $name ?></li>
        <?php endforeach ?>
    </ul>
</body>

</html>