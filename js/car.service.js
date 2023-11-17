document.addEventListener('DOMContentLoaded', function () {
    let searchInput = document.getElementById('searchInput')
    let carsListElement = document.getElementById('carsList')

    // Function to fetch and display cars
    async function fetchAndDisplayCars(query) {
        try {
            let response = await fetch('./api/car.php?ajax=1&q='
                + encodeURIComponent(query))
            let cars = await response.json()

            carsListElement.innerHTML = ''
            cars.forEach(car => {
                let li = document.createElement('li')
                li.textContent = car.vendor
                carsListElement.appendChild(li)
            })
        } catch (error) {
            console.error('Error:', error)
            carsListElement.innerText = 'Failed to load cars.'
        }
    }
    // Fetch and display cars at start
    fetchAndDisplayCars('')

    // Event listener for search input
    searchInput.addEventListener('input', function (e) {
        let searchQuery = e.target.value
        if (searchQuery.length >= 2) fetchAndDisplayCars(searchQuery)
        else fetchAndDisplayCars('')
    })
})
