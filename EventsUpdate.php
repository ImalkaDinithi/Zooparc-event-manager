<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once("BO/events.php");
require_once("BO/connection.php");

// Initialize selectedEvents variable
$selectedEvents = null;

// Check if the form was submitted for update or delete
if (isset($_POST['btnUpdate']) || isset($_POST['btnDel'])) {
    $id = $_POST['txtid'];
    $name = $_POST['txtName'];
    $date = $_POST['txtdate'];
    $description = $_POST['txtDes'];
    $image = null;

    // Fetch the event by ID
    $eventObj = new events();
    $selectedEvents = $eventObj->getId($id);

    if (isset($_POST['btnUpdate'])) {
        // Handle image upload
        if (isset($_FILES['txtImage']['name']) && $_FILES['txtImage']['name'] != "") {
            $image = "images/" . basename($_FILES['txtImage']['name']);
            move_uploaded_file($_FILES['txtImage']['tmp_name'], $image);
        } else {
            // Use existing image if no new image is uploaded
            $image = $selectedEvents->getImage();
        }

        // Update event data
        $selectedEvents->setName($name);
        $selectedEvents->setDate($date);
        $selectedEvents->setDescription($description);
        $selectedEvents->setImage($image);
        $selectedEvents->update();

        // Update the image separately if changed
        if ($image && $image != $selectedEvents->getImage()) {
            $selectedEvents->setImage($image);
            $selectedEvents->updateImage();
        }

        echo "Event updated successfully!";
    }

    if (isset($_POST['btnDel'])) {
        // Delete the event
        $selectedEvents->del();
        echo "Event deleted successfully!";
    }
}

// Get the event by ID from the query parameter
if (isset($_GET['id'])) {
    $eventId = $_GET['id'];
    $eventObj = new events();
    $selectedEvents = $eventObj->getId($eventId);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    <link rel="stylesheet" href="./CSS/style.css">
    <title>Update Event</title>
</head>
<body>
    <?php
    include 'header.php';
    ?>
    <h1 class="center">Update Event</h1>

    <form method="POST" enctype="multipart/form-data">
        <ul style="list-style-type: none;" class="center">
            <!-- Event ID (Read-only) -->
            <li><label for="">Event Id</label></li>
            <li>
                <input type="number" name="txtid" readonly value="<?php  
                if ($selectedEvents) {
                    echo htmlspecialchars($selectedEvents->getEventId()); // Use the renamed method
                }
                ?>">
            </li>

            <!-- Event Name -->
            <li><label for="">name</label></li>
            <li>
                <input type="text" name="txtName" required value="<?php  
                if ($selectedEvents) {
                    echo htmlspecialchars($selectedEvents->getName());
                }
                ?>">
            </li>

            <!-- Event Date -->
            <li><label for="">date</label></li>
            <li>
                <input type="date" name="txtdate" required value="<?php  
                if ($selectedEvents) {
                    echo htmlspecialchars($selectedEvents->getDate());
                }
                ?>">
            </li>

            <!-- Event Description -->
            <li><label for="">Description</label></li>
            <li>
                <textarea name="txtDes" required><?php
                if ($selectedEvents) {
                    echo htmlspecialchars($selectedEvents->getDescription());
                }
                ?></textarea>
            </li>

            <!-- Event Image -->
            <li><label for="">Image</label></li>
            <li>
                <?php if ($selectedEvents && $selectedEvents->getImage()): ?>
                    <img src="<?php echo htmlspecialchars($selectedEvents->getImage()); ?>" alt="Event Image" width="100px">
                <?php endif; ?>
                <input type="file" name="txtImage">
            </li>

            <!-- Submit Buttons for Update and Delete -->
            <li>
                <input type="submit" value="Update" name="btnUpdate">
                <input type="submit" value="Delete" name="btnDel">
            </li>
        </ul>
    </form>

</body>
</html>
