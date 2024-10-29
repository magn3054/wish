document.getElementById('wishForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Collect form data
    const data = {
        item: document.getElementById('item').value,
        size: document.getElementById('size').value,
        color: document.getElementById('color').value,
        brand: document.getElementById('brand').value,
        comments: document.getElementById('comments').value
    };

    // Send data to the PHP script
    fetch('addwish.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        if (result.status === "success") {
            alert("Item added to the wish list!");
            document.getElementById('wishForm').reset();
        } else {
            alert("Failed to add item: " + result.message);
        }
    })
    .catch(error => console.error("Error:", error));
});