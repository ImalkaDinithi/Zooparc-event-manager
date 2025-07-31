<?php
// Database connection
$host = "localhost";
$dbname = "zoo_database";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch all events from the database
    $stmt = $conn->prepare("SELECT * FROM events");
    $stmt->execute();

    // Store the result in $events
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
</head>

<body class="bg-black text-white">
    <?php include './components/nav.php' ?>
    <div class="container mt-5">
        <h1>Events</h1>
        <div class="row">
            <?php if (!empty($events)): ?>
                <?php foreach ($events as $event): ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="<?= htmlspecialchars($event['Image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($event['name']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($event['name']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($event['Description']) ?></p>
                                <p class="card-text"><small class="text-muted"><?= htmlspecialchars($event['date']) ?></small></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">No events available.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php include './components/footer.php' ?>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>