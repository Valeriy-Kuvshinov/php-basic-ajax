<?php
require_once('services/car.service.php');
$q = (isset($_GET['q'])) ? $_GET['q'] : '';
$isAjaxRequest = isset($_GET['ajax']); // Check for a specific AJAX indicator

if ($isAjaxRequest) {
    // Handle AJAX Request
    $cars = query($q);
    header('Content-Type: application/json');
    echo json_encode($cars);
    exit;
}

// Normal page load
$cars = query($q);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars SSR App</title>
</head>

<body>
    <h1>Cars SSR App</h1>
    <h2>Server side rendering</h2>
    <input id="searchInput" name="q" type="search" placeholder="Filter cars" value="<?= $q ?>" autofocus />

    <ul id="carsList">
        <?php foreach ($cars as $car) : ?>
            <li><?= $car['vendor'] ?></li>
        <?php endforeach ?>
    </ul>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let searchInput = document.getElementById('searchInput')

            searchInput.addEventListener('input', async function(e) {
                let searchQuery = e.target.value

                if (searchQuery.length >= 2) {
                    try {
                        let response = await fetch('car-app.php?ajax=1&q=' +
                            encodeURIComponent(searchQuery))
                        let data = await response.json()

                        let carsList = document.getElementById('carsList')
                        carsList.innerHTML = ''
                        data.forEach(car => {
                            let li = document.createElement('li')
                            li.textContent = car.vendor
                            carsList.appendChild(li)
                        })
                    } catch (error) {
                        console.error('Error:', error)
                    }
                } else {
                    document.getElementById('carsList').innerHTML = ''
                }
            })
        })
    </script>
</body>

</html>