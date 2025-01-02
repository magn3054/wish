// Fetch wishes from the server
async function loadWishes() {
    try {
        const response = await fetch('/retrievewishes.php');
        const data = await response.json();

        const wishesList = document.getElementById('wishes-list');
        wishesList.innerHTML = ''; // Clear the list

        if (data.error) {
            wishesList.innerHTML = `<li>Error: ${data.error}</li>`;
            return;
        }

        // Display wishes
        data.forEach(wish => {
            const listItem = document.createElement('li');
            listItem.innerHTML = `
                <strong>Name:</strong> ${wish.navn} <br>
                <strong>Size:</strong> ${wish.str} <br>
                <strong>Color:</strong> ${wish.farve} <br>
                <strong>URL:</strong> <a href="${wish.url}" target="_blank">${wish.url}</a>
            `;
            wishesList.appendChild(listItem);
        });
    } catch (error) {
        console.error('Error fetching wishes:', error);
        document.getElementById('wishes-list').innerHTML = `<li>Error loading wishes.</li>`;
    }
}
