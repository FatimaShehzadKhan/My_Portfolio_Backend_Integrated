<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $message = $_POST['message'];

    // Create a connection
    $connection = mysqli_connect('localhost', 'root', '', 'test'); // Update the parameters if needed

    // Check if the connection was successful
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute the query
    $query = "INSERT INTO contact (name, email, contact, message) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $contact, $message);

    if (mysqli_stmt_execute($stmt)) {
        echo "your message is sent successfully!";
    } else {
        echo "Query failed: " . mysqli_stmt_error($stmt);
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}
?>
