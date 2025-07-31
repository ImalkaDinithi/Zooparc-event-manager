<?php
include("./BO/Events.php");
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$Events = new Events();
$events = $Events->get(); // Fetch all events from the DB
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event List</title>
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
    <?php include './header.php'; ?>

    <div class="container mt-1 mb-1">
        <h1 class="text-white center">Event List</h1>
        <table class="table table-bordered center">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (is_array($events) && count($events) > 0) {
                    foreach ($events as $event) {
                        echo '
                        <tr>
                            <td>' . htmlspecialchars($event->getEventId()) . '</td> <!-- Correct method call -->
                            <td>' . htmlspecialchars($event->getName()) . '</td>
                            <td>' . htmlspecialchars($event->getDescription()) . '</td>
                            <td><img src="' . htmlspecialchars($event->getImage()) . '" width="100px"></td>
                            <td>
                                <!-- Pass the event ID via URL for editing -->
                                <a href="EventsUpdate.php?id=' . htmlspecialchars($event->getEventId()) . '" class="btn btn-primary text-white">Edit</a>
                            </td>
                        </tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">No events available.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
