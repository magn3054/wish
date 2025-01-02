// Fetch wishes from the server
async function loadWishes() {
    try {
        const response = await fetch('/retrievewishes.php');
        const data = await response.json();

        const wishesList = document.getElementById('wishes-list');
        wishesList.innerHTML = ''; // Clear the list.

        if (data.error) {
            wishesList.innerHTML = `<li>Error: ${data.error}</li>`;
            return;
        }

        // Display wishes
        const tableBody = document.getElementById('wishes-table-body');
        data.forEach(wish => {
            const listItem = tableBody.createElement('tr');
            listItem.innerHTML = `
                <td>${wish.navn}</td>
                <td>${wish.str}</td>
                <td>${wish.farve}</td>
                <td><a href="${wish.url}" target="_blank">${wish.url}</a></td>
            `;
            wishesList.appendChild(listItem);
        });
    } catch (error) {
        console.error('Error fetching wishes:', error);
        document.getElementById('wishes-list').innerHTML = `<li>Error loading wishes.</li>`;
    }
}
