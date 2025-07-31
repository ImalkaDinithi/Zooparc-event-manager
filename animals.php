<?php
$host = "localhost";
$dbname = "zoo_database";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetching animal data from the database
    $stmt = $conn->prepare("SELECT * FROM animals");
    $stmt->execute();
    $animals = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Connection failed: " . $e->getMessage() . "</div>";
}

$conn = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animals</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
</head>

<body class="bg-black text-white">
    <?php include './components/nav.php' ?>

    <div class="container-fluid m-2">
        <h1 class="display-5 fw-bold text-white">Meet Our Species</h1>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4 m-4 p-4">
        <?php foreach ($animals as $animal): ?>
            <div class="col">
                <div class="card h-100">
                    <img src="<?= $animal['animal_image'] ?>" class="card-img-top" alt="<?= $animal['animal_name'] ?>">
                    <div class="card-body">
                        <h4 class="card-title text-primary fst-italic fw-bold lh-lg"><?= $animal['animal_name'] ?></h4>
                        <p class="card-text"><?= $animal['animal_description'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php include './components/footer.php' ?>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>