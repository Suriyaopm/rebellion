<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Issue</title>
</head>
<body>
    <ul id="responsesList"></ul>
    <script>
        // Retrieve responses from localStorage
        var responses = JSON.parse(localStorage.getItem('responses')) || [];

        // Reference to the responses list
        var responsesList = document.getElementById('responsesList');

        // Function to display the responses
        function displayResponses() {
            responsesList.innerHTML = '';  // Clear the current list

            responses.forEach(function(response, index) {
                var listItem = document.createElement('li');
                listItem.innerHTML = `<strong>Name:</strong> ${response.name}<br>
                                      <strong>Email:</strong> ${response.email}<br>
                                      <button onclick="deleteResponse(${index})">Delete</button><hr>`;
                responsesList.appendChild(listItem);
            });
        }

        // Function to delete a specific response
        function deleteResponse(index) {
            responses.splice(index, 1);  // Remove the selected response
            localStorage.setItem('responses', JSON.stringify(responses));  // Update localStorage
            displayResponses();  // Re-render the list
        }

        // Initial display of responses
        displayResponses();
    </script>
</body>
</html>