// Fetch data from wishes.json and display it
function loadWishList() {
    fetch('js/wishes.json')
        .then(response => response.json())
        .then(wishData => {
            const wishListElement = document.getElementById('wishList');
            wishListElement.innerHTML = '';  // Clear existing list

            // Populate list with items
            wishData.forEach(item => {
                const li = document.createElement('li');
                li.textContent = `Item: ${item.item}, Size: ${item.size}, Color: ${item.color}, Brand: ${item.brand}, Comments: ${item.comments}`;
                wishListElement.appendChild(li);
            });
        })
        .catch(error => console.error("Error loading wish list:", error));
}

// Load the wish list on page load
document.addEventListener('DOMContentLoaded', loadWishList);