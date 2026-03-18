<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
</head>
<body>
    <h1>Select Payment Mode</h1>

    <form id="paymentForm" onsubmit="submitForm(event)">
        <label>
            <input type="radio" name="paymentMode" value="cash"> Cash
        </label>
        <label>
            <input type="radio" name="paymentMode" value="check"> Check
        </label>

        <button type="submit">Submit</button>
    </form>

    <script>
        function submitForm(event) {
            event.preventDefault();

            const paymentMode = document.querySelector('input[name="paymentMode"]:checked').value;

            // Assuming you have an API endpoint to handle the payment on the backend
            // Replace 'http://your-backend-endpoint' with your actual backend endpoint
            const backendEndpoint = 'http://your-backend-endpoint';

            // You can use fetch to send the selected payment mode to the backend
            fetch(backendEndpoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ paymentMode }),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Payment successful:', data);
                // You can redirect the user or perform any other actions here
            })
            .catch(error => {
                console.error('Error:', error);
                // Handle errors accordingly
            });
        }
    </script>
</body>
</html>
