document.addEventListener('DOMContentLoaded', function () {
    // Perform a request to the server to get the user details
    fetch('user_page.php')
        .then(response => response.json())
        .then(data => {
            // Update the userDetails div with the user details
            document.getElementById('userDetails').innerHTML = `
                <h3>User Details</h3>
                <p><strong>Name:</strong> ${data.name}</p>
                <p><strong>Email:</strong> ${data.email}</p>
                <!-- Add more details as needed -->
            `;
        })
        .catch(error => console.error('Error fetching user details:', error));
});
