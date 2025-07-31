<?php
session_start();

// Database connection
$host = 'localhost';
$dbname = 'zoo_database';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $inputEmail = $_POST['email']; // Email input
        $inputPassword = $_POST['password']; // Password input

        // Fetch the user from the database based on the email
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $inputEmail);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if user exists and password matches
        if ($user && $inputPassword == $user['password']) { // Replace with password_hash for security

            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['email'] = $user['email'];

            // Redirect based on role
            if ($user['role'] == 'admin') {
                header('Location: admin_dashboard.php'); // Redirect to Admin Dashboard
                exit(); // Stop further script execution
            } else if ($user['role'] == 'volunteer') {
                header('Location: add_animal.php'); // Redirect to Volunteer Dashboard
                exit(); // Stop further script execution
            }
        } else {
            // If login fails
            echo "<div class='alert alert-danger'>Invalid email or password!</div>";
        }
    }
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Connection failed: " . $e->getMessage() . "</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <div class="container center">
        <main class="form-signin text-center w-40 mt-3 mt-md-5">
            <form action="login.php" method="POST">
                <img class="mb-4" src="./Icons/logo1.png" alt="logo" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Log In</h1>

                <div class="form-floating mt-4">
                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mt-4">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>

                <button class="btn btn-primary w-100 py-2 mt-4" type="submit">Log in</button>

                <p>Don't have an Account? <a href="submit_membership.php">SignUp</a></p>
                <p class="mt-5 mb-3 text-body-secondary">&copy; ZooParc–2024</p>

            </form>
        </main>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
