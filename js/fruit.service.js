document.addEventListener('DOMContentLoaded', function () {
    let searchInput = document.getElementById('searchInput')
    let fruitsListElement = document.getElementById('fruitsList')

    // Function to fetch and display fruits
    async function fetchAndDisplayFruits(query) {
        try {
            let response = await fetch('./api/fruit.php?ajax=1&q='
                + encodeURIComponent(query))
            let fruits = await response.json()

            fruitsListElement.innerHTML = ''
            fruits.forEach(fruit => {
                let li = document.createElement('li')
                li.textContent = fruit
                fruitsListElement.appendChild(li)
            })
        } catch (error) {
            console.error('Error:', error)
            fruitsListElement.innerText = 'Failed to load fruits.'
        }
    }
    // Fetch and display fruits at start
    fetchAndDisplayFruits('')

    // Event listener for search input
    searchInput.addEventListener('input', function (e) {
        let searchQuery = e.target.value
        if (searchQuery.length > 2) fetchAndDisplayFruits(searchQuery)
        else fetchAndDisplayFruits('')
    })
})
