<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $dbname = "zoo_database";
    $username = "root";
    $password = "";

    try {
        // Create a new PDO connection
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare an SQL statement to insert the data
        $stmt = $conn->prepare("INSERT INTO volunteers (first_name, last_name, email, password, phone, address, zip_code) 
                                VALUES (:first_name, :last_name, :email, :password, :phone, :address, :zip_code)");
        
        // Bind the form data to the SQL query
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':zip_code', $zip_code);

        // Retrieve the data from the form
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['Password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);  // Hash the password for security
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $zip_code = $_POST['Zip'];

        // Execute the query
        $stmt->execute();

        echo "<div class='alert alert-success'>Membership form submitted successfully!</div>";

    } catch(PDOException $e) {
        echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
    }

    // Close the connection
    $conn = null;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    <link rel="stylesheet" href="./CSS/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="email"], input[type="tel"], input[type="password"], select, textarea {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="fw-bold text-success text-center">Volunteer Membership Form</h2>
        <form action="submit_membership.php" method="post">
            <label for="first_name">First Name:</label><br>
            <input type="text" id="first_name" name="first_name" required><br>

            <label for="last_name">Last Name:</label><br>
            <input type="text" id="last_name" name="last_name" required><br>

            <label for="email">Email Address:</label><br>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Password:</label><br>
            <input type="text" id="password" name="Password" required><br>

            <label for="phone">Phone Number:</label><br>
            <input type="tel" id="phone" name="phone" required><br>

            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address" required><br>

            <label for="zip">Zip Code:</label><br>
            <input type="text" id="zip" name="Zip" required><br>

            <input type="submit" value="Submit">
        </form>
    </div>
    <script src="./js/bootstrap.min.js"></script>
</body>
</html>
