<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Outlets</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body class="bg-dark">

  <?php include './components/nav.php' ?>

    <!-- topic -->
    <div class="container-fluid m-2">
        <h1 class="display-5 fw-bold text-white">Foods</h1>
    </div>

    <!-- Foods -->
    <div class="row row-cols-1 row-cols-md-3 g-4 m-4 p-4">
        <div class="col">
          <div class="card h-100">
            <img src="./Images/Foods/Chips.jpeg" class="card-img-top" alt="Chips">
            <div class="card-body">
              <h4 class="card-title text-success fst-italic fw-bold lh-lg">French Fries</h4>
              <ul class="card-text">
                <li>Side dish or snack</li>
                <li>served with ketchup, vinegar, mayonnaise, tomato sauce, or other sauces</li>
              </ul>
              <p class="text-center">Price: Rs.150</p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card h-100">
            <img src="./Images/Foods/FriedRice.jpeg" class="card-img-top" alt="FriedRice">
            <div class="card-body">
              <h4 class="card-title text-success fst-italic fw-bold lh-lg">FriedRice</h4>
              <ul class="card-text">
                <li>Chinese fried rice</li>
                <li>Hokkien fried rice</li>
              </ul>
              <p class="text-center">Price: Rs.700</p> 
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card h-100">
            <img src="./Images/Foods/Hotdogs.jpeg" class="card-img-top" alt="Hotdogs">
            <div class="card-body">
              <h4 class="card-title text-success fst-italic fw-bold lh-lg">Hotdogs</h4>
              <ul class="card-text">
                <li>consisting of a grilled or boiled sausage served in the slit of a partially sliced bun</li>
              </ul>
              <p class="text-center">Price: Rs.250</p>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card h-100">
            <img src="./Images/Foods/MilkShake.jpeg" class="card-img-top" alt="MilkShake">
            <div class="card-body">
              <h4 class="card-title text-success fst-italic fw-bold lh-lg">MilkShake</h4>
              <ul class="card-text">
                <li>Chocolate MilkShake</li>
                <li>Strawberry MilkShake</li>
                <li>Vanilla MilkShake</li>
              </ul>
              <p class="text-center">Price: Rs.200</p>
            </div>
          </div>
        </div>

        <div class="col">
            <div class="card h-100">
              <img src="./Images/Foods/Ice-Cream.jpeg" class="card-img-top" alt="Ice-Cream">
              <div class="card-body">
                <h4 class="card-title text-success fst-italic fw-bold lh-lg">Ice-Cream</h4>
                <ul class="card-text">
                  <li>Chocolate Ice-Cream</li>
                  <li>Vanilla Ice-Cream</li>
                  <li>Strawberry Ice-Cream</li>
                </ul>
                <p class="text-center">Price: Rs.200</p>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card h-100">
              <img src="./Images/Foods/Popcorn.jpeg" class="card-img-top" alt="Popcorn">
              <div class="card-body">
                <h4 class="card-title text-success fst-italic fw-bold lh-lg">Popcorn</h4>
                <p class="text-center">Price: Rs.100</p>
              </div>
            </div>
          </div>
      </div>

    <?php include './components/footer.php' ?>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>