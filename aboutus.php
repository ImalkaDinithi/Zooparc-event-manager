<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body class="p-3 mb-2 bg-body-secondary">

    <?php include './components/nav.php' ?>

    <!-- Image -->
    <div class="container-fluid">
    <img src="./Images/giraffe-wild.jpg" class="img-fluid" alt="giraffe" width="60%" height="70px">
    </div>

    <!-- Description about ZooParc -->
    <div class="container-fluid m-5">
        <h1 class="display-4 fw-bold">Who We Are</h1>
    </div>
    <div class="container-fluid m-2">
        <p class="text-success fst-italic fw-semibold lh-lg">Almost 2,000 animals from 200 distinct species can be seen at ZooParc, a well-known wildlife sanctuary. Our park provides visitors with a singular and immersive experience, spanning 70 hectares of varied and painstakingly created habitats. 
            <br>The Zoo is committed to the care and conservation of a diverse range of species, from the magnificent roar of lions and the soaring flight of bald eagles to the vivid colors of toxic frogs and the gentle giants of Asian- elephants. 
            <br>International tourists are still enthralled with our most well-known inhabitants, the giant pandas.
            </p>
    </div>
    
    <!-- image -->
    <div class="container-fluid text-center">
        <img src="./Images/bombina.jpg" class="rounded" alt="frog" width="40%">
    </div>

    <!-- history -->
    <div class="container-fluid m-2">
        <h2 class="fw-bold">History of our Community</h2>
        <div class="container-fluid m-2">
            <p>ZooParc Zoological Park was first founded in the late 1980s, it was only a small animal refuge with the goal of preserving and showcasing endangered species.
            With time, it developed into one of the top zoological parks in the world, with about 2,000 animals from 200 different species living there.
            ZooParc has developed continuously, adding new teaching programs and using cutting-edge conservation approaches. 
            As a symbol of animal preservation today, it draws tourists from all over the world with its well chosen and varied displays.</p>
        </div>
    </div>
    <hr class="border border-success border-2 opacity-50">

    <!-- Mission -->
    <div class="container-fluid m-2">
        <h2 class="fw-bold">Our Mission</h2>
        <div class="container-fluid m-2">
            <p class="fst-italic">Through immersive animal encounters, ZooParc hope to inspire and educate our community while advancing conservation, research, and a close bond with the natural world. 
                Our goal is to establish a sanctuary where all species flourish and each visitor departs with a deeper respect for the natural world</p>
        </div>
    </div>

    <!-- Vision -->
    <div class="container-fluid m-2">
        <h2 class="fw-bold">Our Vision</h2>
        <div class="container-fluid m-2">
            <p class="fst-italic">Protection of endangered species and habitats for generations
            </p>
        </div>
    </div>

    <?php include './components/footer.php' ?>
    
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
