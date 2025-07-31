<?php
session_start();

// Block access if not logged in
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'volunteer') {
    header('Location: login.php');
    exit();
}

$host = "localhost";
$dbname = "zoo_database";
$username = "root";
$password = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO animals (animal_name, animal_description, animal_image) VALUES (:animal_name, :animal_description, :animal_image)");
        $stmt->bindParam(':animal_name', $animal_name);
        $stmt->bindParam(':animal_description', $animal_description);
        $stmt->bindParam(':animal_image', $animal_image);

        // Retrieve form data
        $animal_name = $_POST['animal_name'];
        $animal_description = $_POST['animal_description'];
        
        // Handle file upload
        $target_dir = "uploads/";
        $animal_image = $target_dir . basename($_FILES["animal_image"]["name"]);
        move_uploaded_file($_FILES["animal_image"]["tmp_name"], $animal_image);

        // Execute the query
        $stmt->execute();
        echo "<div class='alert alert-success'>New animal added successfully</div>";

    } catch(PDOException $e) {
        echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
    }

    $conn = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Animal</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./CSS/main.css">
    <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
<nav>
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 280px;">
            <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <svg class="bi pe-none me-2" width="40" height="32"></svg>
                <span class="text-white fs-4">Dashboard</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="./add_animal.php" class="nav-link active text-white" aria-current="page">
                        <svg class="bi pe-none me-2" width="16" height="30"></svg>
                        Add Animal
                    </a>
                </li>
                <li>
                    <a href="./login.php" class="nav-link link-body-emphasis text-white">
                        <svg class="bi pe-none me-2" width="16" height="30"></svg>
                        Sign Out
                    </a>
                </li>
            </ul>
            <hr>

            <div class="down">
                <img src="./Icons/logo-black.png" alt="Icon" width="45" height="45">
            </div>
        </div>

    </nav>
    <div class="container mt-5 bg-white center">
        <h1>Add a New Animal</h1>
        <form action="add_animal.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
                <label for="animal_id" class="form-label">Animal Id</label>
                <input type="number" class="form-control" id="" name="animal_id" readonly placeholder="Code will be generate automaticaly">
            </div>
            <div class="mb-3">
                <label for="animal_name" class="form-label">Animal Name</label>
                <input type="text" class="form-control" id="animal_name" name="animal_name" required>
            </div>
            <div class="mb-3">
                <label for="animal_description" class="form-label">Animal Description</label>
                <textarea class="form-control" id="animal_description" name="animal_description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="animal_image" class="form-label">Animal Image</label>
                <input type="file" class="form-control" id="animal_image" name="animal_image" required>
            </div>
            <button type="submit">Add Animal</button>
        </form>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
