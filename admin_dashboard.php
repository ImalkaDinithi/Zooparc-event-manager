<?php
include("./BO/events.php");
session_start();
$msg = '';
if (isset($_POST["btnAdd"])) {
    $Events = new Events();
    $Events->setName($_POST["txtName"]);
    $Events->setDate($_POST["txtDate"]);
    $Events->setDescription($_POST["txtDes"]);
    $Events->setImage("");
    $id = $Events->add();

    if ($id > 0) {
        // upload image
        $info = new SplFileInfo($_FILES["txtImage"]["name"]);
        $newName = './images/' . $id . '.' . $info->getExtension();
        $Events->setImage($newName);
        $Events->setid($id);
        move_uploaded_file($_FILES["txtImage"]["tmp_name"], $newName);
        $Events->updateImage();
        $msg = "New Event added Successfully!";
    } else {
        $msg = "Failed to add event";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="windows-1252">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    <link rel="stylesheet" href="./CSS/main.css">
    <link rel="stylesheet" href="./CSS/style.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <?php include './header.php' ?>
    <div class="center">
        <header>
            <h1>Events</h1>
            <nav></nav>
            <aside>

        </header>
        <form method="POST" enctype="multipart/form-data">
            <ul style="list-style-type: none;">
                <li><label for="">Event Id</label></li>
                <li>
                    <input type="number" name="txtid" id="" readonly placeholder="Code will be generate automaticaly">
                </li>
                <li><label for="">Name</label></li>
                <li>
                    <input type="text" name="txtName" id="" require>
                </li>
                <li><label for="">Date</label></li>
                <li>
                    <input type="date" name="txtDate" id="" require>
                </li>
                <li><label for="">Description</label></li>
                <li>
                    <textarea name="txtDes" id=""></textarea>
                </li>
                <li><label for="">Image</label></li>
                <li>
                    <input type="file" name="txtImage" id="" require>
                </li>

                <li>
                    <input type="submit" value="Add" name="btnAdd">
                </li>
            </ul>
        </form>
    </div>
    <?php
    echo '<div id="myModal" class="modal"><div class="modal-content"><span class="close">&times;</span><p>$msg</p></div>';
    ?>
    </aside>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>

</html>